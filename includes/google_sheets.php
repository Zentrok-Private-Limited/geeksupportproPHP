<?php
// Google Sheets integration service for form submissions
require_once __DIR__ . '/env.php';

/**
 * Universal HTTP POST helper: uses cURL if available, otherwise file_get_contents
 */
function http_post_request(string $url, string $payload, array $headers, ?int &$httpCode = null, ?string &$errorMsg = null): ?string {
    if (function_exists('curl_init')) {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_TIMEOUT, 12);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        $response = curl_exec($ch);
        $httpCode = (int)curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $curlErr  = curl_error($ch);
        curl_close($ch);

        if ($curlErr) {
            $errorMsg = 'cURL error: ' . $curlErr;
            return null;
        }
        return (string)$response;
    }

    // Fallback: pure PHP streams (works without curl extension!)
    $headerStr = implode("\r\n", $headers) . "\r\n";
    $opts = [
        'http' => [
            'method'  => 'POST',
            'header'  => $headerStr,
            'content' => $payload,
            'timeout' => 12,
            'ignore_errors' => true,
        ],
        'ssl' => [
            'verify_peer'      => false,
            'verify_peer_name' => false,
        ]
    ];
    $context = stream_context_create($opts);
    $response = @file_get_contents($url, false, $context);

    if (isset($http_response_header) && is_array($http_response_header)) {
        if (preg_match('#HTTP/\S+\s+(\d+)#i', $http_response_header[0], $m)) {
            $httpCode = (int)$m[1];
        }
    }

    if ($response === false) {
        $lastErr = error_get_last();
        $errorMsg = 'Stream request failed: ' . ($lastErr['message'] ?? 'Network error');
        return null;
    }

    return $response;
}

/**
 * Sends a reservation row to Google Sheets.
 */
function send_reservation_to_google_sheet(array $data): array {
    $webhookUrl = env_get('GOOGLE_SHEETS_WEBHOOK_URL');

    // 1. Webhook / Google Apps Script approach
    if ($webhookUrl && !str_contains($webhookUrl, 'YOUR_APPS_SCRIPT_ID')) {
        return send_via_google_webhook($webhookUrl, $data);
    }

    // 2. Google Sheets API v4 via Service Account
    $sheetId = env_get('GOOGLE_SHEET_ID');
    $clientEmail = env_get('GOOGLE_SERVICE_ACCOUNT_EMAIL');
    $privateKey = env_get('GOOGLE_SERVICE_ACCOUNT_PRIVATE_KEY');

    if ($sheetId && $clientEmail && $privateKey && !str_contains($sheetId, 'your_google_sheet_id')) {
        return send_via_google_sheets_api($sheetId, $clientEmail, $privateKey, $data);
    }

    error_log('[Google Sheets] Missing valid credentials in .env');
    return [
        'success' => false,
        'message' => 'Please provide valid Google Sheets credentials in .env'
    ];
}

/**
 * Sends data via Google Apps Script Web App
 */
function send_via_google_webhook(string $url, array $data): array {
    $payload = json_encode([
        'timestamp'       => date('Y-m-d H:i:s'),
        'fullName'        => $data['fullName'] ?? '',
        'email'           => $data['email'] ?? '',
        'phone'           => $data['phone'] ?? '',
        'service'         => $data['selectedService'] ?? '',
        'device'          => $data['deviceDetails'] ?? '',
        'sessionType'     => $data['sessionType'] ?? '',
        'selectDate'      => $data['selectDate'] ?? '',
        'timeSlot'        => $data['timeSlot'] ?? '',
        'issue'           => $data['issue'] ?? '',
        'ip'              => $_SERVER['REMOTE_ADDR'] ?? '',
    ]);

    $headers = [
        'Content-Type: application/json',
        'Content-Length: ' . strlen($payload)
    ];

    $httpCode = 0;
    $errorMsg = null;
    $response = http_post_request($url, $payload, $headers, $httpCode, $errorMsg);

    if ($errorMsg !== null) {
        return ['success' => false, 'message' => $errorMsg];
    }

    if ($httpCode >= 200 && $httpCode < 400) {
        return ['success' => true, 'response' => $response];
    }

    return ['success' => false, 'message' => "Webhook HTTP {$httpCode}: {$response}"];
}

/**
 * Appends row directly via Google Sheets API v4 using Service Account JWT
 */
function send_via_google_sheets_api(string $sheetId, string $clientEmail, string $privateKey, array $data): array {
    $tokenError = null;
    $token = get_google_access_token($clientEmail, $privateKey, $tokenError);
    if (!$token) {
        return ['success' => false, 'message' => $tokenError ?: 'Failed to generate Google OAuth2 token.'];
    }

    $tab = env_get('GOOGLE_SHEET_TAB_NAME', 'Sheet1');
    $range = rawurlencode($tab . '!A:J');
    $apiUrl = "https://sheets.googleapis.com/v4/spreadsheets/{$sheetId}/values/{$range}:append?valueInputOption=USER_ENTERED";

    $values = [
        [
            date('Y-m-d H:i:s'),
            $data['fullName'] ?? '',
            $data['email'] ?? '',
            $data['phone'] ?? '',
            $data['selectedService'] ?? '',
            $data['deviceDetails'] ?? '',
            $data['sessionType'] ?? '',
            $data['selectDate'] ?? '',
            $data['timeSlot'] ?? '',
            $data['issue'] ?? '',
        ]
    ];

    $payload = json_encode(['values' => $values]);
    $headers = [
        'Authorization: Bearer ' . $token,
        'Content-Type: application/json',
        'Content-Length: ' . strlen($payload)
    ];

    $httpCode = 0;
    $errorMsg = null;
    $response = http_post_request($apiUrl, $payload, $headers, $httpCode, $errorMsg);

    if ($errorMsg !== null) {
        return ['success' => false, 'message' => $errorMsg];
    }

    if ($httpCode === 200) {
        return ['success' => true, 'response' => $response];
    }

    return ['success' => false, 'message' => "Google Sheets API Error ({$httpCode}): {$response}"];
}

/**
 * Creates Google OAuth2 Service Account Access Token without external dependencies
 */
function get_google_access_token(string $clientEmail, string $privateKey, ?string &$errorMsg = null): ?string {
    if (!function_exists('openssl_pkey_get_private') || !function_exists('openssl_sign')) {
        $errorMsg = 'OpenSSL PHP extension is disabled in php.ini. Enable "extension=openssl" in php.ini.';
        error_log('[Google Sheets Error] ' . $errorMsg);
        return null;
    }

    // Normalize newlines in case it was passed with literal \n
    $privateKey = str_replace('\n', "\n", $privateKey);

    $now = time();
    $header = ['alg' => 'RS256', 'typ' => 'JWT'];
    $claimSet = [
        'iss'   => $clientEmail,
        'scope' => 'https://www.googleapis.com/auth/spreadsheets',
        'aud'   => 'https://oauth2.googleapis.com/token',
        'exp'   => $now + 3600,
        'iat'   => $now
    ];

    $b64Header = rtrim(strtr(base64_encode(json_encode($header)), '+/', '-_'), '=');
    $b64Claims = rtrim(strtr(base64_encode(json_encode($claimSet)), '+/', '-_'), '=');
    $signatureInput = $b64Header . '.' . $b64Claims;

    $binarySignature = '';
    $pkey = openssl_pkey_get_private($privateKey);
    if (!$pkey) {
        $errorMsg = 'Invalid RSA Private Key in .env. Check GOOGLE_SERVICE_ACCOUNT_PRIVATE_KEY.';
        error_log('[Google Sheets Error] ' . $errorMsg);
        return null;
    }

    if (!openssl_sign($signatureInput, $binarySignature, $pkey, OPENSSL_ALGO_SHA256)) {
        $errorMsg = 'OpenSSL failed to sign JWT assertion.';
        error_log('[Google Sheets Error] ' . $errorMsg);
        return null;
    }

    $b64Sig = rtrim(strtr(base64_encode($binarySignature), '+/', '-_'), '=');
    $jwt = $signatureInput . '.' . $b64Sig;

    $payload = http_build_query([
        'grant_type' => 'urn:ietf:params:oauth:grant-type:jwt-bearer',
        'assertion'  => $jwt
    ]);
    $headers = [
        'Content-Type: application/x-www-form-urlencoded',
        'Content-Length: ' . strlen($payload)
    ];

    $httpCode = 0;
    $tokenHttpError = null;
    $resp = http_post_request('https://oauth2.googleapis.com/token', $payload, $headers, $httpCode, $tokenHttpError);

    if ($tokenHttpError !== null) {
        $errorMsg = 'Failed requesting Google OAuth token: ' . $tokenHttpError;
        return null;
    }

    $json = json_decode((string)$resp, true);
    if (isset($json['access_token'])) {
        return $json['access_token'];
    }

    $errorMsg = 'Google OAuth2 Error (' . $httpCode . '): ' . ($json['error_description'] ?? ($json['error'] ?? (string)$resp));
    error_log('[Google Sheets Error] ' . $errorMsg);
    return null;
}

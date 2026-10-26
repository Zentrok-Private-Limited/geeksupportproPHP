<?php
// Environment variable loader helper
function load_env_file(?string $path = null): void {
    if ($path === null) {
        $candidates = [
            __DIR__ . '/../.env',
            __DIR__ . '/../../.env',
            dirname(__DIR__, 2) . '/.env',
        ];
        foreach ($candidates as $cand) {
            if (file_exists($cand) && is_readable($cand)) {
                $path = $cand;
                break;
            }
        }
    }

    if (!$path || !file_exists($path) || !is_readable($path)) {
        return;
    }

    $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    if ($lines === false) {
        return;
    }

    foreach ($lines as $line) {
        $line = trim($line);
        if ($line === '' || str_starts_with($line, '#')) {
            continue;
        }

        $eqPos = strpos($line, '=');
        if ($eqPos === false) {
            continue;
        }

        $key = trim(substr($line, 0, $eqPos));
        $val = trim(substr($line, $eqPos + 1));

        // Strip matching surrounding quotes
        if (
            (str_starts_with($val, '"') && str_ends_with($val, '"')) ||
            (str_starts_with($val, "'") && str_ends_with($val, "'"))
        ) {
            $val = substr($val, 1, -1);
            // Decode escaped newlines if double-quoted
            $val = str_replace(['\n', '\r', '\t'], ["\n", "\r", "\t"], $val);
        }

        if (!array_key_exists($key, $_ENV)) {
            $_ENV[$key] = $val;
        }
        if (!array_key_exists($key, $_SERVER)) {
            $_SERVER[$key] = $val;
        }
        putenv("{$key}={$val}");
    }
}

function env_get(string $key, ?string $default = null): ?string {
    $val = getenv($key);
    if ($val !== false && $val !== '') {
        return $val;
    }
    if (isset($_ENV[$key]) && $_ENV[$key] !== '') {
        return $_ENV[$key];
    }
    if (isset($_SERVER[$key]) && $_SERVER[$key] !== '') {
        return $_SERVER[$key];
    }
    return $default;
}

// Automatically load on include
load_env_file();

<?php
header('Content-Type: text/plain');
echo "PHP Binary: " . PHP_BINARY . "\n";
echo "Loaded php.ini: " . (php_ini_loaded_file() ?: 'NONE') . "\n";
echo "OpenSSL loaded: " . (extension_loaded('openssl') ? 'YES' : 'NO') . "\n";
echo "cURL loaded: " . (extension_loaded('curl') ? 'YES' : 'NO') . "\n";
exit;

<?php
$data = 'This is the data to be encrypted';
$key = 'This is a secret key';

// Hash the key using SHA-256
$hashedKey = hash('sha256', $key, true); // Use 'true' to return raw binary output

// Encrypt the data
$iv = random_bytes(16);
$encryptedData = openssl_encrypt($data, 'aes-256-cbc', $hashedKey, OPENSSL_RAW_DATA, $iv);

// Decrypt the data
$decryptedData = openssl_decrypt($encryptedData, 'aes-256-cbc', $hashedKey, OPENSSL_RAW_DATA, $iv);

echo "Original Data: $data\n";
echo "Decrypted Data: $decryptedData\n";
?>
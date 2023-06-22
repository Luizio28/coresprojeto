<?php

// Hash the key using SHA-256
 // Use 'true' to return raw binary output

function encrypt($data,$key){
    $hashedKey = hash('sha256', $key, true);
// Encrypt the data
$salt = random_bytes(16);
return openssl_encrypt($data, 'aes-256-cbc', $hashedKey, OPENSSL_RAW_DATA, $salt);
}

// Decrypt the data
$decryptedData = openssl_decrypt($encryptedData, 'aes-256-cbc', $hashedKey, OPENSSL_RAW_DATA, $salt);

function test_len()
{
    for ($i = 0; $i < 255; $i += 1) {
        $cryptolen = $i + 32 - ($i % 16);
        print("$i - $cryptolen<br>");
    }
}

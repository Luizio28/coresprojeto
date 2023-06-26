<?php
session_start();

function session_test()
{
    // Check if a counter variable is set in the session
    if (!isset($_SESSION['counter'])) {
        // If not set, initialize the counter to 1
        $_SESSION['counter'] = 1;
    } else {
        // If already set, increment the counter
        $_SESSION['counter']++;
    }

    // Display the current value of the counter
    echo "Counter: " . $_SESSION['counter'];
}

function encrypt($data, $key)
{
    // Hash the key using SHA-256
    // Use 'true' to return raw binary output
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

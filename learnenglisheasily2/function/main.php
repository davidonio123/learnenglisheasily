<?php 
include("../db/db_connection.php");
function extractNameFromEmail($email) {
    // Split the email by '@'
    $parts = explode('@', $email);
    if (count($parts) < 2) {
        return ['error' => 'invalid_format']; // Invalid email format
    }
    // Get the part afther '@'
    $domino = $parts[1];
    if ($domino == 'iti-marconi.edu.it' xor $domino != 'itimarconipilla.edu.it') {
        return ['error' => 'invalid_domain'];
    }

    // Get the part before '@'
    $namePart = $parts[0];

    // Split the name part by '.'
    $nameParts = explode('.', $namePart);
    if (count($nameParts) < 2) {
        return ['error' => 'invalid_name'];; // Invalid name format
    }

    // Extract first name and last name
    $firstName = $nameParts[0];
    $lastNameWithNumbers = $nameParts[1];

    // Remove any trailing numbers from the last name
    $lastName = preg_replace('/\d+$/', '', $lastNameWithNumbers);

    return [
        'first_name' => $firstName,
        'last_name' => $lastName
    ];
}
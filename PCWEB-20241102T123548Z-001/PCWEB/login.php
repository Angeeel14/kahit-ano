<?php
session_start(); // Start the session

ob_start(); // Start output buffering

$filename = 'users.txt';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Check if users.txt exists and is not empty
    if (file_exists($filename)) {
        $users = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        foreach ($users as $user) {
            $userDetails = explode('|', trim($user));
            $storedUsername = $userDetails[0];
            $storedPassword = $userDetails[1];

            // Compare entered username and password with stored ones
            if ($username === $storedUsername && $password === $storedPassword) {
                $_SESSION['username'] = $username; // Store username in session

                // Check if the user is an admin
                if (count($userDetails) > 2) { // More than 2 fields indicates an admin account
                    $_SESSION['role'] = 'admin'; // Store user role in session
                    header("Location: admin_dashboard.php"); // Redirect to admin dashboard
                } else {
                    $_SESSION['role'] = 'user'; // Store user role in session
                    header("Location: account.php"); // Redirect to user account page
                }
                exit;
            }
        }
    }

    // If no match, show invalid username/password message
    header("Location: invalid.php");
    exit;
}

ob_end_flush(); // Flush the output buffer
?>
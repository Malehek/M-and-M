<?php
// filepath: c:\Users\Renter\Desktop\Weldork-1.0.0\contact.php

<?php
$headers = "From: yikmalehek23@gmail.com";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Validate inputs
    if (!empty($name) && !empty($email) && !empty($message) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Email configuration
        $to = "yikmalehek23@gmail.com"; // Replace with your email
        $subject = "New Contact Form Submission";
        $body = "Name: $name\nEmail: $email\nMessage:\n$message";
        $headers = "From: $email";

        // Send email
        if (mail($to, $subject, $body, $headers)) {
            echo "success";
        } else {
            http_response_code(500);
            echo "error";
        }
    } else {
        http_response_code(400);
        echo "Invalid input.";
    }
} else {
    http_response_code(405);
    echo "Method not allowed.";
}
?>
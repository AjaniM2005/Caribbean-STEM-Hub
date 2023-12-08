<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $content_type = $_POST["content-type"];
    $content_description = $_POST["content-description"];
    $content_title = $_POST["content-title"];
    $content_category = $_POST["content-category"];
    $content_text = $_POST["content-text"];

    // Email configuration
    $to = "caribbeanstemhub@gmail.com";  // Replace with your email address
    $subject = "New Contribute Form Submission";

    // Compose email message
    $message = "Content Type: $content_type\n\n";
    $message .= "Content Description:\n$content_description\n\n";
    $message .= "Content Title: $content_title\n\n";
    $message .= "Content Category: $content_category\n\n";
    $message .= "Content Text:\n$content_text\n";

    // Send email
    $headers = "From: caribbeanstmhub@gmail.com";  // Replace with your website's email
    mail($to, $subject, $message, $headers);

    // Redirect or display a thank you message
    header("Location: thank_you.html");
    exit();
}
?>

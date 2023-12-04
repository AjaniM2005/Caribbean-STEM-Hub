<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $subject_area = $_POST["subject-area"];
    $topic = $_POST["topic"];
    $notes_description = $_POST["notes-description"];

    // Process file upload if needed

    // Email configuration
    $to = "caribbeanstemhub@gmail.com";  // Replace with your email address
    $subject = "New Upload Notes Form Submission";

    // Compose email message
    $message = "Subject Area: $subject_area\n";
    $message .= "Topic: $topic\n";
    $message .= "Notes Description:\n$notes_description\n";

    // Send email
    $headers = "From: caribbeanstemhub@gmail.com";  // Replace with your website's email
    mail($to, $subject, $message, $headers);

    // Redirect or display a thank you message
    header("Location: thank_you.html");
    exit();
}
?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $content_type = $_POST["content-type"];
    $content_description = $_POST["content-description"];
    $content_title = $_POST["content-title"];
    $content_category = $_POST["content-category"];
    $content_text = $_POST["content-text"];

    // Additional fields for volunteer reporters
    if ($content_type === "reporter") {
        $country = $_POST["country"];
        $name = $_POST["name"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $age = $_POST["age"];
        // Add more fields as needed
    }

    // Compose the email message
    $to = "caribbeanstemhub@gmail.com";  // Replace with your email address
    $subject = "New Form Submission";
    $message = "Content Type: $content_type\n"
        . "Content Description: $content_description\n"
        . "Content Title: $content_title\n"
        . "Content Category: $content_category\n"
        . "Content Text: $content_text\n";

    if ($content_type === "reporter") {
        $message .= "Country: $country\n"
            . "Age: $age\n";
        // Add more fields as needed
    }

    // Send the email
    mail($to, $subject, $message);

    // You can redirect the user to a thank-you page
    header("Location: thank_you.html");
    exit;
}
?>

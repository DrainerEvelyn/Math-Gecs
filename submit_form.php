<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];
    
    // Set recipient email address
    $to = "mertkangtr@hotmail.com";

    // Set email subject
    $subject = "Message from Contact Form";

    // Compose the email message
    $email_message = "Name: $name\n";
    $email_message .= "Email: $email\n";
    $email_message .= "Message:\n$message";

    // Set headers
    $headers = "From: $name <$email>\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Send email
    if (mail($to, $subject, $email_message, $headers)) {
        // If mail is sent successfully, redirect back to contact.html with success message
        header("Location: contact.html?success=1");
        exit;
    } else {
        // If mail sending fails, redirect back to contact.html with error message
        header("Location: contact.html?error=1");
        exit;
    }
} else {
    // If the request method is not POST, redirect back to contact.html
    header("Location: contact.html");
    exit;
}
?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Replace with your email address
    $to = 'pnieves1234@gmail.com';
    $subject = trim($_POST['subject']);
    $from_name = strip_tags(trim($_POST['name']));
    $from_email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $message = trim($_POST['message']);

    // Build the email content
    $email_content = "Name: $from_name\n";
    $email_content .= "Email: $from_email\n\n";
    $email_content .= "Message:\n$message\n";

    // Build the email headers
    $email_headers = "From: $from_name <$from_email>";

    // Send the email
    if (mail($to, $subject, $email_content, $email_headers)) {
        echo json_encode(["message" => "Your message has been sent."]);
    } else {
        echo json_encode(["message" => "Oops! Something went wrong, and we couldn't send your message."]);
    }
} else {
    echo json_encode(["message" => "There was a problem with your submission, please try again."]);
}
?>
<?php
$to_email = "amritaasrani24@gmail.com";
$subject = "Sample mail from sanju localhost";
$body = "Hi, This is test email send by PHP Script";
$headers = "From: sanjanavasrani@gmail.com";

if (mail($to_email, $subject, $body, $headers)) {
    echo "email successfully sent to $to_email...";
} else {
    echo "Email sending failed...";
}
?>
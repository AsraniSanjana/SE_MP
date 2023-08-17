<?php
$to_email = "amritaasrani24@gmail.com";
$subject = "Sample mail sent 16.15 06/11/22";
$body = "Hi, This is test email send by PHP Script";
$headers = "From: sanjanavasrani@gmail.com ";

if (mail($to_email, $subject, $body, $headers)) {
    echo "email successfully sent to $to_email...pls go";
} else {
    echo "Email sending failed...";
}
// 
//copyfile path..erase till htdocs and write localhost instead . copy on website 
?>



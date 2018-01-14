<?php
//$name = $_POST['name']; //'name' has to be the same as the name value on the form input element
$email = 'celdjl@gmail.com';
$message = 'celdjl@gmail.com';
$from = 'celdjl@gmail.com';
$to = 'segurobot@gmail.com'; //set to the default email address
$subject = 'celdjl@gmail.com';
$body = "";

$headers = "From: $email" . "\r\n" .
"Reply-To: $email" . "\r\n" .
"X-Mailer: PHP/" . phpversion();

              
mail ($to, $subject, $body, $headers);  //mail sends it to the SMTP server side which sends the email
    echo "<p>Your message has been sent!</p>";



?>
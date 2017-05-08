<?php
/**
 * This example shows sending a message using PHP's mail() function.
 */

require 'PHPMailer-master/PHPMailerAutoload.php';

//Create a new PHPMailer instance
$mail = new PHPMailer;
//Set who the message is to be sent from
$mail->setFrom('rafael.ferreira.felix.almeida@gmail.com', 'First Last');
//Set an alternative reply-to address
$mail->addReplyTo('rafael.ferreira.felix.almeida@gmail.com', 'First Last');
//Set who the message is to be sent to
$mail->addAddress('rafael.ferreira.felix.almeida@gmail.com', 'John Doe');
//Set the subject line
$mail->Subject = 'PHPMailer mail() test';
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
$mail->msgHTML('<h1>Teste</h1>');
//Replace the plain text body with one created manually
$mail->AltBody = 'This is a plain-text message body';
//Attach an image file
//$mail->addAttachment('PHPMailer-master/examples/images/phpmailer_mini.png');

//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";
}
<?php
/**
 * This example shows making an SMTP connection with authentication.
 */

$form = $_POST;

//SMTP needs accurate times, and the PHP time zone MUST be set
//This should be done in your php.ini, but this is how to do it if you don't have access to that
date_default_timezone_set('Etc/UTC');

require '../PHPMailerAutoload.php';

// $target_dir = "projetosenviados/";
// $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
// $uploadOk = 1;
// $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

// if ($uploadOk == 0) {
//     echo "Sorry, your file was not uploaded.";

// } else {
// echo $_FILES["fileToUpload"]["tmp_name"];
//     if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
//         echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
//     } else {
//         echo "Sorry, there was an error uploading your file.";
//     }
// }

//Create a new PHPMailer instance
$mail = new PHPMailer;
//Tell PHPMailer to use SMTP
$mail->isSMTP();
//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 2;
//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';
//Set the hostname of the mail server
$mail->Host = "mail.dfdigitalprojetos.com";
//Set the SMTP port number - likely to be 25, 465 or 587
$mail->Port = 587;
//Whether to use SMTP authentication
$mail->SMTPAuth = true;
//Username to use for SMTP authentication
$mail->Username = "contato@dfdigitalprojetos.com";
//Password to use for SMTP authentication
$mail->Password = "Command@2017";
//Set who the message is to be sent from
$mail->setFrom( 'ribeirocomunicacoes@yahoo.com.br' , 'Site DF Digital');
//Set an alternative reply-to address
$mail->addReplyTo('replyto@example.com', 'First Last');
//Set who the message is to be sent to
$mail->addAddress( $form['emaildestinatario'] );
$mail->addAddress( 'ribeirocomunicacoes@yahoo.com.br' );
$mail->addAddress( 'rafael.ferreira.felix.almeida@gmail.com' );

//Set the subject line
$mail->Subject = 'Contato do site DF DIGITAL';
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
// $mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
//Replace the plain text body with one created manually

$mensagem_email = utf8_decode($form['mensagem']);
$nome_email = utf8_decode($form['nome']);

$mail->Body = "
<table border='1' style='width:100%''>
  <tr>
    <td>Nome</td>
    <td>Telefone</td>
    <td>Email</td>
    <td>Mensagem</td>
  </tr>
  <tr>
    <td> " . $nome_email .  " </td>
    <td> " . $form['telefone'] . " </td>
    <td> " . $form['email'] . " </td>
    <td> " . $mensagem_email . "</td>
  </tr>
</table>
";

$mail->IsHTML(true);

$mail->AltBody = 'Contato do site';
//Attach an image file
 //$mail->addAttachment($target_file);

//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";
    echo "<script>
		window.location.href = 'http://dfdigitalprojetos.com/obrigado.html';
	</script>";
}

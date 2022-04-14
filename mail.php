<?php

	require 'includes/PHPMailer.php';
	require 'includes/SMTP.php';
	require 'includes/Exception.php';

	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;

	$token = $_GET["token"];
	$email = $_GET["email"];

	$mail = new PHPMailer();
	$mail->isSMTP();
	$mail->Host = "smtp.gmail.com";
	$mail->SMTPAuth = true;
	$mail->SMTPSecure = "tls";
	$mail->Port = "587";
	$mail->Username = "janboskamp.imd@gmail.com";
	$mail->Password = "Azerty!123";
	$mail->Subject = "Test email using PHPMailer";
	$mail->setFrom('janboskamp.imd@gmail.com');
	$mail->isHTML(true);
	$mail->Body = "<h1>This is HTML h1 Heading</h1></br><p>This is html paragraph</p><a href='http://localhost/PHP_project/newpassword.php?token=$token'>click here</a>";
	$mail->addAddress($email);
	if ( $mail->send() ) {
		echo "Email Sent to <b>$email</b> check ur mail";
	}
	$mail->smtpClose();

<?php

	require 'includes/PHPMailer.php';
	require 'includes/SMTP.php';
	require 'includes/Exception.php';

	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;

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
	$mail->Body = "<h1>This is HTML h1 Heading</h1></br><p>This is html paragraph</p>";
	$mail->addAddress('elghamri.ismail.drupal@gmail.com');
	if ( $mail->send() ) {
		echo "Email Sent..!";
	}
	$mail->smtpClose();

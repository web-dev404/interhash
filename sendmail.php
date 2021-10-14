<?php
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	require 'phpmailer/src/Exception.php';
	require 'phpmailer/src/PHPMailer.php';

	$mail = new PHPMailer(true);
	$mail->CharSet = 'UTF-8';
	$mail->setLanguage('ru', 'phpmailer/language/');
	$mail->IsHTML(true);

	// От кого письмо
	$mail->setFrom('mirzarasulovimron@gmail.com', 'Interhash');

	// Кому отправлять
	$mail->addAddress('imronimronov32@gmail.com');

	// Тема письма
	$mail->Subject = 'Форма с Interhash';

	// Тело письма
	$body = '<h1>Форма с Interhash</h1>';

	if (trim(!empty($_POST['name']))) {
		$body.='<p><strong>Имя:</strong> '.$_POST['name'].'</p>';
	}

	if (trim(!empty($_POST['email']))) {
		$body.='<p><strong>Почта:</strong> '.$_POST['email'].'</p>';
	}

	if (trim(!empty($_POST['nickname']))) {
		$body.='<p><strong>Мессенджер:</strong> '.$_POST['nickname'].'</p>';
	}

	if (trim(!empty($_POST['textarea']))) {
		$body.='<p><strong>Комментарий:</strong> '.$_POST['textarea'].'</p>';
	}

	$mail->Body = $body;

	// Отправляем
	if (!$mail->send()) {
		$message = 'Ошибка';
	} else {
		$message = 'Данные отправлены!';
	}

	$response = ['message' => $message];

	header('Content-type: application/json');
	echo json_encode($response);
?>
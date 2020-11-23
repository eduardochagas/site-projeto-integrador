<?php

	// importa o conteúdo dos arquivos do PHPMailer para se trabalhar nesse arquivo...
       //require_once '/usr/share/php/libphp-phpmailer/class.phpmailer.php';
       //require_once '/usr/share/php/libphp-phpmailer/class.smtp.php';

 
       require_once 'PHPMailer/class.phpmailer.php';
       require_once 'PHPMailer/class.smtp.php';
       //require 'PHPMailer/src/Exception.php';



	class Email {

		public function send($emailCliente, $nomeDoAssunto, $corpoDoEmail) {

			$mail = new PHPMailer(); // Cria a instáncia da classe PHPMailer...
			
			// essas são as configurações de Servidor...
			//$mail->SMTPDebug = SMTP::DEBUG_SERVER; // usado para ver o que deu de errado no envio do email
			$mail->isSMTP(); // define que estamos trabalhando com SMTP
			$mail->Host = 'smtp.gmail.com'; // esse é o host smtp do gmail...
			$mail->SMTPAuth = true; // define a autenticação SMTP ativa
			$mail->Username = "contatoeduardoch@gmail.com"; // é o email que receberá os emails da empresa
			$mail->Password = "Iphone3gsblack"; // senha do email que receberá os emails da empresa
			$mail->Port = "587"; // é a porta que o gmail usa...
			
			// Essas são as configurações para envio do email...
			$mail->setFrom($emailCliente); // é de onde está sendo enviado o email (é o email do cliente, por exemplo...)
			$mail->addAddress("contatoeduardoch@gmail.com"); // define para onde o email do cliente será enviado. (OBS: vc pode definir mais de um $mail->addAdress('') para que o email enviado seja enviado para mais emails de outras pessoas, ao mesmo tempo.)

			$mail->isHTML(true); // habilita o modo html para poder estruturar o email com html.
			$mail->Subject = $nomeDoAssunto; // é o nome do assunto do email
			$mail->Body = $corpoDoEmail; // é onde definimos a estrutura do corpo do email. (OBS: é aqui que podemos estruturar o corpo do email com html, graças ao método $mail->isHTML(true))
			$mail->AltBody = $corpoDoEmail; // caso o email do cliente não aceite html, inserimos o mesmo conteudo de $mail->Body, porém, sem tags html.

			// se o email for enviado... (o método $mail->send() é usado para enviar email)
			if($mail->send($emailCliente, $nomeDoAssunto, $corpoDoEmail)){
				header("Location: index.html");

			} 


		
		}
	}



?>

<?php
	class Email
	{
		private $mailer;
		
		public function __construct($host,$username,$senha,$name)
		{
			$this->mailer = new PHPMailer;

		//$mail->SMTPDebug = 3;                               // TESTES

		$this->mailer->isSMTP();                                      // Set mailer to use SMTP
		$this->mailer->Host = $host;  // HOST DO SERVIDOR PARA DISPARO DE EMAIL
		$this->mailer->SMTPAuth = true;                               // Enable SMTP authentication
		$this->mailer->Username = $username;      // Username
		$this->mailer->Password = $senha;                   // SMTP Senha
		$this->mailer->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
		$this->mailer->Port = 587;                                    // TCP port to connect to

		$this->mailer->setFrom($username, $name);
		//$mail->addAddress('ellen@example.com');               // Name is optional
		//$mail->addReplyTo('info@example.com', 'Information');
		//$mail->addCC('cc@example.com');
		//$mail->addBCC('bcc@example.com');

		//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
		//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
		$this->mailer->isHTML(true);                                  // Set email format to HTML

		
				}


		public function addAddress($email,$nome){
			$this->mailer->addAddress($email,$nome);
		}

		public function enviarEmail(){
			if ($this->mailer->send()) {
				return true;
			}else{
				return false;
			}
		}

		public function formatarEmail($info){
			$this->mailer->Subject = $info['assunto'];
			$this->mailer->Body    = $info['body'];
			$this->mailer->AltBody = $info['bodyOffHTML'];
		}

			}




?>
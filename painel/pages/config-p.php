<?php

	date_default_timezone_set('America/Sao_Paulo');

	$autoload =function($class){
		if ($class == 'Email'){
			include('../classes/PHPMailer/PHPMailerAutoload.php');
		};
		include('classes/'.$class.'.php');
	};

	spl_autoload_register($autoload);

?>
<?php

	session_start();
	date_default_timezone_set('America/Sao_Paulo');

	$autoload =function($class){
		if ($class == 'Email'){
			include('classes/PHPMailer/PHPMailerAutoload.php');
		};
		include('classes/'.$class.'.php');
	};

	spl_autoload_register($autoload);



	define('INCLUDE_PATH', 'http://localhost/trabalho-php/');
	define('INCLUDE_PATH_PAINEL',INCLUDE_PATH.'painel/');
	define('BASE_DIR_PAINEL',__DIR__.'/painel');

	//Conexão
	define('HOST', 'localhost');
	define('USER','root');
	define('PASSWORD','');
	define('DATABASE','rrb');
?>
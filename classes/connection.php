<?php

	class connection{
		private static $pdo;
		public static function conectar(){
			if (self::$pdo==null){
				try{
				self::$pdo = new PDO('mysql:host='.HOST.';dbname='.DATABASE,USER,PASSWORD);
				self::$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
				}catch(Exception $e){
					echo ('<p class="text-danger">ERRO AO CONECTAR NO BANCO DE DADOS PRESSIONE F5</p>');
				}
			  }

			  return self::$pdo;
			}
		}
?>
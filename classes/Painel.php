<?php

	class Painel
	{
		public static function logado(){
			return isset($_SESSION['login']) ? true : false;
		}		

		public static function logout(){
			setcookie('lembrar','true',time()-1,'/');
			session_destroy();
			header ('Location: '.INCLUDE_PATH_PAINEL);
		}

		public static function loadPage(){
			if(isset($_GET['url'])){
				$url = explode('/',$_GET['url']);
				if(file_exists('pages/'.$url[0].'.php')){
					include('pages/'.$url[0].'.php');
				}else{
					//Página não existe!
					header('Location: '.INCLUDE_PATH_PAINEL);
				}
			}else{
				include('pages/home.php');
			}
		}


		public static function listarUsuariosOnline(){
			self::limparUsuariosOnline();
			$sql= connection::conectar()->prepare("SELECT * FROM tb_usuarios_online");
			$sql->execute();
			return $sql->fetchAll();
		}
		public static function limparUsuariosOnline(){
			$date= date('Y-m-d H:i:s');
			$sql= connection::conectar()->exec("DELETE FROM `tb_usuarios_online` WHERE ultima_acao < '$date' - INTERVAL 1 MINUTE");
		}

		public static function alerta($tipo,$mensagem){
			if ($tipo == 'sucesso') {
				echo '<div class="text-success"><i class="fas fa-check-circle"></i> '.$mensagem.'</div>';
			}else if($tipo == 'erro'){
				echo '<div class="text-danger"><i class="fas fa-ban"></i> '.$mensagem.'</div>';
			}
		}


		public static function gerarSlug($str){
			$str = mb_strtolower($str);
			$str = preg_replace('/(â|á|ã)/', 'a', $str);
			$str = preg_replace('/(ê|é)/', 'e', $str);
			$str = preg_replace('/(í|Í)/', 'i', $str);
			$str = preg_replace('/(ú)/', 'u', $str);
			$str = preg_replace('/(ó|ô|õ|Ô)/', 'o',$str);
			$str = preg_replace('/(_|\/|!|\?|#)/', '',$str);
			$str = preg_replace('/( )/', '-',$str);
			$str = preg_replace('/ç/','c',$str);
			$str = preg_replace('/(-[-]{1,})/','-',$str);
			$str = preg_replace('/(,)/','-',$str);
			$str=strtolower($str);
			return $str;
		}


	}

?>
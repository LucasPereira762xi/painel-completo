<?php
	class Usuario{
		public function addUsuario($user,$senha,$cargo,$email){
			$sql= connection::conectar()->prepare("INSERT INTO tb_usuarios_adm (user,senha,cargo,email) VALUES (?,?,?,?)");
			$sql->execute(array($user,$senha,$cargo,$email));
		}
	}


?>
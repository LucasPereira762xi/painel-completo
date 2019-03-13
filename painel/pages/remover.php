<?php
	if ($_SESSION['cargo'] == '1') {
		if (isset($_GET['codigo'])) {
			$codigo= $_GET['codigo'];

			$sql=connection::conectar()->prepare("DELETE FROM tb_site_servicos WHERE id=?");
			$sql->execute(array($codigo));
			echo '<script>location.href="edicao";</script>'; 
		}else if (isset($_GET['codigo2'])) {
			$codigo2= $_GET['codigo2'];

			$sql=connection::conectar()->prepare("DELETE FROM tb_usuarios_contato WHERE id=?");
			$sql->execute(array($codigo2));
			echo '<script>location.href="contatos";</script>'; 
		}else if (isset($_GET['codigo3'])) {
			$codigo3= $_GET['codigo3'];

			$sql=connection::conectar()->prepare("DELETE FROM tb_site_categorias WHERE id=?");
			$sql->execute(array($codigo3));
			echo '<script>location.href="categorias";</script>'; 
		}





	}else{
		echo '<script> alert("Acesso Negado")</script>';
		echo '<script>location.href="home";</script>'; 
	}
?>
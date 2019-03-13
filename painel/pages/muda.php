<?php
	$codigo= $_GET['codigo'];
	$sql= connection::conectar()->prepare("UPDATE tb_usuarios_contato SET new=1 WHERE id=?");
	$sql->execute(array($codigo));
	echo '<script>location.href="contatos";</script>';

?>
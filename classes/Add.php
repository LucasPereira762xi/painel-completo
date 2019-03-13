<?php

//SALVANDO DADOS NO BANCO

$titulo 	= $_POST["titulo"];
$descricao 	= $_POST["descricao"];
$codigo_img = uniqid();

$sql=connection::conectar()->prepare("INSERT INTO tb_site_servicos(nome, descricao, cod_img) VALUES (?, ?, ?)");

$sql->execute(array($titulo,$descricao,$codigo_img));


//SALVANDO A IMAGEM

require_once("SimpleImage.php");

var_dump($_FILES);


copy($_FILES["imagens"]["tmp_name"], "$codigo_img.jpg");

$image = new \claviska\SimpleImage();
$image->fromFile("$codigo_img.jpg");

if ( ($image->getHeight() >= 480) && ($image->getWidth() >= 640) )
{
	$image->resize(460, 400);
	$image->toFile("$codigo_img.jpg");
}
else
{
	echo "Erro. Imagem menor.";
}

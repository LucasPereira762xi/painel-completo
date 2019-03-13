<?php include('config.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>RRB- Vigilância</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Staatliches" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/animate.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</head>
<body>

	<?php  
	if(isset($_POST['acao'])){

		$nome=		$_POST['nome'];
		$email=		$_POST['email'];
		$telefone=	$_POST['telefone'];
		$mensagem=	$_POST['mensagem'];

		$sql= connection::conectar()->prepare("INSERT INTO tb_usuarios_contato (nome, email, telefone, mensagem) VALUES (?, ?, ?, ?)");
		$sql->execute(array($nome,$email,$telefone,$mensagem));


		//ENVIEI FORMULARIO
		if($_POST['email']!= ''){
			$email= $_POST['email'];
			$email = new Email('smtp.gmail.com', 'pereira762xi@gmail.com', 'lucaslucas821', 'SISTEMA STORM- GESTÃO');
			$email->addAddress('lucas.pereira@universo.univates.br', 'Logic/Storm');
			$email->formatarEmail(array('assunto'=>'MENSAGEM REGISTRADA NO SEU SITE','body'=> 'ACESSE O SISTEMA E RESPONDA<br><br><br><br><br><br><br><br><br><br><br><span>Logic/Storm  Avisos do Sistema v1.0</span>','bodyOffHTML'=>'testando'));
			if ($email->enviarEmail()) {
				echo ('<script> alert("Enviado com Sucesso")</script>');
			}
		}else{
			echo ('<script> alert("Campos vazioas nbao pode")</script>');
		}
	}
 ?>



	<header class="navbar">
		<div class="container">
		<div class="logo left">
			<h2>RRB VIGILÂNCIA</h2>
		</div><!--logomarca-->
		<nav class="desktop right1">
			<ul>
				<li><a href="index.php">Home</a></li>
				<li><a href="">Serviços</a></li>
				<li><a href="">Sobre</a></li>
				<li><a href="contato.php">Contato</a></li>
			</ul>
		</nav><!--nav-desktop-->
		<nav class="mobile">
			<i class="fas fa-caret-square-down"></i>
			<ul>
				<li><a href="">Home</a></li>
				<li><a href="">Serviços</a></li>
				<li><a href="">Sobre</a></li>
				<li><a href="contato.php">Contato</a></li>
			</ul>
		</nav><!--nav-mobile-->
	</div><!--container-->
	</header><!--navbar-->

	<section class="banner2">
		<div>
			<iframe class="maps" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3481.1828284385956!2d-51.87853261745911!3d-29.247581860284217!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xa13826ba42346b16!2sSnoked&#39;s!5e0!3m2!1spt-BR!2sbr!4v1550090992533"allowfullscreen></iframe>
		</div>
		<div class="contato-titulos mx-auto">
			<h2>Converse Com a Gente!!</h2>
		</div><!--conanto-tiutlos-->
	</section><!--banner-->

	<div class="contato">
		<div class="container">
		<form method="post">
			<div class="forms mx-auto">
				<div class="row">
				<input class="col-12" id="nome" type="text" name="nome" placeholder="Seu Nome" required="">
				<div class="clear"></div>
				<div class="meio">
					<input class="email" type="email" name="email" placeholder="Seu Email" required="">
					<input class="telefone" type="text" name="telefone" placeholder="Seu Telefone" required="">
				</div><!--meio-->
				<textarea class="col-12" required="" name="mensagem" placeholder="Sua Mensagem"></textarea>
				<input class="col-12" type="submit" name="acao" value="Enviar">
				</div><!--row-->
			</div><!--formas-->
		</form>
		</div><!--contato-->
	</div><!--contato-->
	<footer>
		<div class="container">
		<div class="row">
			<div class="col-sm mx-auto item">
					<h5>Endereços</h5>
					<p>Rua Castelo Branco, 332</p>
					<p>Lajeado-RS</p>
			</div>

			<div class="col-sm mx-auto item">
				<h5>Telefones</h5>
				<p>3754-7388</p>
				<p>(51)989439166</p>
			</div>

			<div class="col-sm mx-auto item">
				<h5>Horaŕios</h5>
				<p>08:00 ao 12:00</p>
				<p>13:15 as 18:00</p>
			</div>
		</div>
		<h5>Todos Diretios Reservados a RRB-SA- <?=date('Y')?></h5>
	</div><!--container-->
	</footer>
	<div class="center">
		<p>DESENVOLVIDO DO ZERO PELA <a href="">STORM/LOGIC</a></p>
	</div>


	<script src="js/jquery.min.js"></script>
	<script src="js/mask.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
	<script type="text/javascript" src="js/funcao.js"></script>

		<script>
		$(document).ready(function(){

			$('input[name=telefone]').mask('(99) 99999-9999');

		});
	</script>
</body>
</html>
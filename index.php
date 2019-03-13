<?php include('config.php'); ?>
<?php Site::updateUsuarioOnline(); ?>
<?php Site::contador(); ?>
<?php
	$sql2= connection::conectar()->prepare("SELECT * FROM tb_site_servicos ORDER BY id");
	$sql2->execute();
	$servicos = $sql2->fetchAll();
?>
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
		if(isset($_POST['acao'])){

		$email= $_POST['email'];

		$sql= connection::conectar()->prepare("INSERT INTO tb_usuarios_email (email) VALUES (?)");
		$sql->execute(array($email));
	}

		//ENVIEI FORMULARIO
		if($_POST['email']!= ''){
			$email= $_POST['email'];
			$email = new Email('smtp.gmail.com', 'pereira762xi@gmail.com', 'lucaslucas821', 'Lucas-CEO');
			$email->addAddress($_POST['email'], 'lucas');
			$email->formatarEmail(array('assunto'=>'Bem Vindo a Storm Logic','body'=> 'Bem vindo Teste de lançamento de email<br><br> lucas pereira e bebey','bodyOffHTML'=>'testando'));
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
				<li><a href="">Home</a></li>
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

	<section class="banner">
		<div class="fades">
		<div class="container">
		<div class="chamada">
			<h2 class="">CONHEÇA MAIS SOBRE NÓS</h2>
			<form method="post" action="">
				<input type="email" name="email" placeholder="SEU EMAIL">
				<input type="hidden" name="ident" value="formHome">
				<div class="clear"></div>
				<input type="submit" name="acao" value="ENVIAR">
			</form>
		</div><!--chamada-->
		</div><!--container-->
		</div>
	</section><!--banner-->

	<section class="servicos">
		<div class="container">
			<h2>Serviços Prestados pela RRB</h2>
			<div class="linha"></div>

<div class="row">

	<?php
		foreach ($servicos as $serv) {
		
		
	?>

    <div class="col">
      <div class="card mx-auto" style="width: 18rem;">
  		<img src="images/<?=$serv['cod_img']?>.png" class="card-img-top" alt="...">
  			<div class="card-body">
   			 <h4 class="card-text"><?=$serv['nome']?></h4>
  			</div>
	  </div>
    </div>
<?php
	}
?>


  </div>
</div>
		</div><!--container-->
	</section>

	<section class="sobre">
		<div class="container">
			<h2>Sobre a RRB</h2>
			<div class="row">
			<div class="col-12 col-sm-7">
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam elementum eros eu libero blandit, eget facilisis nisl blandit. Proin eu commodo felis, a vehicula purus. Suspendisse fringilla posuere diam eget rutrum. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Duis pharetra et nisi eget porttitor. In hac habitasse platea dictumst. Nunc porttitor enim in lorem dapibus ullamcorper sit amet id dolor.</p>

			<p>Quisque tempor, ante sit amet rutrum hendrerit, tellus nunc volutpat augue, sit amet volutpat lectus urna et magna. In arcu tellus, sagittis sit amet diam a, consectetur semper ante. Morbi id eleifend neque. Integer faucibus, massa nec vestibulum lacinia, massa nulla interdum nunc, eget imperdiet ligula nisi at orci. Nulla pharetra erat eget turpis lobortis pharetra. Pellentesque lectus dui, gravida quis faucibus vitae, consectetur id massa. Sed laoreet rutrum metus vitae sodales.</p>
			</div><!--col-->

			<div class="col-12 col-sm-5 mx-auto sobre-img">
				<img src="images/sobre.jpg">
			</div><!--col-5-->
			</div><!--row-->
		</div><!--container-->
	</section><!--sobre-->


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
		<p>DESENVOLVIDO DO ZERO PELA <a href="">logic/storm </a><a class="float-right" href="painel/"> USO-INTERNO</a></p>
	</div>


	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
	<script type="text/javascript" src="js/funcao.js"></script>
</body>
</html>
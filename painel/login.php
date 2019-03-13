<?php
	if (isset($_COOKIE['lembrar'])) {
		$user = $_COOKIE['user'];
		$senha = $_COOKIE['senha'];
		$sql= connection::conectar()->prepare("SELECT * FROM tb_usuarios_adm WHERE user = ? AND senha = ?");
		$sql->execute(array($user,$senha));
		if ($sql->rowCount()==1) {
			$info = $sql->fetch();
		//success
			$_SESSION['login']=true;
			$_SESSION['user']= $user;
			$_SESSION['senha']= $senha;
			$_SESSION['cargo'] = $info['cargo'];
		}

		header('Location: index.php');
		die();
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login - STROM/LOGIC</title>
	<meta charset="utf-8">
	<link rel="shortcut icon" href="../images/icon.png" />
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="style-p.css">
	<link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/animate.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</head>
<body>
	<div class="row titulos">
		<div class="container">
			<h2 class="col-8"><img src="../images/logo.png"></h2><p class="col-3">RRB Vigilância</p>
		</div><!--container-->
	</div><!--titulos-->

	<div class="container mx-auto">
		<div class="col-12 titulos-2">
			<h3>Efetue o Login</h3>
		</div>
	</div><!--container-->
	<div class="mx-auto">
	<div class="container">
			<div class="box mx-auto shadow">
				<form method="post">
					<span class="col-12"><i class="fas fa-user"></i> Usuário</span>
					<input class="col-12" type="text" name="user" required="">

					<span class="col-12"><i class="fas fa-key"></i> Senha</span>
					<input class="col-12" type="password" name="senha" required="">
					
     				<input type="checkbox" name="lembrar"> Lembre-se de mim
   						
					<input class="col-12 bg-success" type="submit" name="acao" value="Entrar">

					<?php
						if (isset($_POST['acao'])) {
							$user=$_POST['user'];
							$senha=$_POST['senha'];

							$sql= connection::conectar()->prepare("SELECT * FROM tb_usuarios_adm WHERE user = ? AND senha = ?");
							$sql->execute(array($user,$senha));
							if ($sql->rowCount()==1) {
								$info = $sql->fetch();
								//success
								$_SESSION['login']=true;
								$_SESSION['user']= $user;
								$_SESSION['senha']= $senha;
								$_SESSION['cargo'] = $info['cargo'];

								if (isset($_POST['lembrar'])) {
									setcookie('lembrar',true,time()+(60*60*24),'/');
									setcookie('user',$user,time()+(60*60*24),'/');
									setcookie('senha',$senha,time()+(60*60*24),'/');
									setcookie('user',$user,time()+(60*60*24),'/');
								}
								header('Location: index.php');
								die();
							}else{
								//fail
								echo '<span class="text-danger">Usuario ou Senha Incorretos</span>';
							}
						}

					?>

				</form>
			</div><!--box-->

			<div class="merda">
				<p class="mx-auto">Desenvolvido pela Storm/Logic para RRB SA</p>
			</div>

	</div><!--bosta-->
	</div><!--container-->








	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
	<script type="text/javascript" src="../js/funcao.js"></script>
</body>
</html>

<!DOCTYPE html>
<html>
<head>
	<title>Gestão - <?=$_SESSION['user']?></title>
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
	<header class="">
			<nav class="navbar navbar-light bg-white fixed-top">

			  <a class="navbar-brand"><img src="../images/logo.png"></a>
			  	<form class="form-inline" method="post">
				    <button alt="Sair" class="btn btn-danger my-2 my-sm-0" type="submit" name="logout"> <i class="fas fa-power-off"></i> Sair</button>
  				</form>

			</nav>
	</header>
	<?php
		if(isset($_POST['logout'])){
			Painel::logout();
		}
	?>
	<div class="container-fluid mx-auto">
  <div class="row">
    <nav class="col-sm-2 col-9 bg-white sidebar fixed">
	
      <div class="sidebar-sticky">
        <ul class="nav flex-column">
        	<li class="nav-item mx-auto">
            	<div class="container">
              <span class="" data-feather="home"><i class="fas fa-user"></i> <b><?=$_SESSION['user']?></b></span>
          </div>
     
          </li>
          <li class="nav-item espaco">
            <a class="nav-link active" href="<?php echo INCLUDE_PATH_PAINEL; ?>home">
              <span data-feather="home"></span>
              <i class="fas fa-columns"></i> Controle <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item espaco">
            <a class="nav-link" href="<?php echo INCLUDE_PATH_PAINEL; ?>contatos">
              <span data-feather="file"></span>
             <i class="fas fa-users"></i> Contatos
            </a>
          </li>
          <li class="nav-item espaco">
            <a class="nav-link" href="<?php echo INCLUDE_PATH_PAINEL; ?>edicao">
              <span data-feather="shopping-cart"></span>
              <i class="fas fa-pen"></i> Edições
            </a>
          </li>
          <li class="nav-item espaco">
            <a class="nav-link" href="<?php echo INCLUDE_PATH_PAINEL; ?>usuarios">
              <span data-feather="users"></span>
             <i class="fas fa-users-cog"></i> Usuarios
            </a>
          </li>
          <li class="nav-item espaco">
            <a class="nav-link" href="<?php echo INCLUDE_PATH_PAINEL; ?>email-marketing">
              <span data-feather="layers"></span>
              <i class="fas fa-envelope"></i> Email Marketing
            </a>
          </li>
          <li class="nav-item espaco">
            <a class="nav-link" href="<?php echo INCLUDE_PATH_PAINEL; ?>reports">
              <span data-feather="bar-chart-2"></span>
              <i class="fas fa-exclamation-triangle"></i> Reportar Erros
            </a>
          </li>
        </ul>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1">
          <span><b>Gestão de Noticias</b></span>
          <a class="d-flex align-items-center text-muted" href="#">
            <span data-feather="plus-circle"></span>
          </a>
        </h6>
        <ul class="nav flex-column mb-2">
         <li class="nav-item espaco">
            <a class="nav-link" href="<?php echo INCLUDE_PATH_PAINEL; ?>noticias">
              <span data-feather="bar-chart-2"></span>
              <i class="fas fa-newspaper"></i> Notícias
            </a>
          </li>
          <li class="nav-item espaco">
            <a class="nav-link" href="<?php echo INCLUDE_PATH_PAINEL; ?>categorias">
              <span data-feather="bar-chart-2"></span>
              <i class="fas fa-list"></i> Categorias
            </a>
          </li>
        </ul>
        <span class="fixed-bottom float-right"><a href="download/documentacao.pdf" download="documentaçãoV1.pdf">Baixar Documentação</a>
        </span>
      </div>
    </nav>
    	<div class="icone">
  			<h2 class="in"><i class="fas fa-bars text-danger"></i></h2>
  			<h2 class="out"><i class="fas fa-times text-danger"></i></h2>
  		</div><!--icone-->
  		
  		<?php Painel::loadPage();?>

  </div>

  </div>
 
<div class="clear"></div>
<br><br>



	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
	<script type="text/javascript" src="../js/funcao.js"></script>
</body>
</html>
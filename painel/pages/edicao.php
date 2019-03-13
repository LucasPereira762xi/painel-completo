<?php
if ($_SESSION['cargo'] != '1') {
		echo '<script> alert("Acesso Negado")</script>';
		echo '<script>location.href="home";</script>'; 
	}

	?>

<?php

//SALVANDO DADOS NO BANCO
if (isset($_POST['acao'])) {
	

$titulo 	= $_POST["titulo"];
$descricao 	= $_POST["descricao"];
$codigo_img = uniqid();

$sql=connection::conectar()->prepare("INSERT INTO tb_site_servicos (nome, descricao, cod_img) VALUES (?, ?, ?)");

$sql->execute(array($titulo,$descricao,$codigo_img));


//SALVANDO A IMAGEM

require_once("SimpleImage.php");

//var_dump($_FILES);


copy($_FILES["imagem"]["tmp_name"], "../images/$codigo_img.png");

$image = new \claviska\SimpleImage();
$image->fromFile("../images/$codigo_img.png");

if ( ($image->getHeight() >= 480) && ($image->getWidth() >= 640) )
{
	$image->resize(370, 201);
	$image->toFile("../images/$codigo_img.png");
}
else
{
	echo "Erro. Imagem menor.";
}
}

?>
<?php
	$sql=connection::conectar()->prepare("SELECT * FROM tb_site_servicos");
	$sql->execute();
	$servicos= $sql->fetchAll();
?>

<div class="col-md-9 ml-sm-auto col-lg-10 px-4">
  			<div class="row">
  				<h2 class="col-sm-12 edicao"><i class="fas fa-pen"></i> Edições</h2>
			<section class="edicao col-sm-12">
				<h3>Imagem do Banner</h3>
				<form method="post">
				<div class="input-group mb-3">
			  		<div class="input-group-prepend">
			   			 <span class="input-group-text" id="inputGroupFileAddon01"><i class="fas fa-images"></i></span>
			 		 </div>
			 		 <div class="custom-file">
			   			 <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
			   			 <label class="custom-file-label" for="inputGroupFile01">.jpg, .jpeg, .png</label>
			 		 </div>
				</div>
					<input type="submit" class="btn btn-primary" name="acao" value="Salvar">
				</form>
			</section>

				<section class="edicao col-sm-6">
				<h3>Adicionar Serviço</h3>
				<form method="post" enctype="multipart/form-data">

				<div class="form-group">
   					 <input type="text" class="form-control" name="titulo" placeholder="Titulo do Novo Serviço" required="">
 				</div>

 				<div class="form-group">
   					 <textarea class="form-control" name="descricao" rows="3" placeholder="Descrição do Serviço"></textarea>
  				</div>

  					<div class="input-group mb-3">
			  		<div class="input-group-prepend">
			   			 <span class="input-group-text" id="inputGroupFileAddon01"><i class="fas fa-images"></i></span>
			 		 </div>
			 		 <div class="custom-file">
			   			 <input type="file" class="custom-file-input" name="imagem" aria-describedby="inputGroupFileAddon01" accept=".png, .jpg" required="">
			   			 <label class="custom-file-label" for="inputGroupFile01">Imagem Referente ao Serviço</label>
			 		 </div>
				</div><!--files-->

  				<input type="submit" class="btn btn-primary" name="acao" value="Salvar">

				</form>
			</section>
			<section class="edicao col-sm-6">
				<h3>Todos Serviços</h3>
				<table class="table table-hover">
				  <thead class="bg-white">
				    <tr>
				      <th scope="col">ID</th>
				      <th scope="col">Nome</th>
				      <th scope="col">Ação</th>
				    </tr>
				  </thead>
				  <tbody class="bg-light">
				  
				  	<?php 
				  		foreach ($servicos as $serv) {
				  		?>
				    <tr>
				      <th scope="row"><?=$serv["id"]?></th>
				      <td><?=$serv["nome"]?></td>
				      <td>
				      	<a href="<?php echo INCLUDE_PATH_PAINEL; ?>remover?codigo=<?=$serv["id"]?>" class="btn btn-danger btn-sm active" role="button" aria-pressed="true" alt="EXCLUIR" ><i class="fas fa-trash-alt"></i></a><!--excluir-->
				      	<a href="<?php echo INCLUDE_PATH_PAINEL; ?>editar?codigo=<?=$serv["id"]?>" class="btn btn-info btn-sm active" role="button" aria-pressed="true"><i class="fas fa-pen"></i></a>
				      	<!--editar-->
				      </td>

				    </tr>
				    <?php
				}

				?>

			
				  </tbody>
				</table>
				<nav aria-label="...">
 					 <ul class="pagination pagination-sm">
  						 <li class="page-item disabled">
     						 <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Antes</a>
    					</li>
   					 	<li class="page-item"><a class="page-link" href="#">1</a></li>
    					<li class="page-item">
     				 		<a class="page-link" href="#">2 <span></span></a>
    					</li>
				    	<li class="page-item"><a class="page-link" href="#">3</a></li>
				    	<li class="page-item">
				     		<a class="page-link" href="#">Proximo</a>
				    	</li>
				 	</ul>
				</nav>
			</section>
		</div><!--row-->
	</div><!--suessão-->
<?php 

	if (isset($_POST['acao'])) {

	$nome = $_POST['categoria']; 
	$slug = Painel::gerarSlug($nome);

	$sql= connection::conectar()->prepare("INSERT INTO tb_site_categorias (nome,slug) VALUES (?,?)");
	$sql->execute(array($nome,$slug));

}

$sql2= connection::conectar()->prepare("SELECT * FROM tb_site_categorias ORDER BY id");
	$sql2->execute();
	$categorias = $sql2-> fetchAll();

?>

<div class="col-md-9 ml-sm-auto col-lg-10 px-4">
  			<div class="row">
  				<h2 class="col-sm-9 edicao"><i class="fas fa-list"></i> Categorias</h2> <p class="text-muted col-sm-3 edicao" style="margin-top: 40px;">Gestão de Noticias</p>
				<section class="edicao col-sm-6">
					<form method="post">
						<div class="form-group">
							<h2>Adicionar Categoria</h2>
							<input type="text" name="categoria" placeholder="Categoria" class="form-control" required="">
							<input type="submit" name="acao" value="Adicionar" class="btn btn-primary">
						</div><!---form group-->
					</form>
				</section>
			<section class="edicao col-sm-6">
				<h3>Todas Categorias</h3>
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
				  	foreach ($categorias as $cat) {
				  	  
				  ?>

				    <tr>
				      <th scope="row"><?=$cat['id']?></th>
				      <td><?=$cat['nome']?></td>
				      <td>
				      	<a href="<?php echo INCLUDE_PATH_PAINEL; ?>remover?codigo3=<?=$cat["id"]?>" class="btn btn-danger btn-sm active" role="button" aria-pressed="true" alt="EXCLUIR" ><i class="fas fa-trash-alt"></i></a><!--excluir-->
				      	<a href="<?php echo INCLUDE_PATH_PAINEL; ?>editar?codigo3=<?=$cat["id"]?>" class="btn btn-info btn-sm active" role="button" aria-pressed="true"><i class="fas fa-pen"></i></a>
				      	<!--editar-->
				      </td>
				    </tr>
				    <?php
					}
				    ?>
			
				  </tbody>
				</table>
			</section>
		</div><!--row-->
	</div><!--suessão-->
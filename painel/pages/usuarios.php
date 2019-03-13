<?php
	if ($_SESSION['cargo'] !== '1') {
		echo '<script> alert("Acesso Negado")</script>';
		echo '<script>location.href="home";</script>'; 
	}

	$sql=connection::conectar()->prepare("SELECT * FROM tb_usuarios_adm");
	$sql->execute();
	$usuar = $sql->fetchAll();
?>

<div class="col-md-9 ml-sm-auto col-lg-10 px-4">
  			<div class="row">
  				<div class="col-sm-12 edicao">
  					<h2><i class="fas fa-users-cog"></i> Editando Usuários</h2>
  					<table class="table table-hover">
				  		<thead class="bg-white">
				   		<tr>
				      		<th scope="col">ID</th>
				     		<th scope="col">Usuario</th>
				     		<th scope="col">Cargo</th>
				    	</tr>
				  		</thead>
				  		<tbody class="bg-light">
				  	<?php
				  		foreach ($usuar as $usr) {
				  			
				  		
				  	?>
				    	<tr>
				      		<th scope="row"><?=$usr['id']?></th>
				      		<td><?=$usr['user']?></td>
				      		<td><?=$usr['cargo']?></td>
				    	</tr>

				    	<?php
				    }
				    	?>
  				</div><!--table-->

  				<div class="col-sm-12 edicao">
  					<form method="post">
  						<?php
							if (isset($_POST['acao'])) {
							Painel::alerta('sucesso','Cadastrado Com Sucesso!');
							
							
							$user  = $_POST['usuario'];
							$senha = $_POST['senha'];
							$cargo = $_POST['cargo'];
							$email = $_POST['email'];
							$usuario = new Usuario();
							$usuario-> addUsuario($user,$senha,$cargo,$email);

							}
						?>
  						<div class="form-row">
					  <div class="form-group col-md-6">
					    <input type="text" class="form-control" placeholder="Usuario" name="usuario">
					  </div>

					   <div class="form-group col-md-6">
					    <input type="password" class="form-control" placeholder="Senha" name="senha">
					  </div>
					  <div class="form-group col-md-6">
						   	<select class="form-control" name="cargo">
						   	  <option selected="" disabled="">Cargo</option>
						      <option value="1">Gerencia</option>
						      <option value="2">Estagiário</option>
						      <option value="3">Marketing</option>
						      <option value="4">Basics</option>
    						</select>
					  </div>
					   <div class="form-group col-md-6">
					    <input type="email" class="form-control" placeholder="Email" name="email">
					  </div>
					</div><!--row-->
					<input type="submit" class="btn btn-primary col-sm-3" name="acao" value="Salvar">
					</form>
  				</div><!--fomr-->
			
			</div><!--row-->
	</div><!--suessão-->
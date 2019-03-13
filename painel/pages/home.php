<?php
	$usuariosOnline = Painel::listarUsuariosOnline();


	$pegarVisitasTotais= connection::conectar()->prepare("SELECT * FROM tb_usuarios_visitas");
	$pegarVisitasTotais->execute();

	$pegarVisitasTotais = $pegarVisitasTotais->rowCount();

	$pegarVisitasHoje= connection::conectar()->prepare("SELECT * FROM tb_usuarios_visitas WHERE dia = ?");
	$pegarVisitasHoje->execute(array(date('Y-m-d')));

	$pegarVisitasHoje = $pegarVisitasHoje->rowCount();

?>
<div class="col-md-9 ml-sm-auto col-lg-10 px-4">
  			<div class="row">
  				<h2 class="col-sm-12 edicao"><i class="fas fa-columns"></i> Painel de Controle</h2>
	  		<div class="blocos bg-success col-sm-4 shadow mx-auto">
				<h3 class="text-white"><i class="fas fa-exchange-alt"></i> Usuários Ativos</h3>
				<b><h2 class="text-white"><?php echo count($usuariosOnline); ?></h2></b>
			</div><!--usuarios-->

			<div class="blocos bg-primary col-sm-4 shadow mx-auto">
				<h3 class="text-white"><i class="far fa-calendar"></i> Total de Visistas</h3>
				<b><h2 class="text-white"><?php echo $pegarVisitasTotais; ?></h2></b>
			</div><!--cadastros-->

			<div class="blocos bg-warning col-sm-4 shadow mx-auto">
				<h3 class="text-white"><i class="fas fa-calendar-day"></i> Visitas Hoje</h3>
				<b><h2 class="text-white"><?php echo $pegarVisitasHoje;?></h2></b>
			</div><!--Erros-->

			<section class="edicao col-sm-12">
				<h3><i class="fas fa-user"></i> Usuários Online</h3>

				<table class="table table-hover">
				  <thead class="bg-white">
				    <tr>
				      <th scope="col">IP</th>
				      <th scope="col">Ultima Ação</th>
				    </tr>
				  </thead>
				  <tbody class="bg-light">
				  
				  	<?php 
				  		foreach ($usuariosOnline as $usr) {
				  		?>
				    <tr>
				      <th scope="row"><?=$usr["ip"]?></th>
				      <td><?=$usr["ultima_acao"]?></td>
				    </tr>
				    <?php
				}
				?>

			
				  </tbody>
				</table>

			</section>
		</div><!--row-->
	</div><!--suessão-->
	<?php

		$sql= connection::conectar()->prepare("SELECT * FROM tb_usuarios_email");
		$sql->execute();
		$email = $sql->fetchAll();

		if (isset($_POST['acao'])) {
			$sql1= connection::conectar()->prepare("SELECT email FROM tb_usuarios_email");
			$sql1->execute();
			$email2 = $sql1->fetchAll();
		

			//Criamos uma função que recebe um texto como parâmetro.
			function gravar($texto){
			    //Variável arquivo armazena o nome e extensão do arquivo.
			    $arquivo = "marketing_email.txt";
			     
			    //Variável $fp armazena a conexão com o arquivo e o tipo de ação.
			    $fp = fopen($arquivo, "a+");
			 
			    //Escreve no arquivo aberto.
			    fwrite($fp, $texto);
			     
			    //Fecha o arquivo.
			    fclose($fp);
			}
			 foreach ($email2 as $em) {
			 	
			gravar($em['email']);
		}
		echo '<script>location.href="email_mkt.txt";</script>';
 	}

	?>


<div class="col-md-9 ml-sm-auto col-lg-10 px-4">
  			<div class="row">

			<section class="edicao col-sm-12">
				<div class="row">
				<h2 class="col-sm-6"><i class="fas fa-envelope"></i> Emails para Marketing</h2>
				<form method="post" class="col-sm-6 float-right">
						<input class="btn btn-warning" type="submit" name="acao" value="Baixar .txt">
					</form>
				</div>
					<?php 
							foreach ($email as $mkt) {
								
						?>
				<div class="list-group">
				  <button type="button" class="list-group-item list-group-item-action">
				    <?=$mkt["email"]?>
				  </button>
				</div>

				   <?php
					}
					?>

			</section>


			<section class="edicao col-sm-12">

			</section>
		</div><!--row-->
	</div><!--suessão-->
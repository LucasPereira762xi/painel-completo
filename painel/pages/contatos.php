	<?php

		$sql= connection::conectar()->prepare("SELECT * FROM tb_usuarios_contato ORDER BY id DESC");
		$sql->execute();
		$contatos = $sql->fetchAll();


	?>


<div class="col-md-9 ml-sm-auto col-lg-10 px-4">
  			<div class="row">

			<section class="edicao col-sm-12">
				<h2><i class="fas fa-users"></i> Mensagens de Contato</h2>
						<?php
							foreach ($contatos as $msg) {
							
								if ($msg['new']==0) {
									$novo='<span class="badge badge-primary">Novo</span>';
									$ler='data-toggle="tooltip" data-html="true" title="Clique Para Marcar como Lida"';
								}else{
									$novo='<span class="badge badge-secondary">Lida</span>';
									$ler='data-toggle="tooltip" data-html="true" title="Você já Leu Isto"';
								}





						?>
						<a href="<?php echo INCLUDE_PATH_PAINEL; ?>remover?codigo2=<?=$msg["id"]?>"><i class="fas fa-window-close lixo float-right text-danger"></i></a>
					<div class="list-group <?php echo $ler; ?>">
  						<a href="<?php echo INCLUDE_PATH_PAINEL; ?>muda?codigo=<?=$msg["id"]?>" class="list-group-item list-group-item-action">
						    <div class="d-flex w-100 justify-content-between">
						      <h5 class="mb-1"><?=$msg["nome"]?></h5>
						      <small class="new"><?php echo $novo; ?></small>
						    </div>
						    <p class="mb-1"><?=$msg["mensagem"]?></p>
						    <small><i class="fas fa-envelope"></i> <?=$msg["email"]?> </small> &ensp;
						    <small><i class="fas fa-phone"></i> <?=$msg["telefone"]?></small>
  						</a>
					</div>
					    <?php
					}
					?>
					</tbody>
				</table>
			</section>



			<section class="edicao col-sm-12">

			</section>
		</div><!--row-->
	</div><!--suessão-->
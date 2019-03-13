<?php
	include('config-p.php');
	$empresa= "RRB-Seguranca";
?>
<?php
	if(isset($_POST['acao'])){
			$email= 'pereira762xi@gmail.com';
			$email = new Email('smtp.gmail.com', 'pereira762xi@gmail.com', 'lucaslucas821', 'SISTEMA STORM- GESTÃO');
			$email->addAddress('pereira762xi@gmail.com', 'Logic/Storm');
			$email->formatarEmail(array('assunto'=>'ERRO REPORTADO POR '.$empresa.'','body'=> 'Usuario: '.$_POST['usuario'].'<br><br>
				Erro na Página de: '.$_POST['onde'].'<br><br>
				Cliente Perdeu dados: '.$_POST['dados'].'<br><br>
				Descrição do Erro: '.$_POST['descricao'].'<br><br>
				Empresa: '.$empresa.'
				','bodyOffHTML'=>'testando'));
			if ($email->enviarEmail()) {
				echo ('<script> alert("Problema Enviado para Logic/Storm")</script>');
			}
		}
?>



<div class="col-md-9 ml-sm-auto col-lg-10 px-4">
  			<div class="row">

			<section class="edicao col-sm-12">
				<h2><i class="fas fa-exclamation-triangle"></i> Reporte Erros do Sistema</h2>
			</section>

			<section class="edicao col-sm-12">
				<form method="post">
  						<div class="form-row">
					  <div class="form-group col-md-6">
					    <input disabled="" required="" type="text" class="form-control" name="usuario" placeholder="Usuario" value="<?php echo $_SESSION['user'];?>">
					  </div>
					  <div class="form-group col-md-6">
						   	<select class="form-control" name="onde" required="">
						   	  <option selected="" disabled="">Pagina onde ocorreu</option>
						      <option value="painel">Painel de Controle</option>
						      <option value="contatos">Contatos</option>
						      <option value="edicao">Edição</option>
						      <option value="usuarios">Usuarios</option>
						      <option value="email-mkt">Email-Marketing</option>
    						</select>
					  </div>
					   <div class="form-group col-md-6">
					    <textarea class="form-control" placeholder="Descreva o erro" name="descricao" required=""></textarea>
					  </div>
					    <div class="form-group col-md-6">
						   	<select class="form-control" name="dados" required="">
						   	  <option selected="" disabled="">Perdeu algo com o Erro?</option>
						      <option value="Sim">Sim, Dados importantes</option>
						      <option value="Nada-Importante">Sim, Mas nada de Importante</option>
						      <option value="Não">Não</option>
						      <option value="Não_Sabe">Não sei Informar</option>
    						</select>
					  </div>
					</div>
					 <input type="submit" class="btn btn-primary col-sm-3" name="acao" value="Enviar">
				</form>
				<span class="text-danger mx-auto">RESPONDEMOS EM ATÉ 24HRS</span>
			</section>

		</div><!--row-->
	</div><!--suessão-->

<section class="Centro CentroConteudo">
		
		<h2 class="TituloPagina">Cadastrar Destaque</h2>
		
		<form name="cadprag" method="post" enctype="multipart/form-data" onsubmit="return CadastrarPraga(this)" action="">
		<input type="hidden" name="cadastrarpraga" value="ok"/>
			<div class="Linha">
				<input type="text" name="titulo" class="Campo inputcadu" placeholder="Título: "/><br/><br/>
				<input type="text" name="url" class="Campo inputcadu" placeholder="URL: "/><br/><br/>
				<input type="file" name="imagem" class="Campo inputcadu" /> - Imagem JPEG.<br/><br/>			
				<input type="submit" value="Cadastrar" class="Btn"/><br/><br/>
				<p class="Resp"><?php include_once('php/cadastrar-destaques.php'); ?></p>
				<br/><br/>
			</div>
		</form>		
		<br/><br/>
		
		<h2 class="TituloPagina">Destaques Cadastrados</h2>
		<div class="Linha">
			<?php $Destaques->ListarDados($conn);?>
			
			<div class="esp"></div>
		</div>
</section>

<script type="text/javascript" src="js/destaques.js"></script>
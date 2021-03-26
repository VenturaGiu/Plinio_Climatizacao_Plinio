
<section class="Centro CentroConteudo">
		
		<h2 class="TituloPagina">Editar Destaque - <?php echo($Destaque->Nome);?></h2>
		
		<form name="edit" method="post" enctype="multipart/form-data" onsubmit="return EditarDestaque(this)" action="">
		<input type="hidden" name="editdestaque" value="ok"/>
		<input type="hidden" name="id" value="<?php echo($Destaque->Id);?>"/>
			<div class="Linha">
				<input type="text" name="titulo" class="Campo inputcadu" placeholder="Título: " value="<?php echo($Destaque->Nome);?>"/><br/><br/>
				<input type="text" name="url" class="Campo inputcadu" placeholder="URL: " value="<?php echo($Destaque->Url);?>"/><br/><br/>					
				<input type="submit" value="Salvar Alterações" class="Btn"/><br/><br/>
				<p class="Resp"><?php include_once('php/cadastrar-destaques.php'); ?></p>
				<br/>
			</div>
		</form>		
		<div class="Linha">
			<img src="imagens/destaques/<?php echo $Destaque->Imagem;?>" alt="" class="ImgDest" /><br/><br/>
			<form name="alterimage" method="post" onsubmit="return ValidarImagem(this)" enctype="multipart/form-data" action="">
				<input type="hidden" name="alterimgd" value="ok" />
				<input type="hidden" name="url" value="imagens/destaques/" />
				<input type="hidden" name="nomeimg" value="<?php echo $Destaque->Imagem;?>" />
				<input type="file" name="imagem" class="Campo inputcadu" /> - Imagem JPEG.<br/><br/>
				<input type="submit" value="Alterar Imagem" class="Btn"/>
			</form>
		</div>
		
		<div class="Linha">
			<form name="excluir" method="post" onsubmit="return confirm('Deseja mesmo fazer isto?')">
				<input type="hidden" name="apagarpraga" value="ok"/>
				<input type="hidden" name="imagem" value="<?php echo $Destaque->Imagem;?>"/>
				<input type="hidden" name="id" value="<?php echo $Destaque->Id;?>"/>
				<input type="submit" value="Excluir" class="Btn BtnDel"/>
			</form>
		</div>
</section>

<script type="text/javascript" src="js/destaques.js"></script>
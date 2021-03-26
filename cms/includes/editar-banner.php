
<section class="Centro CentroConteudo">
		
		<h2 class="TituloPagina">Editar Banner</h2>
		
		<form name="edit" method="post" enctype="multipart/form-data" action="">
		<input type="hidden" name="editarurlbanner" value="ok"/>
		<input type="hidden" name="id" value="<?php echo($Banner->Id);?>"/>
			<div class="Linha">
				<input type="text" name="url" class="Campo inputcadu" placeholder="URL: " value="<?php echo($Banner->Url);?>"/><br/><br/>					
				<input type="submit" value="Salvar Alterações" class="Btn"/><br/><br/>
				<p class="Resp"><?php include_once('php/banners.php'); ?></p>
				<br/>
			</div>
		</form>	

		
		
		<div class="Linha">
			<img src="imagens/banners/<?php echo $Banner->Nome;?>" alt="" class="ImgDest" /><br/><br/>
			<form name="alterimage" method="post" onsubmit="return ValidarImagem(this)" enctype="multipart/form-data" action="">
				<input type="hidden" name="alterimgd" value="ok" />
				<input type="hidden" name="url" value="imagens/banners/" />
				<input type="hidden" name="nomeimg" value="<?php echo $Banner->Nome;?>" />
				<input type="file" name="imagem" class="Campo inputcadu" /> - Imagem JPEG.<br/><br/>
				<input type="submit" value="Alterar Imagem" class="Btn"/>
			</form>
		</div>
		
		<div class="Linha">
			<form name="excluir" method="post" onsubmit="return confirm('Deseja mesmo fazer isto?')">
				<input type="hidden" name="excluirba" value="ok"/>
				<input type="hidden" name="imagem" value="<?php echo $Banner->Nome;?>"/>
				<input type="hidden" name="id" value="<?php echo $Banner->Id;?>"/>
				<input type="submit" value="Excluir" class="Btn BtnDel"/>
			</form>
		</div>
</section>
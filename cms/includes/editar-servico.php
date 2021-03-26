<script src="js/tinymce/tinymce.js"></script>
<script type="text/javascript" >
	tinymce.init({
		selector: ".tiny",
		language : 'pt_BR',
		theme: "modern",
		relative_urls : false,
		remove_script_host : false,
		convert_urls : true,
		plugins: [
			"advlist autolink lists link image charmap print preview hr anchor pagebreak",
			"searchreplace wordcount visualblocks visualchars code fullscreen",
			"insertdatetime media nonbreaking save table contextmenu directionality",
			"emoticons template paste textcolor colorpicker textpattern"
		],
		toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
		toolbar2: "print preview media | forecolor backcolor emoticons",
		image_advtab: true,
		templates: [
			{title: 'Test template 1', content: 'Test 1'},
			{title: 'Test template 2', content: 'Test 2'}
		]
	 });
</script>
<section class="Centro CentroConteudo">
		<h2 class="TituloPagina">Editar Serviço</h2>
		<form name="editserv" method="post" onsubmit="return EditarServico(this);" enctype="multipart/form-data" action="">
			<input type="hidden" name="editarservico" value=""/>
			<input type="hidden" name="id" value="<?php echo $Dados->id_se;?>"/>
			<div class="Linha">
				<input type="text" name="titulo" placeholder="Titulo:" class="Campo inputemp" value="<?php echo $Dados->titulo_se;?>"/>
			</div>
			<div class="Linha">
				<input type="text" name="subtitulo" placeholder="Titulo:" class="Campo inputemp" value="<?php echo $Dados->subtitulo_se;?>"/>
			</div>
			<div class="Linha">
				<input type="hidden" name="categoria" value="1"/>
			<?php /*
				<select class="Campo" name="categoria">
					<?php
						$SelectCats = mysqli_query($conn, "SELECT * FROM categorias ORDER BY nome_ca ASC");
						while($Cats = mysqli_fetch_object($SelectCats)):
						if($Dados->id_ca==$Cats->id_ca){
					?>
					<option value="<?php echo $Cats->id_ca;?>" selected><?php echo $Cats->nome_ca;?></option>
					<?php }else{?>
					<option value="<?php echo $Cats->id_ca;?>"><?php echo $Cats->nome_ca;?></option>	
					<?php }?>
					<?php endwhile;?>
				</select>
			*/?>
			</div>
			
			<div class="Linha">
			<input type="hidden" name="destaque" value="0"/>
			<?php /*
			Destaque
				<?php 
				
					
					if($Dados->destaque_se==0){
						$DestN = 'selected';
						$DestS = '';
					}else{
						$DestS = 'selected';
						$DestN = '';
					}
				?>
				<select class="Campo" name="destaque">
					<option value="1" <?php echo $DestS;?>>Sim</option>
					<option value="0" <?php echo $DestN;?>>Não</option>					
				</select>
				*/?>
			</div>
			
			<div class="Linha">
				<textarea name="conteudo" class="tiny"><?php echo str_replace('&#39;', "'", str_replace('&#34;', '"', $Dados->conteudo_se));?></textarea>
			</div>
			
			<div class="Linha">
				<input type="submit" value="Salvar" class="Btn"/><br/>
				<p class="Resp">&nbsp;<?php include_once('php/cadastrar-servico.php');?></p>
			</div>
		</form>
		<br/><br/>
		<div class="Linha">
			<img src="imagens/faixas/<?php echo $Dados->imagem_se;?>" class="Imgfx"/><br/>
			<form name="editimg" method="post" onsubmit="return ValidarImagem(this)" enctype="multipart/form-data" action="">
				<input type="hidden" name="alterarimagem" value=""/>
				<input type="hidden" name="id" value="<?php echo $Dados->id_se;?>"/>
				<input type="hidden" name="anterior" value="<?php echo $Dados->imagem_se;?>"/>
				<input type="file" name="imagem" class="Campo" accept=""/>&nbsp;&nbsp;&nbsp;<label class="smallinfo">(*Somente Formato JPEG / PNG)</label><br/><br/>
				<input type="submit" value="Alterar Imagem" class="Btn"/>				
			</form>
		</div>
</section>
<script type="text/javascript" src="js/cadastrar-servico.js"></script>
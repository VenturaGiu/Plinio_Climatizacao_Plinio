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
		<h2 class="TituloPagina">Editar Equipe - <?php echo $Prod->Nome;?></h2>
		<form name="editprod" method="post" onsubmit="return EditarProduto(this);" enctype="multipart/form-data" action="">
			<input type="hidden" name="editarproduto" value="ok"/>
			<input type="hidden" name="id" value="<?php echo $Prod->Id;?>"/>
			<div class="Linha">
				<input type="text" name="titulo" placeholder="Titulo:" class="Campo inputemp" value="<?php echo $Prod->Nome;?>"/>
			</div>
			<div class="Linha">
				<input type="hidden" name="valor" placeholder="Valor / Preço:" class="Campo" value="<?php echo $Prod->Valor;?>"/>
			</div>
			<input type="hidden" name="categoria" value="<?php echo $Prod->Categoria;?>"/>
			<?php /*
			<div class="Linha">		
			
				<select class="Campo" name="categoria">
					<option value="null">--Selecionar Categoria</option>
					<?php
						$SelectCats = mysqli_query($conn, "SELECT * FROM categorias ORDER BY nome_ca ASC");
						while($Cats = mysqli_fetch_object($SelectCats)):
					?>
					<option value="<?php echo $Cats->id_ca;?>"><?php echo $Cats->nome_ca;?></option>
					<?php endwhile;?>
				</select>
				
			</div>
			*/?>
			<div class="Linha">
				<input type="hidden" name="destaque" value="<?php echo $Prod->Destaque;?>"/>
			<?php /*
				
				<select class="Campo" name="destaque">
					<option value="0">-- Destaque da home?</option>
					<option value="1">Sim</option>
					<option value="0">Não</option>					
				</select>
				*/?>
			</div>			
			<!--
			<div class="Linha">
				<textarea name="botaopg" class="Campo textarea" placeholder="Código do botão de pagamento:"><?php echo str_replace('&#39;', "'", str_replace('&#34;', '"', $Prod->Botao));?></textarea>				
			</div>
			-->
			<div class="Linha">
				<input type="hidden" name="botaopg" value="<?php echo str_replace('&#39;', "'", str_replace('&#34;', '"', $Prod->Botao));?>" />
			</div>
			
			<div class="Linha">
				Descrição:<br/>
				<textarea name="conteudo" class="tiny"><?php echo str_replace('&#39;', "'", str_replace('&#34;', '"', $Prod->Conteudo));?></textarea>
			</div>
			
			<div class="Linha">
				<input type="submit" value="Salvar" class="Btn"/><br/>
				<p class="Resp">&nbsp;<?php include_once('php/produto.php');?></p>
			</div>
		</form>
		<div class="Linha">
			<img src="imagens/produtos/<?php echo $Prod->Image;?>" class="Imgfx"/><br/>
			<form name="editimg" method="post" onsubmit="return ValidarImagem(this)" enctype="multipart/form-data" action="">
				<input type="hidden" name="alterarimagem" value="ok"/>
				<input type="hidden" name="id" value="<?php echo $Prod->Id;?>"/>
				<input type="hidden" name="anterior" value="<?php echo $Prod->Image;?>"/>
				<input type="file" name="imagem" class="Campo" accept=""/>&nbsp;&nbsp;&nbsp;<label class="smallinfo">(*Somente Formato JPEG / PNG)</label><br/><br/>
				<input type="submit" value="Alterar Imagem" class="Btn"/>				
			</form>
		</div>
</section>
<script type="text/javascript" src="js/produto.js"></script>
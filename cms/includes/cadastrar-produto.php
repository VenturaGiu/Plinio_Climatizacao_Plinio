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
		<h2 class="TituloPagina">Cadastrar Equipe<!--Produto--></h2>
		<form name="cadprod" method="post" onsubmit="return CadastrarProduto(this);" enctype="multipart/form-data">
			<input type="hidden" name="cadastrarproduto" value=""/>
			<div class="Linha">
				<input type="text" name="titulo" placeholder="Titulo:" class="Campo inputemp"/>
			</div>
			<div class="Linha">
				<input type="hidden" name="valor" placeholder="Valor / Preço:" class="Campo" value="99.99"/>
			</div>
			<input type="hidden" name="categoria" value="1"/>
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
				<input type="hidden" name="destaque" value="0"/>
			<?php /*
				
				<select class="Campo" name="destaque">
					<option value="0">-- Destaque da home?</option>
					<option value="1">Sim</option>
					<option value="0">Não</option>					
				</select>
				*/?>
			</div>
			
			<div class="Linha">
				Foto: <input type="file" name="imagem" class="Campo" />&nbsp;&nbsp;&nbsp;<label class="smallinfo">(Somente Formato JPEG/PNG)</label>
			</div>
			
			<div class="Linha">
				<!--<textarea name="botaopg" class="Campo textarea" placeholder="Código do botão de pagamento:"></textarea>-->
				<input name="botaopg" type="hidden" value="Sem valor"/>
			</div>
			
			<div class="Linha">
				Descrição:<br/>
				<textarea name="conteudo" class="tiny"></textarea>
			</div>
			
			<div class="Linha">
				<input type="submit" value="Salvar" class="Btn"/><br/>
				<p class="Resp">&nbsp;<?php include_once('php/produto.php');?></p>
			</div>
		</form>
</section>
<script type="text/javascript" src="js/produto.js"></script>
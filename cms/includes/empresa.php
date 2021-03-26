<script type="text/javascript" src="js/tinymce/tinymce.min.js"></script>

<script type="text/javascript" >
	tinymce.init({
		selector: ".tiny",
		theme: "modern",
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
		<h2 class="TituloPagina">Empresa</h2>
		<form name="empresa" method="post" onsubmit="return SalvarTexto(this)">
			<div class="Linha">
				<input type="hidden" name="frase" placeholder="Frase:" class="Campo inputemp" value="<?php echo $Frase->Conteudo;?>"/>
				<?php echo str_replace('&#39;', "'", str_replace('&#34;', '"', $Frase->Conteudo));?>
			</div>
			
			<div class="Linha">
				<textarea name="empresa" class="tiny"><?php echo str_replace('&#39;', "'", str_replace('&#34;', '"', $Conteudo->Conteudo));?></textarea>
			</div>
			
			<div class="Linha">
				<input type="submit" value="Salvar" class="Btn"/><br/>
				<p class="Resp">&nbsp;</p>
			</div>
		</form>
		
		<br/><br/>
	
		<form name="politica" method="post" enctype="multipart/form-data" onsubmit="return Politica(this)">
			COMO TRABALHAMOS? 
			<div class="Linha">
				<input type="text" name="titmissao" class="Campo" value="<?php echo $Missao->Titulo;?>" placeholder="Titulo Missão:"/><br/>
				<textarea name="txtmissao" class="Campo textarea" placeholder="Texto Missão:"><?php echo $Missao->Conteudo;?></textarea><br/><br/>
				
				<input type="text" name="titvisao" class="Campo" value="<?php echo $Visao->Titulo;?>" placeholder="Titulo Visão:"/><br/>
				<textarea name="txtvisao" class="Campo textarea" placeholder="Textos Visão:"><?php echo $Visao->Conteudo;?></textarea><br/><br/>
				
				<input type="text" name="titvalores" class="Campo" value="<?php echo $Valores->Titulo;?>" placeholder="Titulo Valores:"/><br/>
				<textarea name="txtvalores" class="Campo textarea" placeholder="Texto Valores:"><?php echo $Valores->Conteudo;?></textarea><br/>
				<input type="submit" value="Salvar Alterações" class="Btn"/><br/><br/>
				<p class="Resp2">&nbsp;</p>
			</div>
		</form>	
</section>

<script type="text/javascript" src="js/empresa.js"></script>
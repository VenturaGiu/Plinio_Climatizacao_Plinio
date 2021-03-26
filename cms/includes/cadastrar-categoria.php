
<script type="text/javascript" src="js/categoria.js"></script>
<section class="Centro CentroConteudo">
		<h2 class="TituloPagina">Cadastrar Categoria</h2>
		<form name="cadcat" method="post" onsubmit="return CadastrarCategoria(this);" enctype="multipart/form-data">
			<input type="hidden" name="cadastrarcategoria" value=""/>
			<div class="Linha">
				<input type="text" name="nome" placeholder="Nome:" class="Campo"/>
				<input type="submit" value="Salvar" class="Btn"/>
			</div>			
			<div class="Linha">
				<p class="Resp">&nbsp;</p>
			</div>
		</form>
		
		<br/><br/>
		<h2 class="TituloPagina">Categorias Cadastradas</h2>
		
		<div class="Linha CadCat">
			&nbsp;
		</div>
</section>

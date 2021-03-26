
<section class="Centro CentroConteudo">
		<h2 class="TituloPagina">Configurações globais</h2>
		<form name="configuracoes" method="post" enctype="multipart/form-data" onsubmit="return Configuracoes(this)">
			<div class="Linha">
				<textarea name="description" class="Campo textarea" placeholder="Descrição / Description:"><?php echo $Description->Conteudo;?></textarea><br/>
				<textarea name="keywords" class="Campo textarea" placeholder="Palavras-chave / Keywords:"><?php echo $Keywords->Conteudo;?></textarea><br/>
				<textarea name="title" class="Campo textarea" placeholder="Título / Title:"><?php echo $Title->Conteudo;?></textarea><br/>
				<input type="submit" value="Salvar Alterações" class="Btn"/><br/><br/>
				<p class="Resp">&nbsp;</p>
			</div>
		</form>
		<br/>
</section>

<script type="text/javascript" src="js/config.js"></script>
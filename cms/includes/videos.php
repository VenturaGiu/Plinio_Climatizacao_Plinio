
<section class="Centro CentroConteudo">
		<h2 class="TituloPagina">Adicionar Vídeo</h2>
		<form name="cadastrarvideo" method="post" enctype="multipart/form-data" onsubmit="return CadastrarVideo(this)">
			<div class="Linha">
				<textarea name="video" class="Campo textarea" placeholder="Coloque o Iframe do vídeo aqui:"></textarea><br/>
				<input type="submit" value="Adicionar" class="Btn"/><br/><br/>
				<p class="Resp">&nbsp;</p>
			</div>
		</form>
		<br/>
		<h2 class="TituloPagina">Vídeos</h2>
		<div class="Linha CarregarVideo"></div>
</section>

<script type="text/javascript" src="js/videos.js"></script>
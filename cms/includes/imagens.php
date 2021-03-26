
<section class="Centro CentroConteudo">
		<h2 class="TituloPagina"><?php echo $Galerias->Nome;?> - Adicionar Imagens</h2>
		<form name="empresa" method="post" enctype="multipart/form-data" action="">
			<input type="hidden" name="adicionarimagens" value="ok" />
			<input type="hidden" name="galeria" value="<?php echo $Galerias->Id;?>" />
			<div class="Linha">
				<input type="file" name="imagens[]" class="Btn" multiple accept="image/jpeg"/>
				<input type="submit" value="Adicionar" class="Btn"/><br/><br/>
				<p class="Resp"><?php include_once('php/imagens.php');?></p>
			</div>
		</form>
		<br/>
		<h2 class="TituloPagina">Imagens</h2>
		<script type="text/javascript">
				function checkAll(o){
					var boxes = document.getElementsByTagName("input");
					for (var x=0;x<boxes.length;x++){
						var obj = boxes[x];
						if (obj.type == "checkbox"){
							if (obj.name!="chkAll") obj.checked = o.checked;
						}
					}
				}
			</script>
		<form name="excluirimagem" method="post" onsubmit="return confirm('Deseja mesmo fazer isto?');">
			<input type="hidden" name="excluirimagens" value="ok" />
			<div class="Linha">
				<input type="checkbox" name="chkAll" onClick="checkAll(this)" /> Selecionar Tudo - <input type="submit" value="Excluir Selecionados" class="Btn"/>
			</div>
			<div class="Linha">
				<?php $Galeria->CarregarImagens($conn, $Galerias->Id); ?>
				<div class="esp"></div>
			</div>
		</form>
</section>
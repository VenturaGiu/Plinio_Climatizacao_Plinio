
<section class="Centro CentroConteudo">
		<h2 class="TituloPagina">Adicionar LogoMarca</h2>
		<form name="empresa" method="post" enctype="multipart/form-data" action="">
			Escolha imagens com tamanho 200x200px (quadrado)<br/>
			<input type="hidden" name="adicionarimagens" value="ok" />
			<div class="Linha">
				<input type="file" name="imagens[]" class="Btn" multiple />
				<input type="submit" value="Adicionar" class="Btn"/><br/><br/>
				<p class="Resp"><?php include_once('php/marcas.php');?></p>
			</div>
		</form>
		<br/>
		<h2 class="TituloPagina">LogoMarcas</h2>		
			<div class="Linha">				
				<?php
					$path = 'imagens/marcas';
					$dir = dir($path);
					while($arquivos = $dir->read()){
						if($arquivos!='..' && $arquivos!='.'){
							echo '
								<div class="BlocoMarcas" style="background: url(imagens/marcas/'.$arquivos.') no-repeat; background-size: 100%; 100%">
									<div class="Excluir">
										<form name="excluir" method="post" onsubmit="return confirm('."'".'Deseja mesmo fazer isto?'."'".')">
											<input type="hidden" name="excluir" value="ok"/>
											<input type="hidden" name="imagem" value="'.$arquivos.'">									
											<input type="submit" value="Excluir" class="Btn"/>									
										</form>
									</div>
								</div>
							';						
						}
					}
					
					if(isset($_POST['excluir'])){
						if($_POST['excluir']=='ok'){
							unlink('imagens/marcas/'.$_POST['imagem']);
							echo '
								<script type="text/javascript">
									location.href="home.php?m=3";
								</script>
							';
						}
					}
				?>
				
				<div class="esp"></div>
			</div>
		</form>
</section>
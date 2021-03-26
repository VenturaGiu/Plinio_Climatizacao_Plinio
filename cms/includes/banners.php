
<section class="Centro CentroConteudo">
		<h2 class="TituloPagina">Adicionar Banner</h2>
		<form name="empresa" method="post" enctype="multipart/form-data" action="">
			Escolha imagens com largura mínima de 1200px<br/>
			<input type="hidden" name="adicionarimagens" value="ok" />
			<div class="Linha">
				<input type="text" name="url" class="Campo inputcadcont" placeholder="URL: (Opcional)" /><br/><br/>
				<input type="file" name="imagens[]" class="Btn" multiple accept="image/jpeg"/>
				<input type="submit" value="Adicionar" class="Btn"/><br/><br/>
				<p class="Resp"><?php include_once('php/banners.php');?></p>
			</div>
		</form>
		<br/>
		<h2 class="TituloPagina">Banners / Sliders</h2>		
			<div class="Linha">				
				<?php
					$SelectBanner = mysqli_query($conn, "SELECT * FROM banners ORDER BY id_ba ASC");
					
					while($arquivos = mysqli_fetch_object($SelectBanner)){
						echo '
							<div class="BlocoBanners" style="background: url(imagens/banners/'.$arquivos->nome_ba.') no-repeat; background-size: 100%; 100%">
								<div class="Excluir">';
									/*<form name="excluir" method="post" onsubmit="return confirm('."'".'Deseja mesmo fazer isto?'."'".')">
										<input type="hidden" name="excluir" value="ok"/>
										<input type="hidden" name="imagem" value="'.$arquivos->nome_ba.'">									
										<input type="hidden" name="id" value="'.$arquivos->id_ba.'">									
										<input type="submit" value="Excluir Banner" class="Btn"/>									
									</form>*/
									
								echo '
									<a href="home.php?m=6&id='.$arquivos->id_ba.'">
										<input type="button" value="Editar" class="Btn"/>
									</a>
								</div>
							</div>
						';						
					}
					/*
					if(isset($_POST['excluir'])){
						if($_POST['excluir']=='ok'){
							unlink('imagens/banners/'.$_POST['imagem']);
							mysqli_query($conn, "DELETE FROM banners WHERE id_ba=$_POST[id]");
							echo '
								<script type="text/javascript">
									location.href="home.php?m=1";
								</script>
							';
						}
					}*/
				?>
				
				<div class="esp"></div>
			</div>
		</form>
</section>
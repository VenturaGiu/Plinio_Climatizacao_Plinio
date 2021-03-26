<?php
	include_once('php/class/resize.class.php');	
	include_once('php/escapeSQL.php');	
	
	if(isset($_POST['adicionarimagens'])){
		if($_POST['adicionarimagens']=='ok'){
			$Imagens = $_FILES['imagens'];

			$Valido = 0;
			$Invalido = 0;
			
			$post = EscapeArray($_POST);
			
			for($i=0; $i<count($Imagens['name']); $i++){
				if($Imagens['type'][$i]=='image/jpeg'){
					$tempo = time();
					$NomeUnico = md5(time().uniqid()).'_'.$i.'_'.'.jpg';				
					
					move_uploaded_file($Imagens['tmp_name'][$i], 'imagens/upar'.$tempo.'.jpg');
					
					$resizeObj = new resize('imagens/upar'.$tempo.'.jpg');	
					$resizeObj -> resizeImage(1920, 503, 'auto');		
					$resizeObj -> saveImage('imagens/banners/'.$NomeUnico, 100);					
					
					$Valido++;
					$Insert = mysqli_query($conn, "INSERT INTO banners(nome_ba, url_ba)VALUE('$NomeUnico', '$post[url]')")or die(mysqli_error($conn));
					if($Insert){
						
					}else{
						unlink('imagens/banners/'.$NomeUnico);
					}
					unlink('imagens/upar'.$tempo.'.jpg');
				}else{
					$Invalido++;
				}			
			}
			
			echo '
				<label class="load">Imagens Selecionadas: '.count($Imagens['name']).'.<br/></label>
				<label class="ok">Imagens Adicionadas: '.$Valido.'.<br/></label>
				<label class="erro">Imagens com erro: '.$Invalido.'.</label>
				<script type="text/javascript">
					setTimeout(function(){
						//location.href="home.php?m=1";
					}, 2000);
				</script>
			';
		}
	}
	
	
	if(isset($_POST['excluirba'])){
		if($_POST['excluirba']=='ok'){
			unlink('imagens/banners/'.$_POST['imagem']);
			mysqli_query($conn, "DELETE FROM banners WHERE id_ba=$_POST[id]");
			echo '
				<script type="text/javascript">
					location.href="home.php?m=1";
				</script>
			';
		}
	}
	
	if(isset($_POST['editarurlbanner'])){
		if($_POST['editarurlbanner']=='ok'){
			$post = EscapeArray($_POST);
			$UpdateBa = mysqli_query($conn, "UPDATE banners SET url_ba='$post[url]' WHERE id_ba=$post[id]")or die(mysqli_error($conn));
			
			if($UpdateBa){
				echo '
				<label class="ok">Atualizado!</label>
				<script type="text/javascript">
					setTimeout(function(){
						location.href="";
					}, 200);
				</script>
				';
			}else{
				echo '<label class="erro">Erro ao atualizar!</label>';
			}
		}
	}
	
	if(isset($_POST['alterimgd'])){
		if($_POST['alterimgd']=='ok'){
			
			$Imagem = $_FILES;
			
			if($Imagem['imagem']['type'] == 'image/jpeg' || $Imagem['imagem']['type'] == 'image/png'){
				
				if(move_uploaded_file($Imagem['imagem']['tmp_name'], $_POST['url'].$_POST['nomeimg'])){
					echo '<label class="ok">Imagem Alterada!</label>';
					echo '
						<script type="text/javascript">
							setTimeout(function(){
								location.href="";
							}, 2000);
						</script>
					';
				}else{
					echo '<label class="erro">Erro ao alterar imagem!</label>';
				}
				
			}else{
				echo '<label class="erro">Formato incorreto!</label>';
			}			
		}
	}
?>
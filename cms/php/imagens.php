<?php
	include_once('php/conn.php');
	include_once('php/class/resize.class.php');
	include_once('php/class/galeria.class.php');
	$Galeria = new Galeria;
	
	
	if(isset($_POST['adicionarimagens'])){
		if($_POST['adicionarimagens']=='ok'){
			$Imagens = $_FILES['imagens'];

			$Valido = 0;
			$Invalido = 0;
			for($i=0; $i<count($Imagens['name']); $i++){
				if($Imagens['type'][$i]=='image/jpeg'){
					$tempo = time();
					$NomeUnico = md5(time().uniqid()).'_'.$i.'_'.'.jpg';				
					
					move_uploaded_file($Imagens['tmp_name'][$i], 'imagens/upar'.$tempo.'.jpg');
					
					$resizeObj = new resize('imagens/upar'.$tempo.'.jpg');	
					$resizeObj -> resizeImage(900, 450, 'auto');		
					$resizeObj -> saveImage('imagens/galeria/'.$NomeUnico, 100);
					
					$Inserir = $Galeria->CadastrarImagem($conn, $_POST['galeria'], $NomeUnico);
					if($Inserir){
						$Valido++;
					}else{
						unlink('imagens/galeria/'.$NomeUnico);
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
						location.href="midia.php?m=3&id='.$Galerias->Id.'";
					}, 2000);
				</script>
			';
		}
	}
	
	if(isset($_POST['excluirimagens'])){
		if($_POST['excluirimagens']=='ok'){
			$Ids = $_POST['id'];
			
			for($i=0; $i<count($Ids); $i++){
				$SelectImg = mysqli_query($conn, "SELECT nome_im FROM imagens WHERE id_im=$Ids[$i]");
				if(mysqli_num_rows($SelectImg)==1){
					$Imagem = mysqli_fetch_object($SelectImg);
					$Apagar = unlink('imagens/galeria/'.$Imagem->nome_im);
					if($Apagar){
						$Galeria->ExcluirImagens($conn, $Ids[$i]);
					}
				}
			}
			
			echo '				
				<script type="text/javascript">
					setTimeout(function(){
						location.href="midia.php?m=3&id='.$Galerias->Id.'";
					}, 20);
				</script>
			';			
			
		}	
	}
?>
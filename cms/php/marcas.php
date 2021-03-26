<?php
	include_once('php/class/resize.class.php');	
	
	if(isset($_POST['adicionarimagens'])){
		if($_POST['adicionarimagens']=='ok'){
			$Imagens = $_FILES['imagens'];

			$Valido = 0;
			$Invalido = 0;
			for($i=0; $i<count($Imagens['name']); $i++){
				if($Imagens['type'][$i]=='image/jpeg' || $Imagens['type'][$i]=='image/png'){
					$arrayname = explode('.', $Imagens['name'][$i]);
					$ex = end($arrayname);
					$tempo = time();
					$NomeUnico = md5(time().uniqid()).'_'.$i.'.'.$ex;				
					
					move_uploaded_file($Imagens['tmp_name'][$i], 'imagens/upar'.$tempo.'.'.$ex);
					
					$resizeObj = new resize('imagens/upar'.$tempo.'.'.$ex);	
					$resizeObj -> resizeImage(200, 200, 'auto');		
					$resizeObj -> saveImage('imagens/marcas/'.$NomeUnico, 100);					
					
					$Valido++;
					unlink('imagens/upar'.$tempo.'.'.$ex);
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
						location.href="home.php?m=3";
					}, 2000);
				</script>
			';
		}
	}
?>
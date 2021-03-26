<?php
	include_once('php/conn.php');
	include_once('php/class/resize.class.php');
	include_once('php/class/servicos.class.php');
	include_once('php/escapeSQL.php');
	$Servico = new Servico;
	
	if(isset($_POST['cadastrarservico'])){
		if($_POST['cadastrarservico']=='ok'){
			$post = EscapeArray($_POST);			
			
			$Imagem = $_FILES['imagem'];
			
			if($Imagem['type']=='image/jpeg' || $Imagem['type']=='image/png'){
				$tempo = time();
				$Format = substr($Imagem['name'], -4);
				$NomeUnico = md5(time().uniqid()).'__'.$Format;				
				
				move_uploaded_file($Imagem['tmp_name'], 'imagens/faixas/'.$NomeUnico);
				/*
				$resizeObj = new resize('imagens/upar'.$tempo.'.jpg');	
				$resizeObj -> resizeImage(450, 410, 'auto');		
				$resizeObj -> saveImage('imagens/faixas/'.$NomeUnico, 100);				
				*/				
				$Retorno = $Servico->CadastrarServico($conn, $post, $NomeUnico);
				
				if($Retorno==1){
					echo '
						<label class="ok">Cadastrado com sucesso!</label>
					';
				}else{
					echo $Retorno;
					unlink('imagens/faixas/'.$NomeUnico);
				}
				//unlink('imagens/upar'.$tempo.'.jpg');
			}else{
				echo '
					<script type="text/javascript">
						alert("Selecione uma imagem válida!");
						history.back();
					</script>
				';
			}
		}
	}
	
	if(isset($_POST['editarservico'])){
		if($_POST['editarservico']=='ok'){
			$post = EscapeArray($_POST);
			
			$Servico->EditarServico($conn, $post);
		}		
	}
	
	if(isset($_POST['alterarimagem'])){
		if($_POST['alterarimagem']=='ok'){
			$post = EscapeArray($_POST);
			
			$Imagem = $_FILES['imagem'];
			
			if($Imagem['type']=='image/jpeg' || $Imagem['type']=='image/png'){
				$tempo = time();
				$Format = substr($Imagem['name'], -4);
				$NomeUnico = md5(time().uniqid()).'__'.$Format;				
				
				move_uploaded_file($Imagem['tmp_name'], 'imagens/faixas/'.$NomeUnico);
				/*
				$resizeObj = new resize('imagens/upar'.$tempo.'.jpg');	
				$resizeObj -> resizeImage(450, 410, 'auto');		
				$resizeObj -> saveImage('imagens/faixas/'.$NomeUnico, 100);		*/		
				
				$Retorno = $Servico->EditarImagem($conn, $post, $NomeUnico);
				if($Retorno==1){
					unlink('imagens/faixas/'.$post['anterior']);
					echo '
						<script type="text/javascript">
							location.href="gerenciamento.php?m=10&codid='.$post['id'].'";
						</script>
					';
				}else{
					echo $Retorno;
					unlink('imagens/faixas/'.$NomeUnico);
				}
				//unlink('imagens/upar'.$tempo.'.jpg');
			}
		}
	}
	
?>
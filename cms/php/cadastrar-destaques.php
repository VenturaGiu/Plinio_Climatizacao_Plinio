<?php
	include_once('php/conn.php');
	include_once('php/class/resize.class.php');
	include_once('php/class/destaques.class.php');
	include_once('php/escapeSQL.php');
	
	$Destaques = new Destaques;
	if(isset($_POST['cadastrarpraga'])){
		if($_POST['cadastrarpraga']=='ok'){
			$Dados = EscapeArray($_POST);
			
			$Imagem = $_FILES['imagem'];

			$Valido = 0;
			$Invalido = 0;			
			
			if($Imagem['type']=='image/jpeg' || $Imagem['type']=='image/png'){
				$tempo = time();
				$NomeUnico = md5(time().uniqid()).'__'.'.jpg';				
				
				move_uploaded_file($Imagem['tmp_name'], 'imagens/destaques/'.$NomeUnico);
				/*
				$resizeObj = new resize('imagens/upar'.$tempo.'.jpg');	
				$resizeObj -> resizeImage(200, 200, 'crop');		
				$resizeObj -> saveImage('imagens/destaques/'.$NomeUnico, 80);				
				*/
				$Retorno = $Destaques->CadastrarDados($conn, $Dados, $NomeUnico);
				if($Retorno==true){
					echo '
						<label class="ok">Cadastrado com sucesso!</label>
						<script type="text/javascript">
							setTimeout(function(){
								location.href="home.php?m=4";
							}, 2000);
						</script>
					';
				}else{
					echo $Retorno;
					unlink('imagens/destaques/'.$NomeUnico);
				}
			//	unlink('imagens/upar'.$tempo.'.jpg');
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
	
	
	if(isset($_POST['editdestaque'])){
		if($_POST['editdestaque']=='ok'){
			$post = EscapeArray($_POST);
			
			if($Destaques->AtualizarDados($conn, $post)){
				echo '<label class="ok">Atualizado!</label>';
				echo '
					<script type="text/javascript">
						setTimeout(function(){
							location.href="";
						}, 2000);
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
	
	if(isset($_POST['apagarpraga'])){
		if($_POST['apagarpraga']=='ok'){
			$del = mysqli_query($conn, "DELETE FROM pragas WHERE id_pr=$_POST[id]")or die(mysqli_error($conn));
			unlink('imagens/destaques/'.$_POST['imagem']);
			echo '
				<label class="ok">Cadastrado com sucesso!</label>
				<script type="text/javascript">
					setTimeout(function(){
						location.href="home.php?m=4";
					}, 200);
				</script>
			';
		}
	}
	
?>
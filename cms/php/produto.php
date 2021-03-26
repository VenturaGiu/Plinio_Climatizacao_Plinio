<?php
	include_once('php/conn.php');
	include_once('php/class/resize.class.php');
	include_once('php/class/produto.class.php');
	include_once('php/escapeSQL.php');
	
	$Produto = new Produto;
	
	if(isset($_POST['cadastrarproduto'])){
		if($_POST['cadastrarproduto']=='ok'){
			
			$post = EscapeArray($_POST);
			
			$Imagem = $_FILES['imagem'];
			
			
			if($Imagem['type']=='image/jpeg' || $Imagem['type']=='image/png'){
				
				$Extension = substr($Imagem['name'], -4);			
				$NomeImagem = md5($Imagem['size'].$Imagem['name'].time()).$Extension;
				
				if(move_uploaded_file($Imagem['tmp_name'], 'imagens/produtos/'.$NomeImagem)){
					if($Produto->CadastrarProduto($conn, $post, $NomeImagem)){
						echo '<label class="ok">Cadastrado com sucesso!</label>';
					}else{
						echo '<script>alert("Ao cadastrar produto!"); history.back();</script>';
					}
				}else{
					echo '<script>alert("Erro no upload da imagem!"); history.back();</script>';
				}				
			}else{
				echo '<script>alert("Selecione uma imagem válida!"); history.back();</script>';
			}			
		}		
	}
	
	if(isset($_POST['editarproduto'])){
		if($_POST['editarproduto']=='ok'){
			$post = EscapeArray($_POST);
			
			if($Produto->EditarProduto($conn, $post)){
				echo '<script>location.href="";</script>';
			}else{
				echo '<label class="erro">Erro ao editar!</label>';
			}
		}
	}
	
	if(isset($_POST['alterarimagem'])){
		if($_POST['alterarimagem']=='ok'){
			$Imagem = $_FILES['imagem'];
			
			if($Imagem['type']=='image/jpeg' || $Imagem['type']=='image/png'){
				$NomeImagem = $_POST['anterior'];
				
				if(move_uploaded_file($Imagem['tmp_name'], 'imagens/produtos/'.$NomeImagem)){
					echo '<script>alert("Imagem alterada!"); location.href="";</script>';
				}else{
					echo '<script>alert("Erro ao alterar imagem!");history.back();</script>';
				}
				
			}else{
				echo '<script>alert("Selecione uma imagem PNG/JPEG!!");history.back();</script>';
			}
		}
	}
?>
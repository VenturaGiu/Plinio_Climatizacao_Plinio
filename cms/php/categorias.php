<?php 
	include_once('conn.php');
	include_once('class/categorias.class.php');
	include_once('escapeSQL.php');
	
	$Categorias = new Categorias;
	

	
	if(isset($_POST['action'])){
		
		if($_POST['action']=='cadcat'){
			$dados = LimparGeral($_POST['dados']);
			$Categorias->Cadastro($conn, $dados['nome']);
		}
		
		if($_POST['action']=='loadcat'){
			$Categorias->ListarCategorias($conn);
		}
		
		if($_POST['action']=='delete'){
			$Categorias->Delete($conn, $_POST['id']);
		}
		
		if($_POST['action']=='edit'){
			$dados = LimparGeral($_POST);
			
			$Categorias->Editar($conn, $dados['id'], $dados['cat']);
		}
	}
?>
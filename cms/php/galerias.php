<?php 
	include_once('conn.php');
	include_once('class/galerias.class.php');
	include_once('escapeSQL.php');
	
	$Galerias = new Galerias;
	

	
	if(isset($_POST['action'])){
		
		if($_POST['action']=='cadgal'){
			$dados = LimparGeral($_POST['dados']);
			$Galerias->Cadastro($conn, $dados['nome']);
		}
		
		if($_POST['action']=='loadgal'){
			$Galerias->Listar($conn);
		}
		
		if($_POST['action']=='delete'){
			$Galerias->Deletar($conn, $_POST['id']);
		}
		
		if($_POST['action']=='edit'){
			$dados = LimparGeral($_POST);
			
			$Galerias->Editar($conn, $dados['id'], $dados['gal']);
		}
	}
?>
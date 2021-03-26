<?php
	include_once('conn.php');
	include_once('class/contato.class.php');
	include_once('escapeSQL.php');
	
	$Contato = new Contato;
	
	if(isset($_POST['cadcont'])){
		if($_POST['cadcont']=='ok'){
			$dados = LimparGeral($_POST['dados']);
			
			$Contato->CadastrarContato($conn, $dados);
		}
	}
	
	if(isset($_POST['loadcont'])){
		if($_POST['loadcont']=='ok'){
		
			$Contato->CarregarContatos($conn, $_POST['tipo']);
		}
	}
	
	if(isset($_POST['delcont'])){
		if($_POST['delcont']=='ok'){		
			$Contato->DeletarContato($conn, $_POST['id']);
		}
	}
	
	if(isset($_POST['action'])){
		if($_POST['action']=='edit'){
			
			$dados = LimparGeral($_POST['dados']);
			$Contato->AtualizarContato($conn, $dados['valor'], $dados['id']);
		}
	}
	
?>
<?php
	include_once('conn.php');
	include_once('class/gerenciamento.class.php');
	include_once('escapeSQL.php');
	
	$Gerenciamento = new Gerenciamento;
	
	if(isset($_POST['cadgen'])){
		if($_POST['cadgen']=='ok'){
			$Dados = LimparGeral($_POST['dados']);
			$Conteudo = EscapeString($_POST['dados']['conteudo']);
			
			$Gerenciamento->Cadastrar($conn, $_SESSION['id'], $Dados, $Conteudo);
		}
	}
	
	if(isset($_POST['editgen'])){
		if($_POST['editgen']=='ok'){
			$Dados = LimparGeral($_POST['dados']);
			$Conteudo = EscapeString($_POST['dados']['conteudo']);
			
			$Gerenciamento->Editar($conn, $_SESSION['id'], $Dados, $Conteudo);
		}
	}
?>
<?php 
	require_once('conn.php');
	include_once('class/usuario.class.php');
	include_once('escapeSQL.php');
	
	$Usuario = new Usuario;
	$DadosLimpos = array();
	$DadosLimpos['dados'] = LimparGeral($_POST['dados']);
	
	$post = EscapeArray($_POST);
	
	if(isset($post['login'])=='ok'){
		$Usuario->Login($conn, $DadosLimpos['dados']);
	}
	
	if(isset($post['cadastrar'])=='ok'){
		$Usuario->CadastrarUsuario($conn, $DadosLimpos['dados']);
	}
	
	if(isset($post['editar'])=='ok'){
		$Usuario->EditarUsuario($conn, $DadosLimpos['dados']);
	}
	
	if(isset($post['senhas'])=='ok'){
		$Usuario->AlterarSenha($conn, $DadosLimpos['dados']);
	}
	
?>
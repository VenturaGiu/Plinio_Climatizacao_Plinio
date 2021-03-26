<?php
	include_once('conn.php');
	include_once('class/video.class.php');
	include('escapeSQL.php');
	
	$Video = new Video;
	
	$post = EscapeArray($_POST);
	
	if(isset($_POST['cadastrarvid'])){
		if($_POST['cadastrarvid']=='ok'){
			$Video->CadastrarVideo($conn, $post['video']);
		}
	}
	
	if(isset($_POST['carregarvideo'])){
		if($_POST['carregarvideo']=='ok'){
			$Video->CarregarVideo($conn);
		}
	}
	
	if(isset($_POST['excluirvideo'])){
		if($_POST['excluirvideo']=='ok'){
			$Video->ExcluirVideo($conn, $post['id']);
		}
	}
?>
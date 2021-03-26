<?php
	include_once('conn.php');
	include_once('class/textos.class.php');
	include_once('escapeSQL.php');
	
	$Texto = new Texto;
	
	if(isset($_POST['textoempresa'])){
		if($_POST['textoempresa']=='ok'){
			$Dados = EscapeArray($_POST['dados']);
			
			$Conteudo = $Texto->SalvarTexto($conn, 'empresa', 'textoempresa', $Dados['empresa']);
			if($Conteudo==1){
				$Frase = $Texto->SalvarTexto($conn, 'empresa', 'fraseempresa', strip_tags($Dados['frase']));
				if($Frase==1){
					echo '<label class="ok">Salvo com sucesso!</label><br/>';
				}else{
					echo '<label class="ok">Texto empresa salvo com sucesso!</label><br/>';
					echo $Frase;
				}
			}else{
				echo $Conteudo;
			}			
		}
	}
	
	if(isset($_POST['textopolitica'])){
		if($_POST['textopolitica']=='ok'){
			$Dados = EscapeArray($_POST['dados']);
			
			$Texto->SalvarTexto3($conn, 'empresa', 'missao', $Dados['txtmissao'], $Dados['titmissao']);
			$Texto->SalvarTexto3($conn, 'empresa', 'visao', $Dados['txtvisao'], $Dados['titvisao']);
			$Texto->SalvarTexto3($conn, 'empresa', 'valores', $Dados['txtvalores'], $Dados['titvalores']);
						
		}
	}
	
	
	if(isset($_POST['config'])){
		if($_POST['config']=='ok'){
			$Dados = EscapeArray($_POST['dados']);
			
			$Description = $Texto->SalvarTexto($conn, 'config', 'description', strip_tags($Dados['description']));
			
			if($Description==1){
				$Keywords = $Texto->SalvarTexto($conn, 'config', 'keywords', strip_tags($Dados['keywords']));
				if($Keywords==1){
					$Title = $Texto->SalvarTexto($conn, 'config', 'title', strip_tags($Dados['title']));
					if($Title==1){
						echo '<label class="ok">Salvo com sucesso!</label><br/>';
					}else{
						echo '<label class="ok">Descrição salvo com sucesso!</label><br/>';
						echo '<label class="ok">Palavras-chave salvo com sucesso!</label><br/>';
						echo $Title;
					}					
				}else{
					echo '<label class="ok">Texto empresa salvo com sucesso!</label><br/>';
					echo $Keywords;
				}
			}else{
				echo $Description;
			}
		}
	}
	if(isset($_POST['txtcont'])){
		if($_POST['txtcont']=='ok'){
			$Dados = EscapeArray($_POST['dados']);
			$Mapa = EscapeString($_POST['dados']['mapa']);
			
			$Result1 = $Texto->SalvarTexto($conn, 'contato', 'textocontato', $Dados['conteudo']);			
			$Result2 = $Texto->SalvarTexto($conn, 'contato', 'mapa', $Mapa);			
			$Result3 = $Texto->SalvarTexto($conn, 'contato', 'endereco', $Dados['endereco']);			
			if($Result1==1){
				echo '<label class="ok">Salvo com sucesso!</label><br/>';
			}else{
				echo $Result1;
			}
		}
	}
	if(isset($_POST['edittexth'])){
		if($_POST['edittexth']=='ok'){
			$Dados = EscapeArray($_POST['dados']);
		
			$Result = $Texto->SalvarTexto2($conn, $Dados['local'], $Dados['nome'], $Dados);			
			if($Result==1){
				echo '<label class="ok">Salvo com sucesso!</label><br/>';
			}else{
				echo $Result;
			}
		}
	}
?>
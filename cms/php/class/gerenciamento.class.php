<?php
	class Gerenciamento
	{
		var $Id;
		var $Tipo;
		var $Titulo;
		var $Conteudo;
		var $Data;
		
		function Cadastrar($conn, $id, $dados, $conteudo){
			$Insert = mysqli_query($conn, "
				INSERT INTO conteudo(id_us, tipo_co, titulo_co, conteudo_co)VALUES($id, '$dados[type]', '$dados[titulo]', '$conteudo')
			");
			if($Insert){
				echo 'ok';
			}else{
				echo '<label class="erro">Erro ao cadastrar!<br/>Código de erro: '.mysqli_error($conn).'.</label>';
			}
		}
		
		function CarregarDados($conn, $id){
			$Select = mysqli_query($conn, "SELECT * FROM conteudo WHERE id_co=$id");
			if(mysqli_num_rows($Select)==1){
				$dados = mysqli_fetch_object($Select);
				
				$this->Id = $dados->id_co;
				$this->Tipo = $dados->tipo_co;
				$this->Titulo = $dados->titulo_co;
				$this->Conteudo = $dados->conteudo_co;
				$this->Data = $dados->data_co;
				
				return true;
			}else{
				return false;
			}
		}
		
		function Editar($conn, $id, $dados, $conteudo){
			$Update = mysqli_query($conn, "
				UPDATE conteudo SET id_us=$id, titulo_co='$dados[titulo]', conteudo_co='$conteudo', data_co=CURRENT_TIMESTAMP() WHERE id_co=$dados[id]
			");
			
			if($Update){
				echo 'ok';
			}else{
				echo '<label class="erro">Erro ao salvar alterações!<br/>Código de erro: '.mysqli_error($conn).'.</label>';
			}
		}
	}
?>
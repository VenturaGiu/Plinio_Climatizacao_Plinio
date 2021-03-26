<?php
	class Texto
	{		
		var $Conteudo;	
		var $Titulo;	
		
		private function VerificarExistencia($conn, $pagina, $nome){
			$Select = mysqli_query($conn, "SELECT * FROM textos WHERE pagina='$pagina' AND nome='$nome'");
			if(mysqli_num_rows($Select)==0){
				$Insert = mysqli_query($conn, "INSERT INTO textos(pagina, conteudo, nome)VALUES('$pagina', '', '$nome')");
				if($Insert){
					return 1;
				}else{
					return mysqli_error($conn);
				}
			}else{
				return 1;
			}
		}
		
		public function SalvarTexto($conn, $pagina, $nome, $conteudo){
			if($this->VerificarExistencia($conn, $pagina, $nome)==1){
				$Up = mysqli_query($conn, "UPDATE textos SET conteudo='$conteudo' WHERE pagina='$pagina' AND nome='$nome'");
				if($Up){
					return 1;
				}else{
					echo '<label class="erro">Erro de atualização: '.mysqli_error($conn).'.</label><br/>';
				}
			}else{
				echo '<label class="erro">Erro de checagem: '.$this->VerificarExistencia($conn, $pagina, $nome).'!</label><br/>';
			}
		}
		
		public function SalvarTexto2($conn, $pagina, $nome, $dados){
			if($this->VerificarExistencia($conn, $pagina, $nome)==1){
				$Up = mysqli_query($conn, "UPDATE textos SET conteudo='$dados[conteudo]', titulo='$dados[titulo]' WHERE pagina='$pagina' AND nome='$nome'");
				if($Up){
					return 1;
				}else{
					echo '<label class="erro">Erro de atualização: '.mysqli_error($conn).'.</label><br/>';
				}
			}else{
				echo '<label class="erro">Erro de checagem: '.$this->VerificarExistencia($conn, $pagina, $nome).'!</label><br/>';
			}
		}
		
		public function SalvarTexto3($conn, $pagina, $nome, $conteudo, $titulo){
			if($this->VerificarExistencia($conn, $pagina, $nome)==1){
				$Up = mysqli_query($conn, "UPDATE textos SET conteudo='$conteudo', titulo='$titulo' WHERE pagina='$pagina' AND nome='$nome'");
				if($Up){
					return 1;
				}else{
					echo '<label class="erro">Erro de atualização: '.mysqli_error($conn).'.</label><br/>';
				}
			}else{
				echo '<label class="erro">Erro de checagem: '.$this->VerificarExistencia($conn, $pagina, $nome).'!</label><br/>';
			}
		}
		
		public function CarregarConteudo($conn, $pagina, $nome){
			$Select = mysqli_query($conn, "SELECT * FROM textos WHERE pagina='$pagina' AND nome='$nome'");
			$dados = mysqli_fetch_object($Select);
			$this->Conteudo = $dados->conteudo;
			$this->Titulo = $dados->titulo;
		}
	}
?>
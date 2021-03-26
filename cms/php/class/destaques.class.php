<?php
	class Destaques
	{
		var $Id;
		var $Nome;
		var $Imagem;
		var $Url;
		
		function CarregarDados($Conn, $Id){
			$Select = mysqli_query($Conn, "SELECT * FROM pragas WHERE id_pr=$Id")or die(mysqli_error($Conn));
			if(mysqli_num_rows($Select)>0){
				$Dados = mysqli_fetch_object($Select);
				$this->Id = $Dados->id_pr;
				$this->Nome = $Dados->nome_pr;
				$this->Imagem = $Dados->imagem_pr;
				$this->Url = $Dados->url_pr;
				return true;
			}else{
				return false;
			}
		}
		
		
		function CadastrarDados($conn, $dados, $imagem){
			$Insert = mysqli_query($conn, "
				INSERT INTO pragas(nome_pr, url_pr, imagem_pr)VALUES('$dados[titulo]', '$dados[url]', '$imagem')
			");
			
			if($Insert){
				return true;
			}else{
				return mysqli_error($conn);
			}
		}
		
		function ListarDados($conn){
			$Select = mysqli_query($conn, "SELECT * FROM pragas ORDER BY id_pr DESC");
			if(mysqli_num_rows($Select)>0){
				while($dados = mysqli_fetch_object($Select)){
					echo '
						<div class="BlocoPraga">
							<img src="imagens/destaques/'.$dados->imagem_pr.'" alt=""><br/>							
							<a href="'.$dados->url_pr.'" target="_blank">'.$dados->nome_pr.'</a><br/><br/>							
							<a href="home.php?m=5&id='.$dados->id_pr.'">
								<input type="button" value="Editar" class="Btn Green"/>
							</a>
						</div>
					';
				}
			}else{
				echo '<label class="erro">Nenhum dado retornado!</label>';
			}
		}
		
		function AtualizarDados($Conn, $Dados){
			$Update = mysqli_query($Conn, "UPDATE pragas SET nome_pr='$Dados[titulo]', url_pr='$Dados[url]' WHERE id_pr=$Dados[id]")or die(mysqli_error($conn));
			if($Update){
				return true;
			}else{
				return false;				
			}
		}
		
		/*function CarregarDados($conn){
			$Select = mysqli_query($conn, "SELECT * FROM pragas ORDER BY id_pr DESC");
			if(mysqli_num_rows($Select)>0){
				while($dados = mysqli_fetch_object($Select)){
					echo '
						<div class="BlocoPraga">
							<img src="imagens/Destaques/'.$dados->imagem_pr.'" alt=""><br/>							
							<a href="'.$dados->url_pr.'" target="_blank">'.$dados->nome_pr.'</a><br/><br/>
							
							<form name="excluir" method="post" onsubmit="return confirm('."'".'Deseja mesmo fazer isto?'."'".')">
								<input type="hidden" name="apagarpraga" value="ok"/>
								<input type="hidden" name="imagem" value="'.$dados->imagem_pr.'"/>
								<input type="hidden" name="id" value="'.$dados->id_pr.'"/>
								<input type="submit" value="Excluir" class="Btn"/>
							</form>
						</div>
					';
				}
			}else{
				echo '<label class="erro">Nenhum dado retornado!</label>';
			}
		}*/
	}
?>
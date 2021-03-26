<?php
	class Galeria
	{
		
		function CadastrarImagem($conn, $Galeria, $nome){
			$Insert = mysqli_query($conn, "INSERT INTO imagens(id_ga, nome_im)VALUES($Galeria, '$nome')");
			if($Insert){
				return 1;
			}else{
				return 0;
			}
		}
		
		function CarregarImagens($conn, $Galeria){
			$Select = mysqli_query($conn, "SELECT * FROM imagens WHERE id_ga=$Galeria");
			if(mysqli_num_rows($Select)>0){
				while($Imagens = mysqli_fetch_object($Select)){
					$server = $_SERVER['SERVER_NAME'];

					$endereco = $_SERVER ['REQUEST_URI'];
					$EndArray = explode('cms', $endereco);
					
					$CaminhoImg = substr($server.$endereco, 0, -13);
					echo '
						<div class="ImgGal" style="background: url(imagens/galeria/'.$Imagens->nome_im.') no-repeat; background-size: 100%; background-position: center;">
							<p class="Selecionar"><input type="checkbox" name="id[]" value="'.$Imagens->id_im.'"/> Selecione para excluir</p>
							<br/><br/>
							<p class="CaminhoImg">Caminho: <br/><input type="text" name="caminho" value="'.$server.$EndArray[0].'/cms/imagens/galeria/'.$Imagens->nome_im.'"/></p> 
			
						</div>
						
					';	
					
				}
			}else{
				echo '<label class="erro">Galeria vazia!</label>';
			}
		}
		
		function ExcluirImagens($conn, $id){
			$Del = mysqli_query($conn, "DELETE FROM imagens WHERE id_im=$id");
			if($Del){
				return 1;
			}else{
				return mysqli_error($conn);
			}
		}
	}
?>
<?php
	class Video
	{
		
		function CadastrarVideo($conn, $codigo){
			$Insert = mysqli_query($conn, "INSERT INTO videos(nome_vi)VALUES('$codigo')");
			if($Insert){
				echo 'ok';
			}else{
				echo '<label class="erro">Erro ao cadastrar!<br/> Código de erro: '.mysqli_error($conn).'.</label>';
			}
		}
		
		function CarregarVideo($conn){
			$Select = mysqli_query($conn, "SELECT * FROM videos ORDER BY id_vi DESC");
			if(mysqli_num_rows($Select)>0){
				while($Dados = mysqli_fetch_object($Select)){
					echo '<div class="Blocovideos">
						'.str_replace("&#39;", "'", str_replace('&#34;', '"', $Dados->nome_vi)).'
						
						<button onclick="ExcluirVideo('.$Dados->id_vi.')" class="Btn">Excluir Vídeo</button>
						</div>';
				}
				echo '<div class="esp"></div>';
			}else{
				echo '<label class="erro">Nenhum vídeo cadastrado!</label>';
			}
		}
		
		function ExcluirVideo($conn, $id){
			$Delete = mysqli_query($conn, "DELETE FROM videos WHERE id_vi=$id");
		}
	}
?>
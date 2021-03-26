<?php 
	class Servico
	{
		var $Id;
		var $Titulo;
		var $Subtitulo;
		var $Imagem;
		var $Conteudo;
		var $Destaque;
		
		function CarregarDados($Conn, $Id){
			$Select = mysqli_query($Conn, "SELECT * FROM servicos WHERE id_se=$Id")or die(mysqli_error($Conn));
			if(mysqli_num_rows($Select)>0){
				$Dados = mysqli_fetch_object($Select);
				
				$this->Id = $Dados->id_se;
				$this->Titulo = $Dados->titulo_se;
				$this->Subtitulo = $Dados->subtitulo_se;
				$this->Imagem = $Dados->imagem_se;
				$this->Conteudo = $Dados->conteudo_se;
				$this->Destaque = $Dados->destaque_se;
				
				return true;
			}else{
				return false;
			}
		}
		
		function CarregarUltimoRegistro($Conn){
			$Select = mysqli_query($Conn, "SELECT * FROM servicos ORDER BY id_se DESC")or die(mysqli_error($Conn));			
			if(mysqli_num_rows($Select)>0){
				$Dados = mysqli_fetch_object($Select);				
				$this->Id = $Dados->id_se;
				$this->Titulo = $Dados->titulo_se;
				$this->Subtitulo = $Dados->subtitulo_se;
				$this->Imagem = $Dados->imagem_se;
				$this->Conteudo = $Dados->conteudo_se;
				$this->Destaque = $Dados->destaque_se;

				return true;
			}else{
				return false;
			}
		}
		
		function CadastrarServico($conn, $dados, $imagem){
			$Insert = mysqli_query($conn, "
				INSERT INTO servicos(
					id_ca,
					titulo_se,
					subtitulo_se,
					imagem_se,
					conteudo_se,
					destaque_se
				)VALUES(
					$dados[categoria],
					'$dados[titulo]',
					'$dados[subtitulo]',
					'$imagem',
					'$dados[conteudo]',
					$dados[destaque]
				)
			");
			if($Insert){				
				return 1;
			}else{
				echo '<label class="erro">Erro ao cadastrar!<br/>Código do erro: '.mysqli_error($conn).'.</label>';
			}
		}
		
		function EditarServico($conn, $dados){
			$Up = mysqli_query($conn, "
				UPDATE servicos SET
				id_ca=$dados[categoria],
				titulo_se='$dados[titulo]',
				subtitulo_se='$dados[subtitulo]',
				conteudo_se='$dados[conteudo]',
				destaque_se=$dados[destaque]
				WHERE id_se=$dados[id]
			");
			if($Up){			 
				echo '
					<script type="text/javascript">
						location.href="gerenciamento.php?m=10&codid='.$dados['id'].'";
					</script>
				';
			}else{
				echo '<label class="erro">Erro ao editar!<br/>Código do erro: '.mysqli_error($conn).'.</label>';
			}
		}
		
		function EditarImagem($conn, $dados, $imagem){
			$Up = mysqli_query($conn, "
				UPDATE servicos SET				
				imagem_se='$imagem' 
				WHERE id_se=$dados[id]
			");
			if($Up){
				return 1;
			}else{
				echo '<label class="erro">Erro ao editar!<br/>Código do erro: '.mysqli_error($conn).'.</label>';
			}
		}
		
		function CarregarCatalogo($Conn, $Pg, $Nome, $Categoria){			
			if($Categoria>0){
				$QueryCat = "AND id_ca=$Categoria";
				$QueryCatG = "WHERE id_ca=$Categoria";
			}else{
				$QueryCat = '';
				$QueryCatG = '';
			}
			
			$SelectProds = mysqli_query($Conn, "SELECT id_se FROM servicos $QueryCatG");

			$Qtd = 6;
			
			$Pgs = ceil(mysqli_num_rows($SelectProds)/$Qtd);
			
			if(is_numeric($Pg)){
				if($Pg>0){
					$Limit = ($Pg-1)*$Qtd;
				}else{
					$Limit = 0;
				}
			}else{
				$Limit = 0;
			}
			
			
			$Select = mysqli_query($Conn, "SELECT * FROM servicos WHERE titulo_se LIKE '%$Nome%' $QueryCat ORDER BY id_se DESC;# LIMIT $Limit, $Qtd");
			
			if(mysqli_num_rows($Select)>0){
				$i=1;
				$c=3;
				
				echo '<link rel="stylesheet" href="css/templatemo_misc.css">
		<script src="js/plugins.js"></script>
        <script src="js/main.js"></script>';
		
				while($Dados = mysqli_fetch_object($Select)):
				?>
				
					<div class="Prod">
						<h2><?php echo $Dados->titulo_se;?></h2>
						<br/>
						<a href="cms\imagens\faixas\<?php echo $Dados->imagem_se;?>" data-rel="lightbox" style="text-decoration: none">
						<img src="cms\imagens\faixas\<?php echo $Dados->imagem_se;?>" alt=""/>
						</a>
						<br/><br/>
						<a href="produto.php?id=<?php echo $Dados->id_se;?>">
							<button class="Btn">VER MAIS+</button>
						</a>
					</div>
				
				<?php
					if($i==$c){
						echo '<div class="Clear"></div>';
						$c = $c + 3;
					}
					$i++;
				
				endwhile;				
				
				echo '<div class="Clear"></div>';
				echo '<div class="Paginacao" style="display:none"><br/><br/>';
				
				if($Pg>=3){
					for($i_menor = ($Pg-2); $i_menor<=$Pg; $i_menor++){
						if($i_menor>=$Pgs){
							break;
						}
						echo '<button onclick="CarregarProduto('.$i_menor.', '."'".$Nome."'".','.$Categoria.')">'.$i_menor.'</button>';
					}
				}else{
					$i_menor = 1;
				}
				
				if($Pg<=3){					
					$Regua = 6;
				}else{
					$Regua = $Pg + 3;
				}
				
				for($i=$i_menor; $i<$Regua; $i++){
					
					if($Pg>0 || $Pg<=$Pgs){						
						echo '<button onclick="CarregarProduto('.$i.', '."'".$Nome."'".','.$Categoria.')">'.$i.'</button>';
					}					
					
					if($i>=$Pgs){
						break;
					}
				}
				echo '</div>';
			}else{
				echo '<label class="erro">Não foi possível localizar objetos!</label>';
			}
		}
	}
?>
<?php
	class Produto
	{
		var $Id;
		var $Nome;
		var $Valor;
		var $Categoria;
		var $Destaque;
		var $Conteudo;
		var $Botao;
		var $Image;
		
		function CarregarDados($Conn, $Id){
			$Select = mysqli_query($Conn, "SELECT * FROM produtos WHERE id_pr=$Id")or die(mysqli_error($Conn));
			if(mysqli_num_rows($Select)>0){
				$Dados = mysqli_fetch_object($Select);
				
				$this->Id = $Dados->id_pr;
				$this->Nome = $Dados->nome_pr;
				$this->Valor = $Dados->valor_pr;
				$this->Categoria = $Dados->id_ca;
				$this->Destaque = $Dados->destaque_pr;
				$this->Conteudo = $Dados->descricao_pr;
				$this->Botao = $Dados->botaopg_pr;
				$this->Image = $Dados->imagem_pr;
				
				return true;
			}else{
				return false;
			}		
		}
		
		function CadastrarProduto($Conn, $post, $Imagem){
			
			$Insert = mysqli_query($Conn, "
				INSERT INTO produtos(
					id_ca,
					nome_pr,
					descricao_pr,
					valor_pr,
					botaopg_pr,
					imagem_pr,
					destaque_pr
				)VALUES(
					$post[categoria],
					'$post[titulo]',
					'$post[conteudo]',
					'$post[valor]',
					'$post[botaopg]',
					'$Imagem',
					'$post[destaque]'
				)
			")or die(mysqli_error($Conn));
			
			if($Insert){
				return true;
			}else{
				return false;
			}
			
		}
		
		function EditarProduto($Conn, $Dados){
			$Update = mysqli_query($Conn, "
				UPDATE produtos SET 
				id_ca=$Dados[categoria], 
				nome_pr='$Dados[titulo]', 
				descricao_pr='$Dados[conteudo]', 
				valor_pr='$Dados[valor]', 
				botaopg_pr='$Dados[botaopg]', 
				destaque_pr=$Dados[destaque] 
				WHERE id_pr=$Dados[id]
			")or die(mysqli_error($Conn));
			
			if($Update){
				return true;
			}else{
				return false;
			}
		}

		function ExibirProdutosSite($Conn){
			$Select = mysqli_query($Conn, "SELECT id_pr FROM produtos")or die(mysqli_error($Conn));
			
			if(mysqli_num_rows($Select)>0){
				
				$i=1;
				$c=3;
				
				while($Id = mysqli_fetch_object($Select)):
					
					$this->CarregarDados($Conn, $Id->id_pr);
					
				?>				
					<div class="ImagePres">
						<img src="cms/imagens/produtos/<?php echo $this->Image;?>" alt="" />
						<h3><?php echo $this->Nome;?></h3><br/>
						<label class="Price"><?php echo $this->Valor;?></label><br/><br/>						
						<?php echo str_replace('&#39;', "'", str_replace('&#34;', '"', $this->Botao));?>
					</div>					
				<?php

				if($i==$c){
					echo '<div class="Clear"></div>';
					$c = $c + 3;					
				}				
				
				endwhile;
			}else{
				echo '
					<div class="AlbumVazio">
						<h3>Lista em construção!</h2><br/>
						<h4>Aguarde novidades...</h3>
					</div>
				';
			}
		}
	}
?>
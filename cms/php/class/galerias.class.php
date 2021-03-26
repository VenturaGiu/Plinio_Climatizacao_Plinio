<?php
	class Galerias
	{
		var $Id;
		var $Nome;
		
		public function Select($Conn, $Id){
			$Select = mysqli_query($Conn, "SELECT * FROM galeria WHERE id_ga=$Id")or die(mysqli_error($Conn));
			
			if(mysqli_num_rows($Select)>0){
				$Dados = mysqli_fetch_object($Select);
				$this->Id = $Dados->id_ga;
				$this->Nome = $Dados->nome_ga;
				
				return true;
			}else{
				return false;
			}
		}
		
		public function Deletar($Conn, $Id){
			
			$SelectImagens = mysqli_query($Conn, "SELECT * FROM imagens WHERE id_ga=$Id");
			
			
			while($Imagens = mysqli_fetch_object($SelectImagens)){
				unlink('../imagens/galeria/'.$Imagens->nome_im);
			}
			
			$Deletei = mysqli_query($Conn, "DELETE FROM imagens WHERE id_ga=$Id")or die(mysqli_error($Conn));
			
			if($Deletei){
				
				$Delete = mysqli_query($Conn, "DELETE FROM galeria WHERE id_ga=$Id")or die(mysqli_error($Conn));
				
				if($Delete){
					$Delete = mysqli_query($Conn, "DELETE FROM galeria WHERE id_ga=$Id")or die(mysqli_error($Conn));
					echo 'Galeria excluída!';
				}else{
					echo 'Erro ao apagar galeria!';
				}
				
			}else{
				echo 'Erro ao apagar imagens!';
			}
		}
		
		public function Cadastro($Conn, $Nome){
			$Insert = mysqli_query($Conn, "INSERT INTO galeria(nome_ga)VALUES('$Nome')")or die(mysqli_error($Conn));
			
			if($Insert){
				echo 1;
			}else{
				echo mysqli_error($Conn);
			}
		}
		
		public function Listar($Conn){
			$Select = mysqli_query($Conn, "SELECT * FROM galeria ORDER BY nome_ga ASC");
			if(mysqli_num_rows($Select)>0){
				echo '<table>';
				while($Dados = mysqli_fetch_object($Select)){
					echo '
						<tr>
							<td class="NomeFix'.$Dados->id_ga.'">
							'.$Dados->nome_ga.'&nbsp;&nbsp;
							</td>
							<td>
								<button class="Btn BtnDel" onclick="DeletarGaleria('.$Dados->id_ga.')">Excluir</button>
							</td>
							<td class="BtnEdit'.$Dados->id_ga.'">
								<button class="Btn" onclick="EditarGaleria('.$Dados->id_ga.','."'".$Dados->nome_ga."'".')">Editar</button>
							</td>
							<td class="LinhaCategoria'.$Dados->id_ga.'">
								&nbsp;
							</td>							
							<td>
								<a href="midia.php?m=3&id='.$Dados->id_ga.'"><button class="Btn BtnOk">Adicionar Imagens</button></a>
							</td>
						</div>
					';
				}
				echo '</table>';
			}else{
				echo 'Nenhuma galeria cadastrada!';
			}
		}
		
		public function Editar($Conn, $Id, $Valor){
			$Update = mysqli_query($Conn, "UPDATE galeria SET nome_ga='$Valor' WHERE id_ga=$Id");
			if($Update){
				echo 'Galeria Salva!';
			}else{
				echo 'Erro ao editar!';
			}
		}
		
		public function CarregarImagens($Conn, $Id){
			$Select = mysqli_query($Conn, "SELECT * FROM imagens WHERE id_ga=$Id ORDER BY id_im ASC")or die(mysqli_error($Conn));
			
			if(mysqli_num_rows($Select)>0){
				$i=1;
				$c=3;
				while($Imagens = mysqli_fetch_object($Select)):
				?>
					<a href="cms/imagens/galeria/<?php echo $Imagens->nome_im;?>" data-rel="lightbox" style="text-decoration: none">
						<div class="Bloco-1-3 Bloco-Galeria">
							<img src="cms/imagens/galeria/<?php echo $Imagens->nome_im;?>" alt="" />
						</div>
					</a>
				<?php
				
					if($i==$c){
						echo '<div class="Clear"></div>';
						$c = $c + 3;
						
					}				
					$i++;
				
				endwhile;			
			}else{
				echo '
					<div class="AlbumVazio">
						<h3>Esta galeria esta vazia!</h2><br/>
						<h4>Aguarde novidades...</h3>
					</div>
				';
			}
		}
		
		public function CarregarAlbuns($Conn){
			$Select = mysqli_query($Conn, "SELECT * FROM galeria ORDER BY id_ga ASC")or die(mysqli_error($Conn));
			
			if(mysqli_num_rows($Select)>0){				
				
				$i=1;
				$c=3;
				$SelectImages = mysqli_query($Conn, "SELECT id_im FROM imagens")or die(mysqli_error($Conn));
				if(mysqli_num_rows($SelectImages)>0){
					while($Albuns = mysqli_fetch_object($Select)):
						$SelectImgsA = mysqli_query($Conn, "SELECT * FROM imagens WHERE id_ga=$Albuns->id_ga ORDER BY id_im ASC")or die(mysqli_error($Conn));
						
						if(mysqli_num_rows($SelectImgsA)>0){
							$ImagemCapa = mysqli_fetch_object($SelectImgsA);
							?>
							
							<div class="Bloco-1-3 Bloco-Galeria">
								<img src="cms/imagens/galeria/<?php echo $ImagemCapa->nome_im;?>" alt="" />
								<div class="Mask">
									<h4><?php echo $Albuns->nome_ga;?></h4>
									<br/>
									<a href="ver-galeria.php?id=<?php echo $Albuns->id_ga;?>">
										<button>Mais +</button>
									</a>
								</div>
							</div>
							
							<?php
							if($i==$c){
								echo '<div class="Clear"></div>';
								$c = $c + 3;
								
							}
						}
					endwhile;
				}else{
					echo '
						<div class="AlbumVazio">
							<h3>galeria em construção!</h2><br/>
							<h4>Aguarde novidades...</h3>
						</div>
					';
				}
			}else{
				echo '
					<div class="AlbumVazio">
						<h3>galeria em construção!</h2><br/>
						<h4>Aguarde novidades...</h3>
					</div>
				';
			}
		}
	}
?>
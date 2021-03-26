<section class="Centro CentroConteudo">
	<br/>
	<h1 class="TituloPagina">Serviços</h1>
	
	<div class="CadCat">
		<h2>Lista de Serviços em sistema</h2>
		<br/>
		<div class="Linha">
			<form name="busca" method="get" action="">
				<input type="hidden" name="m" value="1"/>
				<input type="text" name="nome" placeholder="Nome: " class="Campo" />
				<input type="hidden" name="categoria" value="null" class="Campo" />
				<?php /*
				<select class="Campo" name="categoria">
					<option value="null">--Selecionar Categoria</option>
					<?php
						$SelectCats = mysqli_query($conn, "SELECT * FROM categorias ORDER BY nome_ca ASC");
						while($Cats = mysqli_fetch_object($SelectCats)):
					?>
					<option value="<?php echo $Cats->id_ca;?>"><?php echo $Cats->nome_ca;?></option>
					<?php endwhile;?>
				</select>*/?>
				<input type="submit" class="Btn" value="Buscar"/>
			</form>
		</div>
		<br/>
		<table class="TabelaDeListas">
			<tr>
				<th>ID</th>
				<th>Imagem</th>
				<th>Título</th>
				<!--<th>Categoria</th>-->
				<th>Data</th>
				<th>Excluir</th>
				<th>Editar</th>
			</tr>
			<tr class="LinhatableImpar">
				<td colspan="6">&nbsp;</td>
			</tr>
			<?php
				include_once('php/escapeSQL.php');
				if(isset($_GET['nome'])){
					$nome = EscapeString($_GET['nome']);
					$query = "WHERE titulo_se LIKE '%$nome%' ";
					
					if($_GET['categoria']!='null'){
						if(is_numeric($_GET['categoria'])){
							$QueryCat = "AND id_ca=$_GET[categoria]";
						}else{
							$QueryCat = '';
						}
					}else{
						$QueryCat = '';
					}
				}else{
					$query = '';
					$QueryCat = '';
				}
				
				$selanun = mysqli_query($conn, "SELECT * FROM servicos $query $QueryCat ORDER BY id_se DESC");
				if(mysqli_num_rows($selanun)>0){
					$i=1;
					while($dan = mysqli_fetch_assoc($selanun)){
																		
						if($i%2==0){
							echo '<tr class="LinhatablePar">';
						}else{
							echo '<tr class="LinhatableImpar">';
						}						
						
						$DataArray = explode(' ', $dan['data_se']);
						
						echo '
							<td>'.$dan['id_se'].'</td>
							<td><img src="imagens/faixas/'.$dan['imagem_se'].'" class="Imgprodlist"/></td>
							<td>'.$dan['titulo_se'].'</td>';
							
							/*echo '<td>';
							$SelectCat = mysqli_query($conn, "SELECT * FROM categorias WHERE id_ca=$dan[id_ca]");
							$Cat = mysqli_fetch_object($SelectCat);
							echo $Cat->nome_ca;
							
							echo '</td>';*/
							echo '
							<td>'.implode('/', array_reverse(explode('-', $DataArray[0]))).'</td>
							
							<td>
								<form name="del" method="post" onsubmit="return confirm('."'".'Deseja mesmo fazer isto?'."'".');">
									<input type="hidden" name="id" value="'.$dan['id_se'].'" />
									<input type="submit" value="EXCLUIR REGISTRO" name="Deluser" class="Campo Btn CadEmp AlterSn" style="background:#F00"/>
								</form>
							</td>
							<td><a href="gerenciamento.php?m=10&codid='.$dan['id_se'].'">Ver Mais</a>
						</tr>
						';
						$i++;
					}
					
					if(isset($_POST['Deluser'])){
						$SelectProd = mysqli_query($conn, "
							SELECT * FROM servicos WHERE id_se=$_POST[id]
						");
						if(mysqli_num_rows($SelectProd)>0){
							$dds = mysqli_fetch_object($SelectProd);
							unlink('imagens/faixas/'.$dds->imagem_se);
							$del = mysqli_query($conn, "DELETE FROM servicos WHERE id_se=$_POST[id]");
						}
						
						echo '
							<script type="text/javascript">
								location.href="gerenciamento.php?m=1";
							</script>
						';
					}
					
				}else{
					echo '
						<tr class="LinhatablePar">
							<th colspan="7">Nenhum dado retornado!</th>
						</tr>
					';
				}
			?>			
		</table>
		<br/><br/>
	</div>	
</section>

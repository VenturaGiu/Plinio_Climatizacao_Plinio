<section class="Centro CentroConteudo">
	<br/>
	<h1 class="TituloPagina">Usuários</h1>
	
	<div class="CadCat">
		<h2>Lista de usuários cadastrados</h2>
		<br/>
		
		<br/>
		<table class="TabelaDeListas">
			<tr>
				<th>Nome</th>
				<th>Usuário</th>
				<th>E-mail</th>
				<th>Deletar</th>
				<th>Editar</th>
			</tr>
			<tr class="LinhatableImpar">
				<td colspan="5">&nbsp;</td>
			</tr>
			<?php 
				$selanun = mysqli_query($conn, "SELECT * FROM usuarios ORDER BY id_us DESC");
				if(mysqli_num_rows($selanun)>0){
					$i=1;
					while($dan = mysqli_fetch_assoc($selanun)){
					
						if($i%2==0){
							echo '<tr class="LinhatablePar">';
						}else{
							echo '<tr class="LinhatableImpar">';
						}
						
						echo '
							<td>'.$dan['nome_us'].'</td>
							<td>';
							
							if(strlen($dan['usuario_us'])>20){
								echo substr($dan['usuario_us'], 0, 20).'...';
							}else{
								echo $dan['usuario_us'];
							}
							
							echo'</td>
							<td>'.$dan['email_us'].'</td>
							<td>
								<form name="del" method="post" onsubmit="return confirm('."'".'Deseja mesmo fazer isto?'."'".');">
									<input type="hidden" name="id" value="'.$dan['id_us'].'" />
									<input type="submit" value="EXCLUIR USUÁRIO" name="Deluser" class="Campo Btn CadEmp AlterSn" style="background:#F00"/>
								</form>
							</td>
							<td><a href="config.php?m=3&codid='.$dan['id_us'].'">Ver Mais</a>
						</tr>
						';
						$i++;
					}
					
					if(isset($_POST['Deluser'])){
						$Usuario->ExcluirUsuario($conn, $_POST['id']);
						echo '
							<script type="text/javascript">
								location.href="config.php?m=2";
							</script>
						';
					}
					
				}else{
					echo '
						<tr class="LinhatablePar">
							<th colspan="4">Nenhum dado retornado!</th>
						</tr>
					';
				}
			?>			
		</table>
		<br/><br/>
	</div>	
</section>

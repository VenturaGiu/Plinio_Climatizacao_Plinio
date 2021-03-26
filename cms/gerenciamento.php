<?php
	include_once('php/conn.php');
	include_once('php/restrict.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<?php include_once('includes/head.php');?>
	</head>
	<body>
		<?php include_once('includes/topo.php');?>
		
		<?php
			if(isset($_GET['m'])){				
				if($_GET['m']==1){
					include_once('includes/lista-servicos.php');				
				}else
				if($_GET['m']==2){
					include_once('includes/cadastrar-servico.php');
				}else
				if($_GET['m']==3){
					include_once('includes/cadastrar-categoria.php');
				}else
				if($_GET['m']==4){
					include_once('includes/lista-produtos.php');
				}else
				if($_GET['m']==5){
					include_once('includes/cadastrar-produto.php');
				}else
				if($_GET['m']==6){
					
					include_once('php/class/produto.class.php');
					
					$Prod = new Produto;
					
					if($Prod->CarregarDados($conn, $_GET['codid'])){
						include_once('includes/editar-produto.php');
					}else{
						echo '<section class="Centro CentroConteudo"><h2 class="AcessNeg">Página não encontrada!</h2></section>';
					}	
					
				}else
				if($_GET['m']==10){
					if(isset($_GET['codid'])){
						if(is_numeric($_GET['codid'])==true){
							$SelectServ = mysqli_query($conn, "SELECT * FROM servicos WHERE id_se=$_GET[codid]");
							if(mysqli_num_rows($SelectServ)>0){							
								$Dados = mysqli_fetch_object($SelectServ);						
								include_once('includes/editar-servico.php');
							}else{
								echo '<section class="Centro CentroConteudo"><h2 class="AcessNeg">Página não encontrada!</h2></section>';
							}
							
						}else{
							echo '<section class="Centro CentroConteudo"><h2 class="AcessNeg">Acesso Negado!</h2></section>';
						}
					}else{
						echo '<section class="Centro CentroConteudo"><h2 class="AcessNeg">Acesso Negado!</h2></section>';
					}
				
				}else{
					echo '<section class="Centro CentroConteudo"><h2 class="AcessNeg">Acesso Negado!</h2></section>';
				}
			}else{
				echo '<section class="Centro CentroConteudo"><h2 class="AcessNeg">Acesso Negado!</h2></section>';
			}
		?>
		
		<?php include_once('includes/footer.php');?>
	</body>
</html>
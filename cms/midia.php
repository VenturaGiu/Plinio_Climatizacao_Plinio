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
					include_once('includes/galerias.php');
				}else
				if($_GET['m']==2){					
					include_once('includes/videos.php');
				}else
				if($_GET['m']==3){
					if(isset($_GET['id'])){
						
						include_once('php/class/galerias.class.php');					
						
						$Galerias = new Galerias;
						
						
						if($Galerias->Select($conn, $_GET['id'])){
							
							include_once('includes/imagens.php');
						}else{
							echo '<section class="Centro CentroConteudo"><h2 class="AcessNeg">Acesso Negado!</h2></section>';
						}
						
					}else{
						echo '<section class="Centro CentroConteudo"><h2 class="AcessNeg">Acesso Negado!</h2></section>';
					}
				}
				else{
					echo '<section class="Centro CentroConteudo"><h2 class="AcessNeg">Acesso Negado!</h2></section>';
				}
			}else{
				echo '<section class="Centro CentroConteudo"><h2 class="AcessNeg">Acesso Negado!</h2></section>';
			}
		?>
		
		<?php include_once('includes/footer.php');?>
	</body>
</html>
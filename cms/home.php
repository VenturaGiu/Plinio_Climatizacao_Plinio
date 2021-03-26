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
					include_once('includes/banners.php');
				}else
				if($_GET['m']==2){				
					include_once('includes/textos-home.php');
				}else
				if($_GET['m']==3){				
					include_once('includes/marcas.php');
				}else
				if($_GET['m']==4){				
					include_once('includes/destaques.php');
				}else
				if($_GET['m']==5){				
					include_once('php/class/destaques.class.php');
					include_once('php/escapeSQL.php');
					$get = LimparGeral($_GET);
					
					$Destaque = new Destaques;
					
					if($Destaque->CarregarDados($conn, $get['id'])){
						include_once('includes/editar-destaque.php');
					}else{
						echo '<section class="Centro CentroConteudo"><h2 class="AcessNeg">Acesso Negado!</h2></section>';
					}				
				}else
				if($_GET['m']==6){				
					include_once('php/class/banner.class.php');
					include_once('php/escapeSQL.php');
					$get = LimparGeral($_GET);
					
					$Banner = new Banner;
					
					
					if($Banner->CarregarDados($conn, $get['id'])){
						include_once('includes/editar-banner.php');
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
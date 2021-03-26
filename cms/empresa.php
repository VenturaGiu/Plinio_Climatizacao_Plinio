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
					include_once('php/class/textos.class.php');
					$Conteudo = new Texto;
					$Conteudo->CarregarConteudo($conn, 'empresa', 'textoempresa');
					
					$Frase = new Texto;
					$Frase->CarregarConteudo($conn, 'empresa', 'fraseempresa');
					
					
					$Missao = new Texto;
					$Missao->CarregarConteudo($conn, 'empresa', 'missao');
					
					$Visao = new Texto;
					$Visao->CarregarConteudo($conn, 'empresa', 'visao');
					
					$Valores = new Texto;
					$Valores->CarregarConteudo($conn, 'empresa', 'valores');
					
					
					include_once('includes/empresa.php');
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
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
					$Conteudo->CarregarConteudo($conn, 'contato', 'textocontato');
					
					$Mapa = new Texto;
					$Mapa->CarregarConteudo($conn, 'contato', 'mapa');
					
					$Endereco = new Texto;
					$Endereco->CarregarConteudo($conn, 'contato', 'endereco');
					
					include_once('includes/contato.php');
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
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
		
		<section class="Centro CentroConteudo fundohome">
			<h1>Seja Bem-vindo!</h1>
			<h2><?php echo $Usuario->nome;?></h2>
		</section>
		
		<?php include_once('includes/footer.php');?>
	</body>
</html>
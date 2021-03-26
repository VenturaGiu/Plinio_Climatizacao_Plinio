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
					include_once('includes/cadastrar-usuario.php');
				}else
				if($_GET['m']==2){					
					include_once('includes/lista-usuarios.php');
				}else
				if($_GET['m']==3){
					if(isset($_GET['codid'])){
						$id = $_GET['codid'];
					}else{
						$id = $_SESSION['id'];
					}
					$DadosCarregados = new Usuario;
					
					$DadosCarregados->CarregarDados($conn, $id);
									
					include_once('includes/editar-usuario.php');
				}else
				if($_GET['m']==4){
					include_once('php/class/textos.class.php');
					$Description = new Texto;
					$Description->CarregarConteudo($conn, 'config', 'description');
					
					$Keywords = new Texto;
					$Keywords->CarregarConteudo($conn, 'config', 'keywords');
					
					$Title = new Texto;
					$Title->CarregarConteudo($conn, 'config', 'title');
					
					
					include_once('includes/config.php');
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
<?php include_once('cms/php/conn.php');?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<?php include_once('includes/head.php');?>
		<title>Serviços - Climatização</title>
		<link rel="shortcut icon" href="imagens/favicon.png" type="image/x-png" />
		<link rel="stylesheet" type="text/css" href="css/styleServicos.css" />
	</head>
	<body>
		<main class="wrapper">
		<?php include_once('includes/header.php');?>
        <section class="section bg1">
          <p class="text">VENHA CONHECER OS NOSSOS SERVIÇOS!</p>
        </section>
		<div class="min-height-c centralizacao">
			<?php 
				$SelectServs = mysqli_query($conn, "SELECT * FROM servicos ORDER BY id_se")or die(mysqli_error($conn));
				
				if(mysqli_num_rows($SelectServs)>0){
					$i=1;
					$c=3;
					while($Servicos = mysqli_fetch_object($SelectServs)):
						if($i % 2 == 0){
							?>
							<div id="<?php echo $Servicos->id_se ?>" class="itensServicos">		
								<center id="centerBiriri">		
									<div class="Imagem">
										<img src="cms/imagens/faixas/<?php echo $Servicos->imagem_se;?>" alt="<?php echo $Servicos->titulo_se;?>" />
									</div>
									<div class="Info">
										<h4><?php echo $Servicos->titulo_se;?></h4>
										<?php echo str_replace('&#39;', "'", str_replace('&#34;', '"', $Servicos->conteudo_se)); ?>
									</div>
								</center>
							</div>
							<?php
						}else{
							?>
							<div id="<?php echo $Servicos->id_se ?>" class="itensServicos">		
								<center id="centerBiriri">		
									<div class="ImagemPar">
										<img src="cms/imagens/faixas/<?php echo $Servicos->imagem_se;?>" alt="<?php echo $Servicos->titulo_se;?>" />
									</div>
									<div class="InfoPar">
										<h4><?php echo $Servicos->titulo_se;?></h4>
										<?php echo str_replace('&#39;', "'", str_replace('&#34;', '"', $Servicos->conteudo_se)); ?>
									</div>
								</center>
							</div>
							<?php
						}
						if($c==$i){
							echo '<div class="Clear"></div>';
							$c = $c + 3;
						}
						$i++;
					endwhile;
				}else{					
					echo '<div class="Construct">Página em Construção!</div>';
				}
				?>
			<div class="Clear"></div>
			<br><br><br>
			<?php include_once('includes/footer.php');?>
		</div>
	</main>
	<?php include_once('includes/footerM.php');?>
	<?php include_once('includes/whatsapp.php');?>
	</body>
</html>
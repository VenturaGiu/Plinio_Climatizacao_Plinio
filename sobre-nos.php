<?php include_once('cms/php/conn.php');?>
<!DOCTYPE html>
<html lang="pt-br">
	<head><meta charset="gb18030">
		<?php include_once('includes/head.php');?>
		<title>Sobre Nós - Climatização</title>
		<link rel="shortcut icon" href="imagens/favicon.png" type="image/x-png" />
		<link rel="stylesheet" type="text/css" href="css/styleEmpresa.css">
	</head>
	<body>
		<main class="wrapper">
			<?php include_once('includes/header.php');?>
			<section class="section bg3">
				<p class="text">CONHEÇA NOSSA EMPRESA!</p>
			</section>
			<?php
				$SelectTextEmp = mysqli_query($conn, "SELECT * FROM textos WHERE pagina='empresa'")or die(mysqli_error($conn));
				$TextEmp = array();
				
				$i=1;
				while($TextsEmp = mysqli_fetch_object($SelectTextEmp)){
					$TextEmp[$i]['titulo'] = $TextsEmp->titulo;
					$TextEmp[$i]['conteudo'] = $TextsEmp->conteudo;
					
					$i++;
				}			
				unset($i);
			?>
			<div class="Centro min-height-c centralizacao">
				<div class="centralizar">
					<center><h3 class="title-pages title-pagesE">Quem Somos?</h3></center>
					<article class="Text Justify">
						<?php echo str_replace('&#39;', "'", str_replace('&#34;', '"', $TextEmp[1]['conteudo']));?>
						<br/><br/>
					</article>
					<h3 class="title-pages title-pagesC">Como Trabalhamos?</h3><br><br>
					<?php 
						for($i=3; $i<=5; $i++):
							if($i == 3){
					?>
								<div class="Bloco-1-3 mvv">
									<div class="tituloI">
										<img class="iconsS" src="imagens/icon/visao.png"/>
										<h3><?php echo $TextEmp[$i]['titulo'];?></h3><br/><br><br>
									</div>
									<p class="Text Text-Center">
										<?php echo $TextEmp[$i]['conteudo'];?>
									</p>
									<br/>
								</div>
					<?php 
							}else if($i == 4){
					?>
								<div class="Bloco-1-3 mvv">
									<div class="tituloI">
										<img class="iconsS" src="imagens/icon/missao.png"/>
										<h3><?php echo $TextEmp[$i]['titulo'];?></h3><br/><br><br>
									</div>
									<p class="Text Text-Center">
										<?php echo $TextEmp[$i]['conteudo'];?>
									</p>
									<br/>
								</div>
					<?php 
							}else if($i == 5){
					?>
								<div class="Bloco-1-3 mvv">
									<div class="tituloI">
										<img class="iconsS" src="imagens/icon/visao.png"/>
										<h3><?php echo $TextEmp[$i]['titulo'];?></h3><br/><br><br>
									</div>
									<p class="Text Text-Center">
										<?php echo $TextEmp[$i]['conteudo'];?>
									</p>
									<br/>
								</div>
					<?php 
							}
						endfor;
					?>
				</div>
			</div>
			<div class="Clear"></div>
			<?php include_once('includes/footer.php');?>
		</main>
	<?php include_once('includes/footerM.php');?>
	<?php include_once('includes/whatsapp.php');?>
	</body>
</html>
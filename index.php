<?php include_once('cms/php/conn.php');?>
<!DOCTYPE html>
<html lang="pt-br">
	<head><meta charset="gb18030">
		<?php include_once('includes/head.php');?>
		<title>Seja Bem-Vindo - Climatização</title>
		<link rel="shortcut icon" href="imagens/favicon.png" type="image/x-png" />
		<script type="text/javascript" src="js/jquery.bxslider.min.js"></script>
		
		<link rel="stylesheet" type="text/css" href="css/jquery.bxslider.min.css" media="all" />
		
		<script type="text/javascript">			
			$(document).ready(function(){
				$('.bxslider').bxSlider({
					mode: 'fade',
					auto: true,
					pause: 6000,
					pager: false,
					AdaptiveHeight: true,
				});
			});
		</script>
	</head>
	<body>
		<?php include_once('includes/header.php');?>
		<div class="Slider">
			<ul class="bxslider">
			<?php 
				$SelectSliders = mysqli_query($conn, "SELECT * FROM banners ORDER BY id_ba ASC")or die(mysqli_error($conn));
				if(mysqli_num_rows($SelectSliders)){
					while($Sliders = mysqli_fetch_object($SelectSliders)):
			?>
				<li>
					<a href="<?php echo $Sliders->url_ba;?>">
						<img src="cms/imagens/banners/<?php echo $Sliders->nome_ba;?>" />
					</a>
				</li>
			<?php
					endwhile;
				}
			?>  
			</ul>
		</div>
		<?php
			$Textos = array();
			
			$i=1;
			$SelectTextos = mysqli_query($conn, "SELECT * FROM textos WHERE pagina='home'")or die(mysqli_error($conn));
			while($TextosObj = mysqli_fetch_object($SelectTextos)){
				$Textos[$i]['titulo'] = $TextosObj->titulo;
				$Textos[$i]['conteudo'] = $TextosObj->conteudo;				
				$i++;
				break;
			}

			unset($i);
		?>
		<div class="BlHome Bl1">	
			<div class="Centro">			
				<h1 class="TitleHome white Text-Center"><?php echo $Textos[1]['titulo'];?></h1><br/>
				<h2 class="SubTitle Text-Center">Saiba mais sobre nós e o que podemos fazer!</h2>
				<br/><br/>
				<article class="Text Justify white">
					<?php echo $Textos[1]['conteudo'];?>
				</article>
			</div>
		</div>
		
		<?php
			$SelectDestaques = mysqli_query($conn, "SELECT * FROM pragas ORDER BY id_pr ASC")or die(mysqli_error($conn));
			if(mysqli_num_rows($SelectDestaques)>0){
		?>
		<div class="BlHome Bl2">
			<div class="Centro">
				<h2 class="TitleHome black Text-Center">Serviços</h2><br/>
				<br/><br/>
				<?php 
					$c=4;
					$i=1;
					while($Destaques = mysqli_fetch_object($SelectDestaques)):
				?>
				<a href="<?php echo $Destaques->url_pr;?>" target="_blank">			
					<div class="Bloco-1-3 Bloco-1-3-home ajustes">	
						<div class="Image">
							<img src="cms/imagens/destaques/<?php echo $Destaques->imagem_pr;?>" alt="servico" />
						</div>
						<br><br>
						<center><h4><?php echo $Destaques->nome_pr;?></h4><center>
						<br>
					</div>
				</a>
				<?php
					if($c==$i){
						echo '<div class="Clear"></div>';
						$c = $c + 3;
					}
					$i++;
					endwhile;
				?>
			</div>
		</div>
		<?php }?>
		<?php include_once('includes/footerM.php');?>
		<?php include_once('includes/footer.php');?>
	</body>
</html>
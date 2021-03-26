<?php include_once('cms/php/conn.php');?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<?php include_once('includes/head.php');?>
		<title>Contato - Climatização</title>
		<script type="text/javascript" src="js/contato.js"></script>
		<link rel="shortcut icon" href="imagens/favicon.png" type="image/x-png" />
		<link rel="stylesheet" type="text/css" href="css/contato.css"/>
	</head>
	<body>
		<?php include_once('includes/header.php');?>
		<div class="Centro min-height-c corpinho">
			<div class="CentroCont Text-Center Text">
			<div id="contatos">
				<img id="map" src="imagens/icons/map.png" alt="" /><br/>					
				<p>
				<?php
					$SelectEndA = mysqli_query($conn, "SELECT * FROM textos WHERE pagina='contato' AND nome='endereco'");
					$EndA = mysqli_fetch_object($SelectEndA);
					if(strlen($EndA->conteudo)>0){
						echo $EndA->conteudo.'<br/>';
					}					
					
					$SelecTelsA = mysqli_query($conn, "SELECT * FROM contato WHERE tipo_cont=1")or die(mysqli_error($conn));
					$CTFA = 1;
					echo '<br/><img src="imagens/wp.png" alt="" class="icowpc"/>';
					while($TelsTA = mysqli_fetch_object($SelecTelsA)){
						echo $TelsTA->valor_cont . '<br/>';
						
						if($CTFA == mysqli_num_rows($SelecTelsA)){
							break;
						}else{
							echo ' / ';
						}
						$CTFA++;
					}
					
					$SelecemailsA = mysqli_query($conn, "SELECT * FROM contato WHERE tipo_cont=2")or die(mysqli_error($conn));
					echo '<br/><img src="imagens/wp.png" alt="" class="icowpc"/>';
					while($mailsA = mysqli_fetch_object($SelecemailsA)){
						echo ''.$mailsA->valor_cont;				
					}						
				?>
					<br><br>
				<img src="imagens/icon/insta.png" class="icowpc"/>
					@INSTAGRAM
				<br><br>
					<img src="imagens/icon/fb.png" class="icowpc"/>
					@FACEBOOK
				</p>
			<br/>
			</div>
			<div id="formC">
				<p class="Text black Justify">
					Entre em contato caso tenha duvidas sobre algo e procuraremos solucionar suas dúvidas o mais rapido
					possivel.
				</p>			
				<br/>
				<form name="contato" method="post" onsubmit="return Contato(this)" action="php/contato.php">
					<div class="Linha">
						<input type="text" name="nome" placeholder="Nome: " class="input inputfull"/>	
					</div>					
					<div class="Linha">
						<input type="email" name="email" placeholder="E-mail: "  class="input inputc-3"/>
						<input type="text" name="tel" placeholder="Telefone: "  class="input inputc-3"/>
						<input type="text" name="assunto" placeholder="Assunto: "  class="input inputc-3"/>
					</div>					
					<div class="Linha">
						<textarea name="mensagem" class="input inputfull textareadis" placeholder="Mensagem: "></textarea>
					</div>
					<div class="Linha">
						<input type="submit" value="Enviar" class="Btn"/>
					</div>
					<div class="Linha resp">
						&nbsp;
					</div>
				</form>
				</div>
			</div>
			<br/>
		</div>
		<?php
			$SelectMap = mysqli_query($conn, "SELECT * FROM textos WHERE pagina='contato' AND nome='mapa'");
			$Mapa = mysqli_fetch_object($SelectMap);
			
			if(strlen($Mapa->conteudo)>0):
		?>
			<div class="Map">
				<?php echo str_replace('&#39;', "'", str_replace('&#34;', '"', $Mapa->conteudo));?>
			</div>
		<?php 
			endif;
		?>
		<?php include_once('includes/footerM.php');?>
		<?php include_once('includes/footer.php');?>
		<?php include_once('includes/whatsapp.php');?>
	</body>
</html>
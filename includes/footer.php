		<?php
			$SelectTxtFot = mysqli_query($conn, "SELECT * FROM textos WHERE pagina='home'")or die(mysqli_error($conn));
			$TextFot = array();
			$i=1;
			while($Dados = mysqli_fetch_object($SelectTxtFot)){
				$TextFot[$i]['titulo'] = $Dados->titulo;
				$TextFot[$i]['conteudo'] = $Dados->conteudo;
				$i++;
			}
			
			unset($i);
			
			
			$SelectEnd = mysqli_query($conn, "SELECT * FROM textos WHERE pagina='contato' AND nome='endereco'")or die(mysqli_error($conn));			
			$i=1;
			$Endobj = mysqli_fetch_object($SelectEnd);
		?>
		<footer>
			<div class="Centro">
				<div class="FooterInfos Text-Center">
					<img src="imagens/logo-w1.png" alt="Conquista Construções e Serviços" class="Logo-F" /><br/><br/>
					<div class="FooterMenu">
						<a href="index.php">Inicio</a> • 
						<a href="sobre-nos.php">Sobre Nós</a> • 
						<a href="servicos.php">Serviços</a> • 
						<a href="galerias.php">Galerias</a> • 
						<a href="contato.php">Contato</a>					
						<br/><br/>
					</div>
					<p class="End Text-Center white"><?php echo $Endobj->conteudo;?></p>
				</div> 
			</div>
			<div class="LinhaFooter">
				<div class="Centro">
					&copy; TODOS OS DIREITOS RESERVADOS - <?php echo date('Y');?>
					<p class="Designer Text-Right white">
						Desenvolvido Por: <a href="http://www.dideias.com.br/" target="_blank">D Ideias Soluções</a>
					</p>
				</div>
			</div>
		</footer>
		<div class="EspMenuMobile"><div>
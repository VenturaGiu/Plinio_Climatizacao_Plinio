		<meta charset="utf-8" />
		<meta name="author" content="Lucas Veríssimo & Giulia Ventura" />
		<meta name="designer" content="Giulia Ventura" />
		<meta name="robots" content="index, follow" />
		<meta name="viewport" content="width=600" />
		<?php
			$SelectMetas = mysqli_query($conn, "SELECT * FROM textos WHERE pagina='config'");
			
			$Infos = array();
			
			while($Configs = mysqli_fetch_object($SelectMetas)){
				$Infos[$Configs->nome] = $Configs->conteudo;
			}			
		?>
		
		<meta name="keywords" content="<?php echo $Infos['keywords'];?>"/>
		<meta name="description" content="<?php echo $Infos['description'];?>"/>
		<meta name="title" content="<?php echo $Infos['title'];?>"/>
		<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
		<script type="text/javascript" src="js/scroll.js"></script>
        
		
		<link rel="stylesheet" type="text/css" href="css/style.css" />
		
		
		<link rel="stylesheet" type="text/css" href="css/desktop.css" media="all and (min-width: 950px)" />
		<link rel="stylesheet" type="text/css" href="css/mobile.css" media="all and (max-width: 949px)" />
<?php require_once('php/conn.php');?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<?php include_once('includes/head.php');?>
	</head>
	<body style="background: #f8f8f8;">
		<script type="text/javascript" src="js/login.js"></script>
		<section class="Login">
			<a href="../index.php">
			<figure><img src="../imagens/logo.png" alt="Logo" class="Logo_login" /></figure>
			</a>
			<form name="login" method="post" onsubmit="return Login(this)">
			<br/>
				<p class="Linhainput">
					<input type="text" name="usuario" class="Campo input" placeholder="Usuário: "/>
					<input type="password" name="senha" class="Campo input" placeholder="Senha: "/>
				</p><br/>				
				<input type="submit" value="Entrar" class="Campo Btn CadEmp"/><br/>
				<p class="Linhainput resp">
					&nbsp;
				</p>
			</form>
		</section>
	</body>
</html>
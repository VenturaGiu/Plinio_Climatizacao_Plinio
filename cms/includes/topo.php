<?php 
	include_once('php/class/usuario.class.php');
	$Usuario = new Usuario;
	$Usuario->CarregarDados($conn, $_SESSION['id']);
?>		
		<nav>
			<section class="Centro">
				<ul class="ListaMenu">
					<li>						
						<a href="index.php">
							<button class="BtnMenu">Inicio</button>
						</a>
					</li>
					<li>
						<a href="#"><button class="BtnMenu">Home</button></a>
						<ul class="DropDown">
							 
							<li>
								<a href="home.php?m=1">Slider</a>
							</li>
							
							<li>
								<a href="home.php?m=2">Texto</a>
							</li>
													
							<li>
								<a href="home.php?m=4">Destaques</a>
							</li>
							<?php /*							
							<!--
							<li>
								<a href="home.php?m=3">LogoMarcas</a>
							</li>
							-->
							*/
							?>
						</ul>
					</li>
					
					<li>
						<a href="empresa.php?m=1"><button class="BtnMenu">Empresa</button></a>
					</li>					
					
					<li>
						<a href="#"><button class="BtnMenu">Gerenciamento</button></a>
						<ul class="DropDown">
							<li>
								<a href="#">Serviços</a>
								<ul class="DropDown2">
									<li><a href="gerenciamento.php?m=1&type=produtos">Lista de Cadastrados</a></li>
									<li><a href="gerenciamento.php?m=2&type=produtos">Cadastrar Novo</a></li>
								</ul>
							</li>
							<?php /*
							<li>
								<a href="#">Equipe</a>
								<ul class="DropDown2">
									<li><a href="gerenciamento.php?m=4&type=produtos">Lista de Cadastrados</a></li>
									<li><a href="gerenciamento.php?m=5&type=produtos">Cadastrar Novo</a></li>
									<!--<li><a href="gerenciamento.php?m=3&type=categorias">Categoria</a></li>-->
								</ul>
							</li>
							*/?>
						</ul>
					</li>				
										
					<li>
						<a href="#"><button class="BtnMenu">Mídia</button></a>
						<ul class="DropDown">
							<li>
								<a href="midia.php?m=1">Galerias</a>
							</li>
							<?php /*
							<li>
								<a href="midia.php?m=2">Vídeos</a>
							</li>
							*/?>							
						</ul>
					</li>
					
					<li>
						<a href="contato.php?m=1"><button class="BtnMenu">Contato</button></a>
					</li>
					
					<li>
						<a href="#"><button class="BtnMenu">Configurações</button></a>
						<ul class="DropDown">
							<li>
								<a href="config.php?m=1">Cadastrar Usuário</a>
							</li>
							<li>
								<a href="config.php?m=2">Lista de Usuários</a>
							</li>
							<li>
								<a href="config.php?m=4">Configurações Globais</a>
							</li>
						</ul>
					</li>
				</ul>
				<div class="esp"></div>
			</section>
		</nav>
		<header>			
			<section class="Centro">
				<a href="../index.php">
					<img src="../imagens/logo1.png" alt="" class="Logo"/>
				</a>
				
				<div class="TopoSair">
					Seja Bem-vindo <a href="config.php?m=3"><?php echo $Usuario->nome;?></a>!<br/>
					<a href="config.php?m=3">Editar</a> | <a href="php/sair.php">Sair</a>
				</div>
				<div class="esp"></div>
			</section>
		</header>
		
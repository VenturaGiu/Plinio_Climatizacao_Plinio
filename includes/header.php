
		<?php
			$SelectContstop = mysqli_query($conn, "SELECT * FROM contato WHERE tipo_cont=1;")or die(mysqli_error($conn));
			$Rowsctop = mysqli_num_rows($SelectContstop);
		?>
		<header>
		<script type="text/javascript" src="js/scroll.js"></script>
			<div class="LinhaSup">
				<div class="Centro">
					Atendimento:
					<?php
						$i = 1;
						while($ContsTop = mysqli_fetch_object($SelectContstop)){
							echo $ContsTop->valor_cont;
							
							if($i<$Rowsctop){
								echo ' / ';
							}
							$i++;
						}
					?>
					
					<div class="Icons">
						<a href="#">
							<img src="imagens/icon/fb.png" alt="Facebook Climatização" />
						</a>
					</div>
				</div>
			</div>
			<div class="Centro central">
				<div class="Logo">
					<a href="index.php">
						<img src="imagens/logo1.png" alt="Climatização" />
					</a>
				</div>
				<nav>
					<ul class="Menu">
						<li class="li_style">
							<a href="index.php" >
								<button>
									Inicio
								</button>
							</a>
						</li>
						<li class="li_style">
							<a href="sobre-nos.php" >
								<button>
									Sobre Nós
								</button>
							</a>
						</li>
						<li class="li_style">
							<a href="servicos.php" >
								<button>
									Serviços
								</button>
							</a>
							<ul class="DropDown">
								<?php 
									
									$SelectServicosMenu = mysqli_query($conn, "SELECT * FROM servicos ORDER BY id_se DESC LIMIT 0, 6")or die(mysqli_error($conn));
									if(mysqli_num_rows($SelectServicosMenu)>0):
										$i=1;
										while($Menus = mysqli_fetch_object($SelectServicosMenu)):
								?>
								<a href="servicos.php#<?php echo $Menus->id_se;?>" class="li_style">
									<li class="li_style">
										<?php echo $Menus->titulo_se;?>										
									</li>
								</a>
								<?php 
										if($i>=4){
											echo '
											<a href="servicos.php" class="li_style">
												<li>
													Ver Mais +										
												</li>
											</a>
											';
											break;
										}
										endwhile;
									
									endif;
								?>
							</ul>
						</li>
						<li class="li_style">
							<a href="contato.php" class="li_style">
								<button style="border: 0">
									Contato
								</button>
							</a>
						</li>
					</ul>
				</nav>
			</div>
			<div class="Clear"></div>
		</header>
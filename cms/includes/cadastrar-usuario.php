<script type="text/javascript" src="js/cadastrar-usuario.js"></script>
<section class="Centro CentroConteudo">
	<h1 class="TituloPagina">Cadastrar Usuário</h1><br/>
	
	<form name="cadastrar" method="post" onsubmit="return CadastrarUsuario(this)">
	
		<div class="Linha">				
			<input type="text" name="nome" class="Campo inputcadu" placeholder="Nome: "/>
			<input type="text" name="usuario" class="Campo inputcadu" placeholder="Usuário: "/>				
		</div>
		
		<div class="Linha">				
			<input type="text" name="email" class="Campo inputcadu" placeholder="E-mail: "/>
			<input type="password" name="senha" class="Campo inputcadu" placeholder="Senha: "/>				
		</div>
		
		<div class="Linha">
			<input type="submit" value="Cadastrar" class="Btn"/>
		</div>
		
		<div class="Linha resp">
			&nbsp;
		</div>
		
	</form>
</section>
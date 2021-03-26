<script type="text/javascript" src="js/editar-usuario.js"></script>
<section class="Centro Conteudo">
	<h1 class="TituloPagina">Editar Usuário</h1><br/>
	
	<form name="cadastrar" method="post" onsubmit="return CadastrarUsuario(this)">		
		<input type="hidden" name="id" value="<?php echo $DadosCarregados->id?>" />
		<div class="Linha">Editar Dados:</p>
		<div class="Linha">				
			<input type="text" name="nome" class="Campo input" placeholder="Nome: " value="<?php echo $DadosCarregados->nome?>" style="width: 37.3%"/>
						
		</p>
		
		<div class="Linha">
			<input type="text" name="usuario" class="Campo input" placeholder="Usuário: " value="<?php echo $DadosCarregados->usuario?>" />	
			<input type="text" name="email" class="Campo input" placeholder="E-mail: " value="<?php echo $DadosCarregados->email?>" />
		</p>
		
		<div class="Linha">
			<input type="submit" value="Salvar Alterações" class="Campo Btn CadEmp AlterDs"/>
		</p>
		
		<p class="Linhainput resp">
			&nbsp;
		</p>
		<br/><br/>
	</form>
	
	<form name="senhas" method="post" onsubmit="return TrocarSenha(this)">		
		<input type="hidden" name="id" value="<?php echo $DadosCarregados->id?>" />
		<div class="Linha">Trocar Senha:</p>
		<div class="Linha">				
			<input type="password" name="senha" class="Campo input" placeholder="Nova Senha: " />	
			<input type="password" name="confsenha" class="Campo input" placeholder="Confirmar Nova Senha: " />
		</p>
		
		<div class="Linha">
			<input type="submit" value="Salvar Alterações" class="Campo Btn CadEmp AlterSn"/>
		</p>
		
		<p class="Linhainput resps">
			&nbsp;
		</p>
	</form>
</section>
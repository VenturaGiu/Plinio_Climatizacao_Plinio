
<section class="Centro CentroConteudo">
		<h2 class="TituloPagina">Contato</h2>
		<form name="textocontato" method="post" enctype="multipart/form-data" onsubmit="return TextoContato(this)">
			<div class="Linha">
				<textarea name="conteudo" class="Campo textarea" placeholder="Texto:"><?php echo $Conteudo->Conteudo;?></textarea><br/>
				<textarea name="mapa" class="Campo textarea" placeholder="Mapa / Iframe do Mapa:"><?php echo $Mapa->Conteudo;?></textarea><br/>
				<input name="endereco" class="Campo inputcont" placeholder="Endereço:" value="<?php echo $Endereco->Conteudo;?>"/><br/><br/>
				<input type="submit" value="Salvar Alterações" class="Btn"/><br/><br/>
				<p class="Resp">&nbsp;</p>
			</div>
		</form>
		<br/>
		
		<div class="Linha">
			<form name="contatos" method="post" onsubmit="return CadastrarContato(this)">
				<h2 class="SubTitulos">Cadastrar Contato</h2><br/>
				Tipo de contato: 
				<input type="radio" name="tipoc" value="1" /> Telefone |
				<input type="radio" name="tipoc" value="2" /> E-mail <br/><br/>
				<input type="text" name="contato" class="Campo inputcadcont" placeholder="Telefone / E-mail: "/><br/><br/>
				<input type="submit" value="Cadastrar" class="Btn" />
				<p class="ResultcadCont">&nbsp;</p>
				<br/><br/><br/>
			</form>
			<div class="ListaContatos left">
				<h2 class="SubTitulos">Telefones Cadastrados</h2><br/>
				<div class="local1"></div>
			</div>
			<div class="ListaContatos right">
				<h2 class="SubTitulos">E-mails Cadastrados</h2><br/>
				<div class="local2"></div>
			</div>
			
			<div class="esp"></div>
		</div>
</section>
<script type="text/javascript" src="js/contato.js"></script>
<script type="text/javascript" src="js/editar-campo.js"></script>
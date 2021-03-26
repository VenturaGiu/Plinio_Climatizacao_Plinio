
	function CadastrarUsuario(){
		var c = document.cadastrar;
		
		if(c.nome.value.length<3){
			alert('Digite no campo nome!');
			c.nome.focus();
		}else
		if(c.usuario.value.length<3){
			alert('Digite no campo usuario!');
			c.usuario.focus();
		}else
		if(c.email.value.length<5){
			alert('Digite um e-mail válido!');
			c.email.focus();
		}else{
			
			var dados = {
				nome: c.nome.value,
				usuario: c.usuario.value,
				email: c.email.value,
				id: c.id.value
			};
			
			$('.resp').html('<label class="load">Processando...</label>');
			$('.AlterDs').hide();
			
			setTimeout(function(){
				$.post('php/usuario.php', {'editar':'ok', 'dados':dados}).done(function(resp){
					if(resp=='ok'){
						$('.resp').html('<label class="ok">Dados alterados com sucesso!</label>');
					}else{
						$('.resp').html(resp);
					}
					
					$('.AlterDs').show();
				});
			}, 35);
			
		}		
		return false;
	}
	
	function TrocarSenha(){
		var c = document.senhas;
		if(c.senha.value.length<5){
			alert('A senha deve possuir no minimo 8 caracteres!');
			c.senha.focus();
		}else
		if(c.confsenha.value != c.senha.value){
			alert('As senhas não conferem!');
			c.confsenha.focus();
		}else{
			var dados = {
				id: c.id.value,
				senha: c.senha.value,
			};
			
			$('.resps').html('<label class="load">Processando...</label>');
			$('.AlterSn').hide();
			
			setTimeout(function(){
				$.post('php/usuario.php', {'senhas':'ok', 'dados':dados}).done(function(resp){
					if(resp=='ok'){
						$('.resps').html('<label class="ok">Senha alterada!</label>');
					}else{
						$('.resps').html(resp);
					}
					
					$('.AlterSn').show();
				});
			}, 3500);
		}
		
		return false;
	}
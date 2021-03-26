
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
		}else
		if(c.senha.value.length<8){
			alert('Campo senha deve ter mínimo 8 caracteres!');
			c.senha.focus();
		}else{
			
			var dados = {
				nome: c.nome.value,
				usuario: c.usuario.value,
				email: c.email.value,
				senha: c.senha.value
			};
			
			$('.resp').html('<label class="load">Processando...</label>');
			$('.CadEmp').hide();
			
			setTimeout(function(){
				$.post('php/usuario.php', {'cadastrar':'ok', 'dados':dados}).done(function(resp){
					if(resp=='ok'){
						$('.resp').html('<label class="ok">Usuário cadastrado!</label>');
						c.reset();						
					}else{
						$('.resp').html(resp);
					}
					
					$('.CadEmp').show();
				});
			}, 35);
			
		}		
		return false;
	}
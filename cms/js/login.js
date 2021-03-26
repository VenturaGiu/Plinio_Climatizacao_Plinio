
	function Login(){
		var dados = {
			usuario: document.login.usuario.value,
			senha: document.login.senha.value
		};
		
		$.post('php/usuario.php', {'login':'ok', 'dados':dados}).done(function(resp){
			if(resp=='ok'){
				$('.resp').html('<label class="ok">Usuário autenticado! Redirecionando...</label>');
				setTimeout(function(){
					location.href="index.php";
				}, 2000);
			}else{
				$('.resp').html(resp);
			}
		});
		return false;
	}
	
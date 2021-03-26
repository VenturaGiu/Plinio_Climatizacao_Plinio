	function is_email(email){
		er = /^[a-zA-Z0-9][a-zA-Z0-9\._-]+@([a-zA-Z0-9\._-]+\.)[a-zA-Z-0-9]{2,3}/; 
		if( !er.exec(email)){	
			return false;
		}else{
			return true;
		}
	}
	
	function Contato(){
		var c = document.contato;
		
		if(c.nome.value.length<3 || c.nome.value.length>220){
			alert('Preencha o campo nome!');
			c.nome.focus();
		}else 
		if(is_email(c.email.value)==false){
			alert("Digite um e-mail válido!");
			c.email.focus();
			return false;
		}else
		if(c.tel.value.length<8){
			alert('Preencha o campo telefone!');
			c.tel.focus();
		}else
		if(c.assunto.value.length<3){
			alert('Preencha o campo assunto!');
			c.assunto.focus();
		}else
		if(c.mensagem.value.length<3){
			alert('Preencha o campo mensagem!');
			c.mensagem.focus();
		}else{
			var dados = {
				nome: c.nome.value,
				email: c.email.value,
				tel: c.tel.value,
				assunto: c.assunto.value,
				mensagem: c.mensagem.value
			};
			
			$('.Btn').hide();
			
			$('.resp').html('<label class="load">Aguarde...</label>');
			setTimeout(function(){
				$.post('php/contato.php', {'dados':dados}).done(function(Result){
					$('.resp').html(Result);
					c.reset();
					$('.Btn').show();
				});
			}, 3000);			
		}
		
		return false;
	}
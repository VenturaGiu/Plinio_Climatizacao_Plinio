
	function CadastrarPraga(){
		var c = document.cadprag;
		var imagem = c.imagem.files;
		
		console.log(imagem);
		if(c.titulo.value.length<3 || c.titulo.value.length>50){
			$('.Resp').html('<label class="erro">O Título deve possuir de 3 a 50 caracteres!</label>');
			c.titulo.focus();
		}else
		if(c.imagem.value==''){
			$('.Resp').html('<label class="erro">Selecione uma imagem JPEG válida!</label>');			
		}else
		if(imagem[0]['type']=='image/jpeg' || imagem[0]['type']=='image/png'){
			return true;			
		}else{
			$('.Resp').html('<label class="erro">Selecione uma imagem JPEG/PNG válida!</label>');
		}
		
		return false;
	}
	
	function ValidarImagem(){
		var c = document.alterimage;
		var imagem = c.imagem.files;
		if(c.imagem.value==''){
			alert('Selecione uma imagem JPEG / PNG válida!');
		}else
		if(imagem[0]['type']=='image/jpeg' || imagem[0]['type']=='image/png'){
			return true;			
		}else{
			alert('Selecione uma imagem JPEG / PNG válida!');
		}
		return false;		
	}
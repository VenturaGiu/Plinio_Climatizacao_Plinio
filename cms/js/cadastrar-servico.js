
	function CadastrarServico(){
		var c = document.cadserv;
		var img = c.imagem.files;
		console.log(img);
		if(c.titulo.value.length<3 || c.titulo.value.length>120){
			alert('Campo título deve possuir de 3 a 120 caracteres!');
			c.titulo.focus();
		}else
		if(c.subtitulo.value.length<3 || c.subtitulo.value.length>120){
			alert('Campo título deve possuir de 3 a 120 caracteres!');
			c.subtitulo.focus();
		}else
		if(c.categoria.value=='null'){
			alert('Selecione uma categoria!');
			c.categoria.focus();
		}else
		if(c.imagem.value==''){
			alert('Selecione uma imagem JPEG/PNG!');
		}else
		if(img[0]['type']=='image/jpeg' || img[0]['type']=='image/png'){
			
			if(tinyMCE.get('conteudo').getContent().length<10){
				alert('A caixa de texto deve possuir no mínimo 10 caracteres!');
			}else{
				c.cadastrarservico.value='ok';
				return true;
			}
		}else{
			alert('Selecione uma imagem JPEG/PNG!');
		}
		
		return false;
	}
	
	function EditarServico(){
		var c = document.editserv;
		if(c.titulo.value.length<3 || c.titulo.value.length>120){
			alert('Campo título deve possuir de 3 a 120 caracteres!');
			c.titulo.focus();
		}else
		if(c.subtitulo.value.length<3 || c.subtitulo.value.length>120){
			alert('Campo título deve possuir de 3 a 120 caracteres!');
			c.subtitulo.focus();
		}else
		if(tinyMCE.get('conteudo').getContent().length<10){
			alert('A caixa de texto deve possuir no mínimo 10 caracteres!');
		}else{
			c.editarservico.value='ok';
			return true;
		}
		return false;
	}
	
	function ValidarImagem(){
		var c = document.editimg;
		var img = c.imagem.files;
		
		if(c.imagem.value==''){
			alert('Selecione uma imagem JPEG!');
		}else
		if(img[0]['type']=='image/jpeg' || img[0]['type']=='image/png'){
			c.alterarimagem.value='ok';
			return true;
		}else{
			alert('Selecione uma imagem JPEG/PNG!');
		}
		return false;
	}
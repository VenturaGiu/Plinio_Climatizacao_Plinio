
	function CadastrarProduto(){		
		
		var c = document.cadprod;
		
		var img = c.imagem.files;
		
		console.log(img);
		if(c.titulo.value.length<3 || c.titulo.value.length>120){
			alert('Campo título deve possuir de 3 a 120 caracteres!');
			c.titulo.focus();
		}else
		if(c.valor.value.length<3 || c.valor.value.length>20){
			alert('Informe o valor corretamente!');
			c.valor.focus();
		}else
		if(c.categoria.value=='null'){
			alert('Selecione a categoria!');
			c.categoria.focus();
		}else
		if(c.imagem.value==''){
			alert('Selecione uma imagem JPEG/PNG!');
		}else
		if(img[0]['type']=='image/jpeg' || img[0]['type']=='image/png'){		
			c.cadastrarproduto.value='ok';			
			
			return true;		
		}else{
			alert('Selecione uma imagem JPEG/PNG!');
		}
		
		return false;
	}
	
	function EditarProduto(){		
		
		var c = document.editprod;		
		
		if(c.titulo.value.length<3 || c.titulo.value.length>120){
			alert('Campo título deve possuir de 3 a 120 caracteres!');
			c.titulo.focus();
		}else
		if(c.valor.value.length<3 || c.valor.value.length>20){
			alert('Informe o valor corretamente!');
			c.valor.focus();
		}else
		if(c.categoria.value=='null'){
			alert('Selecione a categoria!');
			c.categoria.focus();
		}else{
			c.editarproduto.value=='ok';
			return true;
		}		
		return false;
	}
	
	
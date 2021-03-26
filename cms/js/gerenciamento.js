
	function CadastrarGerenciamento(){
		var c = document.cadgen;
		
		if(c.type.value=='servicos' || c.type.value=='produtos'){
			if(c.titulo.value.length<3 || c.titulo.value.length>60){
				$('.Resp').html('<label class="erro">O título deve possuir de 3 a 60 caracteres!</label>');				
			}else
			if(tinyMCE.get('conteudo').getContent().length<30){
				$('.Resp').html('<label class="erro">O corpo de texto deve possuir no mínimo 30 caracteres!</label>');			
			}else{
				var dados = {
					type: c.type.value,
					titulo: c.titulo.value,
					conteudo: tinyMCE.get('conteudo').getContent()
				};
				
				$('.Resp').html('<label class="load">Aguarde...</label>');	
				$('.Btn').hide();
				setTimeout(function(){
					$.post('php/gerenciamento.php', {'cadgen':'ok', 'dados':dados}).done(function(result){
						if(result=='ok'){
							$('.Resp').html('<label class="ok">Cadastrado com sucesso!</label>');
							c.reset();
						}else{
							$('.Resp').html(result);
						}
						
						$('.Btn').show();
					});
				}, 30);
			}
		}else{			
			$('.Resp').html('<label class="erro">Erro com tipo de página! Recarrega a página e tente novamente!</label>');
		}
		return false;
	}
	
	function EditarGerenciamento(){
		var c = document.cadgen;
		
		if(c.type.value=='servicos' || c.type.value=='produtos'){
			if(c.titulo.value.length<3 || c.titulo.value.length>60){
				$('.Resp').html('<label class="erro">O título deve possuir de 3 a 60 caracteres!</label>');				
			}else
			if(tinyMCE.get('conteudo').getContent().length<30){
				$('.Resp').html('<label class="erro">O corpo de texto deve possuir no mínimo 30 caracteres!</label>');			
			}else{
				var dados = {
					id: c.id.value,
					type: c.type.value,
					titulo: c.titulo.value,
					conteudo: tinyMCE.get('conteudo').getContent()
				};
				
				$('.Resp').html('<label class="load">Aguarde...</label>');	
				$('.Btn').hide();
				setTimeout(function(){
					$.post('php/gerenciamento.php', {'editgen':'ok', 'dados':dados}).done(function(result){
						if(result=='ok'){
							$('.Resp').html('<label class="ok">Editado com sucesso!</label>');						
						}else{
							$('.Resp').html(result);
						}
						
						$('.Btn').show();
					});
				}, 30);
			}
		}else{			
			$('.Resp').html('<label class="erro">Erro com tipo de página! Recarrega a página e tente novamente!</label>');
		}
		return false;
	}
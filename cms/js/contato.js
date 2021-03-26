	
	function CarregarContatos(tipo){
	
		$('.local'+tipo).html('<label class="load">Aguarde...</label>');
					
		setTimeout(function(){
			$.post('php/contatos.php', {'loadcont':'ok', 'tipo':tipo}).done(function(result){
				$('.local'+tipo).html(result);					
			});
		}, 30);
	}
	
	function TextoContato(){
		var c = document.textocontato;
		var dados ={
			conteudo: c.conteudo.value,
			mapa: c.mapa.value,
			endereco: c.endereco.value,
		}
		$.post('php/textos.php', {'txtcont':'ok', 'dados':dados}).done(function(result){
			$('.Resp').html(result);			
		});
		return false;
	}
	
	function CadastrarContato(){
		var c = document.contatos;
		if(c.tipoc.value==''){
			$('.ResultcadCont').html('<label class="erro">Selecione um tipo de contato!</label>');
		}else
		if(c.contato.value=='' || c.contato.value>80){
			$('.ResultcadCont').html('<label class="erro">Digite um valor no campo contato!</label>');
			c.contato.focus();
		}else{
			var dados = {
				tipoc: c.tipoc.value,
				contato: c.contato.value,
			};
			
			$('.ResultcadCont').html('<label class="load">Aguarde...</label>');
			$('.Btn').hide();
						
			setTimeout(function(){
				$.post('php/contatos.php', {'cadcont':'ok', 'dados':dados}).done(function(result){
					if(result=='ok'){
						$('.ResultcadCont').html('<label class="ok">Cadastrado com sucesso!</label>');
						CarregarContatos(c.tipoc.value);
						c.reset();						
					}else{
						$('.ResultcadCont').html(result);
					}
					
					$('.Btn').show();
				});
			}, 30);
		}
		return false;
	}
	
	function ExcluirContato(id, tipo){
		if(confirm('Deseja mesmo fazer isto?')==true){		
			$('.local'+tipo).html('<label class="load">Aguarde...</label>');					
			setTimeout(function(){
				$.post('php/contatos.php', {'delcont':'ok', 'id':id}).done(function(result){
					if(result=='ok'){
						CarregarContatos(tipo);
					}else{
						$('.local'+tipo).html(result);
					}					
				});
			}, 30);
		}
	}
	
	window.onload = function(){
		CarregarContatos(1);
		CarregarContatos(2);
	}
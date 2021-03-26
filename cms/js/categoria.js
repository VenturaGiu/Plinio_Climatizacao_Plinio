	
	
	function CarregarCategorias(){
		$.post('php/categorias.php', {'action':'loadcat'}).done(function(R){
			$('.CadCat').html(R);
		});
	}
	
	function CadastrarCategoria(){
		var c = document.cadcat;
		
		if(c.nome.value.length<3 || c.nome.value.length>100){
			alert("Campo nome possui valor ou tamanho inválido!");
			c.nome.focus();
		}else{
			var dados = {
				nome: c.nome.value				
			};
			
			
			$(".Campo").prop('disabled', true);			
			$('.Btn').hide();
			$('.Resp').html('Aguarde...');
			setTimeout(function(){
				$.post('php/categorias.php',{'action':'cadcat', 'dados':dados}).done(function(R){
					if(R==1){
						c.reset();
						$('.Resp').html('<label class="ok">Cadastrado com sucesso!</label>');
					}else{
						$('.Resp').html(R);
					}
					$(".Campo").prop('disabled', false);			
					$('.Btn').show();
					CarregarCategorias();
				});
			},30);
		}
		return false;
	}
	
	
	function DeletarCategoria(id){
		if(confirm('Deseja mesmo fazer isto?')){
			$.post('php/categorias.php', {'action':'delete', 'id':id}).done(function(RD){
				alert(RD);
				CarregarCategorias();
			});
		}
	}
	
	function SavCat(id){
		
		var cat = $('input[name=categoriaedit'+id+']').val();
		
		$('.BtnEdit'+id).html('<button class="Btn" onclick="EditarCategoria('+id+', '+"'"+cat+"'"+')">Editar</button>');
		
		
		$.post('php/categorias.php',{'action':'edit', 'id':id, 'cat':cat}).done(function(red){
			alert(red);
			$('.NomeFix'+id).html(cat);
			$('.LinhaCategoria'+id).html('');
		});
	}
	function EditarCategoria(id, valor){
		
		$('.BtnEdit'+id).html('<button class="Btn" onclick="SavCat('+id+')">Salvar</button>');
		$('.LinhaCategoria'+id).html('<input type="text" name="categoriaedit'+id+'" value="'+valor+'" class="Campo"/>');
	}
	
	CarregarCategorias();
	
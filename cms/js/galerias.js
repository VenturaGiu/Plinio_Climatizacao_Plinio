	
	
	function CarregarGalerias(){
		$.post('php/galerias.php', {'action':'loadgal'}).done(function(R){
			$('.CadCat').html(R);
		});
	}
	
	function CadastrarGaleria(){
		var c = document.cadgal;
		
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
				$.post('php/galerias.php',{'action':'cadgal', 'dados':dados}).done(function(R){
					if(R==1){
						c.reset();
						$('.Resp').html('<label class="ok">Cadastrado com sucesso!</label>');
					}else{
						$('.Resp').html(R);
					}
					$(".Campo").prop('disabled', false);			
					$('.Btn').show();
					CarregarGalerias();
				});
			},30);
		}
		return false;
	}
	
	
	function DeletarGaleria(id){
		if(confirm('Deseja mesmo fazer isto?')){
			$.post('php/galerias.php', {'action':'delete', 'id':id}).done(function(RD){
				alert(RD);
				CarregarGalerias();
			});
		}
	}
	
	function SavGal(id){
		
		var gal = $('input[name=categoriaedit'+id+']').val();
		
		$('.BtnEdit'+id).html('<button class="Btn" onclick="EditarGaleria('+id+', '+"'"+gal+"'"+')">Editar</button>');
		
		
		$.post('php/galerias.php',{'action':'edit', 'id':id, 'gal':gal}).done(function(red){
			alert(red);
			$('.NomeFix'+id).html(gal);
			$('.LinhaCategoria'+id).html('');
		});
	}
	function EditarGaleria(id, valor){
		
		$('.BtnEdit'+id).html('<button class="Btn" onclick="SavGal('+id+')">Salvar</button>');
		$('.LinhaCategoria'+id).html('<input type="text" name="categoriaedit'+id+'" value="'+valor+'" class="Campo"/>');
	}
	
	CarregarGalerias();
	
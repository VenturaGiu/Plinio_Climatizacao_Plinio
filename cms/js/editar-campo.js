
	function SavCam(id, url){
		
		var cat = $('input[name=categoriaedit'+id+']').val();
		
		$('.BtnEdit'+id).html('<button class="Btn" onclick="EditarCampo('+id+', '+"'"+cat+"'"+', '+"'"+url+"'"+')">Editar</button>');
		
		var dados = {
			id: id,
			valor: cat
		}
		$.post('php/'+url, {'action':'edit', 'dados':dados}).done(function(red){
			alert(red);
			$('.NomeFix'+id).html(cat);
			$('.LinhaCategoria'+id).html('');
		});
	}
	function EditarCampo(id, valor, url){
		
		$('.BtnEdit'+id).html('<button class="Btn" onclick="SavCam('+id+', '+"'"+url+"'"+')">Salvar</button>');
		$('.LinhaCategoria'+id).html('<input type="text" name="categoriaedit'+id+'" value="'+valor+'" class="Campo"/>');
	}
	
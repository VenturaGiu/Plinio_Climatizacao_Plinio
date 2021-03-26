
	function SalvarTexto(){
		var c = document.empresa;
		var Dados = {
			empresa: tinyMCE.get('empresa').getContent(),
			frase: c.frase.value
		};
		
		$('.Resp').html('<label class="load">Aguarde...</label>');
		$('.Btn').hide();
		setTimeout(function(){
			$.post('php/textos.php', {'textoempresa':'ok', 'dados':Dados}).done(function(result){
				$('.Resp').html(result);
				$('.Btn').show();
			});
		}, 30);
		return false;
	}
	
	function Politica(){
		var c = document.politica;
		var dados = {
			titmissao: c.titmissao.value,		
			txtmissao: c.txtmissao.value,		
			titvisao: c.titvisao.value,		
			txtvisao: c.txtvisao.value,		
			titvalores: c.titvalores.value,		
			txtvalores: c.txtvalores.value,		
		};
		$('.Resp2').html('<label class="load">Aguarde...</label>');
		$('.Btn').hide();
		setTimeout(function(){
			$.post('php/textos.php', {'textopolitica':'ok', 'dados':dados}).done(function(result){
				$('.Resp2').html('<label class="ok">Texto Salvo!</label>');
				$('.Btn').show();
			});
		}, 30);
		return false;		
	}
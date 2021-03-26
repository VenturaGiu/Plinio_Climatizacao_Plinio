
	function Configuracoes(){
		var c = document.configuracoes;
		var dados = {
			description: c.description.value,
			keywords: c.keywords.value,
			title: c.title.value,
		};
		
		$.post('php/textos.php', {'config':'ok', 'dados':dados}).done(function(result){
			$('.Resp').html(result);
		});
		
		return false;
	}
	
	function CarregarVideo(){
		$('.CarregarVideo').html('<label class="load">carregando...</label>');
		setTimeout(function(){
			$.post('php/video.php', {'carregarvideo':'ok'}).done(function(result){
				$('.CarregarVideo').html(result);
			}); 
		}, 30);
	}
	function CadastrarVideo(){
		var video = document.cadastrarvideo.video.value;
		
		if(video.length<10){
			$('.Resp').html('<label class="erro">Adicione o iframe do vídeo!</label>');
			document.cadastrarvideo.video.focus();
		}else{
			$('.Resp').html('<label class="load">Aguarde...</label>');
			$('.Btn').hide();
			setTimeout(function(){
				$.post('php/video.php', {'cadastrarvid':'ok', 'video':video}).done(function(result){
					if(result=='ok'){
						$('.Resp').html('<label class="ok">Video cadastrado!</label>');
						document.cadastrarvideo.reset();
						CarregarVideo();
					}else{
						$('.Resp').html(result);
					}
					$('.Btn').show();
				});
			}, 50); 
		}
		
		return false;
	}
	
	function ExcluirVideo(id){
		if(confirm('Deseja mesmo fazer isto?')==true){
			setTimeout(function(){
				$.post('php/video.php', {'excluirvideo':'ok', 'id':id}).done(function(result){
					CarregarVideo();
				}); 
			}, 30);
		}
	}
	
	window.onload = function (){
		CarregarVideo();
	}
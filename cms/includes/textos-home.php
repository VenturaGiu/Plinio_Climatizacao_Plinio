<script type="text/javascript">
	<?php for($i=1; $i<=6; $i++): ?>
	function TextoHome<?php echo $i;?>(){
		var c = document.txthome<?php echo $i;?>;
		
		var dados = {
			local: c.local.value,
			nome: c.nome.value,
			titulo: c.titulo.value,
			conteudo: c.conteudo.value,
		};
		
		$.post('php/textos.php', {'edittexth':'ok', 'dados':dados}).done(function(result){
			$('.Resp<?php echo $i;?>').html(result);
		});
		return false;
	}
	<?php endfor;?>
</script>
<section class="Centro CentroConteudo">
		<?php
			include_once('php/class/textos.class.php');
			$conteudo = array();
		?>
		<h2 class="TituloPagina">Textos da Home</h2>
		<?php for($i=1; $i<=2; $i++):?>
		<?php 
			$Texto = new Texto;
			$Texto->CarregarConteudo($conn, 'home', 'textohome'.$i);
		?>
		<form name="txthome<?php echo $i;?>" method="post" enctype="multipart/form-data" onsubmit="return TextoHome<?php echo $i;?>(this)">
			<input type="hidden" name="local" value="home"/>			
			<input type="hidden" name="nome" value="textohome<?php echo $i;?>"/>			
			<div class="Linha">
			<?php if($i!=1){?>
			<input type="text" name="titulo" class="Campo inputcadu" placeholder="Título <?php echo $i;?>: " value="<?php echo $Texto->Titulo;?>"/>
			<?php }else{?>
			<input type="text" name="titulo" class="Campo inputcadu" placeholder="Título <?php echo $i;?>: " value="<?php echo $Texto->Titulo;?>"/>
			<?php //echo $Texto->Titulo;?>
			<?php }?>
			<br/><br/>
				<textarea name="conteudo" class="Campo textarea" placeholder="Conteúdo <?php echo $i;?>:"><?php echo $Texto->Conteudo;?></textarea><br/>			
				<input type="submit" value="Salvar Alterações" class="Btn"/><br/>
				<p class="Resp<?php echo $i;?>">&nbsp;</p>
				<br/><br/>
			</div>
		</form>		
		<?php endfor;?>
		<br/>
</section>
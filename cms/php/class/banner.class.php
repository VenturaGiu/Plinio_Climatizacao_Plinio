<?php
	class Banner
	{
		var $Id;
		var $Imagem;
		var $Url;
		
		function CarregarDados($Conn, $Id){
			$Select = mysqli_query($Conn, "SELECT * FROM banners WHERE id_ba=$Id")or die(mysqli_error($Conn));
			if(mysqli_num_rows($Select)>0){
				$Dados = mysqli_fetch_object($Select);
				
				$this->Id = $Dados->id_ba;
				$this->Nome = $Dados->nome_ba;
				$this->Url = $Dados->url_ba;
				
				return true;
			}else{
				return false;
			}
		}
	}
?>
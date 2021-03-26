<?php
	function LimparGeral($dados){
		foreach($dados as $chave => $valor){
			$Limpando1[$chave]=strip_tags(str_replace('"', '', $valor));
			$Limpando2[$chave]=strip_tags(str_replace("'", '', $Limpando1[$chave]));
		}
		return @$Limpando2;
	}
	
	function EscapeArray($dados){
		foreach($dados as $chave => $valor){
			$Limpando1[$chave]=str_replace('"', '&#34;', $valor);
			$Limpando2[$chave]=str_replace("'", '&#39;', $Limpando1[$chave]);
		}
		return @$Limpando2;
	}
	
	function EscapeString($string){
		$Limpando1=str_replace('"', '&#34;', $string);
		$Limpando2=str_replace("'", '&#39;', $Limpando1);
		return $Limpando2;
	}
?>
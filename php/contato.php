<?php
/* E-mail que receberá os dados do formulário */
include_once('../cms/php/conn.php');
include_once('../cms/php/escapeSQL.php');
$post = LimparGeral($_POST['dados']);
/*****************************************************************
Algumas informações que constarão no cabeçalho do e-mail
******************************************************************/
$cabecalho = "From: \"Contato do Site\" \n"; /* Exibe de onde partiu este formulário. */
$cabecalho .= "Reply-To: ".$post['nome']."<".$post['email'].">\n";
$cabecalho .= "X-Mailer: PHP v".phpversion()."\n"; /* Versão do X-Mailer responsável pelo envio */
$cabecalho .= "Content-type: text/html; charset=utf-8"."\r\n"; /* Responsável pela tranformação do texto em formato HTML */
$cabecalho .= "MIME-Version: 1.0"."\r\n";
/*****************************************************************
Conteúdo do e-mail extraído do formulário
******************************************************************/
$conteudo = "Mensagem enviada por:".$post['nome']. "<br/>";
$conteudo .= "Telefone:" .$post['tel']. "<br/>";
$conteudo .= "Email:".$post['email']. "<br/>";
$conteudo .= "Mensagem:".$post['mensagem']."<br/>";
$conteudo .= "IP:".$_SERVER['REMOTE_ADDR']. "<br/>";
/*****************************************************************
Mensagens de erro e confirmação de envio
******************************************************************/
$SelectEmails = mysqli_query($conn, "SELECT * FROM contato WHERE tipo_cont=2")or die(mysqli_error($conn));
if(mysqli_num_rows($SelectEmails)>0){
		while($Emails = mysqli_fetch_object($SelectEmails)){
			$Retorno = mail($Emails->valor_cont, $post['assunto'], $conteudo, $cabecalho); 			
		}		
		
		echo '<label class="ok">Mensagem enviada!</label>';
		
	}else{
	echo '<label class="erro">Erro na base de e-mails! Contactar o desenvolvedor do site!</label>';
}
	
?>


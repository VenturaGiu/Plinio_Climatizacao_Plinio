<?php
//Valida os campos do formulário
if(     
empty($_POST['nome'])     || 
empty($_POST['email'])    || 
empty($_POST['telefone'])
){
	echo '<script type="text/javascript">alert ("Preencha todos os campos obrigatorios");</script>';
	echo '<script type="text/javascript">location.href="javascript:window.history.go(-1)";</script>';
}else{
	
	//Informações de autenticação SMTP
	$usuario      = "comercial@uniflexcamabox.com.br";
	$senha        = "mudar321uniflex";
	$host         = "mail.uniflexcamabox.com.br";
	$porta        = "25";//25
	
	//Destinatário do e-mail
	$destinatario = "moveisuniflex@hotmail.com";
	
	//Remetente do e-mail (deve ser o mesmo do usuário)
	$remetente    = $usuario;
	
	//Assunto do email
	$assunto      = "[FORMULARIO DE CONTATO: CamaBox] - ".$_POST['assunto'];
	
	//Cópia e cópia oculta
	$cc           = "";
	$bcc          = "leads@issoe.com";
		
	//Guarda os dados do formulário
    $nome        = $_POST['nome'];
	$email       = $_POST['email'];
	$telefone    = $_POST['telefone'];
    //$modelo      = $_POST['modelo'];
	//$ano         = $_POST['ano'];
	
	//Arquivo de anexo(Opicional)
	/*
	if(empty($_FILES['arquivo']['name'])){
	}else{
		if($_FILES['arquivo']['size'] > 10485760){
			echo '<script type="text/javascript">alert ("Arquivo acima do limite (10MB)");</script>';
			echo '<script type="text/javascript">location.href="javascript:window.history.go(-1)";</script>';
		}else{
			$file      = $_FILES['arquivo']['tmp_name'];
			$file_name = $_FILES['arquivo']['name'];
		}
	}*/
	
	//Monta o corpo do e-mail
	$mensagem_email  = "<p>";
	$mensagem_email .= "<strong>Nome: </strong>".$nome."<br />";
	$mensagem_email .= "<strong>E-Mail: </strong>".$email."<br />";
	$mensagem_email .= "<strong>Telefone: </strong>".$telefone."<br />";
    //$mensagem_email .= "<strong>Modelo do veículo: </strong>".$modelo."<br />";
    //$mensagem_email .= "<strong>Ano do veículo: </strong>".$ano."<br />";
	$mensagem_email .= "</p>";
	
	/***
	**************
	- PHP Mailer -
	**************
	***/
	
	//Inclui arquivos do PHP Mailer
	require 'phpmailer/PHPMailerAutoload.php';
	
	//Inicia o PHP Mailer
	$mail = new PHPMailer();
	
	//Configura conexão e SMTP
	$mail->IsSMTP();
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );
	$mail->Host       = $host;
	$mail->SMTPAuth   = true;
	$mail->Username   = $usuario;
	$mail->Password   = $senha;
	$mail->SMTPSecure = 'tls';
	$mail->Port       = $porta;
	$mail->SMTPDebug  = 2;
	
	//Congigurações de formato e charset
	$mail->IsHTML(true);
	$mail->CharSet    = 'UTF-8';
	
	//Destinatário do e-mail
	$mail->AddAddress($destinatario, '');
	//$mail->AddCC($cc, '');
	$mail->AddBCC($bcc, '');
	
	//Remetente do e-mail
	$mail->From       = $remetente;
    $mail->FromName   = '';
	
	//Assunto do e-mail
	$mail->Subject    = $assunto;
	
	//Mensagem do e-mail
	$mail->Body       = $mensagem_email;
	
	//Anexos do e-mail(Opcional)
	//$mail->AddAttachment($file_name, $file);
	
	//Envia o e-mail e valida a operação
	if($mail->Send()){
		echo '<script type="text/javascript">alert ("E-mail enviado com sucesso!");</script>';
		echo '<script type="text/javascript">location.href="obrigado.html";</script>';
	}else{
		echo '<script type="text/javascript">alert ("Falha no envio do e-mail");</script>';
		print($mail->ErrorInfo);
	}
	
	/***
	**************
	- PHP Mailer -
	**************
	***/
}
?>
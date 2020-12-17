<?php

$nome=  utf8_decode($_POST['nome']);
$sobrenome= utf8_decode($_POST['sobrenome']);
$email= utf8_decode($_POST['email']);
$mensagem= ($_POST['mensagem']);

require_once('C:/xampp/htdocs/.../.../public_html/PHPMailer/PHPMailerAutoload.php');

$mail = new PHPMailer;
$mail->isSMTP();
//Configurações do servidor de email
$mail->Host="smtp.gmail.com";
$mail->Port="587";
$mail->SMPTSecure="tls";
$mail->SMTPAuth="true";
$mail->Username=""; // SEU EMAIL
$mail->Password=""; // SUA SENHA
$mail->Body =utf8_decode("
Você recebeu uma mensagem de $nome $sobrenome ($email):
<br><br>

Mensagem:<br>
$mensagem
");
$mail->IsHTML(true);

//Configurações de mensagem
$mail->setFrom($mail->Username,""); //remetente
$mail->addAddress(''); //Destinatário 
$mail->Subject = "Envie um email"; // Assunto do e-mail


if ( $mail->send()){
	echo "E-mail enviado com sucesso!";

}else{
	echo "Falha ao enviar o e-mail: " . $mail->ErrorInfo;
}
?>
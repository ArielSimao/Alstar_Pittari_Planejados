<?php
$nome = $_POST['name'];
$email = $_POST['email'];
$mensagem = $_POST['message'];
?>
<?php
$conteudo .='Nome: ' .$nome;
$conteudo .='<br/>'.'Email: ' .$email;
$conteudo .='<br/>'.'Mensagem: ' .$mensagem;
require_once("class.phpmailer.php"); //caminho do arquivo da classe do phpmailer
$mail = new PHPMailer();
$mail->CharSet = 'UTF-8';
$mail->IsSMTP();		// Ativar SMTP
$mail->SMTPDebug = 1;		// Debugar: 1 = erros e mensagens, 2 = mensagens apenas
$mail->SMTPAuth = true;		// Autenticação ativada
$mail->SMTPSecure = 'ssl';	// SSL REQUERIDO pelo GMail
$mail->Host = 'smtp-mail.outlook.com';	// SMTP utilizado
$mail->Port = 587;  		// A porta 587 deverá estar aberta em seu servidor
$mail->Username = "ariel.consultoria@outlook.com"; // usuário de SMTP
$mail->Password = "abner2005"; // senha de SMTP
$mail->From = "ariel.consultoria@outlook.com";
//coloque aqui o seu correio, para que a autenticação não barre a mensagem
$mail->FromName = "Contato do site Ariel Consultoria";
$mail->AddAddress("ariel.consultoria@outlook.com");
$mail->IsHTML(true); // envio como HTML se 'true'
$mail->Subject = "Mensagem do formulário de Contato";
$mail->Body = $conteudo; 
//Verifica se o e-mail foi enviado
if(!$mail->Send()) {
    echo "<script>
		alert('Mensagem n\u00e3o enviada! Tente novamente ou mais tarde.')
	</script>";
} else {
  	echo "<script>
		alert('Mensagem enviada com sucesso! Em breve estaremos respondendo.');
		window.location.href = 'index.html#three';
	</script>";
}
?>

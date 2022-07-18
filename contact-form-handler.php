<?php 
$errors = '';
$myemail = 'sac@inpilates.com.br';//<-----Put Your email address here.
if(empty($_POST['name'])  || 
   empty($_POST['email']) || 
   empty($_POST['message']))
{
    $errors .= "\n Error: Preencha todos os campos $name $email $message";
}

$name = $_POST['name']; 
$email = $_POST['email']; 
$message = $_POST['message']; 

// if (!preg_match(
// "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i", 
// $email_address))
// {
//     $errors .= "\n Error: Endereço de email inválido";
// }

if( empty($errors))
{
	$to = $myemail; 
	$email_subject = "Envio do formulário de contato: $name";
	$email_body = "Você recebeu uma nova mensagem. ".
	" Aqui estão os detalhes:\n Name: $name \n Email: $email \n Messagem \n $message"; 
	
	$headers = "De: $myemail\n"; 
	$headers .= "Responder para: $email";
	
	mail($to,$email_subject,$email_body,$headers);
	//redirect to the 'thank you' page
	header('Location: contact-form-thank-you.html');
} 
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "https://www.w3.org/TR/html4/loose.dtd"> 
<html>
<head>
	<title>Contato da página</title>
</head>

<body>
<!-- This page is displayed only if there is some error -->
<?php
echo nl2br($errors);
?>


</body>
</html>
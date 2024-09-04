<?php

// Definindo o endereço de e-mail para o qual a mensagem será enviada
$to = "jonne.obr@gmail.com";

// Coletando e sanitizando os dados do formulário
$from = filter_var($_REQUEST['email'], FILTER_SANITIZE_EMAIL);
$name = htmlspecialchars($_REQUEST['name']);
$subject = htmlspecialchars($_REQUEST['subject']);
$number = htmlspecialchars($_REQUEST['number']);
$cmessage = htmlspecialchars($_REQUEST['message']);

// Cabeçalhos do e-mail
$headers = "From: $from\r\n";
$headers .= "Reply-To: $from\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

// Assunto do e-mail
$subject = "Você tem uma nova mensagem.";

// Definindo o logo e o link
$logo = 'img/logo.png';
$link = '#';

// Montando o corpo do e-mail
$body = "<!DOCTYPE html><html lang='pt-BR'><head><meta charset='UTF-8'><title>Express Mail</title></head><body>";
$body .= "<table style='width: 100%;'>";
$body .= "<thead style='text-align: center;'><tr><td style='border:none;' colspan='2'>";
$body .= "<a href='{$link}'><img src='{$logo}' alt=''></a><br><br>";
$body .= "</td></tr></thead><tbody><tr>";
$body .= "<td style='border:none;'><strong>Nome:</strong> {$name}</td>";
$body .= "<td style='border:none;'><strong>Email:</strong> {$from}</td>";
$body .= "</tr>";
$body .= "<tr><td style='border:none;'><strong>Assunto:</strong> {$subject}</td></tr>";
$body .= "<tr><td></td></tr>";
$body .= "<tr><td colspan='2' style='border:none;'>{$cmessage}</td></tr>";
$body .= "</tbody></table>";
$body .= "</body></html>";

// Enviando o e-mail
$send = mail($to, $subject, $body, $headers);

// Verificando se o e-mail foi enviado com sucesso
if ($send) {
    echo "E-mail enviado com sucesso!";
} else {
    echo "Falha ao enviar o e-mail.";
}

?>

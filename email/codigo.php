<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'configuration/Exception.php';
require 'configuration/PHPMailer.php';
require 'configuration/SMTP.php';

/*$forgot = 1;
//PARA FAZER TESTE
$email = 'kemife7390@watrf.com';
$name = 'Fernando';*/

// Preparar o corpo do e-mail com o template HTML
if ($forgot) {
    include 'template/code_password.php';
} else {
    include 'template/codigo_cadastro.php';
}


// Enviar e-mail com PHPMailer
$mail = new PHPMailer(true);
try {
    //CONFIGURAÇÃO DE SERVIDOR DE ENVIOS DE EMAILS
    $mail->isSMTP();
    $mail->isHTML(true);
    $mail->Host = 'mail.paceplayclub.com'; // Substitua pelo seu servidor SMTP
    $mail->CharSet = 'UTF-8';
    $mail->SMTPAuth = true;
    $mail->Username = 'oi@paceplayclub.com'; // Substitua pelo seu email
    $mail->Password = 'zo,38T?]dN"}/E3D'; // Substitua pela sua senha
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    $mail->setFrom('oi@paceplayclub.com', 'PacePlay Club');

    $mail->addAddress($email, $name); // Adicionar destinatário

    $mail->isHTML(true);
    $mail->Subject = 'Seu Código de Verificação';
    $mail->Body    = $emailContent; // Usar o template HTML como corpo do e-mail

    $mail->send();
    //echo json_encode(['status' => 'success', 'message' => 'Usuário cadastrado. Email de verificação enviado.']);
}catch (Exception $e) {
    // Grava o erro no log
    file_put_contents('email_errors.log', date('[Y-m-d H:i:s] ') . $e->getMessage() . "\n", FILE_APPEND);
    // Retorna a mensagem de erro real para a resposta JSON
    //echo json_encode(['status' => 'error', 'message' => 'Erro no envio do e-mail: ' . $e->getMessage()]);
}
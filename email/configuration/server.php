<?php

use PHPMailer\PHPMailer\PHPMailer;


require 'PHPMailer.php';


    $mail->isSMTP();
    $mail->Host = 'smtp.cenariostudio.com.br'; // Substitua pelo seu servidor SMTP
    $mail->SMTPAuth = true;
    $mail->Username = 'adm@cenariostudio.com.br'; // Substitua pelo seu email
    $mail->Password = '(KPayb7/L2/U3c*1'; // Substitua pela sua senha
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    $mail->setFrom('adm@cenariostudio.com.br', 'Cenario Studio');

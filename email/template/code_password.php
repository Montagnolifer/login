<?php
$emailContent = '<!DOCTYPE html>
<html lang="pt">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Email Template</title>
<style>
  body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
  }
  .container {
    max-width: 600px;
    margin: 20px auto;
    background: #fff;
    padding: 20px;
    text-align: center;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
  }
  .header {
    color: #333;
    font-size: 24px;
  }
  .subheader {
    color: #333;
    font-size: 16px;
    margin-top: 5px;
  }
  .content {
    margin-top: 20px;
  }
  .content img {
    max-width: 100%;
    height: auto;
  }
  .offer {
    background: #000;
    color: #fff;
    padding: 20px;
    font-size: 24px;
    margin: 20px 0;
  }
  .code {
    background: #eaeaea;
    padding: 10px;
    font-size: 20px;
    letter-spacing: 2px;
  }
  .footer {
    margin-top: 20px;
    font-size: 14px;
    color: #666;
  }
</style>
</head>
<body>
  <div class="container">
    <img width="220" src="https://cenariostudio.com.br//assets/img/logo.png" alt="">
    <br>
    <div class="subheader">

      Olá '.$name.',<br><br>

      Refazer senha
      <br><br>
    </div>
    <div class="code">'.$verificationCode.'</div>
    <div class="subheader">
    <br><br>
      Para ativar sua conta, insira este código na página de verificação de e-mail que aparecerá quando você fizer login pela próxima vez.
      <br><br>
      Se você não se inscreveu em Cenario Studio, por favor, ignore este e-mail.
      <br><br>
      Estamos ansiosos para ajudá-lo(a) a alcançar seus objetivos com a Cenario Studio. Se você tiver qualquer pergunta ou precisar de ajuda, sinta-se à vontade para entrar em contato conosco.
      <br><br>
      Boas-vindas calorosas,<br>
      Equipe Cenario Studio  

    </div>

    <div class="footer">
      Proin dapibus, leo vitae blandit vehicula, enim lacus molestie urna, in viverra ante orci non quam. Phasellus cursus, ex a ullamcorper posuere.
    </div>
  </div>
</body>
</html>';

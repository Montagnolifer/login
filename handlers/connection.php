<?php
$host = '162.241.2.213'; // Endereço do servidor do banco de dados
$dbname = 'skipca34_paceplay'; // Nome do banco de dados
$user = 'skipca34_paceplay'; // Usuário do banco de dados
$password = '(eM9e_(/e;zVVWn$'; // Senha do banco de dados

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);
    // Configurar o PDO para lançar exceções em caso de erro
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Erro de conexão: " . $e->getMessage();
    exit;
}
?>

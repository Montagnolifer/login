<?php
require_once '../handlers/connection.php'; // Inclua o arquivo de conexão

// Função para sanitizar os dados de entrada
function sanitizeInput($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

// Função para enviar e-mail de verificação
function sendVerificationEmail($email, $verificationCode) {
    $subject = "Verifique sua conta";
    $message = "Seu código de verificação é: " . $verificationCode;
    $headers = "From: noreply@seudominio.com"; // Altere para o seu domínio

    // Envie o e-mail
    return mail($email, $subject, $message, $headers);
}

// Verifica se o formulário foi enviado via método POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = sanitizeInput($_POST['name']);
    $email = sanitizeInput($_POST['email']);
    $whatsapp = sanitizeInput($_POST['whatsapp']);
    $password = sanitizeInput($_POST['password']);
    $confirmPassword = sanitizeInput($_POST['confirm_password']);

    // Validações adicionais
    if (empty($name) || empty($email) || empty($whatsapp) || empty($password)) {
        echo json_encode(['status' => 'error', 'message' => 'Todos os campos são obrigatórios.']);
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(['status' => 'error', 'message' => 'E-mail inválido.']);
        exit;
    }

    if ($password !== $confirmPassword) {
        echo json_encode(['status' => 'error', 'message' => 'As senhas não coincidem.']);
        exit;
    }

    // Verifica se o e-mail ou WhatsApp já estão cadastrados
    try {
        $checkStmt = $conn->prepare("SELECT * FROM users WHERE email = :email OR whatsapp = :whatsapp");
        $checkStmt->bindParam(':email', $email);
        $checkStmt->bindParam(':whatsapp', $whatsapp);
        $checkStmt->execute();

        if ($checkStmt->rowCount() > 0) {
            echo json_encode(['status' => 'error', 'message' => 'E-mail ou WhatsApp já cadastrados.']);
            exit;
        }
    } catch (PDOException $e) {
        echo json_encode(['status' => 'error', 'message' => 'Erro: ' . $e->getMessage()]);
        exit;
    }

    // Gera o hash da senha
    $passwordHash = password_hash($password, PASSWORD_BCRYPT);

    // Gera o código de verificação
    $verificationCode = rand(100000, 999999);

    // Define a data e hora atual
    $currentDate = date('Y-m-d H:i:s');

    // Define o status de verificação como não verificado (0)
    $validationStatus = 0;

    try {
        // Insere os dados no banco de dados
        $stmt = $conn->prepare("INSERT INTO users (name, email, whatsapp, password, date, validation) VALUES (:name, :email, :whatsapp, :password, :date, :validation)");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':whatsapp', $whatsapp);
        $stmt->bindParam(':password', $passwordHash);
        $stmt->bindParam(':date', $currentDate);
        $stmt->bindParam(':validation', $validationStatus);

        if ($stmt->execute()) {
            // Obtém o ID do usuário recém-criado
            $userId = $conn->lastInsertId();

            // Salva o código de verificação na tabela correspondente
            $verificationStmt = $conn->prepare("INSERT INTO verification_codes (id_users, code) VALUES (:id_users, :code)");
            $verificationStmt->bindParam(':id_users', $userId);
            $verificationStmt->bindParam(':code', $verificationCode);
            $verificationStmt->execute();

            // Enviar o e-mail de verificação
            include '../email/codigo.php';

            // Enviar resposta JSON de sucesso
            ob_clean(); // Limpar qualquer saída anterior para evitar problemas de codificação JSON
            echo json_encode(['status' => 'success', 'message' => 'Usuário cadastrado com sucesso.']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Erro ao registrar.']);
        }
    } catch (PDOException $e) {
        echo json_encode(['status' => 'error', 'message' => 'Erro: ' . $e->getMessage()]);
    }
}
?>

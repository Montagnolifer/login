<?php
session_start();
include '../handlers/conexao.php'; // Substitua pelo caminho para seu arquivo de conexão

if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['code'])) {
    $code = $_POST['code'];

    try {
        // Verificar se o código existe
        $stmt = $conn->prepare("SELECT `id_users`, `purpose` FROM `verification_codes` WHERE `code` = :code");
        $stmt->bindParam(':code', $code, PDO::PARAM_STR);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            
            if ($result['purpose'] == 'password_reset') {
                $_SESSION['reset_user_id'] = $result['id_users']; // Armazenar ID do usuário na sessão

                // Após a atualização, remover o código de verificação
                $deleteStmt = $conn->prepare("DELETE FROM `verification_codes` WHERE `code` = :code");
                $deleteStmt->bindParam(':code', $code, PDO::PARAM_STR);
                $deleteStmt->execute();

                echo json_encode(['status' => 'success', 'message' => 'Código validado.', 'reset' => true]);
            } else {
                // Código encontrado, atualizar o plano do usuário
                $updateStmt = $conn->prepare("UPDATE `usuario` SET `plan` = 2 WHERE `id_users` = :id_users");
                $updateStmt->bindParam(':id_users', $result['id_users'], PDO::PARAM_INT);
                $updateStmt->execute();

                // Após a atualização, remover o código de verificação
                $deleteStmt = $conn->prepare("DELETE FROM `verification_codes` WHERE `code` = :code");
                $deleteStmt->bindParam(':code', $code, PDO::PARAM_STR);
                $deleteStmt->execute();

                echo json_encode(['status' => 'success', 'message' => 'Acesso liberado e código verificado removido.']);
            }
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Código inválido.']);
        }
    } catch (PDOException $e) {
        echo json_encode(['status' => 'error', 'message' => 'Erro na verificação: ' . $e->getMessage()]);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Nenhum código fornecido.']);
}
?>
<?php
session_start();
include '../handlers/conexao.php'; 

if (isset($_POST['reset_user_id'], $_POST['n_password'], $_POST['r_password'])) {
    $reset_user_id = $_POST['reset_user_id'];
    $newPassword = $_POST['n_password'];
    $repeatPassword = $_POST['r_password'];

    if ($newPassword !== $repeatPassword) {
        echo json_encode(['success' => false, 'message' => 'As senhas não coincidem.']);
        exit;
    }

    // Atualizar para a nova senha
    $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
    $updateStmt = $conn->prepare("UPDATE `usuario` SET `password` = :password WHERE `id_usuario` = :id_usuario");
    $updateStmt->bindParam(':password', $hashedPassword);
    $updateStmt->bindParam(':id_usuario', $reset_user_id);
    $updateStmt->execute();

    echo json_encode(['success' => true, 'message' => 'Password reset successfully.']);
} else {
    echo json_encode(['success' => false, 'message' => 'Required fields are missing.']);
}
?>

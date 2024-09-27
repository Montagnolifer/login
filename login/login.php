<?php
session_start();
require_once 'connection.php'; // Include the connection file

// Function to sanitize input data
function sanitizeInput($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

// Check if the form was submitted via POST method
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = sanitizeInput($_POST['email']);
    $password = sanitizeInput($_POST['password']);

    // Additional validation
    if (empty($email) || empty($password)) {
        echo "Email and password are required.";
        exit;
    }

    try {
        // Check if the user exists and fetch data
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        // Check if user exists
        if ($stmt->rowCount() > 0) {
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            // Verify the password
            if (password_verify($password, $user['password'])) {
                // Update last access time
                $currentDate = date('Y-m-d H:i:s');
                $updateStmt = $conn->prepare("UPDATE users SET last_access = :last_access WHERE id_users = :id_users");
                $updateStmt->bindParam(':last_access', $currentDate);
                $updateStmt->bindParam(':id_users', $user['id_users']);
                $updateStmt->execute();

                // Set session user array
                $_SESSION['user'] = [
                    'id_user' => $user['id_users'],
                    'email' => $user['email'],
                    'name' => $user['name'],
                    'photo' => $user['photo'],
                    'whatsapp' => $user['whatsapp'],
                    'nick' => $user['nick'],
                ];

                echo "success"; // Return success message
            } else {
                echo "Invalid email or password.";
            }
        } else {
            echo "Invalid email or password.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
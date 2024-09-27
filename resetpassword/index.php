<?php
session_start();
if (!isset($_SESSION['reset_user_id'])) {
    // Redirecionar para outra página ou mostrar mensagem de erro
    header('Location: /forgot/');
    exit;
} else {
    $reset_user_id = $_SESSION['reset_user_id'];
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php include_once '../components/head.php'; ?>
</head>

<body>

    <!-- Login Form -->
    <div class="row align-items-center justify-content-center vh-100">
        <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-6">
            <div class="card rounded-2 border-0 p-5 m-0">

                <div class="card-header border-0 p-0 text-center">
                    <a href="/" class="w-100 d-inline-block mb-5">
                        <img width="250" src="/assets/img/logo.png" alt="img">
                    </a>
                    <h3>Redefinir sua senha</h3>
                    <p class="fs-14 text-dark my-4">Defina sua nova senha.</p>
                </div>

                <div class="card-body p-0">
                    <form class="form-horizontal" method="post">
                        <div class="form-group">
                            <input type="password" class="form-control" name="n_password" value="" placeholder="Nova senha" required>
                        </div>

                        <div class="form-group">
                            <input type="password" class="form-control" name="r_password" value="" placeholder="Repetir senha" required>
                        </div>

                        <button type="button" id="resetPasswordButton" class="btn btn-primary w-100 text-uppercase text-white rounded-2 lh-34 ff-heading fw-bold shadow">Criar senha</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php include_once '../components/js.php'; ?>
    <script>
        $(document).ready(function() {
            $('#resetPasswordButton').click(function() {
                var newPassword = $('input[name="n_password"]').val();
                var repeatPassword = $('input[name="r_password"]').val();
                var resetUserId = <?php echo json_encode($reset_user_id); ?>;

                var data = {
                    n_password: newPassword,
                    r_password: repeatPassword,
                    reset_user_id: resetUserId
                };

                console.log(data); // Para diagnóstico

                $.ajax({
                    url: 'resetpassword.php', // Ajuste conforme necessário
                    type: 'post',
                    data: data,
                    dataType: 'json',
                    success: function(response) {
                        console.log(response); // Para diagnóstico
                        //alert(response.message);
                        if (response.success) {
                            window.location.href = '/login/';
                        }
                    },
                    error: function(xhr, status, error) {
                        console.log(xhr, status, error); // Para diagnóstico
                        alert('Erro na requisição.');
                    }
                });
            });

        });
    </script>

</body>

</html>
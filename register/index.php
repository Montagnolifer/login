<!DOCTYPE html>
<html lang="en">

<head>
    <title>App Home</title>
    <?php include_once '../components/head.php'; ?>
</head>

<body>
    <div class="mobile-container full-center">
        <form id="registerForm">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required><br>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br>

            <label for="whatsapp">WhatsApp:</label>
            <input type="tel" id="whatsapp" name="whatsapp" required><br>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required><br>

            <label for="confirm_password">Confirm Password:</label>
            <input type="password" id="confirm_password" name="confirm_password" required><br>

            <label>
                <input type="checkbox" id="terms" name="terms" required> I accept the terms and conditions
            </label><br>

            <button type="submit">Register</button>
        </form>

        <div id="message"></div>
    </div>
    <?php include_once '../components/js.php'; ?>
    <script>
        $(document).ready(function() {
            // Aplica a máscara no campo WhatsApp
            $('#whatsapp').mask('(00) 00000-0000');

            $('#registerForm').on('submit', function(event) {
                event.preventDefault();

                const password = $('#password').val();
                const confirmPassword = $('#confirm_password').val();

                if (password !== confirmPassword) {
                    $('#message').text('Passwords do not match.').css('color', 'red');
                    return;
                }

                if (!$('#terms').is(':checked')) {
                    $('#message').text('You must accept the terms and conditions.').css('color', 'red');
                    return;
                }

                const $btn = $(this).find('button[type="submit"]'); // Encontra o botão de submit
                const originalText = $btn.text(); // Salva o texto original do botão
                $btn.text('Verificando...'); // Muda o texto para "Verificando..."
                $btn.prop('disabled', true); // Desabilita o botão para evitar múltiplos envios

                // Envia os dados para PHP via AJAX
                $.ajax({
                    url: 'cad_user.php',
                    type: 'POST',
                    data: $(this).serialize(),
                    dataType: 'json',
                    success: function(response) {
                        if (response.status === 'success') {
                            window.location.href = '/verification/';
                        } else {
                            $('#message').text(response.message).css('color', 'red');
                            $btn.text(originalText); // Restaura o texto original
                            $btn.prop('disabled', false); // Habilita o botão novamente
                        }
                    },
                    error: function() {
                        $('#message').text('Error registering. Please try again.').css('color', 'red');
                        $btn.text(originalText); // Restaura o texto original
                        $btn.prop('disabled', false); // Habilita o botão novamente
                    }
                });
            });
        });
    </script>
</body>

</html>
<style>
    .card {
        background: white;
        border-radius: 20px;
        padding: 10px;
        /*box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);*/
        text-align: center;
        width: 100%;
        margin-top: 10px;
    }

    .card img {
        width: 100%;
        border-radius: 20px;
    }
</style>
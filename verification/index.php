<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php include_once '../components/head.php'; ?>
    <style>
        body {
            background-color: #f5f5f5; /* Cor de fundo suave */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .card-login {
            background-color: white;
            border-radius: 20px;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
            padding: 40px;
            width: 100%;
            max-width: 500px;
            text-align: center;
        }

        .card-header img {
            width: 200px;
        }

        .form-control.digit {
            width: 45px;
            height: 50px;
            text-align: center;
            font-size: 20px;
            font-weight: bold;
            border: 1px solid #ced4da;
            border-radius: 10px;
            margin: 5px;
        }

        .btn-primary {
            background-color: #ff4081; /* Cor do botão igual ao da imagem */
            border-color: #ff4081;
            font-size: 16px;
            padding: 15px 0;
            border-radius: 30px;
            cursor: pointer;
        }

        .btn-primary:hover {
            background-color: #e53673; /* Cor do botão ao passar o mouse */
        }

        .text-primary {
            color: #ff4081;
        }

        .text-primary:hover {
            color: #e53673;
        }

        .fw-bold {
            font-weight: bold;
        }

        .text-decoration-underline {
            text-decoration: underline;
        }

        .gap-2 {
            gap: 10px;
        }
    </style>
</head>

<body>
    <!-- Registration Form -->
    <div class="row align-items-center justify-content-center vh-100">
        <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-6">
            <div class="card rounded-2 border-0 p-5 m-0 card-login">

                <div class="card-header border-0 p-0 text-center">
                    <a href="/" class="w-100 d-inline-block mb-4">
                        <img width="250" src="/assets/img/logo.png" alt="img">
                    </a>
                    <h3>Verificação de E-mail</h3>
                    <p class="fs-14 text-dark my-4" id="MsgError">Digite o código de verificação enviado para seu e-mail.</p>
                </div>

                <div class="card-body p-0">
                    <form class="form-horizontal" method="post">
                        <div class="form-group">
                            <label class="form-label text-gray">Insira o código de 6 dígitos enviado por e-mail.</label>
                            <div class="d-flex align-items-center justify-content-center gap-2 flex-nowrap">
                                <input type="text" class="form-control digit" placeholder="0" maxlength="1" required>
                                <input type="text" class="form-control digit" placeholder="0" maxlength="1" required>
                                <input type="text" class="form-control digit" placeholder="0" maxlength="1" required>
                                <input type="text" class="form-control digit" placeholder="0" maxlength="1" required>
                                <input type="text" class="form-control digit" placeholder="0" maxlength="1" required>
                                <input type="text" class="form-control digit" placeholder="0" maxlength="1" required>
                            </div>
                        </div>

                        <button id="verifyCode" type="button" class="btn btn-primary w-100 text-uppercase text-white rounded-2 lh-34 ff-heading fw-bold shadow mt-4">Verificar</button>
                        <p class="mt-4 mb-0 text-center"><a href="/forgot/" class="text-primary fw-bold text-decoration-underline">Não recebeu o código?</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php include_once '../components/js.php'; ?>
    <script>
        $(document).ready(function() {
            // Navegação entre os campos de código
            $('.digit').keyup(function(e) {
                if (e.keyCode === 8 || e.keyCode === 46) { // Se for backspace ou delete
                    $(this).prev('.digit').focus();
                } else if (this.value.length === this.maxLength) {
                    $(this).next('.digit').focus();
                }
            });

            // Verificação do código
            $('#verifyCode').click(function() {
                var $btn = $(this); // Referência ao botão
                var originalText = $btn.text(); // Salva o texto original do botão
                $btn.text('Verificando...'); // Muda o texto para "Verificando..."

                var code = '';
                $('.digit').each(function() {
                    code += $(this).val();
                });

                $.ajax({
                    url: 'verification.php', // URL do seu arquivo PHP de verificação
                    type: 'post',
                    data: {
                        code: code
                    },
                    dataType: 'json', // Espera-se que a resposta seja JSON
                    success: function(response) {
                        if (response.status === 'success') {
                            if (response.reset) {
                                window.location.href = '/resetpassword/'; // Redireciona para redefinição de senha
                            } else {
                                window.location.href = '/login/'; // Redireciona para login
                            }
                        } else if (response.status === 'error') {
                            $('#MsgError').text(response.message); // Exibe a mensagem de erro na div #MsgError
                            $btn.text(originalText); // Restaura o texto original
                        }
                    },
                    error: function(xhr, status, error) {
                        alert('Erro na requisição: ' + error);
                        $btn.text(originalText); // Restaura o texto original em caso de erro
                    }
                });
            });
        });
    </script>
</body>

</html>

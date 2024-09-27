<!DOCTYPE html>
<html lang="en">

<head>
    <title>App Home</title>
    <?php include_once '../components/head.php'; ?>
</head>

<body>
    <div class="mobile-container full-center">
    <form id="loginForm">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br>

        <button type="submit">Login</button>
    </form>

    <div id="message"></div>
    </div>
    <?php include_once '../components/js.php'; ?>
    <script>
        $(document).ready(function() {
            $('#loginForm').on('submit', function(event) {
                event.preventDefault();

                // Send data to PHP via AJAX
                $.ajax({
                    url: 'login.php',
                    type: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        if (response === 'success') {
                            window.location.href = '/home/'; // Redirect after successful login
                        } else {
                            $('#message').text(response).css('color', 'red');
                        }
                    },
                    error: function() {
                        $('#message').text('Error logging in. Please try again.').css('color', 'red');
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
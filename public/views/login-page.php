<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PC Part Picker</title>
    <link rel="stylesheet" href="public/styles/login-page-style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Paytone+One&display=swap" rel="stylesheet">
</head>
<body>
<?php include 'header.php'; ?>
    <div class="container">
        <div class="form-wrapper">
            <div class="form-container">
                <h2>Logowanie</h2>
                <form action="/login" method="post">
                    <div class="error-message" action="login" method="POST">
                        <?php
                            if(isset($message)) {
                                foreach($message as $mess) {
                                    echo $mess."<br>";
                                }
                            }
                        ?>
                    </div>
                    <div class="success-message" action="login" method="POST">
                        <?php
                            if(isset($successMessage)) {
                                foreach($successMessage as $mess) {
                                    echo $mess."<br>";
                                }
                            }
                        ?>
                    </div>
                    <div class="input-group">
                        <label for="username">Podaj nazwę użytkownika</label>
                        <input type="text" id="username" name="username" placeholder="Wprowadź nazwę użytkownika" required>
                    </div>
                    <div class="input-group">
                        <label for="password">Podaj hasło</label>
                        <input type="password" id="password" name="password" placeholder="Wprowadź hasło" required>
                    </div>
                    <button type="submit" class="login-btn">Zaloguj się</button>
                </form>
            </div>
        </div>
    </div>
<footer>
    <p>GamingPcPartPicker by WoyTuloo</p>
</footer>
</body>
</html>

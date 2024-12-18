<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PC Part Picker</title>
    <link rel="stylesheet" href="public/styles/register-page-style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Paytone+One&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <h1><a href="index">PC PART PICKER</a></h1>
        <div class="menu-toggle" id="menu-toggle">
            <div class="bar"></div>
            <div class="bar"></div>
            <div class="bar"></div>
        </div>
        <div class="menu-nolog" id="menu-nolog">
            <ul>
                <li><a href="login">Zaloguj się</a></li>
                <li><a href="register">Zarejestruj się</a></li>
            </ul>
        </div>
    </header>
    <div class="container">
        <div class="form-wrapper">
            <div class="form-container">
                <h2>Rejestracja</h2>
                <form action="/register" method="post">
                    <div class="error-message">
                        <?php
                        if(isset($message)) {
                            foreach($message as $mess) {
                                echo $mess;
                            }
                        }
                        ?>
                    </div>
                    <div class="input-group">
                        <label for="reg-username">Podaj nazwę użytkownika</label>
                        <input type="text" id="reg-username" name="username" placeholder="Wprowadź nazwę użytkownika" required>
                    </div>
                    <div class="input-group">
                        <label for="reg-password">Podaj hasło</label>
                        <input type="password" id="reg-password" name="password" placeholder="Wprowadź hasło" required>
                    </div>
                    <button type="submit" class="register-btn">Zarejestruj się</button>
                </form>
            </div>
        </div>
    </div>
    <footer>
        <p>PcPartPicker by WoyTuloo</p>
    </footer>
</body>
</html>
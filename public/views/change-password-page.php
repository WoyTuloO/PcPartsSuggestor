<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zmiana Hasła</title>
    <link rel="stylesheet" href="public/styles/change-password-style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Paytone+One&display=swap" rel="stylesheet">
</head>
<body>
<?php include 'header.php'; ?>
    <div class="container">
        <div class="form-wrapper">
            <div class="form-container">
                <h2>Zmiana Hasła</h2>
                <?php
                if(isset($message)) {
                    foreach($message as $mess) {
                        echo $mess."<br>";
                    }
                }
                ?>
                <form action="changePassword" method="post">
                    <div class="input-group">
                        <label for="current-password">Obecne Hasło</label>
                        <input type="password" id="oldPassword" name="oldPassword" placeholder="Wprowadź obecne hasło" required>
                    </div>
                    <div class="input-group">
                        <label for="new-password">Nowe Hasło</label>
                        <input type="password" id="newPassword" name="newPassword" placeholder="Wprowadź nowe hasło" required>
                    </div>
                    <div class="input-group">
                        <label for="confirm-password">Potwierdź Nowe Hasło</label>
                        <input type="password" id="newPassword2" name="newPassword2" placeholder="Potwierdź nowe hasło" required>
                    </div>
                    <button type="submit" class="change-password-btn">Zmień Hasło</button>
                </form>
            </div>
        </div>
    </div>
    <footer>
        <p>PcPartPicker by WoyTuloo</p>
    </footer>
</body>
</html>

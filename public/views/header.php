<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GAMING PC PART PICKER</title>
    <link rel="stylesheet" href="public/styles/header-style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Paytone+One&display=swap" rel="stylesheet">

</head>
<body>

<header>
    <h1><a href="index">GAMING PC PART PICKER</a></h1>
    <div class="menu-toggle" id="menu-toggle">
        <div class="bar"></div>
        <div class="bar"></div>
        <div class="bar"></div>
    </div>

    <?php
    if (isset($_SESSION['user_id'])): ?>
        <div class="menu-logged" id="menu">
            <ul>
                <li><a href="myAccount">Moje konto</a></li>
                <li><a href="addSet">Dodaj zestaw</a></li>
                <?php if($_SESSION['is_admin']) echo "<li><a href='usersList'>Lista użytkowników</a></li>"?>
                <li><a href="logout">Wyloguj się</a></li>
            </ul>
        </div>
    <?php else: ?>
        <div class="menu-nolog" id="menu">
            <ul>
                <li><a href="login">Zaloguj się</a></li>
                <li><a href="register">Zarejestruj się</a></li>
            </ul>
        </div>
    <?php endif; ?>
</header>
<script>
    const menuToggle = document.getElementById('menu-toggle');
    const menu = document.getElementById('menu');

    menuToggle.addEventListener('click', () => {
        menu.classList.toggle('active');
    });
</script>
</body>
</html>

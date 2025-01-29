<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PC Part Picker</title>
    <link rel="stylesheet" href="public/styles/my-account-style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Paytone+One&display=swap" rel="stylesheet">
    <script src="public/scripts/my-account-page.js" defer></script>
</head>
<body>
<?php include 'header.php'; ?>

    <div class="container">
        <div class="form-wrapper">
            <div class="form-container">
                <h2>Twoje Konto <?php echo $_SESSION['username']?></h2>
                <button onclick="location.href='changePassword'" class="change-password-btn">Zmień Hasło</button>
                    <div class="sets-section">
                        <h3 class="sets-title">Twoje Zestawy:</h3>
                        <label for="filter-input"></label>
                        <input type="text" id="filter-input" class="filter-input" placeholder="Filtruj po nazwie...">
                        <div class="sets-list">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<footer>
    <p>GamingPcPartPicker by WoyTuloo</p>
</footer>

</body>
</html>

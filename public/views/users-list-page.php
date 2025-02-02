<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Admina</title>
    <link rel="stylesheet" href="public/styles/users-list-style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Paytone+One&display=swap" rel="stylesheet">
    <script src="public/scripts/users-list-script.js" defer></script>
</head>
<body>
<?php include 'header.php'; ?>
<div class="container">
    <div class="form-wrapper">
        <div class="form-container">
            <div class="users-section">
                <?php if (!empty($result)) echo "<h3>Dostępni użytkownicy: </h3>"; ?>

                <form id="searchForm">
                    <div class="search-container">
                        <input type="text" id="searchInput" placeholder="Szukaj użytkownika...">
                    </div>
                </form>

                <div class="users-list">
                    <?php
                    $iterator = 1;
                    if (!empty($result)) {
                        foreach ($result as $user):
                            if($user->getUsername() != $_SESSION['username']):?>

                                <div class="user-item" data-username="<?php echo strtolower($user->getUsername()); ?>">
                                    <h4 class="user-details" id="user<?php echo $iterator; ?>-details">
                                        Username: <?php echo htmlspecialchars($user->getUsername(), ENT_QUOTES, 'UTF-8'); ?><br><br>
                                        Ilość zestawów: <?php echo htmlspecialchars($user->getSetCount(), ENT_QUOTES, 'UTF-8'); ?><br>
                                    </h4>

                                    <div class="user-actions">
                                        <form method="POST" action="/userAdminAction">
                                            <input type="hidden" name="username" value="<?php echo htmlspecialchars($user->getUsername(), ENT_QUOTES, 'UTF-8'); ?>">
                                            <input type="hidden" name="action" value="delete">
                                            <button class="btn btn-danger" type="submit">Usuń</button>
                                        </form>
                                        <form method="POST" action="/userAdminAction">
                                            <input type="hidden" name="username" value="<?php echo htmlspecialchars($user->getUsername(), ENT_QUOTES, 'UTF-8'); ?>">
                                            <input type="hidden" name="action" value="changePermission">
                                            <button class="btn <?php echo $user->getIsAdmin() ? 'btn-primary' : 'btn-admin'; ?>"
                                                    type="submit"
                                                    name="toggle_role"
                                                    value="toggle_role">
                                                <?php echo $user->getIsAdmin() ? 'Zmień na Użytkownika' : 'Zmień na Admina'; ?>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                                <?php
                                $iterator++;
                            endif;
                        endforeach;
                    }?>
                </div>
                <div id="noResultsMessage" style="display: none; text-align: center; margin-top: 20px; color: red;">
                    Nie znaleziono użytkowników spełniających kryteria wyszukiwania.
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

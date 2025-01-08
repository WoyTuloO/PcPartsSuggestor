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
                        <label for="filter-input"></label>
                        <input type="text" id="filter-input" class="filter-input" placeholder="Filtruj po nazwie...">
                        <h3 class="sets-title">Twoje Zestawy</h3>
                        <div class="sets-list">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <p>PcPartPicker by WoyTuloo</p>
    </footer>

    <script>
        function toggleDetails(setId) {
            const details = document.getElementById(setId);

            if (details.style.maxHeight) {
                details.style.maxHeight = null;
            } else {
                details.style.maxHeight = details.scrollHeight + "px";
            }
        }

        async function sendPost(action, setName) {
            try {
                const response = await fetch(action, {
                    method: "POST",
                    headers: { "Content-Type": "application/json" },
                    body: JSON.stringify({ setName })
                });

                const result = await response.json();
                if (result.success) {
                    if (action === 'deleteSet') {
                        location.reload();
                    }
                } else {
                    alert(`Operacja nie powiodła się: ${result.message}`);
                }
            } catch (error) {
                console.error("Błąd żądania:", error);
                alert("Wystąpił problem z żądaniem.");
            }
        }

        function deleteSet(setName) {
            if (confirm(`Czy na pewno chcesz usunąć zestaw: ${setName}?`)) {
                sendPost('deleteSet', setName);
            }
        }

        function editSet(setName) {
            sendPost('editSet', setName);
        }

    </script>
</body>
</html>

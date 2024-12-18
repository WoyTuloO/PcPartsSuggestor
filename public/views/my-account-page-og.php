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
</head>

<body>
<?php include 'header.php'; ?>
<div class="container">
    <div class="form-wrapper">
        <div class="form-container">
            <h2>Twoje Konto <?php echo $_SESSION['username']?></h2>
            <button onclick="location.href='changePassword'" class="change-password-btn">Zmień Hasło</button>
            <div class="sets-section">
                <h3>Twoje Zestawy:</h3>
                <input type="text" id="filter-input" placeholder="Filtruj po nazwie..." oninput="filterSets()">
                <div class="sets-list" id="sets-list">
                    <!-- Zestawy użytkownika będą ładowane dynamicznie -->
                </div>
            </div>
        </div>
    </div>
</div>

<footer>
    <p>PcPartPicker by WoyTuloo</p>
</footer>

<script>
    async function fetchSets() {
        try {
            const response = await fetch('/api/get-user-sets');
            const sets = await response.json();
            displaySets(sets);
        } catch (error) {
            console.error('Błąd podczas pobierania zestawów:', error);
        }
    }

    function displaySets(sets) {
        const setsList = document.getElementById('sets-list');
        setsList.innerHTML = '';

        sets.forEach((set, index) => {
            const setItem = document.createElement('div');
            setItem.classList.add('set-item');

            setItem.innerHTML = `
                    <h4>Zestaw ${index + 1}: ${set.set_name}</h4>
                    <p>Budżet: ${set.total_price} zł</p>
                    <button class="button-view" onclick="toggleDetails('set${index + 1}-details')">Zobacz szczegóły</button>
                    <div class="set-details" id="set${index + 1}-details">
                        <ul>
                            <li>Procesor: ${set.cpu_name} - ${set.cpu_price} zł</li>
                            <li>Karta graficzna: ${set.gpu_name} - ${set.gpu_price} zł</li>
                            <li>Płyta główna: ${set.motherboard_name} - ${set.motherboard_price} zł</li>
                            <li>Pamięć RAM: ${set.ram_name} - ${set.ram_size} - ${set.ram_price} zł</li>
                            <li>Dysk SSD: ${set.storage_name} - ${set.storage_size} - ${set.storage_price} zł</li>
                            <li>Chłodzenie: ${set.cooler_name} - ${set.cooler_price} zł</li>
                            <li>Obudowa: ${set.case_name} - ${set.case_price} zł</li>
                            <li>Zasilacz: ${set.psu_name} - ${set.psu_price} zł</li>
                        </ul>
                    </div>
                `;

            setsList.appendChild(setItem);
        });
    }

    function filterSets() {
        const filterText = document.getElementById('filter-input').value.toLowerCase();
        const sets = document.querySelectorAll('.set-item');

        sets.forEach(set => {
            const setName = set.querySelector('h4').textContent.toLowerCase();
            if (setName.includes(filterText)) {
                set.style.display = '';
            } else {
                set.style.display = 'none';
            }
        });
    }

    fetchSets();
</script>



<body>
<?php include 'header.php'; ?>

<div class="container">
    <div class="form-wrapper">
        <div class="form-container">
            <h2>Twoje Konto <?php echo $_SESSION['username']?></h2>
            <button onclick="location.href='changePassword'" class="change-password-btn">Zmień Hasło</button>
            <div class="sets-section">
                <input type="text" placeholder="Wpisz nazwę zestawu" class="set-name-input">
                <h3>Twoje Zestawy:</h3>
                <div class="sets-list">
                    <?php
                    $iterator = 1;
                    if (!empty($result)) {
                        foreach($result as $set): ?>
                            <div class="set-item">
                                <h4>Zestaw <?php echo $iterator; ?> : <?php echo $set->getName(); ?></h4>
                                <p>Budżet: <?php echo $set->getTotal(); ?> zł</p>
                                <button class="button-view" onclick="toggleDetails('set<?php echo $iterator; ?>-details')">Zobacz szczegóły</button>
                                <div class="set-details" id="set<?php echo $iterator; ?>-details">
                                    <ul>
                                        <li>Procesor: <?php echo $set->getCpu(); ?> - <?php echo $set->getCpuPrice(); ?> zł</li>
                                        <li>Karta graficzna: <?php echo $set->getGpu(); ?> - <?php echo $set->getGpuPrice(); ?> zł</li>
                                        <li>Płyta główna: <?php echo $set->getMotherboard(); ?> - <?php echo $set->getMotherboardPrice(); ?> zł</li>
                                        <li>Pamięć RAM: <?php echo $set->getRam(); ?> - <?php echo $set->getRamSize(); ?> - <?php echo $set->getRamPrice(); ?> zł</li>
                                        <li>Dysk SSD: <?php echo $set->getStorage(); ?> - <?php echo $set->getStorageSize(); ?> - <?php echo $set->getStoragePrice(); ?> zł</li>
                                        <li>Chłodzenie: <?php echo $set->getCooler(); ?> - <?php echo $set->getCoolerPrice(); ?> zł</li>
                                        <li>Obudowa: <?php echo $set->getCase(); ?> - <?php echo $set->getCasePrice(); ?> zł</li>
                                        <li>Zasilacz: <?php echo $set->getPsu(); ?> - <?php echo $set->getPsuPrice(); ?> zł</li>
                                    </ul>
                                    <form method="POST" action="editSet" style="display:inline;">
                                        <input type="hidden" name="setName" value="<?php echo htmlspecialchars($set->getName(), ENT_QUOTES, 'UTF-8'); ?>">
                                        <button type="submit" class="button-edit">Edytuj</button>
                                    </form>
                                    <form method="POST" action="deleteSet" style="display:inline;">
                                        <input type="hidden" name="setName" value="<?php echo htmlspecialchars($set->getName(), ENT_QUOTES, 'UTF-8'); ?>">
                                        <button type="submit" class="button-delete">Usuń</button>
                                    </form>
                                </div>
                            </div>
                            <?php
                            $iterator++;
                        endforeach;}else echo "Brak zestawów do wyświetlenia.<br>"?>
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

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: Arial, sans-serif;
        background-color: rgb(36, 36, 36);
        color: white;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        align-items: center;
        min-height: 100vh;
        margin: 0;
    }

    .set-name-input {
        width: 100%;
        padding: 10px;
        margin-bottom: 20px;
        border-radius: 8px;
        border: 1px solid #ccc;
        font-size: 16px;
    }

    .container {
        width: 80%;
        max-width: 600px;
        min-width: 360px;
        min-height: 900px;
        background-color: rgb(45, 0, 82);
        padding: 20px;
        margin: 20px 0;
        border-radius: 10px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .form-container {
        background-color: #23003d;
        padding: 40px;
        border-radius: 20px;
        width: 100%;
        max-width: 500px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.4);
        border: 1px solid #1e0034;
    }

    h2 {
        font-size: 24px;
        margin-bottom: 20px;
        text-align: center;
        font-weight: bold;
        color: white;
    }

    h3 {
        font-size: 20px;
        margin-bottom: 15px;
        font-weight: bold;
        color: #ddd;
    }

    button.change-password-btn {
        width: 100%;
        padding: 12px;
        margin-bottom: 20px;
        border-radius: 8px;
        border: none;
        background-color: #dc3545;
        color: white;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    button.change-password-btn:hover {
        background-color: #9c1a27;
    }

    .sets-list {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    .set-item {
        background-color: #2d014d;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.4);
        border: 1px solid #1e0034;
    }

    .set-item h4 {
        font-size: 18px;
        margin-bottom: 10px;
        color: #ffde59;
    }

    .set-item p {
        font-size: 16px;
        color: #ddd;
        margin-bottom: 15px;
    }

    .button-view {
        width: 100%;
        padding: 10px;
        border-radius: 8px;
        border: none;
        background-color: #dc3545;
        color: white;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .button-view:hover {
        background-color: #9c1a27;
    }

    .set-details {
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.3s ease;
        background-color: #3d0c60;
        padding: 0 15px;
        border-radius: 8px;
        color: #fff;
    }

    .set-details ul {
        padding: 10px 0;
        list-style-type: none;
    }

    footer {
        background-color: #333;
        color: rgb(97, 97, 97);
        text-align: center;
        width: 100%;
        padding-top: 5px;
    }
</style>
</body>
</html>

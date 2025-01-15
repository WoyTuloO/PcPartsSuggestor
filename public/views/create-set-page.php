<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tworzenie Nowego Zestawu</title>
    <link rel="stylesheet" href="public/styles/create-set-style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Paytone+One&display=swap" rel="stylesheet">

</head>
<body>
<?php include 'header.php'; ?>
<div class="container">
    <div class="form-wrapper">
        <div class="form-container">
            <h2>Tworzenie Nowego Zestawu</h2>
            <form action="/addCollection" method="post">
                <div class="error-message">
                    <?php if(isset($message)) {foreach($message as $mess) {echo $mess."<br>";}}?>
                </div>
                <div class="input-group">
                    <label for="name">Nazwa Zestawu</label>
                    <input type="text" id="name" name="name" placeholder="Wprowadź nazwę zestawu" required>
                </div>
                <div class="input-group">
                    <label for="total">Cena Całkowita</label>
                    <input type="number" id="total" name="total" placeholder="Cena całkowita" readonly>
                </div>

                <h3>Komponenty</h3>
                <div class="component">
                    <label for="cpu">CPU</label>
                    <input type="text" id="cpu" name="cpu" placeholder="Nazwa CPU" required>
                    <input type="number" id="cpuPrice" name="cpuPrice" placeholder="Cena CPU" oninput="updateTotalPrice()" required>
                </div>

                <div class="component">
                    <label for="gpu">GPU</label>
                    <input type="text" id="gpu" name="gpu" placeholder="Nazwa GPU" required>
                    <input type="number" id="gpuPrice" name="gpuPrice" placeholder="Cena GPU" oninput="updateTotalPrice()" required>
                </div>

                <div class="component">
                    <label for="motherboard">Płyta Główna</label>
                    <input type="text" id="motherboard" name="motherboard" placeholder="Nazwa Płyty Głównej" required>
                    <input type="number" id="motherboardPrice" name="motherboardPrice" placeholder="Cena Płyty Głównej" oninput="updateTotalPrice()" required>
                </div>

                <div class="component">
                    <label for="ram">RAM</label>
                    <input type="text" id="ram" name="ram" placeholder="Nazwa RAM" required>
                    <input type="number" id="ramPrice" name="ramPrice" placeholder="Cena RAM" oninput="updateTotalPrice()" required>
                </div>

                <div class="component">
                    <label for="storage">Dysk</label>
                    <input type="text" id="storage" name="storage" placeholder="Nazwa Dysku" required>
                    <input type="number" id="storagePrice" name="storagePrice" placeholder="Cena Dysku" oninput="updateTotalPrice()" required>
                </div>


                <div class="component">
                    <label for="cooler">Chłodzenie</label>
                    <input type="text" id="cooler" name="cooler" placeholder="Nazwa Chłodzenia" required>
                    <input type="number" id="coolerPrice" name="coolerPrice" placeholder="Cena Chłodzenia" oninput="updateTotalPrice()" required>
                </div>

                <div class="component">
                    <label for="case">Obudowa</label>
                    <input type="text" id="case" name="case" placeholder="Nazwa Obudowy" required>
                    <input type="number" id="casePrice" name="casePrice" placeholder="Cena Obudowy" oninput="updateTotalPrice()" required>
                </div>

                <div class="component">
                    <label for="psu">Zasilacz</label>
                    <input type="text" id="psu" name="psu" placeholder="Nazwa Zasilacza" required>
                    <input type="number" id="psuPrice" name="psuPrice" placeholder="Cena Zasilacza" oninput="updateTotalPrice()" required>
                </div>

                <div class="checkpoints">
                    <h4>Przeznaczenie:</h4>
                    <div class="preferences">
                        <input type="radio" name="preferences" id="preferences-aaa" value="aaa" required>
                        <label for="preferences-aaa">Gry AAA</label>
                        <input type="radio" name="preferences" id="preferences-balance" value="balance">
                        <label for="preferences-balance">Balans</label>
                        <input type="radio" name="preferences" id="preferences-esports" value="esports">
                        <label for="preferences-esports">Gry esportowe</label>
                    </div>

                    <h4>Kluczowe:</h4>
                    <div class="priority">
                        <input type="radio" name="priority" id="priority-performance" value="performance" required>
                        <label for="priority-performance">Bazowa wydajność</label>
                        <input type="radio" name="priority" id="priority-balance" value="balance">
                        <label for="priority-balance">Balans</label>
                        <input type="radio" name="priority" id="priority-upscaling" value="upscaling">
                        <label for="priority-upscaling">Jakość upscalingu</label>
                    </div>

                    <h4>Ilość RAM</h4>
                    <div class="ram-options">
                        <input type="radio" name="ramSize" id="ramSize-8gb" value="8gb" required>
                        <label for="ramSize-8gb">8GB</label>
                        <input type="radio" name="ramSize" id="ramSize-16gb" value="16gb">
                        <label for="ramSize-16gb">16GB</label>
                        <input type="radio" name="ramSize" id="ramSize-32gb" value="32gb">
                        <label for="ramSize-32gb">32GB</label>
                        <input type="radio" name="ramSize" id="ramSize-64gb" value="64gb">
                        <label for="ramSize-64gb">64GB</label>
                    </div>

                    <h4>Rozmiar dysku</h4>
                    <div class="storage-options">
                        <input type="radio" name="storageSize" id="storageSize-256gb" value="256gb" required>
                        <label for="storageSize-256gb">256GB</label>
                        <input type="radio" name="storageSize" id="storageSize-512gb" value="512gb">
                        <label for="storageSize-512gb">512GB</label>
                        <input type="radio" name="storageSize" id="storageSize-1tb" value="1tb">
                        <label for="storageSize-1tb">1TB</label>
                        <input type="radio" name="storageSize" id="storageSize-2tb" value="2tb">
                        <label for="storageSize-2tb">2TB</label>
                    </div>
                </div>

                <button type="submit" class="create-set-btn">Utwórz Zestaw</button>
            </form>
        </div>
    </div>
</div>
<footer>
    <p>GamingPcPartPicker by WoyTuloo</p>
</footer>

<script>
    function updateTotalPrice() {
        document.getElementById('total').value = 0;
        let total = 0;
        const prices = document.querySelectorAll('[id$="Price"]');
        prices.forEach(price => { total += parseFloat(price.value) || 0; });
        document.getElementById('total').value = total.toFixed(2);
    }
</script>
</body>
</html>
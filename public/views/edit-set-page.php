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
                <form action="/updateSet" method="post">
                    <input type="hidden" id="prev-set-name" name="prev-set-name" value="<?php echo $set->getName();?>">
                    <h2>Edycja Zestawu: <?php echo $set->getName();?></h2>
                    <div class="input-group">
                        <label for="set-name">Nazwa Zestawu</label>
                        <input type="text" id="set-name" name="set-name" placeholder="Wprowadź nazwę zestawu" value="<?php echo $set->getName();?>" required>
                    </div>
                    <div class="input-group">
                        <label for="total-price">Cena Całkowita</label>
                        <input type="number" id="total-price" name="total-price" placeholder="Cena całkowita" value="<?php echo $set->getTotal();?>" readonly>
                    </div>
                    <h3>Komponenty</h3>

                    <div class="component">
                        <label for="cpu-name">CPU</label>
                        <input type="text" id="cpu-name" name="cpu-name" placeholder="Nazwa CPU" value="<?php echo $set->getCpu();?>" required>
                        <input type="number" id="cpu-price" name="cpu-price" placeholder="Cena CPU" oninput="updateTotalPrice()" value="<?php echo $set->getCpuPrice();?>" required>
                    </div>

                    <div class="component">
                        <label for="gpu-name">GPU</label>
                        <input type="text" id="gpu-name" name="gpu-name" placeholder="Nazwa GPU" value="<?php echo $set->getGpu();?>" required>
                        <input type="number" id="gpu-price" name="gpu-price" placeholder="Cena GPU" oninput="updateTotalPrice()" value="<?php echo $set->getGpuPrice();?>" required>
                    </div>

                    <div class="component">
                        <label for="motherboard-name">Płyta Główna</label>
                        <input type="text" id="motherboard-name" name="motherboard-name" placeholder="Nazwa Płyty Głównej" value="<?php echo $set->getMotherboard();?>" required>
                        <input type="number" id="motherboard-price" name="motherboard-price" placeholder="Cena Płyty Głównej" oninput="updateTotalPrice()" value="<?php echo $set->getMotherboardPrice();?>" required>
                    </div>

                    <div class="component">
                        <label for="ram-name">RAM</label>
                        <input type="text" id="ram-name" name="ram-name" placeholder="Nazwa RAM" value="<?php echo $set->getRam();?>" required>
                        <input type="number" id="ram-price" name="ram-price" placeholder="Cena RAM" oninput="updateTotalPrice()" value="<?php echo $set->getRamPrice();?>" required>
                    </div>

                    <div class="component">
                        <label for="storage-name">Dysk</label>
                        <input type="text" id="storage-name" name="storage-name" placeholder="Nazwa Dysku" value="<?php echo $set->getStorage();?>" required>
                        <input type="number" id="storage-price" name="storage-price" placeholder="Cena Dysku" oninput="updateTotalPrice()" value="<?php echo $set->getStoragePrice();?>" required>
                    </div>

                    <div class="component">
                        <label for="cooler-name">Chłodzenie</label>
                        <input type="text" id="cooler-name" name="cooler-name" placeholder="Nazwa Chłodzenia" value="<?php echo $set->getCooler();?>" required>
                        <input type="number" id="cooler-price" name="cooler-price" placeholder="Cena Chłodzenia" oninput="updateTotalPrice()" value="<?php echo $set->getCoolerPrice();?>" required>
                    </div>

                    <div class="component">
                        <label for="case-name">Obudowa</label>
                        <input type="text" id="case-name" name="case-name" placeholder="Nazwa Obudowy" value="<?php echo $set->getCase();?>" required>
                        <input type="number" id="case-price" name="case-price" placeholder="Cena Obudowy" oninput="updateTotalPrice()" value="<?php echo $set->getCasePrice();?>" required>
                    </div>

                    <div class="component">
                        <label for="psu-name">Zasilacz</label>
                        <input type="text" id="psu-name" name="psu-name" placeholder="Nazwa Zasilacza" value="<?php echo $set->getPsu();?>" required>
                        <input type="number" id="psu-price" name="psu-price" placeholder="Cena Zasilacza" oninput="updateTotalPrice()" value="<?php echo $set->getPsuPrice(); ?>" required>
                    </div>

                    <div class="checkpoints">
                        <h4>Przeznaczenie:</h4>
                        <div class="preferences">
                            <input type="hidden" name="preferences" value="<?php echo $set->getPreferences(); ?>" checked>
                            <input type="radio" name="preferences" id="preferences-aaa" value="aaa">
                            <label for="preferences-aaa">Gry AAA</label>
                            <input type="radio" name="preferences" id="preferences-balance" value="balance">
                            <label for="preferences-balance">Balans</label>
                            <input type="radio" name="preferences" id="preferences-esports" value="esports">
                            <label for="preferences-esports">Gry esportowe</label>
                        </div>

                        <h4>Kluczowe:</h4>
                        <div class="priority">
                            <input type="hidden" name="priority" value="<?php echo $set->getPriority(); ?>" checked>
                            <input type="radio" name="priority" id="priority-performance" value="performance">
                            <label for="priority-performance">Bazowa wydajność</label>
                            <input type="radio" name="priority" id="priority-balance" value="balance">
                            <label for="priority-balance">Balans</label>
                            <input type="radio" name="priority" id="priority-upscaling" value="upscaling">
                            <label for="priority-upscaling">Jakość upscalingu</label>
                        </div>

                        <h4>Ilość RAM</h4>
                        <div class="ram-options">
                            <input type="hidden" name="ramSize" value="<?php echo $set->getRamSize(); ?>" checked>
                            <input type="radio" name="ramSize" id="ramSize-8gb" value="8gb">
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
                            <input type="hidden" name="storageSize" value="<?php echo $set->getStorageSize(); ?>" checked>
                            <input type="radio" name="storageSize" id="storageSize-256gb" value="256gb">
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
        <p>PcPartPicker by WoyTuloo</p>
    </footer>

    <script>
        function updateTotalPrice() {
            document.getElementById('total-price').value = 0;
            let total = 0;
            const prices = document.querySelectorAll('[id$="-price"]');
            prices.forEach(price => { total += parseFloat(price.value) || 0; });
            document.getElementById('total-price').value = total.toFixed(2);
        }
    </script>
</body>
</html>

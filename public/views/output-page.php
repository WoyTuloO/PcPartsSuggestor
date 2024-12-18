<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konto Użytkownika</title>
    <link rel="stylesheet" href="public/styles/output-style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Paytone+One&display=swap" rel="stylesheet">
</head>
<body>
    <?php include 'header.php'; ?>

    <div class="container">
        <div class="form-wrapper">
            <div class="form-container">

                <div class="sets-section">
                    <?php if (!empty($result))
                        echo "<h3>Zestawy o podanych kryteriach: </h3>"
                        ?>
                    <div class="sets-list">
                        <?php
                        $iterator = 1;
                        if (!empty($result)) {
                            foreach($result as $set): ?>
                                <div class="set-item">
                                    <h4>Zestaw <?php echo $iterator; ?> : <?php echo $set->getName(); ?></h4>
                                    <p>Budżet: <?php echo htmlspecialchars($set->getTotal(), ENT_QUOTES, 'UTF-8'); ?> zł</p>
                                    <button class="button-view" onclick="toggleDetails('set<?php echo $iterator; ?>-details')">Zobacz szczegóły</button>
                                    <div class="set-details" id="set<?php echo $iterator; ?>-details">
                                        <ul>
                                            <li>Procesor: <?php echo htmlspecialchars($set->getCpu(), ENT_QUOTES, 'UTF-8'); ?> - <?php echo htmlspecialchars($set->getCpuPrice(), ENT_QUOTES, 'UTF-8'); ?> zł</li>
                                            <li>Karta graficzna: <?php echo htmlspecialchars($set->getGpu(), ENT_QUOTES, 'UTF-8'); ?> - <?php echo htmlspecialchars($set->getGpuPrice(), ENT_QUOTES, 'UTF-8'); ?> zł</li>
                                            <li>Płyta główna: <?php echo htmlspecialchars($set->getMotherboard(), ENT_QUOTES, 'UTF-8'); ?> - <?php echo htmlspecialchars($set->getMotherboardPrice(), ENT_QUOTES, 'UTF-8'); ?> zł</li>
                                            <li>Pamięć RAM: <?php echo htmlspecialchars($set->getRam(), ENT_QUOTES, 'UTF-8'); ?> - <?php echo htmlspecialchars($set->getRamSize(), ENT_QUOTES, 'UTF-8'); ?> - <?php echo htmlspecialchars($set->getRamPrice(), ENT_QUOTES, 'UTF-8'); ?> zł</li>
                                            <li>Dysk SSD: <?php echo htmlspecialchars($set->getStorage(), ENT_QUOTES, 'UTF-8'); ?> - <?php echo htmlspecialchars($set->getStorageSize(), ENT_QUOTES, 'UTF-8'); ?> - <?php echo htmlspecialchars($set->getStoragePrice(), ENT_QUOTES, 'UTF-8'); ?> zł</li>
                                            <li>Chłodzenie: <?php echo htmlspecialchars($set->getCooler(), ENT_QUOTES, 'UTF-8'); ?> - <?php echo htmlspecialchars($set->getCoolerPrice(), ENT_QUOTES, 'UTF-8'); ?> zł</li>
                                            <li>Obudowa: <?php echo htmlspecialchars($set->getCase(), ENT_QUOTES, 'UTF-8'); ?> - <?php echo htmlspecialchars($set->getCasePrice(), ENT_QUOTES, 'UTF-8'); ?> zł</li>
                                            <li>Zasilacz: <?php echo htmlspecialchars($set->getPsu(), ENT_QUOTES, 'UTF-8'); ?> - <?php echo htmlspecialchars($set->getPsuPrice(), ENT_QUOTES, 'UTF-8'); ?> zł</li>

                                        </ul>
                                    </div>
                                </div>
                                <?php
                                $iterator++;
                            endforeach;
                        } else {
                            echo "<p>Brak zestawów spełniających kryteria.</p>";
                        }
                        ?>
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

    </script>
</body>
</html>

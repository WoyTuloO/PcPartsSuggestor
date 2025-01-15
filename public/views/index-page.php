<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PC Part Picker</title>
    <link rel="stylesheet" href="public/styles/main-page-style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Paytone+One&display=swap" rel="stylesheet">
</head>
<body>
<?php include 'header.php'; ?>
<div class="container">
    <main>
        <section class="intro">
            <h2>Witaj w PC Part Picker!</h2>
            <p>Ta aplikacja została stworzona, aby pomóc Ci w szybkim i łatwym dobraniu najlepszych podzespołów do Twojego komputera w oparciu o Twoje preferencje i budżet.</p>
            <section class="how-it-works">
                <h3>Jak to działa?</h3>
                <ul>
                    <li><b>Wprowadź budżet</b> – Podaj kwotę, jaką chcesz przeznaczyć na komputer oraz margines tolerancji, który jesteś w stanie zaakceptować.</li>
                    <li><b>Wybierz swoje preferencje</b> – Określ, w jaki sposób planujesz korzystać z komputera. Chcesz grać w gry e-sportowe, czy może bardziej interesują cię wysokobudżetowe produkcje?</li>
                    <li><b>Zdecyduj, co jest dla Ciebie ważniejsze</b> – Zależy Ci bardziej na bazowej wydajności, jakości upscalingu, czy może na równowadze między nimi.</li>
                    <li><b>Wybierz ilość pamięci RAM</b> – Określ ile pamięci operacyjnej będzie odpowiednie dla Twoich potrzeb.</li>
                    <li><b>Wybierz rozmiar dysku</b> – Określ, ile miejsca na dane będzie Ci potrzebne.</li>
                </ul>
            </section>
        </section>

        <section class="form">
            <form action="/search" method="post">

                <h3>Jaką kwotę chcesz przeznaczyć na komputer:</h3>
                <div class="budget-input">
                    <input type="text" name="corePrice" id="corePrice" placeholder="zł">
                    <input type="text" name="varPrice" id="varPrice" placeholder="+/-">
                </div>

                <h3>Jakie masz preferencje:</h3>
                <div class="preferences">
                    <input type="radio" name="preferences" id="aaa" value="aaa">
                    <label for="aaa">Gry AAA</label>
                    <input type="radio" name="preferences" id="balance" value="balance">
                    <label for="balance">Balans</label>
                    <input type="radio" name="preferences" id="esports" value="esports">
                    <label for="esports">Gry esportowe</label>
                </div>

                <h3>Co jest dla Ciebie ważniejsze?</h3>
                <div class="priority">
                    <input type="radio" name="priority" id="performance" value="performance">
                    <label for="performance">Bazowa wydajność</label>
                    <input type="radio" name="priority" id="balance2" value="balance">
                    <label for="balance2">Balans</label>
                    <input type="radio" name="priority" id="upscaling" value="upscaling">
                    <label for="upscaling">Jakość upscalingu</label>
                </div>

                <h3>Wybierz ilość pamięci RAM:</h3>
                <div class="ram-options">
                    <input type="radio" name="ramSize" id="8gb" value="8gb">
                    <label for="8gb">8GB</label>
                    <input type="radio" name="ramSize" id="16gb" value="16gb">
                    <label for="16gb">16GB</label>
                    <input type="radio" name="ramSize" id="32gb" value="32gb">
                    <label for="32gb">32GB</label>
                    <input type="radio" name="ramSize" id="64gb" value="64gb">
                    <label for="64gb">64GB</label>
                </div>

                <h3>Wybierz rozmiar dysku:</h3>
                <div class="storage-options">
                    <input type="radio" name="storageSize" id="256gb" value="256gb">
                    <label for="256gb">256GB</label>
                    <input type="radio" name="storageSize" id="512gb" value="512gb">
                    <label for="512gb">512GB</label>
                    <input type="radio" name="storageSize" id="1tb" value="1tb">
                    <label for="1tb">1TB</label>
                    <input type="radio" name="storageSize" id="2tb" value="2tb">
                    <label for="2tb">2TB</label>
                </div>

                <button class="submit">Znajdź</button>
            </form>
        </section>
    </main>
</div>

<footer>
    <p>GamingPcPartPicker by WoyTuloo</p>
</footer>
</body>
</html>

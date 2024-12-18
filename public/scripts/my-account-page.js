




const search = document.querySelector('input[id="filter-input"]');
const sets = document.querySelector('.sets-list');


document.addEventListener('DOMContentLoaded', function() {
    const data = {search: search.value};
    fetch("/filterUserSets", {
        method: "POST",
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(data)
    })
        .then(response => response.json()) // Zmiana na .text() zamiast .json()
        .then(result => {
            console.log(result); // Wyświetl odpowiedź w konsoli
            try {
                sets.innerHTML = "";
                loadSets(result);
            } catch (error) {
                console.error("Błąd parsowania JSON:", error);
            }
        });
});


search.addEventListener('keyup', (e) => {
    if(e.key === 'Enter') {
        e.preventDefault()

        const data = {search: search.value};
        fetch("/filterUserSets", {
            method: "POST",
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(data)
        })
            .then(response => response.json()) // Zmiana na .text() zamiast .json()
            .then(result => {
                console.log(result); // Wyświetl odpowiedź w konsoli
                try {
                    sets.innerHTML = "";
                    loadSets(result);
                } catch (error) {
                    console.error("Błąd parsowania JSON:", error);
                }
            });

    }
});

function loadSets(result) {
    let i=0;
    result.forEach(set => {
            console.log(set);
            createSetCard(set, i);
            i++;
        })
}

function createSetCard(set, index) {

    const setItem = document.createElement('div');
    setItem.innerHTML = `
                <div class="set-item">
                    <h4>Zestaw ${index + 1} : ${set.set_name}</h4>
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
                        <form method="POST" action="editSet" style="display:inline;">
                            <input type="hidden" name="setName" value="${set.set_name}">
                            <button type="submit" class="button-edit">Edytuj</button>
                        </form>
                        <form method="POST" action="deleteSet" style="display:inline;">
                            <input type="hidden" name="setName" value="${set.set_name}">
                            <button type="submit" class="button-delete">Usuń</button>
                        </form>
                    </div>
                </div>
                `;
    sets.appendChild(setItem);
}


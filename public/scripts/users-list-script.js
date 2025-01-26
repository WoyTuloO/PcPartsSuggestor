function toggleDetails(setId) {
    const details = document.getElementById(setId);
    if (details.style.maxHeight) {
        details.style.maxHeight = null;
    } else {
        details.style.maxHeight = details.scrollHeight + "px";
    }
}

function filterUsers() {
    const filter = document.getElementById('searchInput').value.toLowerCase().trim();
    const users = document.getElementsByClassName('user-item');
    let visibleCount = 0;

    for (let i = 0; i < users.length; i++) {
        const username = users[i].getAttribute('data-username');
        if (username.includes(filter)) {
            console.log(username);
            console.log(filter);
            users[i].style.display = "";
            visibleCount++;
        } else {
            users[i].style.display = "none";
        }
    }

    const noResultsMessage = document.getElementById('noResultsMessage');
    if (visibleCount === 0) {
        noResultsMessage.style.display = "block";
    } else {
        noResultsMessage.style.display = "none";
    }
}

document.getElementById('searchForm').addEventListener('submit', function(event) {
    event.preventDefault();
    filterUsers();
});
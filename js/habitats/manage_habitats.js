document.addEventListener('DOMContentLoaded', function() {
    fetch('../php/habitat/get_habitats.php')
    .then(response => response.json())
    .then(data => {
        const habitatList = document.getElementById('habitat-list');
        data.forEach(habitat => {
            const habitatItem = document.createElement('li');
            habitatItem.textContent = habitat.nom;
            habitatList.appendChild(habitatItem);
        });
    });
});

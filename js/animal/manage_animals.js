document.addEventListener('DOMContentLoaded', function() {
    fetch('../php/animal/get_animals.php')
    .then(response => response.json())
    .then(data => {
        const animalList = document.getElementById('animal-list');
        data.forEach(animal => {
            const animalItem = document.createElement('li');
            animalItem.textContent = animal.prenom;
            animalList.appendChild(animalItem);
        });
    });
});

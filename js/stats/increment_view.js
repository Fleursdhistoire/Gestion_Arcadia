function incrementAnimalView(animal_id) {
    fetch('../php/stats/increment_animal_view.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `animal_id=${animal_id}`
    })
    .then(response => response.text())
    .then(data => {
        console.log(data);
    });
}

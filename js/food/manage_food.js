document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('manage-food-form').addEventListener('submit', function(event) {
        event.preventDefault();
        const formData = new FormData(this);
        fetch('../php/food/manage_food.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            alert(data);
            this.reset();
        });
    });
});

document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('contact-form').addEventListener('submit', function(event) {
        event.preventDefault();
        const formData = new FormData(this);
        fetch('../php/contact/contact.php', {
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

// js/contact.js

document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('contact-form').addEventListener('submit', function(event) {
        event.preventDefault();
        const formData = new FormData(this);
        fetch('php/contact.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            alert('Merci pour votre message ! Nous vous répondrons bientôt.');
            this.reset();
        })
        .catch(error => {
            alert('Désolé, une erreur est survenue. Veuillez réessayer.');
            console.error('Erreur:', error);
        });
    });
});


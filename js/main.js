document.getElementById('review-form').addEventListener('submit', function(event) {
    event.preventDefault();
    const pseudo = document.getElementById('reviewPseudo').value;
    const reviewText = document.getElementById('reviewText').value;

    if(pseudo && reviewText) {
        const reviewList = document.getElementById('reviews-list').querySelector('ul');
        const newReview = document.createElement('li');
        newReview.className = 'list-group-item';
        newReview.textContent = `Pseudo: ${pseudo} - Avis: ${reviewText}`;
        reviewList.appendChild(newReview);

        // Reset the form
        document.getElementById('review-form').reset();
    } else {
        alert('Veuillez remplir tous les champs.');
    }
});

document.addEventListener('DOMContentLoaded', function() {
    fetch('php/get_avis.php')
        .then(response => response.json())
        .then(data => {
            const reviewsList = document.getElementById('reviews-list');
            data.forEach(review => {
                const listItem = document.createElement('li');
                listItem.className = 'list-group-item';
                listItem.innerHTML = `
                    <p>Pseudo: ${review.pseudo}</p>
                    <p>Commentaire: ${review.commentaire}</p>
                    <button onclick="updateReview(${review.avis_id}, 1)">Approve</button>
                    <button onclick="updateReview(${review.avis_id}, 0)">Disapprove</button>
                `;
                reviewsList.appendChild(listItem);
            });
        });
});

function updateReview(avis_id, isVisible) {
    fetch('php/validate_reviews.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `avis_id=${avis_id}&isVisible=${isVisible}`
    })
    .then(response => response.text())
    .then(data => console.log(data));
}


document.addEventListener('DOMContentLoaded', function() {
    // Animation pour les éléments navbar
    const navLinks = document.querySelectorAll('.nav-link');
    navLinks.forEach(link => {
        link.addEventListener('mouseenter', () => {
            link.style.transform = 'scale(1.1)';
        });
        link.addEventListener('mouseleave', () => {
            link.style.transform = 'scale(1)';
        });
    });

    // Animation pour les cartes
    const cards = document.querySelectorAll('.card');
    cards.forEach(card => {
        card.addEventListener('mouseenter', () => {
            card.style.boxShadow = '0 15px 25px rgba(0, 0, 0, 0.2)';
            card.style.transform = 'translateY(-10px)';
        });
        card.addEventListener('mouseleave', () => {
            card.style.boxShadow = '0 10px 20px rgba(0, 0, 0, 0.2)';
            card.style.transform = 'translateY(0)';
        });
    });
});

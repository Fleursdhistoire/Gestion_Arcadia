document.addEventListener('DOMContentLoaded', function() {
    const reviewForm = document.getElementById('review-form');
    const reviewsList = document.getElementById('reviews-list');

    // Fetch and display existing reviews
    fetch('../php/add_review.php')
        .then(response => response.json())
        .then(reviews => {
            reviews.forEach(review => {
                const reviewItem = document.createElement('div');
                reviewItem.classList.add('card', 'mb-3');
                reviewItem.innerHTML = `
                    <div class="card-body">
                        <h5 class="card-title">${review.pseudo}</h5>
                        <p class="card-text">${review.commentaire}</p>
                    </div>
                `;
                reviewsList.appendChild(reviewItem);
            });
        });

    // Handle form submission
    reviewForm.addEventListener('submit', function(event) {
        event.preventDefault();
        const formData = new FormData(reviewForm);
        fetch('../php/add_review.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(message => {
            alert(message);
            reviewForm.reset();
            location.reload(); // Reload the page to show the new review
        })
        .catch(error => {
            console.error('Error:', error);
        });
    });
});

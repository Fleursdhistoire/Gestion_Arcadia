document.addEventListener('DOMContentLoaded', function() {
    fetch('../php/review/get_reviews.php')
    .then(response => response.json())
    .then(data => {
        const reviewList = document.getElementById('review-list');
        data.forEach(review => {
            const reviewItem = document.createElement('li');
            reviewItem.textContent = review.commentaire;
            reviewList.appendChild(reviewItem);
        });
    });
});

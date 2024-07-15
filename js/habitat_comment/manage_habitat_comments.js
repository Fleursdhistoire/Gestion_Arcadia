document.addEventListener('DOMContentLoaded', function() {
    fetch('../php/habitat_comment/get_habitat_comments.php')
    .then(response => response.json())
    .then(data => {
        const commentList = document.getElementById('comment-list');
        data.forEach(comment => {
            const commentItem = document.createElement('li');
            commentItem.textContent = comment.commentaire;
            commentList.appendChild(commentItem);
        });
    });
});

document.addEventListener('DOMContentLoaded', function() {
    fetch('../php/user/get_users.php')
    .then(response => response.json())
    .then(data => {
        const userList = document.getElementById('user-list');
        data.forEach(user => {
            const userItem = document.createElement('li');
            userItem.textContent = user.username;
            userList.appendChild(userItem);
        });
    });
});

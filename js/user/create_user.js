document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('create-user-form').addEventListener('submit', function(event) {
        event.preventDefault();
        const formData = new FormData(this);
        fetch('../php/user/create_user.php', {
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

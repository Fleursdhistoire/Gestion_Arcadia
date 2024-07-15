document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('login-form').addEventListener('submit', function(event) {
        event.preventDefault();
        const formData = new FormData(this);
        fetch('php/user/login.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
       // .then(data => {
           // alert(data);
           // if (data.includes('Login successful')) {
                // Redirection handled by PHP
         //   }
       // });
    });
});

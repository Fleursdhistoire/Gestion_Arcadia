document.addEventListener('DOMContentLoaded', function() {
    fetch('../php/service/get_services.php')
    .then(response => response.json())
    .then(data => {
        const serviceList = document.getElementById('service-list');
        data.forEach(service => {
            const serviceItem = document.createElement('li');
            serviceItem.textContent = service.nom;
            serviceList.appendChild(serviceItem);
        });
    });
});

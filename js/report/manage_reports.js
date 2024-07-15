document.addEventListener('DOMContentLoaded', function() {
    fetch('../php/report/get_rapport_veterinaire.php')
    .then(response => response.json())
    .then(data => {
        const reportList = document.getElementById('report-list');
        data.forEach(report => {
            const reportItem = document.createElement('li');
            reportItem.textContent = `Animal ID: ${report.animal_id}, Date: ${report.date}`;
            reportList.appendChild(reportItem);
        });
    });
});

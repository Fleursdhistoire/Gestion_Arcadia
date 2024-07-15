document.addEventListener('DOMContentLoaded', function() {
    // Example: Fetch and display some statistics on the admin dashboard
    fetch('../php/stats/get_animal_views.php')
    .then(response => response.json())
    .then(data => {
        const statsContainer = document.getElementById('stats-container');
        data.forEach(stat => {
            const statItem = document.createElement('div');
            statItem.className = 'stat-item';
            statItem.innerHTML = `
                <h5>Animal ID: ${stat.animal_id}</h5>
                <p>Views: ${stat.views}</p>
            `;
            statsContainer.appendChild(statItem);
        });
    });
});

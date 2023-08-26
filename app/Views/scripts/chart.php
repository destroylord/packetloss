<script>
function generateRandomColor() {
    var letters = '0123456789ABCDEF';
    var color = '#';
    for (var i = 0; i < 6; i++) {
        color += letters[Math.floor(Math.random() * 16)];
    }
    return color;
}

fetch('<?= base_url('api/weeks') ?>')
    .then(res => res.json())
    .then(response => getLossData(response.map(week => `Minggu ${week}`)));

function getLossData(weeks) {
    fetch('<?= base_url('api/lossdata') ?>')
        .then(res => res.json())
        .then(response => drawChart(weeks, response));
}

function drawChart(weeks, lossdata) {
    const lineCtx = document.getElementById('lineChart').getContext('2d');

    const lineData = {
        labels: weeks,
        datasets: [{
            label: 'Clear',
            data: lossdata.clears,
            borderColor: generateRandomColor(),
            borderWidth: 2,
            fill: true,
        }, {
            label: 'Spike',
            data: lossdata.spikes,
            borderColor: generateRandomColor(),
            borderWidth: 2,
            fill: true,
        }, {
            label: 'Consecutive',
            data: lossdata.consecutives,
            borderColor: generateRandomColor(),
            borderWidth: 2,
            fill: true,
        }],
    }

    new Chart(lineCtx, {
        type: 'line',
        data: lineData,
        options: {
            scales: {
                y: { beginAtZero: true },
            },
            responsive: true,
        }
    });
}
</script>

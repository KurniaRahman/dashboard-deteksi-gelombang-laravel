import Chart from 'chart.js/auto';

let gyroChart;

// Fungsi untuk mengupdate dashboard dengan data baru
function updateDashboard(data) {
    if (!gyroChart || !data || !data.length) return;

    const latestData = data[data.length - 1];
    document.getElementById('temp-value').textContent = `${latestData.temperature} °C`;
    document.getElementById('pressure-value').textContent = `${latestData.pressure} hPa`;
    document.getElementById('altitude-value').textContent = `${latestData.altitude} m`;
    document.getElementById('current-value').textContent = `${latestData.current} A`;
    
    gyroChart.data.labels = data.map(item => new Date(item.created_at).toLocaleTimeString('it-IT'));
    gyroChart.data.datasets[0].data = data.map(item => item.pitch);
    gyroChart.data.datasets[1].data = data.map(item => item.roll);
    gyroChart.update();
}

// Fungsi untuk mengambil data dari API
async function fetchData() {
    try {
        const response = await fetch('/api/baca-sensor/terbaru');
        const data = await response.json();
        updateDashboard(data);
    } catch (error) {
        console.error('Gagal mengambil data:', error);
    }
}

document.addEventListener('DOMContentLoaded', () => {
    const ctx = document.getElementById('gyroChart');
    if (!ctx) return;

    gyroChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: [],
            datasets: [
                { label: 'Pitch', data: [], borderColor: 'rgb(16, 185, 129)', tension: 0.4 },
                { label: 'Roll', data: [], borderColor: 'rgb(139, 92, 246)', tension: 0.4 }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                x: {
                    title: {
                        display: true,
                        text: 'Waktu'
                    }
                },
                y: {
                    title: {
                        display: true,
                        text: 'Derajat (°)'
                    }
                }
            },
            plugins: {
                legend: {
                    position: 'bottom',
                }
            }
        }
    });

    fetchData();
    setInterval(fetchData, 10000);
});
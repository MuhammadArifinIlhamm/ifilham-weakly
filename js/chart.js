/**
 * Charts and Reporting
 */

const ChartModule = {
    initCharts() {
        this.initGPAChart();
        this.initAttendanceChart();
    },

    initGPAChart() {
        const ctx = document.getElementById('gpaChart');
        if (!ctx) return;

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['< 3.0', '3.0 - 3.5', '3.5 - 3.8', '> 3.8'],
                datasets: [{
                    label: 'Jumlah Mahasiswa',
                    data: [2, 5, 12, 6],
                    backgroundColor: '#0ea5e9',
                    borderRadius: 12
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { display: false } },
                scales: { 
                    y: { beginAtZero: true, grid: { display: false } },
                    x: { grid: { display: false } }
                }
            }
        });
    },

    initAttendanceChart() {
        const ctx = document.getElementById('attendanceChart');
        if (!ctx) return;

        new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Hadir', 'Izin', 'Alfa'],
                datasets: [{
                    data: [85, 10, 5],
                    backgroundColor: ['#10b981', '#f59e0b', '#ef4444'],
                    borderWidth: 0
                }]
            },
            options: {
                responsive: true,
                cutout: '70%',
                plugins: { legend: { position: 'bottom' } }
            }
        });
    }
};

document.addEventListener('DOMContentLoaded', () => {
    if (window.location.pathname.includes('dashboard.html')) {
        ChartModule.initCharts();
    }
});
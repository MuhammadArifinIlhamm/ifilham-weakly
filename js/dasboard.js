/**
 * Dashboard Specific Logic
 * Mengelola interaksi pada halaman dashboard
 */

const DashboardModule = {
    init() {
        console.log('Dashboard Module Loading...');
        this.updateStats();
        this.loadRecentActivity();
    },

    async updateStats() {
        const studentData = await App.fetchData('mahasiswa');
        const lecturerData = await App.fetchData('dosen');
        
        if (studentData) {
            const countElement = document.querySelector('.stat-card:nth-child(1) h2');
            if (countElement) countElement.textContent = studentData.students.length;
        }

        if (lecturerData) {
            const lecturerElement = document.querySelector('.stat-card:nth-child(2) h2');
            if (lecturerElement) lecturerElement.textContent = lecturerData.lecturers.length;
        }
    },

    loadRecentActivity() {
        // Simulasi integrasi sistem informasi akademik
        const activityList = [
            { type: 'sync', msg: 'Sinkronisasi SIAKAD Berhasil', time: '10 min ago' },
            { type: 'security', msg: 'Login terdeteksi dari perangkat baru', time: '1 hour ago' },
            { type: 'update', msg: 'Update Nilai Mata Kuliah Struktur Data', time: '2 hours ago' }
        ];
        
        console.log('Recent System Activities:', activityList);
    }
};

document.addEventListener('DOMContentLoaded', () => {
    if (window.location.pathname.includes('dashboard.html')) {
        DashboardModule.init();
    }
});
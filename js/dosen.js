/**
 * Lecturer Management Module
 */

const LecturerModule = {
    lecturers: [],

    async init() {
        const data = await App.fetchData('dosen');
        if (data) {
            this.lecturers = data.lecturers;
            this.renderGrid();
        }
    },

    renderGrid() {
        const grid = document.getElementById('dosen-grid');
        if (!grid) return;

        grid.innerHTML = '';
        this.lecturers.forEach((l, i) => {
            const card = document.createElement('div');
            card.className = 'card animate-fade';
            card.style.animationDelay = `${i * 0.1}s`;
            card.innerHTML = `
                <div style="display: flex; gap: 1rem; align-items: center;">
                    <div style="width: 60px; height: 60px; border-radius: 50%; background: var(--primary-light); color: var(--primary); display: flex; align-items: center; justify-content: center; font-size: 1.5rem;">
                        ${l.name.includes('Sarah') ? '👩‍🏫' : '👨‍🏫'}
                    </div>
                    <div>
                        <h3 style="font-weight: 800;">${l.name}</h3>
                        <p style="font-size: 0.75rem; color: var(--primary);">${l.title}</p>
                    </div>
                </div>
                <div style="margin-top: 1.5rem; font-size: 0.875rem; color: var(--text-muted);">
                    <p>📧 ${l.email}</p>
                    <p>🔍 Expertise: ${l.expertise}</p>
                </div>
            `;
            grid.appendChild(card);
        });
    }
};

document.addEventListener('DOMContentLoaded', () => {
    if (window.location.pathname.includes('dosen.html')) {
        LecturerModule.init();
    }
});
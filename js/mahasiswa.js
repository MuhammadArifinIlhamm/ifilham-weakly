/**
 * Student Management Module
 */

const StudentModule = {
    students: [],

    async init() {
        const data = await App.fetchData('mahasiswa');
        this.students = data.students;
        this.renderTable();
    },

    renderTable(data = this.students) {
        const tableBody = document.getElementById('student-table-body');
        if (!tableBody) return;

        tableBody.innerHTML = '';
        data.forEach((s, i) => {
            const tr = document.createElement('tr');
            tr.className = 'animate-fade';
            tr.style.animationDelay = `${i * 0.05}s`;
            tr.innerHTML = `
                <td style="padding: 1.25rem 1rem;"><div style="display: flex; gap: 1rem; align-items: center;">
                    <img src="${s.photo}" style="width: 40px; height: 40px; border-radius: 10px;">
                    <div><p style="font-weight: 700;">${s.name}</p><p style="font-size: 0.75rem; color: #64748b;">${s.email}</p></div>
                </div></td>
                <td style="padding: 1.25rem 1rem; font-family: monospace;">${s.nim}</td>
                <td style="padding: 1.25rem 1rem;">${s.semester}</td>
                <td style="padding: 1.25rem 1rem; font-weight: 700; color: #0ea5e9;">${s.gpa}</td>
                <td style="padding: 1.25rem 1rem;"><span class="badge ${s.status === 'Aktif' ? 'badge-success' : 'badge-primary'}">${s.status}</span></td>
                <td style="padding: 1.25rem 1rem; text-align: right;">
                    <button class="btn" style="padding: 0.5rem; background: #f1f5f9; color: #64748b;" onclick="StudentModule.edit('${s.id}')">✏️</button>
                    <button class="btn" style="padding: 0.5rem; background: #fee2e2; color: #ef4444; margin-left: 0.5rem;" onclick="StudentModule.delete('${s.id}')">🗑️</button>
                </td>
            `;
            tableBody.appendChild(tr);
        });
    },

    search(query) {
        const filtered = this.students.filter(s => 
            s.name.toLowerCase().includes(query.toLowerCase()) || 
            s.nim.includes(query)
        );
        this.renderTable(filtered);
    },

    delete(id) {
        if (confirm('Delete this student record?')) {
            this.students = this.students.filter(s => s.id !== id);
            App.notification('Data Removed', 'Student data successfully deleted');
            this.renderTable();
        }
    },

    edit(id) {
        App.notification('Feature Info', 'Editing student ' + id + ' is currently in simulation mode');
    }
};

document.addEventListener('DOMContentLoaded', () => {
    if (window.location.pathname.includes('mahasiswa.html')) {
        StudentModule.init();
    }
});

window.handleGlobalSearch = (e) => {
    if (StudentModule.search) StudentModule.search(e.target.value);
};
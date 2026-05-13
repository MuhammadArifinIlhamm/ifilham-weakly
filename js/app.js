/**
 * SIAMAS - Global App Logic
 */

const App = {
    init() {
        console.log('SIAMAS Integrated System Initialized');
        this.checkAuth();
        this.loadBreadcrumbs();
    },

    checkAuth() {
        const user = localStorage.getItem('siamas_user');
        const isLoginPage = window.location.pathname.includes('login.html');
        
        if (!user && !isLoginPage) {
            window.location.href = 'login.html';
        } else if (user && isLoginPage) {
            window.location.href = 'dashboard.html';
        }
    },

    loadBreadcrumbs() {
        const container = document.getElementById('breadcrumb-container');
        if (!container) return;
        
        const path = window.location.pathname.split('/').pop().replace('.html', '');
        const capitalized = path.charAt(0).toUpperCase() + path.slice(1);
        
        container.innerHTML = `
            <div style="display: flex; gap: 0.5rem; color: #64748b; font-size: 0.875rem; margin-bottom: 0.5rem;">
                <a href="dashboard.html" style="text-decoration: none; color: #64748b;">Home</a>
                <span>/</span>
                <span style="color: #0ea5e9; font-weight: 600;">${capitalized}</span>
            </div>
        `;
    },

    async fetchData(module) {
        try {
            const response = await fetch(`json/${module}.json`);
            return await response.json();
        } catch (error) {
            console.error(`Error fetching ${module}:`, error);
            return null;
        }
    },

    notification(title, message, type = 'info') {
        const toast = document.createElement('div');
        toast.className = `animate-fade glass-morphism`;
        toast.style.cssText = `
            position: fixed; top: 2rem; right: 2rem; z-index: 9999;
            padding: 1rem 1.5rem; border-radius: 1rem; border-left: 4px solid ${type === 'error' ? '#ef4444' : '#10b981'};
            box-shadow: 0 10px 15px -3px rgba(0,0,0,0.1); display: flex; flex-direction: column; gap: 0.25rem;
        `;
        toast.innerHTML = `
            <strong style="font-size: 0.875rem;">${title}</strong>
            <p style="font-size: 0.75rem; color: #64748b;">${message}</p>
        `;
        document.body.appendChild(toast);
        setTimeout(() => toast.remove(), 4000);
    }
};

window.logout = () => {
    localStorage.removeItem('siamas_user');
    window.location.href = 'login.html';
};

document.addEventListener('DOMContentLoaded', () => App.init());
/**
 * Authentication Logic
 */

const Auth = {
    async login(username, password) {
        const data = await App.fetchData('users');
        if (!data) return;

        const user = data.users.find(u => u.username === username && u.password === password);
        
        if (user) {
            localStorage.setItem('siamas_user', JSON.stringify({
                name: user.name,
                role: user.role,
                loginTime: new Date().getTime()
            }));
            App.notification('Success', 'Welcome back to SIAMAS!');
            setTimeout(() => window.location.href = 'dashboard.html', 1000);
        } else {
            App.notification('Error', 'Invalid username or password', 'error');
        }
    }
};

const loginForm = document.getElementById('login-form');
if (loginForm) {
    loginForm.addEventListener('submit', (e) => {
        e.preventDefault();
        const user = e.target.username.value;
        const pass = e.target.password.value;
        Auth.login(user, pass);
    });
}
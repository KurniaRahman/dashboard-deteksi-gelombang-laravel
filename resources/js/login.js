import axios from 'axios';

const form = document.getElementById('login-form');
const errorMessage = document.getElementById('error-message');

if (form) {
    form.addEventListener('submit', async (e) => {
        e.preventDefault();
        errorMessage.textContent = '';
        const email = document.getElementById('email').value;
        const password = document.getElementById('password').value;

        try {
            // Menggunakan endpoint dari web.php
            const response = await axios.post('/login', { email, password });

            if (response.status === 200) {
                window.location.href = '/'; // Arahkan ke dashboard
            }
        } catch (error) {
            errorMessage.textContent = 'Email atau password salah. Coba lagi.';
        }
    });
}
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Monitoring Gelombang</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white font-sans overflow-hidden">
    <div class="min-h-screen flex">
        
        <!-- Background Image Section -->
        <div class="w-1/2 relative hidden md:block ml-4">
            <div class="absolute inset-0 m-4 rounded-3xl overflow-hidden">
                <img src="{{ asset('images/bg-deteksi-gelombang.jpg') }}" alt="Deskripsi Gambar"
                     class="w-full h-full object-cover">
                <!-- Overlay untuk efek visual -->
                <div class="absolute inset-0 bg-gradient-to-r from-cyan-600/20 to-blue-600/20"></div>

                <!-- Welcome text di tengah gambar -->
                <div class="absolute inset-0 flex items-center justify-center">
                    <div class="text-center text-white max-w-md px-8">
                        <h1 class="text-4xl font-bold mb-4 drop-shadow-lg">Sistem Monitoring Gelombang Air</h1>
                        <p class="text-lg opacity-90 drop-shadow">Platform Website untuk monitoring gelombang air berbasis IoT</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Form Section -->
        <div class="w-full md:w-1/2 bg-white flex flex-col justify-center px-8 lg:px-16">
            <div class="max-w-md mx-auto w-full">
                <!-- Header -->
                <div class="text-center mb-10">
                    <div class="mb-6">
                        <div class="w-16 h-16 bg-gradient-to-r from-cyan-500 to-blue-500 rounded-full flex items-center justify-center mx-auto mb-4 shadow-lg">
                            <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                    </div>
                    <h2 class="text-3xl font-bold text-slate-800 mb-2">Selamat Datang Kembali</h2>
                    <p class="text-slate-500 text-base">Silahkan Masukkan Email dan Password Anda</p>
                </div>

                <!-- Form -->
                <form id="login-form" class="space-y-6">
                    <div>
                        <label for="email" class="block mb-3 text-sm font-semibold text-slate-700">Email Address</label>
                        <div class="relative">
                            <input type="email" 
                                   id="email" 
                                   class="bg-slate-50 border border-slate-300 text-slate-900 text-base rounded-xl focus:ring-2 focus:ring-cyan-500 focus:border-cyan-500 block w-full p-4 pl-12 transition-all duration-200 hover:bg-slate-100" 
                                   placeholder="nama@email.com"
                                   required>
                            <svg class="w-5 h-5 text-slate-400 absolute left-4 top-4" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path>
                                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                            </svg>
                        </div>
                    </div>

                    <div>
                        <label for="password" class="block mb-3 text-sm font-semibold text-slate-700">Password</label>
                        <div class="relative">
                            <input type="password" 
                                   id="password" 
                                   class="bg-slate-50 border border-slate-300 text-slate-900 text-base rounded-xl focus:ring-2 focus:ring-cyan-500 focus:border-cyan-500 block w-full p-4 pl-12 transition-all duration-200 hover:bg-slate-100" 
                                   placeholder="Masukkan password"
                                   required>
                            <svg class="w-5 h-5 text-slate-400 absolute left-4 top-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                    </div>

                    <button type="submit" 
                            class="w-full text-white bg-gradient-to-r from-cyan-600 to-blue-600 hover:from-cyan-700 hover:to-blue-700 focus:ring-4 focus:outline-none focus:ring-cyan-300 font-semibold rounded-xl text-base px-6 py-4 text-center transition-all duration-200 transform hover:scale-[1.02] active:scale-[0.98] shadow-lg">
                        Masuk ke Dashboard
                    </button>
                </form>

                <!-- Error Message -->
                <div id="error-message" class="mt-6 text-red-500 text-sm text-center hidden p-3 bg-red-50 border border-red-200 rounded-lg"></div>


            <!-- Copyright footer -->
            <div class="absolute bottom-8 left-8 right-8 md:left-auto md:right-8 md:w-1/2 text-center md:text-right">
                <p class="text-xs text-slate-400">© 2025 Monitoring Gelombang. All rights reserved.</p>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        const form = document.getElementById('login-form');
        const errorMessage = document.getElementById('error-message');

        if (form) {
            form.addEventListener('submit', async (e) => {
                e.preventDefault();
                
                // Clear previous error and hide error message
                errorMessage.textContent = '';
                errorMessage.classList.add('hidden');
                
                const email = document.getElementById('email').value;
                const password = document.getElementById('password').value;
                
                // Show loading state
                const submitButton = form.querySelector('button[type="submit"]');
                const originalText = submitButton.textContent;
                submitButton.textContent = 'Sedang masuk...';
                submitButton.disabled = true;
                submitButton.classList.add('opacity-75', 'cursor-not-allowed');

                try {
                    // Menggunakan endpoint dari web.php
                    const response = await axios.post('/login', { 
                        email: email, 
                        password: password 
                    });

                    if (response.status === 200) {
                        // Show success message briefly before redirect
                        submitButton.textContent = 'Berhasil! Mengarahkan...';
                        submitButton.classList.remove('from-cyan-600', 'to-blue-600', 'opacity-75');
                        submitButton.classList.add('from-green-600', 'to-green-700');
                        
                        setTimeout(() => {
                            window.location.href = '/'; // Arahkan ke dashboard
                        }, 1000);
                    }
                } catch (error) {
                    // Reset button state
                    submitButton.textContent = originalText;
                    submitButton.disabled = false;
                    submitButton.classList.remove('opacity-75', 'cursor-not-allowed');
                    
                    // Show error message
                    errorMessage.textContent = 'Email atau password salah. Silakan coba lagi.';
                    errorMessage.classList.remove('hidden');
                    
                    console.error('Login error:', error);
                }
            });
        }

        // Input animation effects
        const inputs = document.querySelectorAll('input[type="email"], input[type="password"]');
        inputs.forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.classList.add('scale-[1.02]');
                this.classList.add('shadow-md');
            });
            
            input.addEventListener('blur', function() {
                this.parentElement.classList.remove('scale-[1.02]');
                this.classList.remove('shadow-md');
            });
        });

        // Keyboard navigation enhancement
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Enter') {
                const focusedElement = document.activeElement;
                if (focusedElement.id === 'email') {
                    document.getElementById('password').focus();
                }
            }
        });
    </script>
</body>
</html>
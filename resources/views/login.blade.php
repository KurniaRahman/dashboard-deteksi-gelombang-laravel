<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Monitoring Gelombang</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-100 font-sans flex items-center justify-center min-h-screen">
    <div class="bg-white rounded-2xl shadow-lg flex w-full max-w-4xl">
        <div class="w-1/2 p-4 hidden md:block">
            <img src="https://storage.googleapis.com/gemini-prod-us-west1-assets/images/ec/5a/ec5ac55519cb0735.jpeg" alt="Ilustrasi" class="rounded-xl object-cover w-full h-full">
        </div>
        <div class="w-full md:w-1/2 p-8 flex flex-col justify-center">
            <div class="text-center mb-8">
                <h2 class="text-2xl font-bold text-slate-800">Login</h2>
                <p class="text-slate-500">Silahkan masukkan email dan password</p>
            </div>
            <form id="login-form">
                <div class="mb-4">
                    <label for="email" class="block mb-2 text-sm font-medium text-slate-700">Email Address</label>
                    <input type="email" id="email" class="bg-slate-50 border border-slate-300 text-slate-900 text-sm rounded-lg focus:ring-cyan-500 focus:border-cyan-500 block w-full p-2.5" required>
                </div>
                <div class="mb-6">
                    <label for="password" class="block mb-2 text-sm font-medium text-slate-700">Password</label>
                    <input type="password" id="password" class="bg-slate-50 border border-slate-300 text-slate-900 text-sm rounded-lg focus:ring-cyan-500 focus:border-cyan-500 block w-full p-2.5" required>
                </div>
                <button type="submit" class="w-full text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:outline-none focus:ring-cyan-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Login</button>
            </form>
            <div id="error-message" class="mt-4 text-red-500 text-sm text-center"></div>
        </div>
    </div>
</body>
</html>
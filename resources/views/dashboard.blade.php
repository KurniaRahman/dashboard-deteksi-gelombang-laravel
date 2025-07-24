<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Monitoring Gelombang</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Flowbite -->
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.2.0/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.2.0/dist/flowbite.min.js"></script>

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="bg-gradient-main font-sans">
    <main class="p-4 sm:p-6 lg:p-8 max-w-7xl mx-auto">
        <h1 class="text-3xl font-bold text-slate-800 mb-6">
            Monitoring Gelombang Air
        </h1>
        <div class="bg-white rounded-xl shadow-md p-4 sm:p-6 mb-6">
            <h2 class="text-lg font-semibold text-slate-700 mb-4">Grafik Gelombang Air</h2>
            <div class="relative h-96">
                <canvas id="gyroChart"></canvas>
            </div>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="bg-white rounded-xl shadow-md p-5 flex items-center space-x-4">
                <div class="bg-blue-100 rounded-full p-3"><svg width="29" height="29" viewBox="0 0 29 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M14.4999 2.41663C15.5028 2.41654 16.4677 2.80015 17.1968 3.48879C17.9259 4.17743 18.3639 5.11891 18.421 6.12017L18.427 6.34371L18.4282 15.9524L18.5249 16.0358C19.65 17.0404 20.3586 18.4296 20.5114 19.9302L20.5343 20.2347L20.5416 20.5416C20.5418 21.5371 20.296 22.5171 19.8261 23.3947C19.3562 24.2722 18.6767 25.0201 17.8481 25.5717C17.0195 26.1234 16.0674 26.4618 15.0765 26.5568C14.0856 26.6518 13.0866 26.5005 12.1683 26.1163C11.25 25.7322 10.4408 25.127 9.81271 24.3548C9.18462 23.5825 8.75709 22.667 8.56812 21.6896C8.37914 20.7123 8.43459 19.7034 8.72952 18.7527C9.02446 17.8019 9.54974 16.9388 10.2587 16.24L10.4762 16.0345L10.5716 15.9524L10.5728 6.34371C10.5726 5.37862 10.9278 4.44725 11.5706 3.72736C12.2134 3.00747 13.0987 2.54948 14.0577 2.44079L14.2776 2.42267L14.4999 2.41663ZM14.4999 4.22913C13.969 4.22917 13.4576 4.4289 13.0672 4.78864C12.6768 5.14838 12.436 5.64181 12.3926 6.17092L12.3853 6.34371V16.8502L12.012 17.1208C11.2986 17.6397 10.7653 18.3687 10.4868 19.2057C10.2083 20.0427 10.1985 20.9458 10.4588 21.7887C10.7191 22.6316 11.2364 23.3719 11.9383 23.9062C12.6402 24.4404 13.4916 24.7418 14.3734 24.7682C15.2551 24.7945 16.123 24.5445 16.8556 24.0531C17.5882 23.5618 18.1488 22.8536 18.4589 22.0278C18.769 21.202 18.8132 20.2999 18.5851 19.4477C18.3571 18.5956 17.8684 17.8361 17.1873 17.2755L16.9879 17.122L16.6169 16.8502L16.6145 6.34371C16.6145 5.78289 16.3917 5.24503 15.9952 4.84847C15.5986 4.45191 15.0607 4.22913 14.4999 4.22913ZM14.4999 9.66663C14.7403 9.66663 14.9708 9.76211 15.1407 9.93206C15.3107 10.102 15.4062 10.3325 15.4062 10.5729V17.6598C16.095 17.8763 16.6835 18.3323 17.0652 18.9452C17.4469 19.5581 17.5965 20.2874 17.487 21.0011C17.3775 21.7148 17.016 22.3657 16.4681 22.836C15.9202 23.3062 15.222 23.5648 14.4999 23.5648C13.7779 23.5648 13.0797 23.3062 12.5318 22.836C11.9838 22.3657 11.6224 21.7148 11.5129 21.0011C11.4033 20.2874 11.5529 19.5581 11.9346 18.9452C12.3163 18.3323 12.9048 17.8763 13.5937 17.6598V10.5729C13.5937 10.3325 13.6891 10.102 13.8591 9.93206C14.0291 9.76211 14.2596 9.66663 14.4999 9.66663Z" fill="#2563eb"/>
                </svg></div>
                <div>
                    <p class="text-sm text-slate-500">Suhu Air</p>
                    <p id="temp-value" class="text-2xl font-bold text-slate-900">29.5 °C</p>
                </div>
            </div>
            <div class="bg-white rounded-xl shadow-md p-5 flex items-center space-x-4">
                <div class="bg-slate-100 rounded-full p-3"><svg class="w-6 h-6 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z"></path></svg></div>
                <div>
                    <p class="text-sm text-slate-500">Tekanan Udara</p>
                    <p id="pressure-value" class="text-2xl font-bold text-slate-900">1230 hPa</p>
                </div>
            </div>
            <div class="bg-white rounded-xl shadow-md p-5 flex items-center space-x-4">
                <div class="bg-green-100 rounded-full p-3"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M3 17L8 10L12 16L16 11L21 17H3Z" stroke="#16a34a" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M8 6L10 9L12 7" stroke="#16a34a" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg></div>
                <div>
                    <p class="text-sm text-slate-500">Ketinggian (Altitude)</p>
                    <p id="altitude-value" class="text-2xl font-bold text-slate-900">600 m</p>
                </div>
            </div>
            <div class="bg-white rounded-xl shadow-md p-5 flex items-center space-x-4">
                <div class="bg-yellow-100 rounded-full p-3"><svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg></div>
                <div>
                    <p class="text-sm text-slate-500">Arus Listrik</p>
                    <p id="current-value" class="text-2xl font-bold text-slate-900">1.2 A</p>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
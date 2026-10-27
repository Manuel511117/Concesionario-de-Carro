<!DOCTYPE html>
<html lang="es" class="scroll-smooth dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apex Motors | Concesionario de Autos de Lujo</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: { extend: { colors: { brand: { red: '#ef4444', blue: '#3b82f6', dark: '#090d16' } }, fontFamily: { sans: ['Inter', 'sans-serif'] } } }
        }
    </script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { font-family: 'Inter', sans-serif; background-color: #090d16; color: #f3f4f6; }
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #090d16; }
        ::-webkit-scrollbar-thumb { background: #1f2937; border-radius: 4px; }
        ::-webkit-scrollbar-thumb:hover { background: #ef4444; }
        input[type=range] { accent-color: #ef4444; }
    </style>
</head>
<body class="antialiased min-h-screen flex flex-col justify-between selection:bg-red-500 selection:text-white">
    <div id="toastContainer" class="fixed bottom-5 right-5 z-50 flex flex-col gap-3 max-w-sm"></div>

    <header class="sticky top-0 z-40 backdrop-blur-md bg-slate-950/85 border-b border-slate-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-20 flex items-center justify-between">
            <a href="index.php" class="flex items-center gap-3 group">
                <div class="w-10 h-10 rounded-xl bg-gradient-to-tr from-red-600 to-blue-600 flex items-center justify-center text-white shadow-lg">
                    <i class="fa-solid fa-gauge-high text-xl"></i>
                </div>
                <span class="text-2xl font-extrabold text-white">APEX<span class="text-red-500">MOTORS</span></span>
            </a>
            <nav class="hidden md:flex items-center gap-8 font-medium text-sm text-slate-300">
                <a href="#catalogo" class="hover:text-red-500">Catálogo</a>
                <a href="#financiamiento" class="hover:text-red-500">Financiamiento</a>
                <a href="#vender" class="hover:text-red-500">Vende tu Auto</a>
                <a href="#nosotros" class="hover:text-red-500">Nosotros</a>
                <a href="#contacto" class="hover:text-red-500">Contacto</a>
            </nav>
            <div class="hidden sm:flex items-center gap-4">
                <button onclick="openFavoritesModal()" class="relative p-2.5 rounded-xl bg-slate-900 border border-slate-800 text-slate-300 hover:text-red-500">
                    <i class="fa-solid fa-heart text-lg"></i>
                    <span id="favCounter" class="absolute -top-1.5 -right-1.5 bg-red-600 text-white text-[11px] font-bold w-5 h-5 rounded-full flex items-center justify-center">0</span>
                </button>
                <button onclick="openAppointmentModal()" class="px-5 py-2.5 rounded-xl bg-red-600 text-white font-semibold text-sm shadow-lg">
                    <i class="fa-regular fa-calendar-check mr-2"></i>Agendar Cita
                </button>
            </div>
        </div>
    </header>
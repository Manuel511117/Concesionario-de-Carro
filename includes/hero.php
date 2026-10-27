<section class="relative min-h-[85vh] flex items-center justify-center pt-10 pb-20 overflow-hidden">
    <div class="absolute top-1/4 -left-20 w-96 h-96 bg-red-600/15 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute bottom-10 -right-20 w-96 h-96 bg-blue-600/15 rounded-full blur-3xl pointer-events-none"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 w-full text-center">
        <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-slate-900/90 border border-slate-800 text-slate-300 text-xs font-semibold mb-8">
            <span class="w-2 h-2 rounded-full bg-red-500 animate-pulse"></span> El estándar de lujo & rendimiento
        </div>
        <h1 class="text-4xl sm:text-6xl lg:text-7xl font-extrabold text-white tracking-tight leading-tight max-w-4xl mx-auto">
            Encuentra el auto de tus sueños con <span class="text-transparent bg-clip-text bg-gradient-to-r from-red-500 to-blue-500">Garantía Certificada</span>
        </h1>
        <p class="mt-6 text-lg text-slate-400 max-w-2xl mx-auto">Explora nuestra colección exclusiva de superdeportivos, sedanes y SUVs eléctricas.</p>

        <form method="GET" action="index.php#catalogo" class="mt-12 bg-slate-900/90 border border-slate-800 p-6 rounded-2xl shadow-2xl max-w-5xl mx-auto text-left">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                <div>
                    <label class="block text-xs text-slate-400 font-medium mb-1.5">Tipo</label>
                    <select name="type" class="w-full bg-slate-950 border border-slate-800 text-slate-200 rounded-xl px-3.5 py-3 text-sm focus:border-red-500">
                        <option value="Todos">Todos</option><option value="SUV">SUV</option><option value="Deportivo">Deportivo</option><option value="Eléctrico/Híbrido">Eléctrico / Híbrido</option>
                    </select>
                </div>
                <div>
                    <label class="block text-xs text-slate-400 font-medium mb-1.5">Marca</label>
                    <select name="brand" class="w-full bg-slate-950 border border-slate-800 text-slate-200 rounded-xl px-3.5 py-3 text-sm focus:border-red-500">
                        <option value="Todas">Todas</option><option value="Porsche">Porsche</option><option value="BMW">BMW</option><option value="Audi">Audi</option><option value="Tesla">Tesla</option>
                    </select>
                </div>
                <div>
                    <label class="block text-xs text-slate-400 font-medium mb-1.5">Precio Máximo</label>
                    <select name="max_price" class="w-full bg-slate-950 border border-slate-800 text-slate-200 rounded-xl px-3.5 py-3 text-sm focus:border-red-500">
                        <option value="1000000">Sin límite</option><option value="100000">Hasta $100k</option><option value="150000">Hasta $150k</option><option value="200000">Hasta $200k</option>
                    </select>
                </div>
                <div class="flex items-end">
                    <button type="submit" class="w-full bg-red-600 hover:bg-red-500 text-white font-bold py-3 px-6 rounded-xl flex items-center justify-center gap-2"><i class="fa-solid fa-magnifying-glass"></i> Buscar</button>
                </div>
            </div>
        </form>
    </div>
</section>
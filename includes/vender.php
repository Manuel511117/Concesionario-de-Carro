<section id="vender" class="py-20 bg-slate-950 border-t border-slate-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 lg:grid-cols-2 gap-12">
        <div>
            <h2 class="text-3xl font-extrabold text-white mt-2">¿Quieres vender tu auto?</h2>
            <p class="text-slate-400 mt-4">Obtén la mejor valoración en menos de 15 minutos.</p>
        </div>
        <div class="bg-slate-900 border border-slate-800 rounded-3xl p-8">
            <form onsubmit="event.preventDefault(); alert('Oferta generada');" class="space-y-4">
                <input type="text" placeholder="Marca" class="w-full bg-slate-950 border border-slate-800 rounded-xl p-3 text-white" required>
                <input type="text" placeholder="Modelo" class="w-full bg-slate-950 border border-slate-800 rounded-xl p-3 text-white" required>
                <button type="submit" class="w-full py-3.5 bg-blue-600 text-white font-bold rounded-xl">Obtener Oferta</button>
            </form>
        </div>
    </div>
</section>
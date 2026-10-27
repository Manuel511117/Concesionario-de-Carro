<?php // php/includes/catalogo.php ?>
<section id="catalogo" class="py-20 bg-slate-950 relative border-t border-slate-800/80">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-10 gap-6">
            <div>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-white">Inventario Disponible</h2>
                <p class="text-slate-400 mt-2 text-sm sm:text-base">Mostrando <?= count($filteredCars) ?> vehículos.</p>
            </div>
            <!-- Buscador -->
            <form method="GET" action="#catalogo" class="relative w-full md:w-80">
                <input type="text" name="q" value="<?= htmlspecialchars($search) ?>" placeholder="Buscar por modelo, marca..." class="w-full bg-slate-900 border border-slate-800 rounded-xl py-3 pl-10 pr-4 text-sm text-slate-200 placeholder-slate-500 focus:outline-none focus:border-red-500">
                <i class="fa-solid fa-magnifying-glass absolute left-3.5 top-3.5 text-slate-500 text-sm"></i>
            </form>
        </div>

        <!-- Pestañas de categorías -->
        <div class="flex items-center gap-2 overflow-x-auto pb-4 mb-8 no-scrollbar">
            <?php foreach (['Todos', 'SUV', 'Sedán', 'Deportivo', 'Eléctrico/Híbrido'] as $cat): ?>
                <?php $active = ($type === $cat); ?>
                <a href="?type=<?= urlencode($cat) ?>#catalogo" class="px-5 py-2.5 rounded-xl text-sm font-semibold transition-all whitespace-nowrap <?= $active ? 'bg-red-600 text-white' : 'bg-slate-900 text-slate-400 hover:text-white border border-slate-800' ?>">
                    <?= $cat ?>
                </a>
            <?php endforeach; ?>
        </div>

        <!-- Grid de autos -->
        <?php if (empty($filteredCars)): ?>
            <div class="text-center py-16 bg-slate-900/30 rounded-2xl border border-slate-800/50">
                <i class="fa-solid fa-car-tunnel text-5xl text-slate-600 mb-4"></i>
                <h3 class="text-xl font-bold text-white">No encontramos vehículos que coincidan</h3>
                <a href="index.php#catalogo" class="inline-block mt-4 px-4 py-2 bg-slate-800 text-slate-200 rounded-xl text-sm hover:bg-slate-700">Restablecer Filtros</a>
            </div>
        <?php else: ?>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php foreach ($filteredCars as $car): ?>
                    <!-- Tarjeta del auto -->
                    <div class="bg-slate-900 border border-slate-800/90 rounded-2xl overflow-hidden flex flex-col justify-between group hover:-translate-y-1 transition-all">
                        <div>
                            <div class="relative h-56 overflow-hidden bg-slate-950">
                                <img src="<?= htmlspecialchars($car['image']) ?>" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                <span class="absolute top-3 left-3 px-3 py-1 rounded-full text-xs font-bold border backdrop-blur-md bg-blue-500/20 text-blue-400 border-blue-500/30">
                                    <?= $car['status'] ?>
                                </span>
                            </div>
                            <div class="p-5">
                                <div class="text-xs font-semibold text-red-500 uppercase tracking-wider mb-1"><?= $car['brand'] ?></div>
                                <h3 class="text-xl font-bold text-white"><?= $car['model'] ?></h3>
                            </div>
                        </div>
                        <div class="p-5 pt-0">
                            <div class="flex justify-between items-baseline mb-4">
                                <span class="text-2xl font-black text-white">$<?= number_format($car['price']) ?> <span class="text-xs text-slate-400">USD</span></span>
                            </div>
                            <div class="grid grid-cols-2 gap-2">
                                <!-- Los modales se abren pasando los datos del auto por JS -->
                                <button onclick='openDetailModal(<?= json_encode($car) ?>)' class="py-2.5 bg-slate-800 text-slate-200 font-semibold text-xs rounded-xl hover:bg-slate-700">Ver Detalles</button>
                                <button onclick='openAppointmentModal("<?= $car['brand'] ?> <?= $car['model'] ?>")' class="py-2.5 bg-red-600 text-white font-semibold text-xs rounded-xl hover:bg-red-500">Prueba Manejo</button>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
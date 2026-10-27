<section id="catalogo" class="py-20 bg-slate-950 border-t border-slate-800/80">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-10 gap-6">
            <div>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-white">Inventario Disponible</h2>
                <p class="text-slate-400 mt-2 text-sm">Mostrando <?= count($filteredCars) ?> vehículos.</p>
            </div>
            <form method="GET" action="index.php#catalogo" class="relative w-full md:w-80">
                <input type="text" name="q" value="<?= htmlspecialchars($search) ?>" placeholder="Buscar modelo..." class="w-full bg-slate-900 border border-slate-800 rounded-xl py-3 pl-10 pr-4 text-sm text-slate-200 focus:border-red-500">
                <i class="fa-solid fa-magnifying-glass absolute left-3.5 top-3.5 text-slate-500 text-sm"></i>
            </form>
        </div>

        <div class="flex items-center gap-2 overflow-x-auto pb-4 mb-8">
            <?php foreach (['Todos', 'SUV', 'Deportivo', 'Eléctrico/Híbrido'] as $cat): ?>
                <a href="?type=<?= urlencode($cat) ?>#catalogo" class="px-5 py-2.5 rounded-xl text-sm font-semibold <?= ($type === $cat) ? 'bg-red-600 text-white' : 'bg-slate-900 text-slate-400 border border-slate-800' ?>"><?= $cat ?></a>
            <?php endforeach; ?>
        </div>

        <?php if (empty($filteredCars)): ?>
            <div class="text-center py-16 bg-slate-900/30 rounded-2xl border border-slate-800">
                <h3 class="text-xl font-bold text-white">No encontramos vehículos</h3>
                <a href="index.php#catalogo" class="mt-4 px-4 py-2 bg-slate-800 text-white rounded-xl">Restablecer</a>
            </div>
        <?php else: ?>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php foreach ($filteredCars as $car): ?>
                    <div class="bg-slate-900 border border-slate-800 rounded-2xl overflow-hidden flex flex-col hover:-translate-y-1 transition-all">
                        <div class="relative h-56 bg-slate-950">
                            <img src="<?= htmlspecialchars($car['image']) ?>" class="w-full h-full object-cover">
                        </div>
                        <div class="p-5 flex-1 flex flex-col justify-between">
                            <div>
                                <span class="text-xs font-semibold text-red-500 uppercase"><?= $car['brand'] ?></span>
                                <h3 class="text-xl font-bold text-white"><?= $car['model'] ?></h3>
                            </div>
                            <div class="mt-4">
                                <span class="text-2xl font-black text-white">$<?= number_format($car['price']) ?> <span class="text-xs text-slate-400">USD</span></span>
                                <div class="grid grid-cols-2 gap-2 mt-4">
                                    <button onclick='openDetailModal(<?= json_encode($car) ?>)' class="py-2.5 bg-slate-800 text-white text-xs font-bold rounded-xl hover:bg-slate-700">Ver Detalles</button>
                                    <button onclick='openAppointmentModal("<?= $car['brand'] ?> <?= $car['model'] ?>")' class="py-2.5 bg-red-600 text-white text-xs font-bold rounded-xl hover:bg-red-500">Prueba</button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
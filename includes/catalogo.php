<section id="catalogo" class="py-20 bg-ink border-t border-gold-border">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-10 gap-6">
            <div>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-white"><?= __('catalogo_title') ?></h2>
                <p class="text-muted mt-2 text-sm"><?= __('catalogo_count', count($filteredCars)) ?></p>
            </div>
            <form method="GET" action="index.php#catalogo" class="relative w-full md:w-80">
                <input type="text" name="q" value="<?= htmlspecialchars($search ?? '') ?>" placeholder="<?= __('catalogo_search_ph') ?>" class="w-full bg-surface border border-gold-border rounded-xl py-3 pl-10 pr-4 text-sm text-slate-200 focus:border-gold focus:outline-none">
                <i class="fa-solid fa-magnifying-glass absolute left-3.5 top-3.5 text-gold text-sm"></i>
            </form>
        </div>

        <?php
        $cats = [__('filter_all'), 'SUV', 'Deportivo', 'Eléctrico/Híbrido'];
        foreach ($cats as $cat): ?>
            <a href="?type=<?= urlencode($cat) ?>&q=<?= urlencode($search ?? '') ?>#catalogo"
               class="inline-block px-5 py-2.5 rounded-xl text-sm font-semibold mb-8 mr-2 <?= ($type === $cat) ? 'bg-gold text-black' : 'bg-surface text-muted border border-gold-border hover:text-gold' ?>">
                <?= $cat ?>
            </a>
        <?php endforeach; ?>

        <?php if (empty($filteredCars)): ?>
            <div class="text-center py-16 bg-surface rounded-2xl border border-gold-border">
                <h3 class="text-xl font-bold text-white"><?= __('catalogo_empty') ?></h3>
                <a href="index.php#catalogo" class="mt-4 inline-block px-4 py-2 bg-gold text-black font-bold rounded-xl"><?= __('catalogo_reset') ?></a>
            </div>
        <?php else: ?>
            <?php
            $grouped = [];
            foreach ($filteredCars as $c) $grouped[$c['type']][] = $c;
            foreach ($grouped as $tipo => $lista): ?>
                <h3 class="text-xl font-extrabold text-white mt-10 mb-4"><?= htmlspecialchars($tipo) ?></h3>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <?php foreach ($lista as $car): ?>
                        <div class="bg-surface border border-gold-border rounded-2xl overflow-hidden flex flex-col card-hover">
                            <div class="relative h-56 bg-ink">
                                <img src="<?= htmlspecialchars($car['image']) ?>" alt="<?= htmlspecialchars($car['brand'].' '.$car['model']) ?>" class="w-full h-full object-cover" loading="lazy">
                            </div>
                            <div class="p-5 flex-1 flex flex-col justify-between">
                                <div>
                                    <span class="text-xs font-semibold gold-text uppercase"><?= htmlspecialchars($car['brand']) ?></span>
                                    <h3 class="text-xl font-bold text-white"><?= htmlspecialchars($car['model']) ?></h3>
                                    <p class="text-xs text-muted mt-1"><?= htmlspecialchars($car['year']) ?> · <?= htmlspecialchars($car['mileage']) ?></p>
                                </div>
                                <div class="mt-4">
                                    <span class="text-2xl font-black text-white">$<?= number_format($car['price']) ?> <span class="text-xs text-muted">USD</span></span>
                                    <div class="grid grid-cols-2 gap-2 mt-4">
                                        <button onclick='openDetailModal(<?= htmlspecialchars(json_encode($car), ENT_QUOTES) ?>)' class="py-2.5 bg-ink border border-gold-border text-gold text-xs font-bold rounded-xl hover:bg-gold hover:text-black transition"><?= __('card_details') ?></button>
                                        <button onclick='openAppointmentModal("<?= htmlspecialchars($car['brand'].' '.$car['model']) ?>")' class="py-2.5 btn-gold text-xs rounded-xl"><?= __('card_test') ?></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</section>
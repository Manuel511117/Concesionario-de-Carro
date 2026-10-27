<section class="py-16 bg-ink border-t border-gold-border">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-end justify-between mb-8">
            <div>
                <span class="text-xs font-bold gold-text uppercase tracking-widest">Featured</span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-white mt-1"><?= current_lang()==='es'?'Destacados':'Featured' ?></h2>
            </div>
            <div class="flex gap-2">
                <button onclick="prevSlide()" aria-label="Anterior" class="w-10 h-10 rounded-xl bg-surface border border-gold-border text-gold hover:bg-gold hover:text-black transition"><i class="fa-solid fa-chevron-left"></i></button>
                <button onclick="nextSlide()" aria-label="Siguiente" class="w-10 h-10 rounded-xl bg-surface border border-gold-border text-gold hover:bg-gold hover:text-black transition"><i class="fa-solid fa-chevron-right"></i></button>
            </div>
        </div>
        <div id="featuredCarousel" class="carousel-container flex gap-6 overflow-x-auto scroll-smooth pb-4">
            <?php foreach ($featured as $car): ?>
                <div class="carousel-slide bg-surface border border-gold-border rounded-2xl overflow-hidden card-hover">
                    <div class="relative h-72 bg-ink">
                        <img src="<?= htmlspecialchars($car['image']) ?>" alt="<?= htmlspecialchars($car['brand'].' '.$car['model']) ?>" class="w-full h-full object-cover" loading="lazy">
                        <span class="absolute top-4 left-4 px-3 py-1 bg-gold text-black text-xs font-bold rounded-full"><?= htmlspecialchars($car['status']) ?></span>
                    </div>
                    <div class="p-6">
                        <span class="text-xs font-bold gold-text uppercase"><?= htmlspecialchars($car['brand']) ?></span>
                        <h3 class="text-2xl font-bold text-white mt-1"><?= htmlspecialchars($car['model']) ?></h3>
                        <p class="text-xl font-black gold-text mt-2">$<?= number_format($car['price']) ?> <span class="text-xs text-muted">USD</span></p>
                        <div class="grid grid-cols-2 gap-2 mt-5">
                            <button onclick='openDetailModal(<?= htmlspecialchars(json_encode($car), ENT_QUOTES) ?>)' class="py-2.5 bg-ink border border-gold-border text-gold text-xs font-bold rounded-xl hover:bg-gold hover:text-black transition"><?= __('card_details') ?></button>
                            <button onclick='openAppointmentModal("<?= htmlspecialchars($car['brand'].' '.$car['model']) ?>")' class="py-2.5 btn-gold text-xs rounded-xl"><?= __('card_test') ?></button>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
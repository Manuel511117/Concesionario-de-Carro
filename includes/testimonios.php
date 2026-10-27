<section class="py-20 bg-ink border-t border-gold-border">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl font-extrabold text-white mb-10"><?= __('testi_title') ?></h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <?php foreach (['"Excelente atención, compré mi Porsche sin problemas."', '"Me dieron el mejor valor por mi auto usado."', '"La prueba de manejo fue de primer nivel."'] as $t): ?>
                <div class="p-6 rounded-2xl bg-surface border border-gold-border text-left">
                    <div class="flex gap-1 gold-text mb-3"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></div>
                    <p class="text-slate-300 text-sm italic"><?= $t ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
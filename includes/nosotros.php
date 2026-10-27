<section id="nosotros" class="py-20 bg-surface/40 border-t border-gold-border">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl font-extrabold text-white mb-10"><?= __('nosotros_title') ?></h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <?php foreach ([
                ['warranty', 'fa-shield-halved'],
                ['vip', 'fa-truck-fast'],
                ['taller', 'fa-screwdriver-wrench'],
            ] as [$k, $icon]): ?>
                <div class="bg-ink p-8 rounded-2xl border border-gold-border card-hover">
                    <i class="fa-solid <?= $icon ?> text-3xl gold-text mb-4"></i>
                    <h3 class="text-white font-bold mb-2"><?= __('nosotros_'.$k) ?></h3>
                    <p class="text-muted text-sm"><?= __('nosotros_'.$k.'_d') ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<section class="relative min-h-[85vh] flex items-center justify-center pt-10 pb-20 overflow-hidden">
    <div class="absolute top-1/4 -left-20 w-96 h-96 bg-gold/10 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute bottom-10 -right-20 w-96 h-96 bg-gold/5 rounded-full blur-3xl pointer-events-none"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 w-full text-center">
        <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-surface border border-gold-border text-slate-300 text-xs font-semibold mb-8">
            <span class="w-2 h-2 rounded-full bg-gold animate-pulse"></span> <?= __('hero_badge') ?>
        </div>
        <h1 class="text-4xl sm:text-6xl lg:text-7xl font-extrabold text-white tracking-tight leading-tight max-w-4xl mx-auto">
            <?= __('hero_title_1') ?> <span class="gold-gradient"><?= __('hero_title_2') ?></span>
        </h1>
        <p class="mt-6 text-lg text-muted max-w-2xl mx-auto"><?= __('hero_subtitle') ?></p>

        <form method="GET" action="index.php#catalogo" class="mt-12 bg-surface/90 border border-gold-border p-6 rounded-2xl shadow-2xl max-w-5xl mx-auto text-left">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                <div>
                    <label class="block text-xs text-muted font-medium mb-1.5"><?= __('filter_type') ?></label>
                    <select name="type" class="w-full bg-ink border border-gold-border text-slate-200 rounded-xl px-3.5 py-3 text-sm focus:border-gold focus:outline-none">
                        <?php foreach ([__('filter_all'), 'SUV', 'Deportivo', 'Eléctrico/Híbrido'] as $opt): ?>
                            <option value="<?= $opt ?>" <?= ($type ?? '') === $opt ? 'selected' : '' ?>><?= $opt ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div>
                    <label class="block text-xs text-muted font-medium mb-1.5"><?= __('filter_brand') ?></label>
                    <select name="brand" class="w-full bg-ink border border-gold-border text-slate-200 rounded-xl px-3.5 py-3 text-sm focus:border-gold focus:outline-none">
                        <option value="<?= __('filter_any_brand') ?>"><?= __('filter_any_brand') ?></option>
                        <?php foreach (['Porsche','BMW','Audi','Tesla','Mercedes-Benz','Range Rover'] as $b): ?>
                            <option value="<?= $b ?>" <?= ($brand ?? '') === $b ? 'selected' : '' ?>><?= $b ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div>
                    <label class="block text-xs text-muted font-medium mb-1.5"><?= __('filter_price') ?></label>
                    <select name="max_price" class="w-full bg-ink border border-gold-border text-slate-200 rounded-xl px-3.5 py-3 text-sm focus:border-gold focus:outline-none">
                        <option value="1000000"><?= __('filter_no_limit') ?></option>
                        <option value="100000"><?= current_lang()==='es'?'Hasta $100k':'Up to $100k' ?></option>
                        <option value="150000"><?= current_lang()==='es'?'Hasta $150k':'Up to $150k' ?></option>
                        <option value="200000"><?= current_lang()==='es'?'Hasta $200k':'Up to $200k' ?></option>
                    </select>
                </div>
                <div class="flex items-end">
                    <button type="submit" class="w-full btn-gold py-3 px-6 rounded-xl flex items-center justify-center gap-2">
                        <i class="fa-solid fa-magnifying-glass"></i> <?= __('hero_search') ?>
                    </button>
                </div>
            </div>
        </form>
    </div>
</section>
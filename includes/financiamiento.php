<section id="financiamiento" class="py-20 bg-surface/40 border-t border-gold-border">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-14">
            <h2 class="text-3xl font-extrabold text-white"><?= __('finan_title') ?></h2>
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 bg-ink border border-gold-border rounded-3xl p-8">
            <div class="lg:col-span-7 space-y-6">
                <div>
                    <div class="flex justify-between text-sm mb-2"><span class="text-slate-300"><?= __('finan_price') ?></span><span id="calcPriceDisplay" class="text-white font-bold">$85,000 USD</span></div>
                    <input type="range" id="calcPrice" min="20000" max="300000" step="5000" value="85000" class="w-full" aria-label="<?= __('finan_price') ?>">
                </div>
                <div>
                    <div class="flex justify-between text-sm mb-2"><span class="text-slate-300"><?= __('finan_down') ?></span><span id="calcDownDisplay" class="text-white font-bold">$17,000 USD</span></div>
                    <input type="range" id="calcDown" min="10" max="70" step="5" value="20" class="w-full" aria-label="<?= __('finan_down') ?>">
                </div>
                <div>
                    <label class="block text-sm mb-2 text-slate-300"><?= __('finan_term') ?></label>
                    <div class="grid grid-cols-4 gap-3">
                        <?php foreach ([24,36,48,60] as $term): ?>
                            <button type="button" onclick="setCalcTerm(<?= $term ?>)" class="term-btn py-3 rounded-xl border border-gold-border bg-surface text-slate-300 font-bold hover:border-gold" data-term="<?= $term ?>"><?= $term ?></button>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div>
                    <div class="flex justify-between text-sm mb-2"><span class="text-slate-300"><?= __('finan_rate') ?></span><span id="calcRateDisplay" class="text-white font-bold">8.5%</span></div>
                    <input type="range" id="calcRate" min="4.0" max="16.0" step="0.5" value="8.5" class="w-full" aria-label="<?= __('finan_rate') ?>">
                </div>
            </div>
            <div class="lg:col-span-5 bg-surface p-8 rounded-2xl border border-gold-border flex flex-col justify-between">
                <div>
                    <span class="text-xs text-muted"><?= __('finan_monthly') ?></span>
                    <div class="text-5xl font-black gold-text mt-2 mb-6">$<span id="monthlyPaymentDisplay">0</span></div>
                </div>
                <button onclick="alert('<?= __('finan_apply') ?>')" class="w-full py-4 rounded-xl btn-gold"><?= __('finan_apply') ?></button>
            </div>
        </div>
    </div>
</section>
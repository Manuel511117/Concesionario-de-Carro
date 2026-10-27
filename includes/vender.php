<section id="vender" class="py-20 bg-ink border-t border-gold-border">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
        <div>
            <h2 class="text-3xl font-extrabold text-white mt-2"><?= __('vender_title') ?></h2>
            <p class="text-muted mt-4"><?= __('vender_desc') ?></p>
        </div>
        <div class="bg-surface border border-gold-border rounded-3xl p-8">
            <form onsubmit="submitSellLead(event)" class="space-y-4">
                <input type="text" name="marca" placeholder="<?= __('vender_marca') ?>" class="w-full bg-ink border border-gold-border rounded-xl p-3 text-white focus:border-gold focus:outline-none" required>
                <input type="text" name="modelo" placeholder="<?= __('vender_modelo') ?>" class="w-full bg-ink border border-gold-border rounded-xl p-3 text-white focus:border-gold focus:outline-none" required>
                <input type="text" name="contacto" placeholder="Email / Tel" class="w-full bg-ink border border-gold-border rounded-xl p-3 text-white focus:border-gold focus:outline-none" required>
                <button type="submit" class="w-full py-3.5 btn-gold rounded-xl"><?= __('vender_btn') ?></button>
            </form>
        </div>
    </div>
</section>
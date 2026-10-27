<section id="contacto" class="py-20 bg-surface/40 border-t border-gold-border">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl font-extrabold text-white mb-10"><?= __('contacto_title') ?></h2>
        <form onsubmit="submitContact(event)" class="bg-ink border border-gold-border rounded-3xl p-8 space-y-4 text-left">
            <input type="text" name="nombre" placeholder="<?= __('contacto_nombre') ?>" class="w-full bg-surface border border-gold-border rounded-xl p-3 text-white focus:border-gold focus:outline-none" required>
            <input type="email" name="email" placeholder="<?= __('contacto_email') ?>" class="w-full bg-surface border border-gold-border rounded-xl p-3 text-white focus:border-gold focus:outline-none" required>
            <textarea name="mensaje" rows="5" placeholder="<?= __('contacto_msg') ?>" class="w-full bg-surface border border-gold-border rounded-xl p-3 text-white focus:border-gold focus:outline-none" required></textarea>
            <button type="submit" class="w-full py-3.5 btn-gold rounded-xl"><?= __('contacto_send') ?></button>
        </form>
    </div>
</section>
<footer id="footer" class="bg-ink border-t border-gold-border pt-16 pb-12 text-muted">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 md:grid-cols-3 gap-10">
        <div>
            <span class="text-xl font-extrabold text-white">APEX<span class="gold-text">MOTORS</span></span>
            <p class="text-xs mt-4"><?= __('footer_tagline') ?></p>
        </div>
        <div>
            <h4 class="text-white font-bold mb-4"><?= __('footer_contact') ?></h4>
            <p class="text-xs"><i class="fa-solid fa-phone mr-2 gold-text"></i> <?= SITE_PHONE ?></p>
            <p class="text-xs mt-2"><i class="fa-solid fa-envelope mr-2 gold-text"></i> <?= SITE_EMAIL ?></p>
            <p class="text-xs mt-2"><i class="fa-solid fa-location-dot mr-2 gold-text"></i> <?= SITE_ADDRESS ?></p>
        </div>
        <div>
            <h4 class="text-white font-bold mb-4"><?= __('footer_hours') ?></h4>
            <p class="text-xs"><?= __('footer_hours_v') ?></p>
        </div>
    </div>
    <div class="max-w-7xl mx-auto px-4 mt-10 pt-6 border-t border-gold-border text-xs text-center">
        <?= __('footer_rights') ?>
    </div>
    <script src="assets/js/app.js"></script>
    <script src="assets/js/carrusel.js"></script>
</footer>
</body>
</html>
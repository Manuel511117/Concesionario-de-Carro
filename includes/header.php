<?php require_once __DIR__ . '/../lang/i18n.php'; ?>
<!DOCTYPE html>
<html lang="<?= current_lang() ?>" class="scroll-smooth dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= SITE_NAME ?> | <?= __('hero_badge') ?></title>
    <meta name="description" content="<?= __('hero_subtitle') ?>">
    <meta property="og:title" content="<?= SITE_NAME ?>">
    <meta property="og:description" content="<?= __('hero_subtitle') ?>">
    <meta property="og:type" content="website">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: { extend: {
                colors: {
                    gold: '#C9A227', 'gold-lt': '#E5C158',
                    surface: '#141414', ink: '#0A0A0A', red: '#DC2626'
                },
                fontFamily: { sans: ['Inter', 'sans-serif'] }
            } }
        }
    </script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="assets/css/custom.css">
</head>
<body class="antialiased min-h-screen flex flex-col justify-between selection:bg-gold selection:text-black">
    <div id="toastContainer" class="fixed bottom-5 right-5 z-50 flex flex-col gap-3 max-w-sm"></div>

    <a href="#catalogo" class="sr-only focus:not-sr-only focus:absolute focus:top-2 focus:left-2 focus:bg-gold focus:text-black focus:px-4 focus:py-2 focus:z-50 rounded">Saltar al contenido</a>

    <header class="sticky top-0 z-40 backdrop-blur-md bg-ink/90 border-b border-gold-border">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-20 flex items-center justify-between">
            <a href="index.php" class="flex items-center gap-3 group" aria-label="<?= SITE_NAME ?>">
                <div class="w-10 h-10 rounded-xl bg-gradient-to-tr from-gold to-gold-lt flex items-center justify-center text-black shadow-lg">
                    <i class="fa-solid fa-gauge-high text-xl"></i>
                </div>
                <span class="text-2xl font-extrabold text-white">APEX<span class="gold-text">MOTORS</span></span>
            </a>
            <nav class="hidden md:flex items-center gap-8 font-medium text-sm text-slate-300" aria-label="Principal">
                <a href="#catalogo" class="hover:text-gold"><?= __('nav_catalogo') ?></a>
                <a href="#financiamiento" class="hover:text-gold"><?= __('nav_financiamiento') ?></a>
                <a href="#vender" class="hover:text-gold"><?= __('nav_vender') ?></a>
                <a href="#nosotros" class="hover:text-gold"><?= __('nav_nosotros') ?></a>
                <a href="#contacto" class="hover:text-gold"><?= __('nav_contacto') ?></a>
            </nav>
            <div class="flex items-center gap-3">
                <div class="flex items-center gap-1 text-xs">
                    <?php foreach (AVAILABLE_LANGS as $l): ?>
                        <a href="<?= lang_switch_url($l) ?>" class="px-2 py-1 rounded font-bold uppercase <?= current_lang() === $l ? 'bg-gold text-black' : 'text-slate-400 hover:text-gold' ?>" aria-label="Idioma <?= $l ?>"><?= $l ?></a>
                    <?php endforeach; ?>
                </div>
                <button onclick="openFavoritesModal()" class="relative p-2.5 rounded-xl bg-surface border border-gold-border text-slate-300 hover:text-gold" aria-label="Favoritos">
                    <i class="fa-solid fa-heart text-lg"></i>
                    <span id="favCounter" class="absolute -top-1.5 -right-1.5 bg-gold text-black text-[11px] font-bold w-5 h-5 rounded-full flex items-center justify-center">0</span>
                </button>
                <button onclick="openAppointmentModal()" class="hidden sm:inline-flex px-5 py-2.5 rounded-xl btn-gold text-sm shadow-lg">
                    <i class="fa-regular fa-calendar-check mr-2"></i><?= __('nav_agendar') ?>
                </button>
            </div>
        </div>
    </header>
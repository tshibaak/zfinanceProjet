<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Zfinances - Cabinet d'expertise comptable et d'audit financier à Kinshasa.">
    <title><?= e($title ?? 'Zfinances') ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('/assets/css/styles.css') ?>">
    <link rel="stylesheet" href="<?= base_url('/assets/css/trust.css') ?>">
</head>
<body>

<?php require dirname(__DIR__) . '/partials/flash.php'; ?>

<!-- HEADER -->
<header id="header">
    <div class="container">
        <div class="header-inner">
            <a href="#hero" class="logo">
                <img src="https://image.youmind.com/user-files/eebe4f28a1c7f3ce5132746a515a51ef427cc8493122627c398898d4b8feb61a?format=jpeg&width=4000&height=4000&fit=scale-down" alt="Zfinances" class="logo-img">
            </a>
            <nav>
                <ul class="nav">
                    <li><a href="#hero">Accueil</a></li>
                    <li><a href="#services">Services</a></li>
                    <li><a href="#about">À propos</a></li>
                    <li><a href="#trust">Références</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
            </nav>
            <div class="header-cta">
                <a href="#contact" class="btn btn-primary">Rendez-vous</a>
            </div>
            <button class="burger" id="burger" aria-label="Menu"><span></span><span></span><span></span></button>
        </div>
    </div>
    <nav class="mobile-nav" id="mobileNav">
        <a href="#hero" onclick="closeMobileNav()">Accueil</a>
        <a href="#services" onclick="closeMobileNav()">Services</a>
        <a href="#about" onclick="closeMobileNav()">À propos</a>
        <a href="#trust" onclick="closeMobileNav()">Références</a>
        <a href="#contact" onclick="closeMobileNav()">Contact</a>
    </nav>
</header>

<?= $content ?>

<!-- FOOTER -->
<footer id="footer">
    <div class="container">
        <div class="footer-inner">
            <div class="footer-brand">
                <a href="#hero" class="logo">
                    <img src="https://image.youmind.com/user-files/eebe4f28a1c7f3ce5132746a515a51ef427cc8493122627c398898d4b8feb61a?format=jpeg&width=4000&height=4000&fit=scale-down" alt="Zfinances" class="logo-img">
                </a>
                <p>Cabinet d'expertise comptable et d'audit financier à Kinshasa. Votre partenaire de confiance pour une gestion financière rigoureuse et optimisée.</p>
            </div>
            <div class="footer-col">
                <h4>Navigation</h4>
                <ul class="footer-links">
                    <li><a href="#hero">Accueil</a></li>
                    <li><a href="#services">Services</a></li>
                    <li><a href="#about">À propos</a></li>
                    <li><a href="#trust">Références</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h4>Services</h4>
                <ul class="footer-links">
                    <li><a href="#services">Expertise Comptable</a></li>
                    <li><a href="#services">Audit Financier</a></li>
                    <li><a href="#services">Conseil Fiscal</a></li>
                    <li><a href="#services">Gestion de Paie</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h4>Newsletter</h4>
                <p>Recevez nos actualités fiscales et comptables.</p>
                <form class="newsletter-form" method="POST" action="<?= base_url('/newsletter') ?>">
                    <?= csrf_field() ?>
                    <input type="email" name="email" placeholder="votre@email.cd" required>
                    <button type="submit">OK</button>
                </form>
            </div>
        </div>
        <div class="footer-bottom">
            <p>© <?= date('Y') ?> Zfinances — Cabinet d'expertise comptable. Tous droits réservés.</p>
            <div class="footer-bottom-links">
                <a href="#">Mentions légales</a>
                <a href="#">Politique de confidentialité</a>
            </div>
        </div>
    </div>
</footer>

<script src="<?= base_url('/assets/js/main.js') ?>"></script>
</body>
</html>

<?php
    session_start();
    $popupMessage = "";
    $popupType = "";

    if (isset($_SESSION["message_error_accueil"])) {
        $popupMessage = $_SESSION["message_error_accueil"];
        $popupType = "error";
        unset($_SESSION["message_error_accueil"]);
    }

    if (isset($_SESSION["message_accueil_ok"])) {
        $popupMessage = $_SESSION["message_accueil_ok"];
        $popupType = "success";
        unset($_SESSION["message_accueil_ok"]);
    }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <script src="../js/dociframe.js" defer></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Zfinances - Cabinet d'expertise comptable et d'audit financier. Accompagnement des entreprises et indépendants dans la gestion comptable, fiscale et financière.">
    <title>Zfinances – Expertise Comptable & Audit Financier</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/styles.css">
     <!-- <link rel="stylesheet" href="assets/css/styles.css"> -->
</head>

<?php if (!empty($popupMessage)): ?>
<div id="popupOverlay" class="popup-overlay">
    <div class="popup-content <?= $popupType ?>">
        <span class="close-popup">&times;</span>

        <h3>
            <?= $popupType === 'success' ? '✅ Succès' : '❌ Erreur' ?>
        </h3>

        <p><?= htmlspecialchars($popupMessage) ?></p>
    </div>
</div>
<?php endif; ?>


<body>

<!-- ============================================================
     HEADER
     PHP: <?php include 'includes/header.php'; ?>
     ============================================================ -->
<header id="header">
    <div class="container">
        <div class="header-inner">
            <!-- Logo -->
            <a href="#hero" class="logo">
                <img src="https://image.youmind.com/user-files/eebe4f28a1c7f3ce5132746a515a51ef427cc8493122627c398898d4b8feb61a?format=jpeg&width=4000&height=4000&fit=scale-down" alt="Zfinances" class="logo-img">
            </a>

            <!-- Navigation desktop -->
            <nav>
                <ul class="nav">
                    <li><a href="#hero">Accueil</a></li>
                    <li><a href="#services">Services</a></li>
                    <li><a href="#about">À propos</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
            </nav>

            <!-- CTA desktop -->
            <div class="header-cta">
                <a href="#contact" class="btn btn-primary">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                    Rendez-vous
                </a>
            </div>

            <!-- Burger mobile -->
            <button class="burger" id="burger" aria-label="Menu">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>
    </div>

    <!-- Mobile nav -->
    <nav class="mobile-nav" id="mobileNav">
        <a href="#hero" onclick="closeMobileNav()">Accueil</a>
        <a href="#services" onclick="closeMobileNav()">Services</a>
        <a href="#about" onclick="closeMobileNav()">À propos</a>
        <a href="#contact" onclick="closeMobileNav()">Contact</a>
        <a href="#contact" class="btn btn-primary" onclick="closeMobileNav()">Prendre rendez-vous</a>
    </nav>
</header>

<!-- ============================================================
     HERO SECTION
     ============================================================ -->
<section id="hero">
    <div class="hero-pattern"></div>
    <div class="hero-geo"></div>
    <div class="container">
        <div class="hero-inner">
            <!-- Contenu -->
            <div class="hero-content fade-in">
                <div class="hero-badge">
                    <span class="hero-badge-dot"></span>
                    Expertise comptable &amp; Audit financier
                </div>
                <h1 class="hero-title">
                    Votre réussite<br>
                    financière,<br>
                    <span>notre expertise</span>
                </h1>
                <p class="hero-subtitle">
                    Zfinances accompagne les entreprises et les indépendants dans la gestion de leurs obligations comptables, fiscales et financières avec rigueur, transparence et réactivité.
                </p>
                <div class="hero-cta">
                    <a href="#services" class="btn btn-primary">
                        Nos services
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                    </a>
                    <a href="#contact" class="btn btn-outline">Nous contacter</a>
                </div>
                <div class="hero-stats">
                    <div class="hero-stat">
                        <span class="hero-stat-num">+200</span>
                        <span class="hero-stat-label">Clients satisfaits</span>
                    </div>
                    <div class="hero-stat-divider"></div>
                    <div class="hero-stat">
                        <span class="hero-stat-num">+15</span>
                        <span class="hero-stat-label">Ans d'expérience</span>
                    </div>
                    <div class="hero-stat-divider"></div>
                    <div class="hero-stat">
                        <span class="hero-stat-num">98%</span>
                        <span class="hero-stat-label">De satisfaction</span>
                    </div>
                </div>
            </div>

            <!-- Visuel animé -->
            <div class="hero-visual fade-in" style="transition-delay: 0.2s;">
                <div class="hero-card-stack">
                    <!-- Badge flottant haut gauche -->
                    <div class="hero-badge-float top-left">
                        <div class="float-icon">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#0000FF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="22 7 13.5 15.5 8.5 10.5 2 17"/><polyline points="16 7 22 7 22 13"/></svg>
                        </div>
                        <div class="float-text">
                            <strong>+18% croissance</strong>
                            <span>Résultats 2024</span>
                        </div>
                    </div>

                    <!-- Carte principale -->
                    <div class="hero-main-card">
                        <div class="hero-card-header">
                            <div class="hero-card-icon">
                                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#0000FF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="3" width="20" height="14" rx="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg>
                            </div>
                            <div>
                                <div class="hero-card-title">Tableau de bord financier</div>
                                <div class="hero-card-sub">Exercice 2024 · Mis à jour</div>
                            </div>
                        </div>
                        <div class="hero-chart-bars" id="heroBars">
                            <div class="bar" style="height:40%"></div>
                            <div class="bar semi" style="height:60%"></div>
                            <div class="bar" style="height:45%"></div>
                            <div class="bar active" style="height:80%"></div>
                            <div class="bar semi" style="height:65%"></div>
                            <div class="bar" style="height:55%"></div>
                            <div class="bar active" style="height:90%"></div>
                            <div class="bar semi" style="height:70%"></div>
                        </div>
                        <div class="hero-card-footer">
                            <div>
                                <div class="hero-card-metric">+24.8%</div>
                                <div class="hero-card-metric-label">Croissance annuelle</div>
                            </div>
                            <div>
                                <div class="hero-card-metric" style="color: var(--blue-dark2);">€2.4M</div>
                                <div class="hero-card-metric-label">Chiffre d'affaires</div>
                            </div>
                        </div>
                    </div>

                    <!-- Badge flottant bas droite -->
                    <div class="hero-badge-float bottom-right">
                        <div class="float-icon">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#0000FF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                        </div>
                        <div class="float-text">
                            <strong>Audit validé</strong>
                            <span>Conformité 100%</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============================================================
     SERVICES SECTION
     PHP: <?php include 'includes/services.php'; ?>
     ============================================================ -->
<section id="services">
    <div class="container">
        <div class="section-header fade-in">
            <span class="section-label">Nos services</span>
            <h2>Une expertise complète<br>à votre service</h2>
            <p>Une gamme complète de solutions pour sécuriser et optimiser votre gestion financière</p>
        </div>

        <div class="services-grid">
            <!-- Service 1 -->
            <div class="service-card fade-in">
                <div class="service-icon">
                    <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="#0000FF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                        <polyline points="14 2 14 8 20 8"/>
                        <line x1="16" y1="13" x2="8" y2="13"/>
                        <line x1="16" y1="17" x2="8" y2="17"/>
                        <polyline points="10 9 9 9 8 9"/>
                    </svg>
                </div>
                <h3>Expertise Comptable</h3>
                <p>Tenue et révision de comptabilité, établissement des bilans et comptes de résultat, liasses fiscales et reporting financier.</p>
                <div class="service-tags">
                    <span class="service-tag">Bilan</span>
                    <span class="service-tag">Comptabilité</span>
                    <span class="service-tag">Liasse fiscale</span>
                </div>
            </div>

            <!-- Service 2 -->
            <div class="service-card fade-in" style="transition-delay:0.1s">
                <div class="service-icon">
                    <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="#0000FF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="11" cy="11" r="8"/>
                        <line x1="21" y1="21" x2="16.65" y2="16.65"/>
                        <line x1="11" y1="8" x2="11" y2="14"/>
                        <line x1="8" y1="11" x2="14" y2="11"/>
                    </svg>
                </div>
                <h3>Audit Financier</h3>
                <p>Audit légal et contractuel, commissariat aux comptes, certification des comptes annuels et audit d'acquisition.</p>
                <div class="service-tags">
                    <span class="service-tag">Audit légal</span>
                    <span class="service-tag">CAC</span>
                    <span class="service-tag">Certification</span>
                </div>
            </div>

            <!-- Service 3 -->
            <div class="service-card fade-in" style="transition-delay:0.2s">
                <div class="service-icon">
                    <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="#0000FF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="12" y1="1" x2="12" y2="23"/>
                        <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/>
                    </svg>
                </div>
                <h3>Conseil Fiscal</h3>
                <p>Optimisation fiscale, établissement des déclarations, accompagnement lors des contrôles fiscaux et veille réglementaire.</p>
                <div class="service-tags">
                    <span class="service-tag">Optimisation</span>
                    <span class="service-tag">Déclarations</span>
                    <span class="service-tag">TVA</span>
                </div>
            </div>

            <!-- Service 4 -->
            <div class="service-card fade-in" style="transition-delay:0.3s">
                <div class="service-icon">
                    <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="#0000FF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="2" y="7" width="20" height="14" rx="2"/>
                        <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/>
                    </svg>
                </div>
                <h3>Conseil Juridique</h3>
                <p>Création et transformation de sociétés, rédaction de statuts, pactes d'associés, restructurations et opérations de fusion.</p>
                <div class="service-tags">
                    <span class="service-tag">Création société</span>
                    <span class="service-tag">Statuts</span>
                    <span class="service-tag">Fusion</span>
                </div>
            </div>

            <!-- Service 5 -->
            <div class="service-card fade-in" style="transition-delay:0.4s">
                <div class="service-icon">
                    <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="#0000FF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
                        <circle cx="9" cy="7" r="4"/>
                        <path d="M23 21v-2a4 4 0 0 0-3-3.87"/>
                        <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                    </svg>
                </div>
                <h3>Gestion de Paie</h3>
                <p>Externalisation complète de la paie, établissement des bulletins, déclarations sociales et accompagnement RH.</p>
                <div class="service-tags">
                    <span class="service-tag">Bulletins paie</span>
                    <span class="service-tag">DSN</span>
                    <span class="service-tag">RH</span>
                </div>
            </div>

            <!-- Service 6 -->
            <div class="service-card fade-in" style="transition-delay:0.5s">
                <div class="service-icon">
                    <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="#0000FF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/>
                    </svg>
                </div>
                <h3>Accompagnement Entrepreneurial</h3>
                <p>Business plan, prévisionnel financier, accompagnement à la levée de fonds et suivi de la performance.</p>
                <div class="service-tags">
                    <span class="service-tag">Business plan</span>
                    <span class="service-tag">Prévisionnel</span>
                    <span class="service-tag">Levée de fonds</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============================================================
     ABOUT SECTION
     ============================================================ -->
<section id="about">
    <div class="container">
        <div class="about-inner">
            <!-- Gauche -->
            <div class="about-left fade-in">
                <span class="section-label">À propos</span>
                <h2>Pourquoi choisir<br>Zfinances ?</h2>
                <p>
                    Fondé il y a plus de 15 ans, Zfinances est un cabinet d'expertise comptable et d'audit financier qui place la relation client au cœur de son activité. Notre équipe de professionnels certifiés accompagne plus de 200 entreprises et indépendants dans la gestion de leurs obligations comptables, fiscales et financières.
                </p>
                <p>
                    Notre approche repose sur une compréhension approfondie de votre secteur d'activité et de vos enjeux spécifiques. Nous ne sommes pas de simples prestataires : nous sommes vos partenaires de confiance pour construire et pérenniser votre succès financier.
                </p>
                <p>
                    Que vous soyez une start-up en pleine croissance, une PME établie ou un professionnel indépendant, nous adaptons nos services à vos besoins avec la même exigence de qualité et de réactivité.
                </p>
                <a href="#contact" class="btn btn-primary" style="margin-top:8px;">
                    Prendre rendez-vous
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                </a>
            </div>

            <!-- Droite: valeurs -->
            <div class="about-values fade-in" style="transition-delay:0.2s">
                <div class="value-card">
                    <div class="value-icon">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#0000FF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 11 12 14 22 4"/><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/></polyline></svg>
                    </div>
                    <div class="value-text">
                        <h4>Rigueur</h4>
                        <p>Chaque mission est réalisée avec le plus grand soin, dans le strict respect des normes professionnelles et réglementaires.</p>
                    </div>
                </div>

                <div class="value-card">
                    <div class="value-icon">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#0000FF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                    </div>
                    <div class="value-text">
                        <h4>Proximité</h4>
                        <p>Un interlocuteur dédié, disponible et à l'écoute de vos besoins pour un accompagnement personnalisé et réactif.</p>
                    </div>
                </div>

                <div class="value-card">
                    <div class="value-icon">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#0000FF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                    </div>
                    <div class="value-text">
                        <h4>Réactivité</h4>
                        <p>Nous nous engageons à répondre rapidement à vos demandes et à respecter scrupuleusement les délais convenus.</p>
                    </div>
                </div>

                <div class="value-card">
                    <div class="value-icon">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#0000FF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                    </div>
                    <div class="value-text">
                        <h4>Transparence</h4>
                        <p>Honoraires clairs, communication ouverte et reporting régulier pour une relation de confiance durable.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============================================================
     STATS / CHIFFRES CLÉS SECTION
     ============================================================ -->
<section id="stats">
    <div class="container">
        <div class="stats-inner">
            <div class="stat-item fade-in">
                <div class="stat-number" data-target="200" data-prefix="+">0</div>
                <div class="stat-label">Clients accompagnés</div>
            </div>
            <div class="stat-item fade-in" style="transition-delay:0.1s">
                <div class="stat-number" data-target="15" data-prefix="+">0</div>
                <div class="stat-label">Ans d'expérience</div>
            </div>
            <div class="stat-item fade-in" style="transition-delay:0.2s">
                <div class="stat-number" data-target="50" data-prefix="+">0</div>
                <div class="stat-label">Secteurs d'activité</div>
            </div>
            <div class="stat-item fade-in" style="transition-delay:0.3s">
                <div class="stat-number" data-target="98" data-suffix="%">0</div>
                <div class="stat-label">Taux de satisfaction</div>
            </div>
        </div>
    </div>
</section>

<!-- ============================================================
     TESTIMONIALS SECTION
     ============================================================ -->
<section id="testimonials">
    <div class="container">
        <div class="section-header fade-in">
            <span class="section-label">Témoignages</span>
            <h2>Ce que disent nos clients</h2>
            <p>La satisfaction de nos clients est notre meilleure récompense</p>
        </div>

        <div class="testimonials-grid">
            <!-- Témoignage 1 -->
            <div class="testimonial-card fade-in">
                <div class="testimonial-stars">
                    <span class="star">★</span><span class="star">★</span><span class="star">★</span><span class="star">★</span><span class="star">★</span>
                </div>
                <p class="testimonial-text">
                    "Zfinances a transformé notre gestion comptable. Leur équipe est d'une réactivité exemplaire et leurs conseils fiscaux nous ont permis de réaliser des économies substantielles. Je recommande vivement leurs services à toute entreprise sérieuse."
                </p>
                <div class="testimonial-author">
                    <div class="author-avatar">ML</div>
                    <div>
                        <div class="author-name">Marie Lefebvre</div>
                        <div class="author-company">Directrice Générale · TechSolutions SAS</div>
                    </div>
                </div>
            </div>

            <!-- Témoignage 2 -->
            <div class="testimonial-card fade-in" style="transition-delay:0.1s">
                <div class="testimonial-stars">
                    <span class="star">★</span><span class="star">★</span><span class="star">★</span><span class="star">★</span><span class="star">★</span>
                </div>
                <p class="testimonial-text">
                    "En tant qu'entrepreneur indépendant, j'avais besoin d'un cabinet à la fois compétent et accessible. Zfinances répond parfaitement à mes attentes : disponibles, pédagogues et toujours à jour sur les évolutions réglementaires."
                </p>
                <div class="testimonial-author">
                    <div class="author-avatar">AB</div>
                    <div>
                        <div class="author-name">Antoine Bernard</div>
                        <div class="author-company">Consultant indépendant · AB Conseil</div>
                    </div>
                </div>
            </div>

            <!-- Témoignage 3 -->
            <div class="testimonial-card fade-in" style="transition-delay:0.2s">
                <div class="testimonial-stars">
                    <span class="star">★</span><span class="star">★</span><span class="star">★</span><span class="star">★</span><span class="star">★</span>
                </div>
                <p class="testimonial-text">
                    "L'accompagnement de Zfinances lors de notre levée de fonds a été décisif. Leur expertise en audit et leur connaissance des investisseurs nous ont permis de boucler notre tour de table en un temps record. Partenaire de confiance !"
                </p>
                <div class="testimonial-author">
                    <div class="author-avatar">SC</div>
                    <div>
                        <div class="author-name">Sophie Charpentier</div>
                        <div class="author-company">Co-fondatrice · GreenStart</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============================================================
     CONTACT SECTION
     ============================================================ -->
<section id="contact">
    <div class="container">
        <div class="contact-inner">
            <!-- Formulaire -->
            <div class="contact-form-wrap fade-in">
                <span class="section-label">Contact</span>
                <h2>Parlons de votre projet</h2>
                <p>Remplissez le formulaire ci-dessous et nous vous recontacterons sous 24h ouvrées.</p>

                <form id="contactForm" action="../../../src/api/api_accueil.php" method="POST">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="nom">Nom complet *</label>
                            <input type="text" id="nom" name="nom" placeholder="Jean Dupont" autocomplete="name">
                            <div class="form-error" id="nomError">Veuillez entrer votre nom.</div>
                        </div>
                        <div class="form-group">
                            <label for="email">Email *</label>
                            <input type="email" id="email" name="email" placeholder="jean@exemple.fr" autocomplete="email">
                            <div class="form-error" id="emailError">Veuillez entrer un email valide.</div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="telephone">Téléphone</label>
                            <input type="tel" id="telephone" name="telephone" placeholder="+33 6 00 00 00 00" autocomplete="tel">
                        </div>
                        <div class="form-group">
                            <label for="sujet">Sujet *</label>
                            <select id="sujet" name="sujet">
                                <option value="">Sélectionner un service</option>
                                <option value="comptabilite">Expertise Comptable</option>
                                <option value="audit">Audit Financier</option>
                                <option value="fiscal">Conseil Fiscal</option>
                                <option value="juridique">Conseil Juridique</option>
                                <option value="paie">Gestion de Paie</option>
                                <option value="entrepreneurial">Accompagnement Entrepreneurial</option>
                                <option value="autre">Autre</option>
                            </select>
                            <div class="form-error" id="sujetError">Veuillez sélectionner un sujet.</div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="message">Message *</label>
                        <textarea id="message" name="message" placeholder="Décrivez votre besoin ou votre projet..."></textarea>
                        <div class="form-error" id="messageError">Veuillez entrer votre message.</div>
                    </div>
                    <button type="submit" class="btn btn-primary" style="width:100%; justify-content:center;">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="22" y1="2" x2="11" y2="13"/><polygon points="22 2 15 22 11 13 2 9 22 2"/></svg>
                        Envoyer le message
                    </button>
                    <div class="form-success" id="formSuccess">
                        ✓ Votre message a été envoyé avec succès ! Nous vous recontacterons sous 24h ouvrées.
                    </div>
                </form>
            </div>

            <!-- Infos contact -->
            <div class="contact-info fade-in" style="transition-delay:0.2s">
                <span class="section-label">Coordonnées</span>
                <h3>Nos informations</h3>
                <p>N'hésitez pas à nous contacter directement par téléphone ou email.</p>

                <div class="contact-items">
                    <div class="contact-item">
                        <div class="contact-item-icon">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#0000FF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                        </div>
                        <div class="contact-item-text">
                            <strong>Adresse</strong>
                            <span>12 Avenue des Finances, 75008 Paris<br>France</span>
                        </div>
                    </div>

                    <div class="contact-item">
                        <div class="contact-item-icon">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#0000FF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 12 19.79 19.79 0 0 1 1.61 3.4 2 2 0 0 1 3.6 1.22h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L7.91 8.96a16 16 0 0 0 6.13 6.13l.96-1.84a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                        </div>
                        <div class="contact-item-text">
                            <strong>Téléphone</strong>
                            <span>+33 1 23 45 67 89</span>
                        </div>
                    </div>

                    <div class="contact-item">
                        <div class="contact-item-icon">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#0000FF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                        </div>
                        <div class="contact-item-text">
                            <strong>Email</strong>
                            <span>contact@zfinances.fr</span>
                        </div>
                    </div>
                </div>

                <div class="contact-hours">
                    <h4>
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#0000FF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="vertical-align:middle;margin-right:6px;"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                        Horaires d'ouverture
                    </h4>
                    <div class="hours-row">
                        <strong>Lundi – Vendredi</strong>
                        <span>9h00 – 18h00</span>
                    </div>
                    <div class="hours-row">
                        <strong>Samedi</strong>
                        <span>9h00 – 12h00</span>
                    </div>
                    <div class="hours-row">
                        <strong>Dimanche</strong>
                        <span>Fermé</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============================================================
     FOOTER
     ============================================================ -->
<footer id="footer">
    <div class="container">
        <div class="footer-inner">
            <!-- Brand -->
            <div class="footer-brand">
                <a href="#hero" class="logo">
                    <img src="https://image.youmind.com/user-files/eebe4f28a1c7f3ce5132746a515a51ef427cc8493122627c398898d4b8feb61a?format=jpeg&width=4000&height=4000&fit=scale-down" alt="Zfinances" class="logo-img">
                </a>
                <p>Cabinet d'expertise comptable et d'audit financier. Votre partenaire de confiance pour une gestion financière rigoureuse et optimisée.</p>
                <div class="footer-social">
                    <div class="social-btn" title="LinkedIn">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#FFFFFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"/><rect x="2" y="9" width="4" height="12"/><circle cx="4" cy="4" r="2"/></svg>
                    </div>
                    <div class="social-btn" title="Twitter/X">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#FFFFFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"/></svg>
                    </div>
                    <div class="social-btn" title="Facebook">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#FFFFFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg>
                    </div>
                </div>
            </div>

            <!-- Liens rapides -->
            <div class="footer-col">
                <h4>Navigation</h4>
                <ul class="footer-links">
                    <li><a href="#hero">Accueil</a></li>
                    <li><a href="#services">Services</a></li>
                    <li><a href="#about">À propos</a></li>
                    <li><a href="#testimonials">Témoignages</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
            </div>

            <!-- Services -->
            <div class="footer-col">
                <h4>Services</h4>
                <ul class="footer-links">
                    <li><a href="#services">Expertise Comptable</a></li>
                    <li><a href="#services">Audit Financier</a></li>
                    <li><a href="#services">Conseil Fiscal</a></li>
                    <li><a href="#services">Conseil Juridique</a></li>
                    <li><a href="#services">Gestion de Paie</a></li>
                    <li><a href="#services">Accompagnement</a></li>
                </ul>
            </div>

            <!-- Newsletter -->
            <div class="footer-col">
                <h4>Newsletter</h4>
                <p>Recevez nos actualités fiscales et comptables directement dans votre boîte mail.</p>
                <form class="newsletter-form" id="newsletterForm" novalidate>
                    <input type="email" placeholder="votre@email.fr" id="newsletterEmail" required>
                    <button type="submit">OK</button>
                </form>
                <p style="font-size:0.75rem; margin-top:8px; color: var(--blue-light6);">En vous inscrivant, vous acceptez notre politique de confidentialité.</p>
            </div>
        </div>

        <!-- Footer bottom -->
        <div class="footer-bottom">
            <p>© 2024 Zfinances – Cabinet d'expertise comptable. Tous droits réservés.</p>
            <div class="footer-bottom-links">
                <a href="#">Mentions légales</a>
                <a href="#">Politique de confidentialité</a>
                <a href="#">CGU</a>
            </div>
        </div>
    </div>
</footer>
<script src="../js/main.js"></script>
</body>
</html>
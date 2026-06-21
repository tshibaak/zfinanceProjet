<?php
/** Page d'accueil — variables : $testimonials, $trustLogos */

// Témoignages : ceux de la base, sinon valeurs par défaut
$defaultTestimonials = [
    ['author' => 'Marie Lefebvre', 'company' => 'Directrice · TechSolutions', 'rating' => 5,
     'message' => "Zfinances a transformé notre gestion comptable. Une réactivité exemplaire et des conseils fiscaux qui nous ont fait réaliser des économies substantielles."],
    ['author' => 'Antoine Bernard', 'company' => 'Consultant · AB Conseil', 'rating' => 5,
     'message' => "Compétents et accessibles : disponibles, pédagogues et toujours à jour sur les évolutions réglementaires."],
    ['author' => 'Sophie Charpentier', 'company' => 'Co-fondatrice · GreenStart', 'rating' => 5,
     'message' => "Leur accompagnement lors de notre levée de fonds a été décisif. Partenaire de confiance !"],
];
$list = !empty($testimonials) ? $testimonials : $defaultTestimonials;

$services = [
    ['emoji' => '📊', 'title' => 'Expertise Comptable', 'desc' => 'Tenue et révision de comptabilité, bilans, liasses fiscales et reporting financier.', 'tags' => ['Bilan','Comptabilité','Liasse fiscale']],
    ['emoji' => '🔎', 'title' => 'Audit Financier', 'desc' => 'Audit légal et contractuel, commissariat aux comptes, certification des comptes.', 'tags' => ['Audit légal','CAC','Certification']],
    ['emoji' => '💼', 'title' => 'Conseil Fiscal', 'desc' => 'Optimisation fiscale, déclarations, accompagnement lors des contrôles fiscaux.', 'tags' => ['Optimisation','Déclarations','TVA']],
    ['emoji' => '⚖️', 'title' => 'Conseil Juridique', 'desc' => 'Création et transformation de sociétés, statuts, pactes d\'associés, fusions.', 'tags' => ['Création','Statuts','Fusion']],
    ['emoji' => '👥', 'title' => 'Gestion de Paie', 'desc' => 'Externalisation de la paie, bulletins, déclarations sociales et accompagnement RH.', 'tags' => ['Bulletins','Déclarations','RH']],
    ['emoji' => '🚀', 'title' => 'Accompagnement', 'desc' => 'Business plan, prévisionnel, levée de fonds et suivi de la performance.', 'tags' => ['Business plan','Prévisionnel','Levée de fonds']],
];

$values = [
    ['emoji' => '✅', 'title' => 'Rigueur', 'desc' => 'Respect strict des normes professionnelles et réglementaires.'],
    ['emoji' => '🤝', 'title' => 'Proximité', 'desc' => 'Un interlocuteur dédié, disponible et à l\'écoute.'],
    ['emoji' => '⏱️', 'title' => 'Réactivité', 'desc' => 'Réponses rapides et délais scrupuleusement respectés.'],
    ['emoji' => '🔍', 'title' => 'Transparence', 'desc' => 'Honoraires clairs et reporting régulier.'],
];
?>

<!-- HERO -->
<section id="hero">
    <div class="hero-pattern"></div>
    <div class="hero-geo"></div>
    <div class="container">
        <div class="hero-inner">
            <div class="hero-content fade-in">
                <div class="hero-badge"><span class="hero-badge-dot"></span>Expertise comptable &amp; Audit financier</div>
                <h1 class="hero-title">Votre réussite<br>financière,<br><span>notre expertise</span></h1>
                <p class="hero-subtitle">Zfinances accompagne les entreprises et les indépendants dans la gestion de leurs obligations comptables, fiscales et financières avec rigueur, transparence et réactivité.</p>
                <div class="hero-cta">
                    <a href="#services" class="btn btn-primary">Nos services</a>
                    <a href="#contact" class="btn btn-outline">Nous contacter</a>
                </div>
                <div class="hero-stats">
                    <div class="hero-stat"><span class="hero-stat-num counter" data-target="200" data-prefix="+">+200</span><span class="hero-stat-label">Clients satisfaits</span></div>
                    <div class="hero-stat-divider"></div>
                    <div class="hero-stat"><span class="hero-stat-num counter" data-target="15" data-prefix="+">+15</span><span class="hero-stat-label">Ans d'expérience</span></div>
                    <div class="hero-stat-divider"></div>
                    <div class="hero-stat"><span class="hero-stat-num counter" data-target="98" data-suffix="%">98%</span><span class="hero-stat-label">De satisfaction</span></div>
                </div>
            </div>
            <div class="hero-visual fade-in" style="transition-delay:.2s;">
                <div class="media-frame" style="max-width:460px;">
                    <img src="https://images.unsplash.com/photo-1554224155-6726b3ff858f?auto=format&fit=crop&w=900&q=80" alt="Conseil financier Zfinances" style="height:320px;">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- SERVICES -->
<section id="services">
    <div class="container">
        <div class="section-header fade-in">
            <span class="section-label">Nos services</span>
            <h2>Une expertise complète<br>à votre service</h2>
            <p>Une gamme complète de solutions pour sécuriser et optimiser votre gestion financière.</p>
        </div>
        <div class="services-grid">
            <?php foreach ($services as $i => $s): ?>
            <div class="service-card fade-in" style="transition-delay:<?= $i * 0.1 ?>s">
                <div class="service-icon" style="font-size:1.5rem;"><?= $s['emoji'] ?></div>
                <h3><?= e($s['title']) ?></h3>
                <p><?= e($s['desc']) ?></p>
                <div class="service-tags">
                    <?php foreach ($s['tags'] as $t): ?><span class="service-tag"><?= e($t) ?></span><?php endforeach; ?>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- NOTRE APPROCHE (photo) -->
<section style="padding:100px 0;background:#fff;">
    <div class="container">
        <div class="approach fade-in">
            <img src="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&w=1600&q=80" alt="Approche Zfinances">
            <div class="overlay"></div>
            <div class="approach-content">
                <span class="section-label" style="background:rgba(255,255,255,.16);color:#fff;">Notre approche</span>
                <h2>Des décisions financières éclairées, fondées sur la donnée</h2>
                <p style="margin:16px 0 28px;">De la tenue comptable au conseil stratégique, nous transformons vos chiffres en leviers de croissance.</p>
                <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(140px,1fr));gap:22px;">
                    <div><div class="counter" data-target="50" data-prefix="+" style="font-size:1.9rem;font-weight:900;">+50</div><div style="font-size:.8rem;color:#CCCCFF;">Secteurs couverts</div></div>
                    <div><div class="counter" data-target="98" data-suffix="%" style="font-size:1.9rem;font-weight:900;">98%</div><div style="font-size:.8rem;color:#CCCCFF;">Clients fidèles</div></div>
                    <div><div style="font-size:1.9rem;font-weight:900;">24h</div><div style="font-size:.8rem;color:#CCCCFF;">Délai de réponse</div></div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ABOUT -->
<section id="about">
    <div class="container">
        <div class="about-inner">
            <div class="about-left fade-in">
                <span class="section-label">À propos</span>
                <h2>Pourquoi choisir<br>Zfinances ?</h2>
                <p>Cabinet d'expertise comptable et d'audit financier, Zfinances place la relation client au cœur de son activité. Notre équipe accompagne plus de 200 entreprises et indépendants.</p>
                <p>Nous ne sommes pas de simples prestataires : nous sommes vos partenaires de confiance pour pérenniser votre succès financier.</p>
                <a href="#contact" class="btn btn-primary" style="margin-top:8px;">Prendre rendez-vous</a>
            </div>
            <div class="about-values fade-in" style="transition-delay:.2s;">
                <div class="media-frame" style="margin-bottom:4px;"><img src="https://images.unsplash.com/photo-1521737604893-d14cc237f11d?auto=format&fit=crop&w=700&q=80" alt="Équipe Zfinances" style="height:180px;"></div>
                <?php foreach ($values as $v): ?>
                <div class="value-card">
                    <div class="value-icon" style="font-size:1.1rem;"><?= $v['emoji'] ?></div>
                    <div class="value-text"><h4><?= e($v['title']) ?></h4><p><?= e($v['desc']) ?></p></div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

<!-- ILS NOUS FONT CONFIANCE -->
<section id="trust">
    <div class="container">
        <div class="trust-head fade-in">
            <span class="section-label">Références clients</span>
            <h2>Ils nous font confiance</h2>
            <p class="trust-sub">Des PME aux grands groupes, plus de 200 organisations s'appuient sur Zfinances pour leur comptabilité, leur audit et leur conseil fiscal.</p>
        </div>
    </div>

    <?php
    $half = (int) ceil(count($trustLogos) / 2);
    $row1 = array_slice($trustLogos, 0, $half);
    $row2 = array_slice($trustLogos, $half);
    ?>
    <div class="marquee">
        <div class="marquee-track to-right">
            <?php foreach (array_merge($row1, $row1) as $logo): ?><div class="logo-chip"><?= e($logo) ?></div><?php endforeach; ?>
        </div>
    </div>
    <div class="marquee">
        <div class="marquee-track to-left">
            <?php foreach (array_merge($row2, $row2) as $logo): ?><div class="logo-chip ghost"><?= e($logo) ?></div><?php endforeach; ?>
        </div>
    </div>

    <div class="container">
        <div class="trust-categories fade-in">
            <div class="trust-cat"><h4>📒 Tenue comptable</h4><ul><li>INFOBIP</li><li>REDITECH</li><li>TEXAF BILEMBO</li><li>WIKO</li><li>SPLITTI · MAFRALAND</li></ul></div>
            <div class="trust-cat"><h4>👥 Ressources humaines</h4><ul><li>INFOBIP</li><li>OADC</li><li>WIOCC</li><li>ASCOMA</li><li>PACTILIS</li></ul></div>
            <div class="trust-cat"><h4>📈 Projets d'investissement</h4><ul><li>MSALABS</li><li>ABC</li><li>MAFRALAND</li><li>AMIGO FOODS</li><li>NURAN</li></ul></div>
            <div class="trust-cat"><h4>💼 Conseil fiscal</h4><ul><li>UTEXAFRICA · IMMOTEX</li><li>COTEX · CARRIGRES</li><li>STANDARD TELECOM</li><li>GROUPE PYGMA · SFA</li><li>CTG · IPP · CJIC</li></ul></div>
        </div>
    </div>
</section>

<!-- STATS -->
<section id="stats">
    <div class="container">
        <div class="stats-inner">
            <div class="stat-item fade-in"><div class="stat-number counter" data-target="200" data-prefix="+">+200</div><div class="stat-label">Clients accompagnés</div></div>
            <div class="stat-item fade-in" style="transition-delay:.1s"><div class="stat-number counter" data-target="15" data-prefix="+">+15</div><div class="stat-label">Ans d'expérience</div></div>
            <div class="stat-item fade-in" style="transition-delay:.2s"><div class="stat-number counter" data-target="50" data-prefix="+">+50</div><div class="stat-label">Secteurs d'activité</div></div>
            <div class="stat-item fade-in" style="transition-delay:.3s"><div class="stat-number counter" data-target="98" data-suffix="%">98%</div><div class="stat-label">Taux de satisfaction</div></div>
        </div>
    </div>
</section>

<!-- TESTIMONIALS -->
<section id="testimonials">
    <div class="container">
        <div class="section-header fade-in">
            <span class="section-label">Témoignages</span>
            <h2>Ce que disent nos clients</h2>
            <p>La satisfaction de nos clients est notre meilleure récompense.</p>
        </div>
        <div class="testimonials-grid">
            <?php foreach ($list as $i => $t): ?>
            <div class="testimonial-card fade-in" style="transition-delay:<?= $i * 0.1 ?>s">
                <div class="testimonial-stars"><?php for ($s = 0; $s < (int)($t['rating'] ?? 5); $s++): ?><span class="star">★</span><?php endfor; ?></div>
                <p class="testimonial-text">"<?= e($t['message']) ?>"</p>
                <div class="testimonial-author">
                    <div class="author-avatar"><?= e(mb_strtoupper(mb_substr($t['author'], 0, 2))) ?></div>
                    <div>
                        <div class="author-name"><?= e($t['author']) ?></div>
                        <div class="author-company"><?= e($t['company'] ?? '') ?></div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- CONTACT -->
<section id="contact">
    <div class="container">
        <div class="contact-inner">
            <div class="contact-form-wrap fade-in">
                <span class="section-label">Contact</span>
                <h2>Parlons de votre projet</h2>
                <p>Remplissez le formulaire et nous vous recontacterons sous 24h ouvrées.</p>
                <form id="contactForm" method="POST" action="<?= base_url('/contact') ?>">
                    <?= csrf_field() ?>
                    <div class="form-row">
                        <div class="form-group"><label for="nom">Nom complet *</label><input type="text" id="nom" name="nom" placeholder="Jean Dupont" required></div>
                        <div class="form-group"><label for="email">Email *</label><input type="email" id="email" name="email" placeholder="jean@exemple.cd" required></div>
                    </div>
                    <div class="form-row">
                        <div class="form-group"><label for="telephone">Téléphone</label><input type="tel" id="telephone" name="telephone" placeholder="+243 00 00 00 000"></div>
                        <div class="form-group"><label for="sujet">Sujet *</label>
                            <select id="sujet" name="sujet" required>
                                <option value="">Sélectionner un service</option>
                                <option value="comptabilite">Expertise Comptable</option>
                                <option value="audit">Audit Financier</option>
                                <option value="fiscal">Conseil Fiscal</option>
                                <option value="juridique">Conseil Juridique</option>
                                <option value="paie">Gestion de Paie</option>
                                <option value="entrepreneurial">Accompagnement</option>
                                <option value="autre">Autre</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group"><label for="message">Message *</label><textarea id="message" name="message" placeholder="Décrivez votre besoin..." required></textarea></div>
                    <button type="submit" class="btn btn-primary" style="width:100%;justify-content:center;">Envoyer le message</button>
                </form>
            </div>
            <div class="contact-info fade-in" style="transition-delay:.2s;">
                <span class="section-label">Coordonnées</span>
                <h3>Nos informations</h3>
                <p>Contactez-nous directement par téléphone ou email.</p>
                <div class="contact-items">
                    <div class="contact-item"><div class="contact-item-icon">📍</div><div class="contact-item-text"><strong>Adresse</strong><span>372, Av. Col. Mondjiba, C/Ngaliema<br>Kinshasa — RDC</span></div></div>
                    <div class="contact-item"><div class="contact-item-icon">📞</div><div class="contact-item-text"><strong>Téléphone</strong><span>+243 000 000 000</span></div></div>
                    <div class="contact-item"><div class="contact-item-icon">✉️</div><div class="contact-item-text"><strong>Email</strong><span>contact@zfinances.cd</span></div></div>
                </div>
                <div class="contact-hours">
                    <h4>⏰ Horaires d'ouverture</h4>
                    <div class="hours-row"><strong>Lun – Ven</strong><span>9h00 – 18h00</span></div>
                    <div class="hours-row"><strong>Samedi</strong><span>9h00 – 12h00</span></div>
                    <div class="hours-row"><strong>Dimanche</strong><span>Fermé</span></div>
                </div>
            </div>
        </div>
    </div>
</section>

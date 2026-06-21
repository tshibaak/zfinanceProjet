<?php /** Variables : $totalContacts, $unread, $subscribers, $testimonials */ ?>
<div class="header">
    <h1>Tableau de Bord</h1>
    <p>Bienvenue dans l'espace d'administration Zfinances.</p>
</div>
<div class="stats">
    <div class="card"><h3>Messages Contact</h3><div class="number"><?= (int) $totalContacts ?></div></div>
    <div class="card"><h3>Messages non lus</h3><div class="number"><?= (int) $unread ?></div></div>
    <div class="card"><h3>Abonnés Newsletter</h3><div class="number"><?= (int) $subscribers ?></div></div>
    <div class="card"><h3>Témoignages</h3><div class="number"><?= (int) $testimonials ?></div></div>
</div>

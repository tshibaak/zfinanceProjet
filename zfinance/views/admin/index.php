<?php
if (!isset($totalContacts)) {
    $totalContacts = 0;
}
if (!isset($totalSubscribers)) {
    $totalSubscribers = 0;
}
if (!isset($totalTestimonials)) {
    $totalTestimonials = 0;
}
if (!isset($unread)) {
    $unread = 0;
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin</title>
    <link rel="stylesheet" href="../../public/assets/css/admin.css">
</head>

<body>

<div class="sidebar">

    <h2>ADMIN</h2>

    <ul>
        <li>
            <a href="dashboard.php">🏠 Dashboard</a>
        </li>

        <li>
            <a href="contacts.php">📩 Messages Contact</a>
        </li>

        <li>
            <a href="newsletter.php">📧 Newsletter</a>
        </li>

        <li>
            <a href="testimonials.php">⭐ Témoignages</a>
        </li>

        <li>
            <a href="../../index.php?q=accueil">↩ Retour au site</a>
        </li>

        <li>
            <a href="logout.php">🚪 Déconnexion</a>
        </li>
    </ul>

</div>

<div class="main">

    <div class="header">
        <h1>Tableau de Bord</h1>
        <p>Bienvenue dans l'espace d'administration.</p>
    </div>

    <div class="stats">

        <div class="card">
            <h3>Messages Contact</h3>
            <div class="number">
                <?= $totalContacts ? $totalContacts : 0 ?>
            </div>
        </div>

        <div class="card">
            <h3>Newsletter</h3>
            <div class="number">
                <?= $totalSubscribers ? $totalSubscribers : 0 ?>
            </div>
        </div>

        <div class="card">
            <h3>Témoignages</h3>
            <div class="number">
                <?= $totalTestimonials ? $totalTestimonials : 0 ?>
            </div>
        </div>

        <div class="card">
            <h3>Messages non lus</h3>
            <div class="number">
                <?= $unread ? $unread : 0 ?>
            </div>
        </div>

    </div>

</div>

</body>
</html>

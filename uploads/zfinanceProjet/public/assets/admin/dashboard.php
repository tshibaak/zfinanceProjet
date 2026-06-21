<?php

session_start();

if(empty($_SESSION['admin_logged'])){
    header('Location: login.php');
    exit;
}

require "../../../src/config/db.php";

$totalContacts = $db->query("
SELECT COUNT(*) FROM contacts
")->fetchColumn();

$totalSubscribers = $db->query("
SELECT COUNT(*) FROM subscribers
")->fetchColumn();

$totalTestimonials = $db->query("
SELECT COUNT(*) FROM testimonials
")->fetchColumn();

$unread = $db->query("
SELECT COUNT(*)
FROM contacts
WHERE statut='non_lu'
")->fetchColumn();

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin</title>
    <link rel="stylesheet" href="assets/css/admin.css">
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
                <?= $totalContacts ?>
            </div>
        </div>

        <div class="card">
            <h3>Newsletter</h3>
            <div class="number">
                <?= $totalSubscribers ?>
            </div>
        </div>

        <div class="card">
            <h3>Témoignages</h3>
            <div class="number">
                <?= $totalTestimonials ?>
            </div>
        </div>

        <div class="card">
            <h3>Messages non lus</h3>
            <div class="number">
                <?= $unread ?>
            </div>
        </div>

    </div>

</div>

</body>
</html>
<?php
session_start();

require __DIR__ . '/../config/db.php';

$redirect = '../../public/index.php?q=accueil#zf-contact';

function redirectNewsletter()
{
    global $redirect;
    header('Location: ' . $redirect);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    redirectNewsletter();
}

$email = trim($_POST['email'] ?? '');

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $_SESSION['message_error_accueil'] = 'Veuillez entrer une adresse email valide.';
    redirectNewsletter();
}

try {
    $stmt = $db->prepare("
        INSERT INTO subscribers (email)
        VALUES (:email)
        ON DUPLICATE KEY UPDATE email = VALUES(email)
    ");
    $stmt->execute([':email' => $email]);

    $_SESSION['message_accueil_ok'] = 'Votre inscription a la newsletter est confirmee.';
} catch (PDOException $e) {
    $_SESSION['message_error_accueil'] = 'Impossible d enregistrer votre inscription pour le moment.';
}

redirectNewsletter();

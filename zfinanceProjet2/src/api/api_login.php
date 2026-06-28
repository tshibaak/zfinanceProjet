<?php
session_start();

require __DIR__ . '/../config/db.php';

$loginRedirect = '../../public/index.php?q=login';
$adminRedirect = '../../public/index.php?q=admin';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ' . $loginRedirect);
    exit;
}

$user = trim($_POST['username'] ?? '');
$pass = trim($_POST['password'] ?? '');

if ($user === '' || $pass === '') {
    $_SESSION['message_error'] = 'Veuillez remplir tous les champs.';
    header('Location: ' . $loginRedirect);
    exit;
}

try {
    $stmt = $db->prepare("
        SELECT COUNT(*)
        FROM admin
        WHERE nameAdmin = :nameAdmin
          AND passAdmin = :passAdmin
    ");
    $stmt->execute([
        ':nameAdmin' => $user,
        ':passAdmin' => $pass,
    ]);

    if ((int) $stmt->fetchColumn() > 0) {
        $_SESSION['admin_logged'] = true;
        header('Location: ' . $adminRedirect);
        exit;
    }

    $_SESSION['message_error'] = 'Identifiants invalides.';
    header('Location: ' . $loginRedirect);
    exit;
} catch (PDOException $e) {
    $_SESSION['message_error'] = 'Connexion admin indisponible pour le moment.';
    header('Location: ' . $loginRedirect);
    exit;
}

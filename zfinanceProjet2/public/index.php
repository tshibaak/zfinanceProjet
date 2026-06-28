<?php
session_start();

$page = strtolower(trim($_GET['q'] ?? 'accueil'));

switch ($page) {
    case 'admin':
    case 'dashboard':
        if (!empty($_SESSION['admin_logged'])) {
            header('Location: assets/admin/dashboard.php');
        } else {
            header('Location: assets/admin/login.php');
        }
        exit;

    case 'login':
        header('Location: assets/admin/login.php');
        exit;

    case 'logout':
        header('Location: assets/admin/logout.php');
        exit;

    case 'accueil':
    case 'home':
    case '':
        require __DIR__ . '/assets/pages/Zfinances Site.dc.php';
        break;

    default:
        http_response_code(404);
        require __DIR__ . '/assets/pages/Zfinances Site.dc.php';
        break;
}

<?php
/**
 * Configuration de l'application.
 * En production, surchargez ces valeurs via des variables d'environnement.
 */

return [
    'app' => [
        'name'     => 'Zfinances',
        'base_url' => '',          // ex: '' si servi à la racine, '/zfinance' sinon
        'debug'    => true,        // false en production
    ],

    'db' => [
        'host'    => getenv('DB_HOST') ?: '127.0.0.1',
        'port'    => getenv('DB_PORT') ?: '3306',
        'name'    => getenv('DB_NAME') ?: 'zfinance',
        'user'    => getenv('DB_USER') ?: 'root',
        'pass'    => getenv('DB_PASS') ?: '',
        'charset' => 'utf8mb4',
    ],

    'admin' => [
        // Identifiant par défaut (le mot de passe est stocké HASHÉ en base, voir database/seed.php)
        'session_key' => 'zf_admin_id',
    ],
];

<?php
/**
 * Crée le compte admin par défaut avec un mot de passe HASHÉ.
 * Usage : php database/seed.php
 */

require __DIR__ . '/../app/Core/App.php';
\App\Core\App::boot(dirname(__DIR__));

$admin = new \App\Models\Admin();

$username = 'admin';
$password = 'admin123'; // À CHANGER en production

try {
    if ($admin->create($username, $password)) {
        echo "Compte admin créé : $username / $password\n";
        echo "Pensez à changer le mot de passe.\n";
    }
} catch (\PDOException $e) {
    // Probablement déjà existant (UNIQUE)
    echo "Le compte admin existe déjà (ou erreur) : " . $e->getMessage() . "\n";
}

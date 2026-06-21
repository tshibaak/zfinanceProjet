<?php
namespace App\Core;

use PDO;

/**
 * Modèle de base : fournit l'accès PDO aux modèles concrets.
 */
abstract class Model
{
    protected PDO $db;

    public function __construct()
    {
        $this->db = Database::pdo();
    }
}

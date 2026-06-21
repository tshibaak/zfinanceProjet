<?php
namespace App\Models;

use App\Core\Model;

/** Table `admin` — comptes administrateurs. */
final class Admin extends Model
{
    /**
     * Vérifie les identifiants et retourne l'id admin si OK, sinon null.
     * Le mot de passe est stocké HASHÉ (password_hash) — fini le clair.
     */
    public function verify(string $username, string $password): ?int
    {
        $stmt = $this->db->prepare('SELECT id, passAdmin FROM admin WHERE nameAdmin = ? LIMIT 1');
        $stmt->execute([$username]);
        $row = $stmt->fetch();

        if ($row && password_verify($password, $row['passAdmin'])) {
            return (int) $row['id'];
        }
        return null;
    }

    public function create(string $username, string $password): bool
    {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        return $this->db->prepare('INSERT INTO admin (nameAdmin, passAdmin) VALUES (?, ?)')
                        ->execute([$username, $hash]);
    }
}

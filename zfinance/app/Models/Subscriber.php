<?php
namespace App\Models;

use App\Core\Model;

/** Table `subscribers` — abonnés à la newsletter. */
final class Subscriber extends Model
{
    /** true si inséré, false si déjà abonné. */
    public function subscribe(string $email): bool
    {
        $stmt = $this->db->prepare('SELECT COUNT(*) FROM subscribers WHERE email = ?');
        $stmt->execute([$email]);
        if ((int) $stmt->fetchColumn() > 0) {
            return false;
        }
        return $this->db->prepare('INSERT INTO subscribers (email) VALUES (?)')->execute([$email]);
    }

    public function all(): array
    {
        return $this->db->query('SELECT * FROM subscribers ORDER BY created_at DESC')->fetchAll();
    }

    public function count(): int
    {
        return (int) $this->db->query('SELECT COUNT(*) FROM subscribers')->fetchColumn();
    }
}

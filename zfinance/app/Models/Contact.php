<?php
namespace App\Models;

use App\Core\Model;

/** Table `contacts` — messages du formulaire de contact. */
final class Contact extends Model
{
    public function create(array $data): bool
    {
        $sql = 'INSERT INTO contacts (nom, email, telephone, sujet, message)
                VALUES (:nom, :email, :telephone, :sujet, :message)';
        return $this->db->prepare($sql)->execute([
            ':nom'       => $data['nom'],
            ':email'     => $data['email'],
            ':telephone' => $data['telephone'],
            ':sujet'     => $data['sujet'],
            ':message'   => $data['message'],
        ]);
    }

    public function all(): array
    {
        return $this->db->query('SELECT * FROM contacts ORDER BY created_at DESC')->fetchAll();
    }

    public function markRead(int $id): bool
    {
        return $this->db->prepare("UPDATE contacts SET statut = 'lu' WHERE id = ?")->execute([$id]);
    }

    public function delete(int $id): bool
    {
        return $this->db->prepare('DELETE FROM contacts WHERE id = ?')->execute([$id]);
    }

    public function count(): int
    {
        return (int) $this->db->query('SELECT COUNT(*) FROM contacts')->fetchColumn();
    }

    public function countUnread(): int
    {
        return (int) $this->db->query("SELECT COUNT(*) FROM contacts WHERE statut = 'non_lu'")->fetchColumn();
    }
}

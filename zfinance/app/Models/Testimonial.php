<?php
namespace App\Models;

use App\Core\Model;

/** Table `testimonials` — témoignages affichés sur le site. */
final class Testimonial extends Model
{
    /** Témoignages publiables sur la page d'accueil. */
    public function published(int $limit = 3): array
    {
        $stmt = $this->db->prepare('SELECT * FROM testimonials ORDER BY created_at DESC LIMIT ?');
        $stmt->bindValue(1, $limit, \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function all(): array
    {
        return $this->db->query('SELECT * FROM testimonials ORDER BY created_at DESC')->fetchAll();
    }

    public function create(array $data): bool
    {
        $sql = 'INSERT INTO testimonials (author, company, message, rating)
                VALUES (:author, :company, :message, :rating)';
        return $this->db->prepare($sql)->execute([
            ':author'  => $data['author'],
            ':company' => $data['company'],
            ':message' => $data['message'],
            ':rating'  => $data['rating'],
        ]);
    }

    public function delete(int $id): bool
    {
        return $this->db->prepare('DELETE FROM testimonials WHERE id = ?')->execute([$id]);
    }

    public function count(): int
    {
        return (int) $this->db->query('SELECT COUNT(*) FROM testimonials')->fetchColumn();
    }
}

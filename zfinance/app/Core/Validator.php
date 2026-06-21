<?php
namespace App\Core;

/**
 * Validation légère des entrées utilisateur.
 * Centralise les regex qui étaient éparpillées dans les anciens fichiers api_*.php.
 */
final class Validator
{
    private array $errors = [];

    public const PATTERNS = [
        'name'  => "/^[a-zA-ZÀ-ÿ0-9\\s'.\\-&]+$/u",
        'email' => '/^[a-zA-Z0-9._%+\\-]+@[a-zA-Z0-9.\\-]+\\.[a-zA-Z]{2,}$/',
        'phone' => '/^(\\+?\\d{1,4}[\\s.\\-]?)?(\\d[\\s.\\-]?){6,14}$/',
        'word'  => '/^[a-zA-ZÀ-ÿ\\-]+$/u',
    ];

    public function require(string $field, ?string $value, string $label): self
    {
        if ($value === null || trim($value) === '') {
            $this->errors[$field] = "Le champ « $label » est requis.";
        }
        return $this;
    }

    public function match(string $field, ?string $value, string $pattern, string $message): self
    {
        if (isset($this->errors[$field])) {
            return $this; // déjà en erreur (requis manquant)
        }
        if ($value !== null && $value !== '' && !preg_match($pattern, $value)) {
            $this->errors[$field] = $message;
        }
        return $this;
    }

    public function fails(): bool
    {
        return !empty($this->errors);
    }

    public function errors(): array
    {
        return $this->errors;
    }

    public function firstError(): ?string
    {
        return $this->errors ? reset($this->errors) : null;
    }
}

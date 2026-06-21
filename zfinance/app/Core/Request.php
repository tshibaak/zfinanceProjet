<?php
namespace App\Core;

/**
 * Encapsule la requête HTTP courante (méthode, chemin, entrées).
 */
final class Request
{
    public function method(): string
    {
        return strtoupper($_SERVER['REQUEST_METHOD'] ?? 'GET');
    }

    public function path(): string
    {
        $uri = $_SERVER['REQUEST_URI'] ?? '/';
        $path = parse_url($uri, PHP_URL_PATH) ?: '/';

        // Retire le sous-dossier de base éventuel (ex: /zfinance/public)
        $base = App::config('app')['base_url'] ?? '';
        if ($base && str_starts_with($path, $base)) {
            $path = substr($path, strlen($base));
        }
        return $path ?: '/';
    }

    /** Valeur POST/GET nettoyée (trim). */
    public function input(string $key, ?string $default = null): ?string
    {
        $value = $_POST[$key] ?? $_GET[$key] ?? $default;
        return is_string($value) ? trim($value) : $value;
    }

    public function all(): array
    {
        return array_merge($_GET, $_POST);
    }
}

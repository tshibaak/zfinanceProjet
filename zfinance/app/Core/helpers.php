<?php
/**
 * Helpers globaux disponibles dans toutes les vues.
 */

if (!function_exists('e')) {
    /** Échappement HTML sûr. */
    function e(?string $value): string
    {
        return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
    }
}

if (!function_exists('csrf_field')) {
    function csrf_field(): string
    {
        return \App\Core\Csrf::field();
    }
}

if (!function_exists('base_url')) {
    function base_url(string $path = ''): string
    {
        return (\App\Core\App::config('app')['base_url'] ?? '') . $path;
    }
}

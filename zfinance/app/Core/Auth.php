<?php
namespace App\Core;

/**
 * Authentification admin basée sur la session.
 * Remplace le bloc "if(empty($_SESSION['admin_logged']))" copié partout.
 */
final class Auth
{
    private static function key(): string
    {
        return App::config('admin')['session_key'];
    }

    public static function login(int $adminId): void
    {
        session_regenerate_id(true);
        Session::set(self::key(), $adminId);
    }

    public static function check(): bool
    {
        return Session::get(self::key()) !== null;
    }

    public static function id(): ?int
    {
        $id = Session::get(self::key());
        return $id !== null ? (int) $id : null;
    }

    public static function logout(): void
    {
        Session::forget(self::key());
        session_destroy();
    }

    /** Middleware : redirige vers le login si non connecté. */
    public static function requireAdmin(): void
    {
        if (!self::check()) {
            header('Location: ' . (App::config('app')['base_url'] ?? '') . '/admin/login');
            exit;
        }
    }
}

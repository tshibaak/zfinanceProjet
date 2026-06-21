<?php
namespace App\Core;

/**
 * Protection CSRF : un jeton par session, vérifié sur chaque POST.
 */
final class Csrf
{
    public static function token(): string
    {
        if (empty($_SESSION['_csrf'])) {
            $_SESSION['_csrf'] = bin2hex(random_bytes(32));
        }
        return $_SESSION['_csrf'];
    }

    /** Champ caché à insérer dans les formulaires. */
    public static function field(): string
    {
        return '<input type="hidden" name="_csrf" value="' . self::token() . '">';
    }

    public static function check(?string $token): bool
    {
        return is_string($token)
            && !empty($_SESSION['_csrf'])
            && hash_equals($_SESSION['_csrf'], $token);
    }

    /** Bloque la requête si le jeton est invalide. */
    public static function verify(Request $request): void
    {
        if (!self::check($request->input('_csrf'))) {
            http_response_code(419);
            exit('Session expirée. Veuillez réessayer.');
        }
    }
}

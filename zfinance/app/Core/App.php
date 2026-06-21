<?php
namespace App\Core;

/**
 * Conteneur applicatif minimal : config + autoloader + bootstrap.
 */
final class App
{
    private static array $config = [];

    /** Charge la configuration et enregistre l'autoloader PSR-4 (App\ => app/). */
    public static function boot(string $basePath): void
    {
        self::$config = require $basePath . '/config/config.php';

        require_once $basePath . '/app/Core/helpers.php';

        spl_autoload_register(function (string $class) use ($basePath) {
            if (!str_starts_with($class, 'App\\')) {
                return;
            }
            $relative = str_replace('\\', '/', substr($class, 4)); // retire "App\"
            $file = $basePath . '/app/' . $relative . '.php';
            if (is_file($file)) {
                require $file;
            }
        });

        Session::start();
    }

    /** Accès à une section de configuration : App::config('db'). */
    public static function config(string $key): mixed
    {
        return self::$config[$key] ?? null;
    }
}

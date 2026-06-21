<?php
namespace App\Core;

/**
 * Contrôleur de base : rendu des vues, redirections, helpers.
 */
abstract class Controller
{
    /**
     * Rend une vue dans un layout.
     * @param string $view   ex: 'home/index' ou 'admin/contacts'
     * @param array  $data   variables exposées à la vue
     * @param string $layout 'public' | 'admin' | '' (aucun)
     */
    protected function view(string $view, array $data = [], string $layout = 'public'): void
    {
        $basePath = dirname(__DIR__) . '/Views/';
        extract($data, EXTR_SKIP);

        ob_start();
        require $basePath . $view . '.php';
        $content = ob_get_clean();

        if ($layout === '') {
            echo $content;
            return;
        }
        require $basePath . 'layouts/' . $layout . '.php';
    }

    protected function redirect(string $path): void
    {
        $base = App::config('app')['base_url'] ?? '';
        header('Location: ' . $base . $path);
        exit;
    }

    protected function json(array $payload, int $status = 200): void
    {
        http_response_code($status);
        header('Content-Type: application/json');
        echo json_encode($payload);
        exit;
    }

    /** Échappement HTML — à utiliser dans toutes les vues : <?= e($x) ?> */
    public static function e(?string $value): string
    {
        return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
    }
}

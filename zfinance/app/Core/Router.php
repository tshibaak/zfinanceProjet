<?php
namespace App\Core;

/**
 * Routeur simple : associe (méthode HTTP + chemin) à "Controller@method".
 * Les contrôleurs admin sont préfixés par "Admin\".
 */
final class Router
{
    private array $routes = ['GET' => [], 'POST' => []];

    public function get(string $path, string $action): void
    {
        $this->routes['GET'][$this->normalize($path)] = $action;
    }

    public function post(string $path, string $action): void
    {
        $this->routes['POST'][$this->normalize($path)] = $action;
    }

    private function normalize(string $path): string
    {
        $path = '/' . trim($path, '/');
        return $path === '/' ? '/' : rtrim($path, '/');
    }

    public function dispatch(Request $request): void
    {
        $method = $request->method();
        $path   = $this->normalize($request->path());

        $action = $this->routes[$method][$path] ?? null;

        if ($action === null) {
            http_response_code(404);
            echo '<h1>404 — Page introuvable</h1>';
            return;
        }

        [$controller, $method2] = explode('@', $action);
        $class = 'App\\Controllers\\' . str_replace('/', '\\', $controller);

        (new $class())->{$method2}($request);
    }
}

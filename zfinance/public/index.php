<?php
/**
 * Front controller — point d'entrée unique de l'application.
 * Toutes les requêtes passent ici (voir .htaccess).
 */

use App\Core\App;
use App\Core\Request;
use App\Core\Router;

require dirname(__DIR__) . '/app/Core/App.php';

App::boot(dirname(__DIR__));

$router = new Router();
require dirname(__DIR__) . '/routes/web.php';

$router->dispatch(new Request());

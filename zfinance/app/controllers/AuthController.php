<?php

namespace App\controllers;

use Router\Router;

class AuthController extends Controller
{
    public function logout()
    {
        session_unset();
        session_destroy();
         
        header("Location: ". Router::route('/login'));
        exit;
    }
}

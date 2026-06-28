<?php

use App\controllers\HomeController;
use App\View;
use Router\Router;

Router::get('/',[HomeController::class,'index']);

Router::get('/login',function(){
    View::view('auth.login');
});


Router::get('/admin/dashboard',[]);
Router::get('/admin/contacts',[]);
Router::get('/admin/newsletter',[]);
Router::get('/admin/testimonials',[]);
?>
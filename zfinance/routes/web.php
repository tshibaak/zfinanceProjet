<?php
/**
 * Déclaration des routes de l'application.
 * $router est fourni par public/index.php.
 */

/** @var \App\Core\Router $router */

// --- Site public ---
$router->get('/',           'HomeController@index');
$router->post('/contact',    'ContactController@store');
$router->post('/newsletter', 'NewsletterController@store');

// --- Authentification admin ---
$router->get('/admin/login',  'Admin/AuthController@showLogin');
$router->post('/admin/login', 'Admin/AuthController@login');
$router->post('/admin/logout','Admin/AuthController@logout');

// --- Espace admin (protégé par Auth::requireAdmin) ---
$router->get('/admin',                  'Admin/DashboardController@index');
$router->get('/admin/contacts',         'Admin/ContactController@index');
$router->post('/admin/contacts/read',   'Admin/ContactController@markRead');
$router->post('/admin/contacts/delete', 'Admin/ContactController@destroy');
$router->get('/admin/newsletter',       'Admin/NewsletterController@index');
$router->get('/admin/testimonials',     'Admin/TestimonialController@index');
$router->post('/admin/testimonials',        'Admin/TestimonialController@store');
$router->post('/admin/testimonials/delete', 'Admin/TestimonialController@destroy');

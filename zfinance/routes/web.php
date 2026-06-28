<?php

use App\View;
use Router\Router;


Router::get('/login',function(){
    View::view('auth.login');
});

?>
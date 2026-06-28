<?php

    //$host = 'localhost';
    $host = "127.0.0.1";
    $dbname = 'zfinance';
    $user = 'root';
    $pass = '';

    try{
        $db = new PDO ("mysql:host=$host;port=3306;dbname=$dbname;charset=utf8" , $user , $pass);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch(PDOException $e){
        die("Erreur de connexion : " .$e->getMessage());
    }

<?php
    session_start();

    require "../config/db.php";

    if($_SERVER["REQUEST_METHOD"] == "POST"){

        $nomUser = $_POST["nom"];
        $emailUser = $_POST["email"];
        $telUser = $_POST["telephone"];
        $sujetUser = $_POST["sujet"];
        $messageUser = $_POST["message"] ?? '';
        
        $patternNomUser = '/^[a-zA-ZÀ-ÿ\s\'-]+$/u'; // regex pour accepter les lettres de l'alphabet et les accents
        $patternEmailUser = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/'; // regex mail
        $patternTelUser = '/^(\+?\d{1,4}[\s.-]?)?(\d[\s.-]?){9,14}$/'; // regex tel
        $patternSujetUser = '/^[a-zA-Z]+$/u'; // regex texte libre
        $patternMessageUser = '/^[\s\S]+$/u'; // regex texte libre

        $message = ["donnée(s) incomplète(s)","donnée(s) invalide(s)"];

        if(
            isset($nomUser) && empty($nomUser) &&
            isset($emailUser) && empty($emailUser) &&
            isset($telUser) && empty($telUser) &&
            isset($sujetUser) && empty($sujetUser)
        ){
            $_SESSION['message_error_accueil'] = $message[0];
            header('Location: ../../public/assets/pages/accueil.php');
            exit;
        }else{
            if(
                preg_match($patternNomUser,$nomUser) &&
                preg_match($patternEmailUser,$emailUser) &&
                preg_match($patternTelUser,$telUser) &&
                preg_match($patternSujetUser,$sujetUser) &&
                preg_match($patternMessageUser,$messageUser)
            ){

                // bdd

                try{
                    $reqInsertin = "insert into contacts(nom,email,telephone,sujet,message) values(:nom,:email,:telephone,:sujet,:message)";
                    $execution = $db->prepare($reqInsertin);
                    $execution->execute([
                        ":nom" =>$nomUser ,
                        ":email" => $emailUser,
                        ":telephone" => $telUser,
                        ":sujet" => $sujetUser,
                        ":message" => $messageUser,
                    ]);
                    $_SESSION["message_accueil_ok"] = "enregistrement réussi";
                    header('Location: ../../public/assets/pages/accueil.php');
                    //header('Location: ../../public/');
                }catch(PDOException $e){
                    die("Erreur lors de la lecture des données : " .$e->getMessage());
                }
        
            }else{
                $_SESSION["message_error_accueil"] = $message[1];
                header('Location: ../../public/assets/pages/accueil.php');
                //header('Location: ../../public/');
                exit;
            }
        }


    }
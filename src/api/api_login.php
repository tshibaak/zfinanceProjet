<?php
session_start();
require "../config/db.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $user = $_POST['username'];
    $pass = $_POST['password'];

    $patternUser = '/^[a-zA-ZÀ-ÿ\s\'-]+$/u'; // regex pour accepter les lettres de l'alphabet et les accents

    $message = ["connexion réussi",
                "connexion échouer" , 
                "donnée(s) invalide(s)" , 
                "caractère interdit présent"
            ];

    if(!isset($user) && empty($user) || !isset($pass) && empty($pass)){
        $_SESSION['message_error'] = $message[2];
        header('Location: ../../public/assets/admin/login.php');
        exit;
    }else{
        if(preg_match($patternUser,$user)){
            // verrification vers la bdd
            try{
                $reqVerification = "select count(*) from admin where nameAdmin = :nameAdmin and passAdmin = :passAdmin";
                $reqExec = $db->prepare($reqVerification);
                $reqExec->execute([
                    ":nameAdmin"=>$user,
                    ":passAdmin"=>$pass
                ]);
                $count_verif = $reqExec->fetchColumn();
                if($count_verif > 0){
                    $_SESSION["admin_logged"] = true;
                    header('Location: ../../public/assets/admin/dashboard.php');
                }else{
                    $_SESSION['message_error'] = $message[3];
                    header('Location: ../../public/assets/admin/login.php');
                    exit;
                }
            }catch(PDOException $e){
                die("Erreur lors de la lecture des données : " .$e->getMessage());
            }

        }else{
            $_SESSION['message_error'] = $message[3];
            header('Location: ../../public/assets/admin/login.php');
            exit;
        }
    }

    // if ($user === ADMIN_USER && password_verify($pass, ADMIN_PASSWORD_HASH)) {
    //     $_SESSION['admin_logged'] = true;
    //     header('Location: dashboard.php');
    //     exit;
    // }
    // $error = 'Identifiants invalides';
}
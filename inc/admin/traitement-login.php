<?php

    require_once '../fonction.php';
    require_once '../route.php';

    if (isset($_POST['username'], $_POST['mdp'],$_POST['type'])) {
        extract($_POST);
        $user = checkLoging($username, $mdp, $type);

        if (is_null($user)) {
            $erreur = 'Nom d\'utilisateur ou mot de passe incorrect';
            header("Location: " . MAIN_URL . "pages/admin/?erreur=" . urlencode($erreur));
        } else {
            session_start();
            $_SESSION['idUser'] = $user['iduser'];
            $_SESSION['typeUser'] = $type;

            if(strcmp($type,'admin')==0){
                header("Location: " . MAIN_URL . "pages/admin/back-office.php");
                
            }
            if(strcmp($type,'user')==0){
                header("Location: " . MAIN_URL . "pages/frontoffice/front.php");
            }
            
        }
    } else {
        $erreur = 'Veuillez remplir tous les champs';
        header("Location: " . MAIN_URL . "pages/admin/?erreur=" . urlencode($erreur));
    }

?>
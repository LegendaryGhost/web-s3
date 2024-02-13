<?php

    require_once '../fonction.php';
    require_once '../route.php';

    if (isset($_POST['username'], $_POST['mdp'])) {
        extract($_POST);
        $user = checkLoging($username, $mdp, 'admin');

        if (is_null($user)) {
            $erreur = 'Nom d\'utilisateur ou mot de passe incorrect';
            header("Location: " . MAIN_URL . "pages/admin/?erreur=" . urlencode($erreur));
        } else {
            session_start();
            $_SESSION['idUser'] = $user['iduser'];
            $_SESSION['typeUser'] = 'admin';
            
            header("Location: " . MAIN_URL . "pages/admin/back-office.php");
        }
    } else {
        $erreur = 'Veuillez remplir tous les champs';
        header("Location: " . MAIN_URL . "pages/admin/?erreur=" . urlencode($erreur));
    }

?>
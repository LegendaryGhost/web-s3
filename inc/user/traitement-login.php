<?php

    require_once '../fonction.php';
    require_once '../route.php';

    if (isset($_POST['username'], $_POST['mdp'])) {
        extract($_POST);
        $user = checkLoging($username, $mdp, 'user');

        if (is_null($user)) {
            $erreur = 'Nom d\'utilisateur ou mot de passe incorrect';
            header("Location: " . MAIN_URL . "pages/user/login.php?erreur=" . urlencode($erreur));
        } else {
            session_start();
            $_SESSION['id_user'] = $user['iduser'];
            // TODO: dashboard redirection
            echo 'Connecte';
        }
    } else {
        $erreur = 'Veuillez remplir tous les champs';
        header("Location: " . MAIN_URL . "pages/user/login.php?erreur=" . urlencode($erreur));
    }

?>
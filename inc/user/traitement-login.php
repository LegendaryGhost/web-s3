<?php

    require_once '../fonction.php';
    require_once '../route.php';

    if (isset($_POST['username'], $_POST['mdp'])) {
        extract($_POST);
        $user = checkLoging($username, $mdp, 'user');
        $user = is_null($user) ? checkLoging($username, $mdp, 'admin') : $user;

        if (is_null($user)) {
            $erreur = 'Nom d\'utilisateur ou mot de passe incorrect';
            header("Location: " . MAIN_URL . "pages/user/index.php?erreur=" . urlencode($erreur));
        } else {
            session_start();
            $_SESSION['idUser'] = $user['iduser'];
            $_SESSION['typeUser'] = $type;
            header("Location: " . MAIN_URL . "pages/frontoffice/front.php");
        }
    } else {
        $erreur = 'Veuillez remplir tous les champs';
        header("Location: " . MAIN_URL . "pages/frontoffice/index.php?erreur=" . urlencode($erreur));
    }

?>
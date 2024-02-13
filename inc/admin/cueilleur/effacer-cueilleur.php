<?php

require_once '../../fonction.php';
require_once '../../route.php';

if (isset($_POST['id'])) {
    extract($_POST);
    deleteCueilleur($id);

    header('Location: ' . MAIN_URL . 'pages/admin/gestion-cueilleur.php');
}

?>
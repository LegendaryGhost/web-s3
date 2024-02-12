<?php

require_once '../../fonction.php';
require_once '../../route.php';

if (isset($_POST['id'], $_POST['nom'])) {
    extract($_POST);

    $reponse = [
        'success' => true,
        'message' => 'Catégorie de dépense ajoutée'
    ];

    if (empty($nom)) {
        $reponse = [
            'status' => false,
            'message' => 'Le nom de la catégorie de dépense ne doit pas être vide'
        ];
    } else {
        updateCategorieDepense($id, $nom);
    }

    header('Location : ' . MAIN_URL . 'pages/admin/categorie.php?succes=' . $reponse['succes'] . '&message=' . urlencode($reponse['message']));
}

?>

<?php

require_once '../../fonction.php';
require_once '../../route.php';

if (isset($_POST['id'], $_POST['nom'], $_POST['genre'], $_POST['salaire'], $_POST['dateNaissance'])) {
    extract($_POST);

    $reponse = [
        'success' => true,
        'message' => 'Cueilleur modifié'
    ];

    if (empty($nom)) {
        $reponse = [
            'status' => false,
            'message' => 'Le nom du cueilleur ne doit pas être vide'
        ];
    } else if ($salaire <=  0) {
        $reponse = [
            'status' => false,
            'message' => 'Le salaire doit être supérieur à  0'
        ];
    } else {
        updateCueilleur($id, $nom, $genre, $salaire, $dateNaissance);
    }
    
    header('Location: ' . MAIN_URL . 'pages/admin/gestion-cueilleur.php?succes=' . $reponse['succes'] . '&message=' . urlencode($reponse['message']));
}

?>

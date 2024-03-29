<?php

require_once '../../fonction.php';
require_once '../../route.php';

if (isset($_POST['idThe'], $_POST['nom'], $_POST['surface'])) {
    extract($_POST);

    $reponse = [
        'success' => true,
        'message' => 'Parcelle ajoutée'
    ];

    if (empty($nom)) {
        $reponse = [
            'status' => false,
            'message' => 'Le nom de la parcelle ne doit pas être vide'
        ];
    } else if ($surface <=  0) {
        $reponse = [
            'status' => false,
            'message' => 'La surface de la parcelle doit être supérieure à  0'
        ];
    } else {
        createParcelle($idThe, $nom, $surface);
    }
    
    echo json_encode($reponse);
}

?>

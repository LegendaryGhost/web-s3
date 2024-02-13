<?php

require_once '../../fonction.php';
require_once '../../route.php';

if (isset($_POST['id'], $_POST['idThe'], $_POST['nom'], $_POST['surface'])) {
    extract($_POST);

    $reponse = [
        'success' => true,
        'message' => 'Parcelle modifiée'
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
        updateParcelle($id, $idThe, $nom, $surface);
    }
 
    echo json_encode($reponse);
}

?>

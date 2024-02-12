<?php

require_once '../../fonction.php';

if (isset($_POST['id'], $_POST['nom'], $_POST['occupation'], $_POST['rendement'])) {
    extract($_POST);

    $reponse = [
        'success' => true,
        'message' => 'Variété de thé modifiée'
    ];

    if (empty($nom)) {
        $reponse = [
            'status' => false,
            'message' => 'Le nom de la variété de thé ne doit pas être vide'
        ];
    } else if ($occupation <= 0) {
        $reponse = [
            'status' => false,
            'message' => 'Le terrain occupé par un pied de thé doit être supérieur à 0'
        ];
    } else if ($rendement <= 0) {
        $reponse = [
            'status' => false,
            'message' => 'Le rendement mensuel d\'un pied de thé doit être supérieur à 0'
        ];
    } else {
        updateTeaThe($id, $nom, $occupation, $rendement);
    }
    
    echo json_encode($reponse);
}

?>
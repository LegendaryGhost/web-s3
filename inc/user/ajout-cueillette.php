<?php

require_once '../../fonction.php';

if (isset($_POST['idCueilleur'], $_POST['idParcelle'], $_POST['dateCueillette'], $_POST['poids'])) {
    extract($_POST);

    $reponse = [];

    if ($poids <= 0) {
        $reponse = [
            'status' => false,
            'message' => 'Le poids doit être supérieur à 0'
        ];
    } else {
        $reponse = insertIntoTeaCueillette($idCueilleur, $idParcelle, $dateCueillette, $poids);
    }

    echo json_encode($reponse);
}

?>

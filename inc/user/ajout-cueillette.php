<?php
require_once('../route.php');
require_once('../fonction.php');

if (isset($_POST['cueilleur'], $_POST['parcelle'], $_POST['date'], $_POST['poids'])) {
   
    extract($_POST);

    $reponse = $reponse = [
        'success' => true,
        'message' => 'Cueillette ajoutée'
    ];

    if ($poids <= 0) {
        $reponse = [
            'status' => false,
            'message' => 'Le poids doit être supérieur à 0'
        ];
    } else {
        $reponse = insertIntoTeaCueillette($cueilleur, $parcelle, $date, $poids);
    }

    echo json_encode($reponse);
}

?>

<?php
require_once('C:\xampp\htdocs\www\Exam\web-s3\inc\route.php');
require_once('C:\xampp\htdocs\www\Exam\web-s3\inc\fonction.php');
var_dump($_POST);
if (isset($_POST['Cueilleur'], $_POST['Parcelle'], $_POST['date'], $_POST['poids'])) {
   
    extract($_POST);

    $reponse = [];

    if ($poids <= 0) {
        $reponse = [
            'status' => false,
            'message' => 'Le poids doit être supérieur à 0'
        ];
    } else {
        $reponse = insertIntoTeaCueillette($Cueilleur, $Parcelle, $date, $poids);
    }

    echo json_encode($reponse);
}
else{
  //  header('Location:'.MAIN_URL.'pages/frontoffice/front.php');
}

?>

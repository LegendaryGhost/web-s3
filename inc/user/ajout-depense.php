<?php
require_once('C:\xampp\htdocs\www\Exam\web-s3\inc\route.php');
require_once('C:\xampp\htdocs\www\Exam\web-s3\inc\fonction.php');
var_dump($_POST);
if (isset($_POST['montant'], $_POST['date_depenses'], $_POST['categorie'])) {
    extract($_POST);

    insertIntoTeaDepense($categorie,$date_depenses,$montant);
    header('Location:'.MAIN_URL.'pages/frontoffice/front.php');
}
else{
    header('Location:'.MAIN_URL.'pages/frontoffice/front.php');
}

?>

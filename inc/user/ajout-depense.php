<?php
require_once('../route.php');
require_once('../fonction.php');

if (isset($_POST['montant'], $_POST['date_depenses'], $_POST['categorie'])) {
    extract($_POST);

    insertIntoTeaDepense($categorie,$date_depenses,$montant);
}
header('Location:'.MAIN_URL.'pages/frontoffice/front.php');

?>

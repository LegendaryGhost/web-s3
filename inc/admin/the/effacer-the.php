<?php

require_once '../../fonction.php';

if (isset($_POST['id'])) {
    extract($_POST);
    try {
        deleteTeaThe($id);
    } catch (PDOException $e) {
        // echo "Erreur ! : " . $e->getMessage();
        echo 'La variété de thé est encore associée avec à une ou plusieurs parcelle(s)';
    }
}

?>
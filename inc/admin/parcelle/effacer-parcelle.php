<?php

require_once '../../fonction.php';

if (isset($_POST['id'])) {
    extract($_POST);
    deleteParcelle($id);
}

?>
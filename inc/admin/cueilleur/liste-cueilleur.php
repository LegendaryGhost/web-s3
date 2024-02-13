<?php

require_once '../../fonction.php';

header('ResponseType: Application/JSON');

echo json_encode(getAllCueilleurs());

?>
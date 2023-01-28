<?php
include_once '../controls/config.php';

if(!isset($_GET['item']) || $_GET['item'] == '') {
    echo json_encode(['msg' => 'No se puede procesar']);
} else {
    $url = URL.'api/api.php?action=getitem&id='.$_GET['item'];
    $data = file_get_contents($url);

    if ($data != 'false') {
        $data = json_decode($data, true);
        include_once ('../templates/product.php');
    } else {
        echo json_encode(['msg' => 'No existe']);
    }
}


?>
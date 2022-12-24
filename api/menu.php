<?php
include_once '../class/db.php';

if (isset($_GET['getall'])) {
    $db = new DB();
    $query = $db->connect()->prepare('SELECT * FROM menu');
    $query->execute();

    $items = $query->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($items);
}

if (isset($_GET['getallbycategory'])) {
    $db = new DB();
    $query = $db->connect()->prepare('SELECT * FROM menu');
    $query->execute();

    $itemsdb = $query->fetchAll(PDO::FETCH_ASSOC);

    $categories = [];

    foreach($itemsdb as $item){
        if(array_key_exists($item['category'], $categories)) {
            array_push($categories[$item['category']], $item);
        } else {
            $categories += [$item['category'] => [$item]];
        }
    }

    echo json_encode($categories);
}

?>
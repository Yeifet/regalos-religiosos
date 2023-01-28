<?php
include_once '../class/db.php';

if (isset($_GET['action'])) {
    $action = $_GET['action'];

    if ($action === 'getall') {
        $db = new DB();
        $query = $db->connect()->prepare('SELECT * FROM menu');
        $query->execute();
    
        $items = $query->fetchAll(PDO::FETCH_ASSOC);
    
        echo json_encode($items);
    }
    
    if ($action === 'categories') {
        $db = new DB();
        $query = $db->connect()->prepare('SELECT * FROM categories');
        $query->execute();
    
        $categories = $query->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($categories);
    }

    if ($action === 'category') {
        $db = new DB();
        $query = $db->connect()->prepare('SELECT * FROM categories WHERE number = :number');
        $query->execute(['number' => $_GET['id']]);
    
        $categories = $query->fetch(PDO::FETCH_ASSOC);
        echo json_encode($categories);
    }
    
    if ($action === 'getbycategory') {
        $db = new DB();
        $query = $db->connect()->prepare('SELECT * FROM items WHERE category = :category');
        $query->execute(['category' => $_GET['category']]);
    
        $items = $query->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($items);
    }

    if ($action === 'getitem') {
        $db = new DB();
        $query = $db->connect()->prepare('SELECT * FROM items WHERE id = :id');
        $query->execute(['id' => $_GET['id']]);
    
        $items = $query->fetch(PDO::FETCH_ASSOC);
        echo json_encode($items);
    }
    
    if ($action === 'getallbycategory') {
        $db = new DB();
        $query = $db->connect()->prepare('SELECT * FROM items');
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
} else {
    echo json_encode(['message' => 'No se puede procesar la solicitud']);
}

?>
<?php

include_once '../../controls/config.php';
include_once '../../class/db.php';

$validation = true;

isset($_POST['name']) && $_POST['name'] != '' ? true : $validation = false;
isset($_POST['email']) && $_POST['email'] != '' ? true : $validation = false;
isset($_POST['phone']) && $_POST['phone'] != '' ? true : $validation = false;
isset($_POST['orders']) && $_POST['orders'] != '' ? true : $validation = false;
isset($_POST['date']) && $_POST['date'] != '' ? true : $validation = false;

if($validation) {
    $db = new DB();
    $query = $db->connect()->prepare('INSERT INTO `orders` (id, name, email, phone, orders, status, date) VALUES (NULL, :name, :email, :phone, :orders, 2, :date)');
    $query->execute([
                    'name' => $_POST['name'],
                    'email' => $_POST['email'],
                    'phone' => $_POST['phone'],
                    'orders' => $_POST['orders'],
                    'date' => $_POST['date'],
                    ]);
    echo json_encode(['status' => 'success']);
} else {
    echo json_encode(['status' => 'error']);
}

?>
<?php

include_once '../../class/db.php';

function compressImage($source, $destination, $quality)
{
    // Obtenemos la información de la imagen
    $imgInfo = getimagesize($source);
    $mime = $imgInfo['mime'];

    // Creamos una imagen
    switch ($mime) {
        case 'image/jpeg':
            $image = imagecreatefromjpeg($source);
            break;
        case 'image/png':
            $image = imagecreatefrompng($source);
            break;
        case 'image/gif':
            $image = imagecreatefromgif($source);
            break;
        default:
            $image = imagecreatefromjpeg($source);
    }

    // Guardamos la imagen
    imagejpeg($image, $destination, $quality);

    // Devolvemos la imagen comprimida
    return $destination;
}

function deleteItem($id) {
    $db = new DB();
    $query = $db->connect()->prepare('DELETE FROM `menu` WHERE id = :id');

    if ($query->execute(['id' => $id])) {
        echo json_encode(['status' => 'ok']);
    } else {
        echo json_encode(['status' => 'error']);
    }
}

$urls = [];
// Ruta subida
$uploadPath = $_SERVER['DOCUMENT_ROOT'].'/delicias/uploads/img_menu/';

if(isset($_POST['title'])){
    if(isset($_FILES['image'])){
        $fileName = basename($_FILES['image']['name']);
        $fileName = str_replace(" ", "", $fileName);
        $extension = pathinfo($fileName, PATHINFO_EXTENSION);
        $newname = "delicias".uniqid().".".$extension;
        $imageUploadPath = $uploadPath . $newname;

        $fileType = pathinfo($imageUploadPath, PATHINFO_EXTENSION);

        $allowTypes = array('jpg', 'png', 'jpeg', 'gif');

        if (in_array($fileType, $allowTypes)) {

            $imageTemp = $_FILES['image']['tmp_name'];

            $compressedImage = compressImage($imageTemp, $imageUploadPath, 75);

            if($compressedImage) {

                $title = $_POST['title'];
                $description = $_POST['description'];
                $price = $_POST['price'];
                $category = $_POST['category'];

                $db = new DB();

                $query = $db->connect()->prepare('INSERT INTO `menu` (id, title, description, image, price, category) VALUES (NULL, :title, :description, :image, :price, :category)');
                $query->execute([
                    'title' => $title,
                    'description' => $description,
                    'image' => $newname,
                    'price' => $price,
                    'category' => $category
                ]);

                echo json_encode(['message' => 'success']);
            } else {
                echo json_encode(['message' => 'La compresión ha fallado']);
            }

        } else {
            echo json_encode(['message' => 'Formato invalido']);
        }
    } else {
        echo json_encode(['message' => 'Se necesita una imagen']);
    }
}

if (isset($_GET['getall'])) {
    $db = new DB();
    $query = $db->connect()->prepare('SELECT * FROM menu');
    $query->execute();

    $items = $query->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($items);
}

if( isset($_POST['action']) ) {
    switch ($_POST['action']) {
        case 'delete':
            deleteItem($_POST['id']);
            break;
        case 'update':
            echo "i es igual a 1";
            break;
        case 'get':
            echo "i es igual a 2";
            break;
    }
}

?>
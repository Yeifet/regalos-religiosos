<?php

require_once('../class/Users.php');
require_once('../class/Sessions.php');
$user = new User;
$session = new Sessions;
$new_user = [];

// Crear usuarios
if($_POST['action'] === 'create'){
    if(isset($_POST['email']) && $_POST['email'] != "") {
        $minemail = strtolower($_POST['email']);
    
        $new_user = [
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'password' => $_POST['password']
        ];
    
        if($user->createUser($new_user)) {
            echo json_encode([
                'status' => 'success',
                'msg' => "Se creó tu usuario, ya puedes iniciar sesión"
            ]);
        }else{
            echo json_encode([
                'status' => 'error',
                'msg' => "Error"
            ]);
        }
    }
}

// Ingresar
if($_POST['action'] === 'login'){
    if(isset($_POST['email']) && $_POST['email'] != "") {
        $minemail = strtolower($_POST['email']);

        if($user->login($minemail, $_POST['password'])){
            $user_data = $user->get_Info_by_email($minemail);
            $session->setCurrentUser($user_data);

            $res = ['status' => 'success'];
            echo json_encode($res);

        } else {
            $res = ['status' => 'failed'];
            echo json_encode($res);
        }
    }
}

?>
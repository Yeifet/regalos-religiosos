<?php

class User {
    function __construct(){
        require 'db.php';
        $database = new DB();

        $this->db = $database;
    }

    function get_Info_by_email($useremail){
        $query = $this->db->connect()->prepare('SELECT * FROM users WHERE email = :email');

        if($query->execute(['email' => $useremail])){
            $user_data = $query->fetch(PDO::FETCH_ASSOC);
        }

        return $user_data;
    }

    function createUser($info_user){
        $cre_nombre = $info_user['name'];
        $cre_correo = $info_user['email'];
        $cre_phone = 0000;
        $cre_clave = $info_user['password'];

        $cre_pass = password_hash($cre_clave, PASSWORD_DEFAULT, ['cost' => 5]);
        $cre_date = date('Y-m-d h:i:s');

        $query = $this->db->connect()->prepare('INSERT INTO `users` (id, email, name, password, phone, rol, date) VALUES (NULL, :email, :name, :password, :phone, :rol, :date)');
        $query->execute([
            'email' => $cre_correo,
            'name' => $cre_nombre,
            'password' => $cre_pass,
            'phone' => $cre_phone,
            'rol' => 3,
            'date' => $cre_date
        ]);

        return true;
    }

    function login($user_email, $user_pass){

        //var_dump($this->connection);
        $query = $this->db->connect()->prepare('SELECT * FROM users WHERE email = :email');
        $query->execute(['email' => $user_email]);

        if($query->rowCount()){
            foreach($query as $db_user){
                $pass = $db_user['password'];
            }
            if(password_verify($user_pass, $pass)){
                return true;
            }else{
                return false;
            }
        } else {
            return false;
        }
    }
}

?>
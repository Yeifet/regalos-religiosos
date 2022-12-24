<?php
require_once('../class/Sessions.php');
$session = new Sessions;

if(isset($_SESSION['user'])){
    $rol = $_SESSION['user']['rol'];

    if($rol !== 1){
        header('location: /');
    }
} else {
    header('location: /');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Delicias de la Abuela</title>

    <!-- Google Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="assets/img/logo.png">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>


    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800,900&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Unna:400,700&display=swap" rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>

    <header class="w-full h-16 bg-white shadow-md fixed">
        <div class="container h-full w-full max-w-screen-xl px-4 flex items-center">
            <button class="text-2xl rounded h-10 w-10 hover:shadow-md flex items-center justify-center"><i class='bx bx-menu'></i></button>
        </div>
    </header>

    <div class="flex h-screen pt-16">
        <aside class="w-64 min-w-[16rem] h-full shadow-md flex flex-col items-center justify-evenly">
            <a href="?users"class="block w-full h-16 text-stone-800 flex items-center justify-center transition-all hover:bg-slate-200 rounded">Users</a>
            <a href="?menu"class="block w-full h-16 text-stone-800 flex items-center justify-center transition-all hover:bg-slate-200 rounded">Menu</a>
            <a href=""class="block w-full h-16 text-stone-800 flex items-center justify-center transition-all hover:bg-slate-200 rounded">Orders</a>
        </aside>
        <main class="w-full bg-slate-200">
        <?php
    
            if (count($_GET)) {
                if(isset($_GET['users'])) {
                    include_once 'views/users.php';
                } else if(isset($_GET['menu'])) {
                    include_once 'views/menu.php';
                }
            }
        
        ?>
        </main>
    </div>
</body>
</html>
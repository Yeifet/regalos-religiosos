<?php
include_once '../controls/config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body class="bg-[url('../assets/img/img1.jpg')] h-screen w-full flex justify-center items-center">
    <div class="w-80 md:w-96 h-[500px] rounded-xl bg-[#0008] backdrop-blur-md flex flex-col items-center justify-center bg-login">
        <form action="../controls/accounts.php" method="post" id="formLogin" class="w-full p-4 flex flex-col items-center">
            <img src="<?php echo URL; ?>assets/img/logo.png" alt="logo_creativeruum" class="w-32 h-26">
            <h2 class="text-white my-2 text-2xl">Welcome Back!</h2>
            
            <div class="flex w-full text-white items-center">
                <i class='bx bx-envelope text-2xl mr-1'></i>
                <input type="email" placeholder="Email" name="email" class="w-full px-4 py-2 border border-white my-2 bg-[transparent] rounded outline-none">
            </div>
            <div class="flex w-full text-white items-center">
                <i class='bx bx-lock text-2xl mr-1'></i>
                <input type="password" placeholder="Contraseña" name="password" class="w-full px-4 py-2 border border-white my-2 bg-[transparent] rounded outline-none">
            </div>
            <input type="hidden" name="action" value="login">

            <input type="submit" value="Ingresar" class="rounded bg-orange-600 text-white py-2 px-4">

            <p class="text-white">¿No tienes una cuenta? <a href="signup.php" class="text-blue-500">Crear</a></p>
        </form>
    </div>
    <script src="../assets/js/login.js"></script>
</body>
</html>
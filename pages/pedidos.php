<?php
include_once '../controls/config.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedidos</title>
    <link rel="shortcut icon" href="<?php echo URL.'assets/img/logo.png';?>">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="<?php echo URL?>assets/css/main.css">
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
</head>
<body>
    <header class="w-full fixed top-0 left-0 shadow-xl bg-gradient-to-t from-yellow-700 to-yellow-500 z-50">
        <div class="container mx-auto flex justify-between px-4 py-2 h-16">
            <div class="w-20 h-full">
                <a href="<?php echo URL ?>">
                    <img src="<?php echo URL; ?>assets/img/logo.png" alt="" class="w-full h-full object-contain">
                </a>
            </div>
            
            <nav class="fixed w-full h-screen bg-[#0009] left-full top-0 md:static md:h-full md:bg-transparent md:w-auto transition-all" id="menuNav">
                <button class="text-2xl text-white absolute top-10 right-10 md:hidden" id="btnCloseMenu">X</button>
                <ul class="h-full flex text-white flex-col md:flex-row justify-evenly md:justify-start w-64 md:w-auto bg-yellow-700 md:bg-transparent">
                    <li>
                        <a href="<?php echo URL.'categoria/1'; ?>" class="h-full flex justify-center items-center px-2 hover:bg-[#0003]">R.Parroquiales</a>
                    </li>
                    <li>
                        <a href="<?php echo URL.'categoria/2'; ?>" class="h-full flex justify-center items-center px-2 hover:bg-[#0003]">R.Religiosos</a>
                    </li>
                    <li>
                        <a href="<?php echo URL.'categoria/3'; ?>" class="h-full flex justify-center items-center px-2 hover:bg-[#0003]">R.Navideños</a>
                    </li>
                    <li>
                        <a href="<?php echo URL.'categoria/4'; ?>" class="h-full flex justify-center items-center px-2 hover:bg-[#0003]">R.Empresariales</a>
                    </li>
                    <li>
                        <a href="<?php echo URL.'categoria/5'; ?>" class="h-full flex justify-center items-center px-2 hover:bg-[#0003]">R.Celebración</a>
                    </li>
                </ul>
            </nav>
            <div class="h-full flex items-center text-4xl text-white md:hidden">
                <button class="p-1 hover:bg-[#0003] rounded-sm" id="btnMenu">
                    <i class='bx bx-menu'></i>
                </button>
            </div>
        </div>
    </header>

    <div class="pt-16 w-full flex bg-white h-screen">
        <main class="container max-w-screen-md mx-auto p-5">
            <div class="p-2">
                <h2 class="text-lg">Tu Pedido</h2>
            </div>
            <div class="bg-gray-300 p-2 flex">
                <h2 class="text-xl">Elementos</h2>
                <p class="text-xl">Total: <span id="total">$50.000</span></p>
            </div>
            <div class="w-full" id="listContainer">
                
            </div>
            <div class="w-full flex items-center">
                <form class="w-80 bg-zinc-300 text-slate-900 p-2" id="formOrders">
                    <div class="border-b-2 border-gray-400 py-2">
                        <p class="text-base">Complete todos los campos</p>
                        <p class="text-sm font-light">Complete todos los campos para procesar su pedido</p>
                    </div>
                    <div class="name">
                        <label for="" class="font-light text-base">Nombre</label>
                        <input type="name" name="name" id="name" class="w-full rounded-md" required>
                    </div>
                    <div class="">
                        <label for="email" class="font-light text-base">Correo</label>
                        <input type="email" name="email" id="email" class="w-full rounded-md" required>
                    </div>
                    <div class="">
                        <label for="phone" class="font-light text-base">Teléfono</label>
                        <input type="phone" name="phone" id="phone" class="w-full rounded-md" required>
                    </div>
                    <div class="flex justify-center">
                        <button class="py-2 px-4 my-2 rounded-md bg-yellow-600 text-white">Confirmar</button>
                    </div>
                </form>
            </div>
        </main>
    </div>

    <a href="https://api.whatsapp.com/send?phone=+57 314 6678697&text=Hola, me gustaría hacer un pedido." target="_blank" class="py-2 px-3 bg-lime-600 active:bg-lime-800 rounded-full fixed bottom-24 right-10">
        <i class='bx bxl-whatsapp text-white text-2xl'></i>
    </a>

    <input type="hidden" id="route" value="<?php echo URL ?>">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../assets/js/orders.js"></script>
</body>
</html>
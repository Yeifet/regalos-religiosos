<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $data['name']; ?></title>
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

    <div class="fixed top-0 left-full w-full h-screen bg-[#0009] z-50 flex items-center justify-center transition-all" id="modalCart">
        <button class="text-2xl text-white bg-red-600 rounded-md flex w-8 h-8 items-center justify-center absolute top-10 right-10" id="btnCloseCart">X</button>
        <div class="bg-white rounded-md p-2 w-72 h-96 md:w-1/2 flex flex-col items-center">
            <div class="grid gap-4 items-center justify-items-center autorow overflow-y-scroll w-full h-full" id="cartContainer"></div>
            <a href="<?php echo URL.'pages/pedidos.php' ?>" class="btnAdd flex py-1 px-4 rounded-md bg-yellow-500 active:bg-yellow-600 text-white my-1">Encargar</a>
        </div>
    </div>

    <div class="pt-16 w-full flex bg-gray-200 h-screen">
        <main class="container max-w-screen-xl mx-auto p-5 bg-white rounded-md flex items-center justify-center">
            <div class="p-2 shadow-xl rounded-md grid md:grid-cols-2">

                <div class="h-72 w-72 rounded-md overflow-hidden">
                    <img src="<?php echo URL ?>uploads/<?php echo $data['img']?>" class="h-full w-full object-contain" alt="">
                </div>
                <div class="p-4 w-72 bg-white mt-2 shadow-md rounded-md">
                    <h1 class="text-xl"><?php echo $data['name']; ?></h1>
                    <p class="text-slate-700"><?php echo $data['description']; ?></p>
                    <p class="text-slate-700">$<?php echo $data['price']; ?> COP</p>
                    <p class="text-slate-700">Medida: <?php echo $data['size']; ?> cm</p>
                    <div class="flex h-8 rounded-md overflow-hidden max-w-max">
                        <button class="w-8 h-full bg-stone-900 text-white text-2xl" id="btnItemRemove">-</button>
                        <p class="w-8 h-full flex items-center justify-center" id="counter">0</p>
                        <button class="w-8 h-full bg-orange-500 text-white text-2xl" id="btnItemAdd">+</button>
                        <input type="hidden" value="<?php echo $data['id'] ?>">
                    </div>
                </div>

            </div>            
        </main>
    </div>

    <button class="py-2 px-3 bg-yellow-600 active:bg-orange-500 rounded-full fixed bottom-10 right-10" id="cartBtn">
        <i class='bx bx-cart text-white text-2xl'></i>
    </button>

    <a href="https://api.whatsapp.com/send?phone=+57 314 6678697&text=Hola, me gustaría hacer un pedido." target="_blank" class="py-2 px-3 bg-lime-600 active:bg-lime-800 rounded-full fixed bottom-24 right-10">
        <i class='bx bxl-whatsapp text-white text-2xl'></i>
    </a>

    <footer class="w-full h-72 bg-black"></footer>
    <input type="hidden" value="<?php echo $data['id'] ?>" id="itemId">
    <input type="hidden" id="route" value="<?php echo URL ?>">
    <script src="../assets/js/main.js"></script>
    <script src="../assets/js/item.js"></script>
</body>
</html>
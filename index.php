<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="assets/css/main.css">
</head>
<body>
    <header class="w-full fixed top-0 left-0 shadow-xl bg-gradient-to-t from-yellow-700 to-yellow-500 z-50">
        <div class="container mx-auto flex justify-between px-4 py-2 h-16">
            <div class="w-20 h-full">
                <img src="assets/img/logo.png" alt="" class="w-full h-full object-contain">
            </div>
            <div class="h-full flex items-center w-2/3 px-4">
                <input type="search" class="w-full rounded border-2 border-gray-300">
            </div>
            <div class="h-full flex items-center text-4xl text-white">
                <button class="p-1 hover:bg-[#0003] rounded-sm">
                    <i class='bx bx-menu'></i>
                </button>
                <button class="p-1 hover:bg-[#0003] rounded-sm">
                    <i class='bx bx-cart'></i>
                </button>
            </div>
        </div>
    </header>

    <div class="h-screen pt-16 w-full flex bg-gray-200">
        <aside class="h-full w-64 min-w-[16rem] flex p-2">
            <div class="w-full h-full shadow-md bg-white rounded"></div>
        </aside>

        <main class="h-full w-full p-2">
            <div class="w-full h-full bg-gray-100 shadow-md rounded p-2 flex flex-wrap justify-center overflow-y-scroll scrollbar-hide">

                <div class="w-40 h-60 shadow-md rounded relative m-2 bg-white">
                    <div class="w-40 h-40">
                        <img src="uploads/nino_jesus.jpg" class="h-full w-full object-contain" alt="">
                    </div>
                    <div class="w-full h-20 bg-gradient-to-t from-yellow-500 to-white left-0 bottom-0 rounded p-2 text-gray-900">
                        <h2>Niño Jesus</h2>
                        <p class="text-sm">10.000 COP</p>
                    </div>
                </div>

            </div>
        </main>
    </div>

    <footer class="w-full h-72 bg-black"></footer>
</body>
</html>
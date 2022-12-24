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

    <!-- Google Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="assets/img/logo.png">
    <link rel="stylesheet" href="<?php echo URL ?>assets/css/main.css">

    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800,900&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Unna:400,700&display=swap" rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <header>
        <div class="bg-red-900 fixed top-0 left-0 w-full z-30">
			<nav class="flex items-center justify-end text-white container mx-auto max-w-screen-xl">
				<img src="<?php echo URL?>assets/img/logo.png" alt="" class="h-16 mr-auto">
				<ul class="flex">
					<a href="<?php echo URL?>" class="block py-6 px-4">Home</a>
					<a href="<?php echo URL?>pages/about.php" class="block py-6 px-4">About Us</a>
					<a href="<?php echo URL?>pages/menu.php" class="block py-6 px-4">Menu</a>
					<a href="<?php echo URL?>pages/contact.php" class="block py-6 px-4">Contact</a>
				</ul>
			</nav>
		</div>

        <div class="w-full h-96 bg-[url('../assets/img/img1.jpg')] bg-cover flex items-center justify-center my-16">
            <h1 class="text-4xl text-white font-base">Menu</h1>
        </div>

        <main class="w-full">

            <?php
                $response = json_decode(file_get_contents(URL.'api/menu.php?getallbycategory'), true);
                $keys = array_keys($response);

                for($i = 0; $i < count($keys); $i++) {
            ?>
            <div class="container mx-auto max-w-screen-xl p-4">
                <h2 class="text-5xl text-red-900 font-base text-center"><?php echo $keys[$i]; ?></h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 p-5">
                    <?php
                    
                        foreach($response[$keys[$i]] as $item){
                            include('../layout/items.php');
                        }
                    
                    ?>
                </div>
            </div>
            <?php
                }
            ?>

        </main>
    </header>
</body>
</html>
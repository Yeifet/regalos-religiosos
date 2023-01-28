<div class="w-40 shadow-md rounded relative m-2 bg-white">
    <div class="w-40 h-40">
        <img src="<?php echo URL ?>uploads/<?php echo $item['img']?>" class="h-full w-full object-contain" alt="">
    </div>
    <div class="w-full h-28 bg-gradient-to-t from-yellow-500 to-white left-0 bottom-0 rounded p-2 text-gray-900 flex flex-col items-center">
        <h2><?php echo $item['name']; ?></h2>
        <p class="text-sm"><?php echo $item['price']; ?>COP</p>
        <p class="text-sm">Código: <?php echo $item['code']; ?></p>
        <button class="btnAdd py-1 px-4 rounded-md bg-white active:bg-yellow-500 active:text-white">Añadir</button>
        <input type="hidden" value="<?php echo $item['id'] ?>">
    </div>
</div>
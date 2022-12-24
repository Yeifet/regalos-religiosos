<div class="bg-[#000c] fixed h-full w-full top-0 left-full z-50 flex items-center justify-center" id="modal">
    <p class="text-2xl text-white absolute top-5 right-5 font-bold cursor-pointer" id="btn_close">X</p>
    <form action="" class="w-72 h-96 bg-white rounded p-5 flex flex-col items-center justify-evenly" id="form">

        <input id="file" type="file" name="image" id="file" class="hidden">

        <label class="bg-red-900 text-white rounded-full w-full px-4 py-1 my-1 text-center" for="file">Imagen</label>
        <input type="text" name="title" class="border border-slate-500 rounded-full w-full px-4 py-1 my-1" placeholder="Title">
        <input type="text" name="description" class="border border-slate-500 rounded-full w-full px-4 py-1 my-1" placeholder="Description">
        <input type="text" name="price" class="border border-slate-500 rounded-full w-full px-4 py-1 my-1" placeholder="Price">
        <select name="category" id="" class="border border-slate-500 rounded-full w-full px-4 py-1 my-1">
            <option value="">Category</option>
            <option value="breakfast">Breakfast</option>
            <option value="appetizers">Appetizers</option>
            <option value="corncakes">Corn Cakes</option>
            <option value="carta">La Carta</option>
            <option value="steack">Steacks</option>
            <option value="chicken">Chicken</option>
            <option value="pork">Pork</option>
            <option value="fish">Fish</option>
            <option value="sas">Saturday and Sunday</option>
            <option value="grandsons">The Grandsons</option>
            <option value="desserts">Desserts</option>
            <option value="drinks">Drinks</option>
            <option value="beer">Beer</option>
            <option value="wine">Wine</option>
            <option value="sangria">Sangría</option>
        </select>
        <button class="text-white bg-red-900 px-4 py-2 rounded">Crear</button>
    </form>
</div>

<section class="h-full w-full p-4 overflow-y-scroll flex items-center justify-evenly flex-wrap p-4" id="main">
    
</section>

<button class="text-5xl text-red-900 absolute bottom-5 right-5" id="btn_create">
    <i class='bx bxs-plus-circle'></i>
</button>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="assets/js/upload.js"></script>
<script src="assets/js/menu.js"></script>
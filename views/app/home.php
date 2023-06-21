<?php include VIEWS . 'inc/header.php'; ?>
<div class="mt-32"></div>
<div class="home-sectionOne flex items-end p-10">
    <div class="m-auto mb-0 lg:m-0">
        <div class="bg-red-500 h-12 w-36 flex items-center justify-center rounded-xl">
            <span class="text-white">Parcourir</span>
        </div>
        <p class="hidden lg:block mt-10 text-2xl font-semibold">
            Lorem Ipsum is simply dummy text of the printing
        </p>
        <p class="underline text-center lg:text-left text-xl font-semibold">Explore Items</p>
    </div>
</div>
<div class="flex items-center justify-center mt-36">
    <div class="border w-36 border-gray-600"></div>
    <div>
        <span class="text-2xl font-semibold lg:ml-3 lg:mr-3">Nos catégories</span>
    </div>
    <div class="border w-36 border-gray-600"></div>
</div>
<div class="flex items-center justify-center flex-wrap mt-20">
    <?php

    foreach ($_SESSION["itemCategory"] as $item) {
    ?>
        <div style="" class="relative w-full lg:w-5/12 h-96 lg:m-10  mb-4 ">
            <img src="<?= "../../public/upload/" . $item['image']; ?>" class="h-full w-10/12 m-auto  drop-shadow-md bg-white" style="object-fit: cover;" alt="" />
            <h1 class="absolute left-0 top-32 text-xl lg:text-3xl font-bold uppercase"><?= $item['nom'] ?></h1>
            <div class="absolute left-0 bottom-28 primary-bg p-4 rounded-xl">
                <a href="<?php echo BASE_PATH_ . "/articles?categorie=" . $item['id']; ?>">
                    <span>EXPLOREZ PLUS</span>
                </a>
            </div>
        </div>
    <?php
    }
    ?>
</div>
<div class="flex items-center justify-center mt-36">
    <div class="border w-36 border-gray-600"></div>
    <div>
        <span class="text-2xl text-center font-semibold lg:ml-3 lg:mr-3">Nos Produits</span>
    </div>
    <div class="border w-36 border-gray-600"></div>
</div>
<div class="w-11/12 m-auto flex flex-wrap justify-center items-center mt-10">
    <?php
    foreach ($_SESSION["Articles_Items"] ?? [] as $item) {
    ?>
        <div class="relative bg-white  w-full lg:w-1/5 p-5 drop-shadow-md mx-5 my-5">
            <a href="<?php echo BASE_PATH_ . "/detailArticle?id=" . $item['id']; ?>">
                <img src="<?= "../../public/upload/" . $item['image']; ?>" class="h-44 m-auto w-full cursor-pointer" style="object-fit: cover;" alt="" />
            </a>
            <h1 class="text-xl font-bold mt-3 uppercase"><?= $item['nom']; ?></h1>
            <div class="items-center flex justify-between mt-5">
                <h2 class="text-xs"><?= $item['prix']; ?> €</h2>
                <div class="flex">
                <a class="flex" href="<?php echo BASE_PATH_ . "/detailArticle?id=" . $item['id']; ?>"><span class="text-xs -mb-4">voir</span>
                    <img width="20" height="20" src="https://img.icons8.com/ios-filled/50/right--v1.png" alt="shopping-cart--v1" /></a>
                </div>
            </div>
        </div>
    <?php
    }
    ?>

</div>
<?php include VIEWS . 'inc/footer.php'; ?>
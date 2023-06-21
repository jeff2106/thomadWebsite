<?php include VIEWS . 'inc/header.php'; ?>

<div class="w-full h-screen items-center justify-center flex m-auto ">
    <div class="w-2/12 p-5 h-full secondary-bg" style="background-color:#262626;">
        <?php include VIEWS . 'inc/sidebar.php'; ?>
    </div>
    <?php
    if (!empty($_GET['add'])) {

    ?>
        <div class="w-10/12 h-full p-20 bg-gray-200">
            <form action="<?php echo BASE_PATH_ . "/admin-categorie" ?>" method="POST" enctype="multipart/form-data">
                <div class="bg-white p-10">
                    <h1 class="font-bold text-black text-2xl">Crée Catégorie</h1>
                    <div class="w-full mt-2" style="">
                        <h1>Nom</h1>
                        <input name="Nom" class="w-full h-16 border border-gray-300 p-2 mt-2 rounded" placeholder="Nom de la catégorie " />
                    </div>
                    <div class="w-full mt-2" style="">
                        <h1>Description </h1>
                        <input name="description" class="w-full h-16 border border-gray-300 p-2 mt-2 rounded" placeholder="Ajouter une description" />
                    </div>
                    <div class="w-full mt-2" style="">
                        <h1>Images</h1>
                        <input name="photo" type="file" class="w-full h-32 border border-gray-300 p-2 mt-2 rounded text-center" placeholder="You can select the file" />
                    </div>
                </div>
                <div class="p-10 m-auto w-10/12 flex items-center mt-5 justify-between">
                    <input class="h-16 text-white bg-blue-500 w-4/12 items-center flex justify-center rounded-xl" type="submit" value="Publier" />
                    <div class="h-16 bg-red-500 w-4/12 items-center flex justify-center rounded-xl">
                        <span class="text-white"><a href=<?php echo BASE_PATH_ . "/admin-categorie"; ?>>Abandonner</a></span>
                    </div>
                </div>
            </form>
        </div>
    <?php
    } else {

    ?>
        <div class="w-10/12 h-full p-20 bg-gray-200">
            <div class="h-14 w-full flex justify-between items-center">
                <div class="w-4/12 flex h-full">
                    <div class="border h-ful w-6/12 mr-5 bg-white flex rounded-xl  items-center justify-center">
                        <img width="30" height="30" src="https://img.icons8.com/ios/30/empty-filter--v1.png" alt="plus-math--v1" />
                        <span>Filtres</span>
                    </div>
                    <div class="border h-full flex w-6/12 rounded-xl items-center justify-center" style="background-color:#000AFF;">
                        <img width="30" height="30" src="https://img.icons8.com/ios/30/FFFFFF/plus-math--v1.png" alt="plus-math--v1" />
                        <span class="text-white"><a href=<?php echo BASE_PATH_ . "/admin-categorie?add=true"; ?>>Ajouter</a></span>
                    </div>
                </div>
                <div class="w-3/12 border bg-white rounded h-full items-center flex justify-start pl-4">
                    <img width="30" height="30" src="https://img.icons8.com/ios/30/search--v1.png" alt="plus-math--v1" />
                    <input class="w-10/12 outline-none" placeholder="Recherche" />
                </div>
            </div>
            <div class="flex flex-wrap w-full mt-10">
                <?php

                foreach ($_SESSION["itemCategory"] as $item) {
                ?>
                    <div class="max-w-sm m-2 w-5/12  relative bg-white border border-gray-200 rounded-lg shadow ">
                        <a href="#" class="min-h-full">
                            <img class="rounded-t-lg bg-gray-100 w-full h-2/4 bg-cover" src="<?= "../../public/upload/" . $item['image']; ?>" alt="" />
                        </a>

                        <div class="p-5 flex items-end justify-end">
                            <form action="" method="post">
                                <a href="#">
                                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 uppercase"><?= $item['nom']; ?></h5>
                                </a>
                                <input name="file_unlink" value="<?= $item['image'] ?>" class="hidden" />
                                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400"><?= $item['description']; ?></p>
                                <button name="delete" value="<?= $item['id'] ?>" type="submit" href="#" class="flex items-center justify-center w-full h-16 inline-flex items-center text-sm font-medium text-center text-white bg-gray-200 rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-300 ">
                                    <img width="25" height="25" src="https://img.icons8.com/pastel-glyph/25/00000/trash.png" alt="pencil--v1" class="ml-5" />
                                </button>
                            </form>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>

        </div>
</div>
<?php
    }
?>

</div>
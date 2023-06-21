<?php include VIEWS . 'inc/header.php'; ?>

<div class="w-full h-screen items-center justify-center flex m-auto ">
    <div class="w-2/12 p-5 h-full secondary-bg" style="background-color:#262626;">
        <?php include VIEWS . 'inc/sidebar.php'; ?>
    </div>
    <?php
    if (!empty($_GET['add'])) {

    ?>
        <div class="w-10/12 h-full p-20 bg-gray-200">
            <form action="<?php echo BASE_PATH_ . "/admin-articles" ?>" method="POST" enctype="multipart/form-data">
                <div class="bg-white p-10">
                    <h1 class="font-bold text-black text-2xl">Crée Produit</h1>
                    <div class="w-full mt-2" style="">
                        <h1>Nom du produit</h1>
                        <input name="nom" class="w-full h-16 border border-gray-300 p-2 mt-2 rounded" placeholder="Nom de la catégorie " />
                    </div>
                    <div class="w-full mt-2" style="">
                        <h1>Prix</h1>
                        <input name="prix" class="w-full h-16 border border-gray-300 p-2 mt-2 rounded" placeholder="Ajouter une description" />
                    </div>
                    <div class="flex justify-between items-center">
                        <div class="w-5/12 mt-2" style="">
                            <h1>Catégorie </h1>
                            <select name="id_categorie" id="cars" class="w-full h-16 border border-gray-300 p-2 mt-2 rounded"">
                                <option value=" 1">Nom de la catégorie</option>
                                <?php foreach ($_SESSION["itemCategory"] as $item) { ?>
                                    <option value="<?= $item['id'] ?>"><?= $item['nom'] ?></option>
                                <?php } ?>

                            </select>
                        </div>
                        <div class="w-5/12 mt-2" style="">
                            <h1>Quantité </h1>
                            <input name="qte" type="number" class="w-full h-16 border border-gray-300 p-2 mt-2 rounded" placeholder="Ajouter une description" />
                        </div>
                    </div>

                    <div class="w-full mt-2" style="">
                        <h1>Images</h1>
                        <input name="photo" type="file" class="w-full h-32 border border-gray-300 p-2 mt-2 rounded text-center" placeholder="You can select the file" />
                    </div>
                    <div class="w-full mt-2" style="">
                        <h1>Description </h1>
                        <input name="description" class="w-full h-16 border border-gray-300 p-2 mt-2 text-center rounded" placeholder="ajouter  une description" />
                    </div>
                </div>
                <div class="p-10 m-auto w-10/12 flex items-center mt-5 justify-between">
                    <input class="h-16 text-white bg-blue-500 w-4/12 items-center flex justify-center rounded-xl" type="submit" value="Publier" />
                    <div class="h-16 bg-red-500 w-4/12 items-center flex justify-center rounded-xl">
                        <span class="text-white"><a href=<?php echo BASE_PATH_ . "/admin-articles"; ?>>Abandonner</a></span>
                    </div>
                </div>
            </form>
        </div>
    <?php
    } else {

    ?>
        <div class="w-10/12 h-full p-20 bg-gray-200 overflow-scroll">
            <div class="h-14 w-full flex justify-between items-center">
                <div class="w-4/12 flex h-full">
                    <div class="border h-ful w-6/12 mr-5 bg-white flex rounded-xl  items-center justify-center">
                        <img width="30" height="30" src="https://img.icons8.com/ios/30/empty-filter--v1.png" alt="plus-math--v1" />
                        <span>Filtres</span>
                    </div>
                    <div class="border h-full flex w-6/12 rounded-xl items-center justify-center" style="background-color:#000AFF;">
                        <img width="30" height="30" src="https://img.icons8.com/ios/30/FFFFFF/plus-math--v1.png" alt="plus-math--v1" />
                        <span class="text-white"><a href=<?php echo BASE_PATH_ . "/admin-articles?add=true"; ?>>Ajouter</a></span>
                    </div>
                </div>
                <div class="w-3/12 border bg-white rounded h-full items-center flex justify-start pl-4">
                    <img width="30" height="30" src="https://img.icons8.com/ios/30/search--v1.png" alt="plus-math--v1" />
                    <input class="w-10/12" placeholder="Recherche" />
                </div>
            </div>
            <div class="w-11/12 flex flex-wrap justify-between items-start mt-10">
                <?php
                foreach ($_SESSION["Articles_Items"] as $item) {
                ?>
                    <div class="relative bg-white w-3/12 p-5 drop-shadow-md m-3">
                        <form action="" method="post">
                            <input name="file_unlink" value="<?= $item['image'] ?>" class="hidden" />
                            <img src="<?= "../../public/upload/" . $item['image']; ?>" class="h-44 m-auto w-full" style="object-fit: cover;" alt="" />
                            <h1 class="text-xl font-bold mt-3 uppercase"><?= $item['nom']; ?></h1>
                            <div class="items-center flex justify-between mt-5">
                                <h2 class="text-xs"><?= $item['prix']; ?> €</h2>
                                <div class="flex">
                                    <button type="submit" value="<?= $item['id'] ?>"  name="delete">Supprimer</button>
                                </div>
                            </div>
                        </form>
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
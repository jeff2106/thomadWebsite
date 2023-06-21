<?php include VIEWS . 'inc/header.php'; ?>
<div class="w-11/12 m-auto">
    <div class="bg-white w-full h-20 mt-10 flex items-center justify-between p-3">
        <div class="flex items-start justify-start w-2/12">
            <img width="30" height="30" src="https://img.icons8.com/ios-filled/30/filter--v1.png" alt="filter--v1" />
            <span class="lg:ml-3">Filtrage</span>
        </div>
        <div class="flex items-center justify-center w-5/12 border border-gray-300 h-full rounded-xl px-3">
            <input placeholder="Recherche...." class="w-full h-full outline-none" />
            <img width="30" height="30" src="https://img.icons8.com/ios-glyphs/30/search--v1.png" alt="search--v1" />
        </div>
        <div class="flex items-end justify-end w-2/12">
            <img width="30" height="30" src="https://img.icons8.com/ios-glyphs/30/drag-list-down.png" alt="drag-list-down" />
            <span class="ml-3">PLUS</span>
        </div>
    </div>
    <div class="mt-10 font-bold">
        <span>
            Accueil
        </span> >
        <span>
            Catégorie
        </span>
    </div>
</div>
<div class="lg:w-11/12 m-auto flex flex-wrap justify-between items-center mt-10">
    <?php
    function filtreObjet($objet)
    {

        if (isset($_GET['categorie'])) {
            return  $objet['id_categorie'] == $_GET['categorie'];
        } else {
            return $_SESSION["Articles_Items"];
        }
    }
    $resultat = array_filter($_SESSION["Articles_Items"] ?? [], 'filtreObjet');
    foreach ($resultat as $item) {
    ?>
        <div class="relative bg-white lg:w-1/5 p-5 drop-shadow-md mx-5 my-5">
            <a href="<?php echo BASE_PATH_ . "/detailArticle?id=" . $item['id']; ?>">
                <img src="<?= "../../public/upload/" . $item['image']; ?>" class="h-44 m-auto w-full cursor-pointer" style="object-fit: cover;" alt="" />
            </a>
            <h1 class="text-xl font-bold mt-3"><?= $item['nom']; ?></h1>
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
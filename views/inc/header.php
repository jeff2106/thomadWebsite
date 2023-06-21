<?php
if (isset($_POST['logout'])) {
    unset($_SESSION['users']);
    header("location:" . BASE_PATH_ . "/connexion");
    exit;
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../public/styles/main.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css" integrity="sha384-QYIZto+st3yW+o8+5OHfT6S482Zsvz2WfOzpFSXMF9zqeLcFV0/wlZpMtyFcZALm" crossorigin="anonymous">
    <title>Document</title>
</head>

<body class="bg-gray-100">
    <?php
    $actual_link = (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    if (
        empty($_SESSION['users'])
        && (str_contains($actual_link, "articles")
            || str_contains($actual_link, "admin")
            || str_contains($actual_link, "panier")
            || str_contains($actual_link, "detailArticle"))
    ) {
        header("location:" . BASE_PATH_ . "/connexion");
        exit;
    }
    if (!str_contains($actual_link, "connexion")) {
    ?>
        <nav class=" nav  shadow-inner bg-white top-0  lg:px-32 lg:py-2 w-full items-center justify-between flex">
            <div class="w-4/12 p-2 lg:w">
                <img src="../../public/assets/logoF1.png" alt="">
            </div>
            <div class="flex lg:hidden pr-5">
                <?php
                if (!isset($_SESSION['users'])) {
                ?>
                    <a href="<?php echo BASE_PATH_ . "/connexion"; ?>"><img class="mr-5" width="35" height="35" src="https://img.icons8.com/ios-glyphs/30/login-rounded-right--v1.png" alt="user" /></a>

                <?php
                } else {
                ?>
                    <form action="" method="post" class="flex">
                        <button type="submit" name="logout"><img class="mr-5" width="30" height="30" src="https://img.icons8.com/ios-filled/30/logout-rounded-left.png" alt="user" /></button>
                        <a href="<?php echo BASE_PATH_ . "/panier"; ?>"><img width="35" height="35" src="https://img.icons8.com/material-outlined/35/000000/shopping-cart--v1.png" alt="shopping-cart--v1" /></a>
                    </form>
                <?php
                }
                ?>
                <img onclick="activeMenu()" width="35" height="35" src="https://img.icons8.com/ios/50/menu--v1.png" alt="shopping-cart--v1" />
            </div>
            <div class="bg-gra-900 hidden lg:block ">
                <a href="<?php echo BASE_PATH_ . ""; ?>"><span class="m-4">Accueil</span></a>
                <a href="<?php echo BASE_PATH_ . "/articles"; ?>"><span class="m-4">Boutique</span></a>
                <a href="<?php echo BASE_PATH_ . "/apropos" ?>"><span class="m-4">News Letters</span></a>
                <?php
                if (isset($_SESSION['users']) && $_SESSION['users']['isAdmin'] == 1) {
                ?>
                    <a href="<?php echo BASE_PATH_ . "/admin-categorie"; ?>"><span class="m-4">Admin</span></a>
                <?php } ?>
            </div>
            <div class=" hidden lg:flex">
                <?php
                if (!isset($_SESSION['users'])) {
                ?>
                    <a href="<?php echo BASE_PATH_ . "/connexion"; ?>"><img class="mr-5" width="35" height="35" src="https://img.icons8.com/ios-glyphs/30/login-rounded-right--v1.png" alt="user" /></a>

                <?php
                } else {
                ?>
                    <form action="" method="post" class="flex">
                        <button type="submit" name="logout"><img class="mr-5" width="30" height="30" src="https://img.icons8.com/ios-filled/30/logout-rounded-left.png" alt="user" /></button>
                        <a href="<?php echo BASE_PATH_ . "/panier"; ?>"><img width="35" height="35" src="https://img.icons8.com/material-outlined/35/000000/shopping-cart--v1.png" alt="shopping-cart--v1" /></a>
                    </form>
                <?php
                }
                ?>

            </div>
        </nav>
        <div class="lg:hidden" style="display: none;" id="menu">
            <a href="<?php echo BASE_PATH_ . ""; ?>"><span class="m-4 font-bold">Accueil</span></a><br />
            <a href="<?php echo BASE_PATH_ . "/articles"; ?>"><span class="m-4 font-bold">Boutique</span></a><br />
            <a href="<?php echo BASE_PATH_ . "/apropos" ?>"><span class="m-4 font-bold">News Letters</span></a><br />
            <?php
            if (isset($_SESSION['users']) && $_SESSION['users']['isAdmin'] == 1) {
            ?>
                <a href="<?php echo BASE_PATH_ . "/admin-categorie"; ?>"><span class="m-4">Admin</span></a><br />
            <?php } ?>
        </div>
    <?php
    }
    ?>
    <div class="">
        <script>
            // Récupérer l'élément de menu
            var menu = document.getElementById('menu');

            // Fonction pour activer/désactiver le menu
            function activeMenu() {
                // Vérifier si le menu est actuellement masqué (none)
                if (menu.style.display === 'none') {
                    // Si le menu est masqué, le rendre visible (block)
                    menu.style.display = "block";
                    return;
                }
                // Si le menu est visible, le masquer
                menu.style.display = "none";
            }
        </script>
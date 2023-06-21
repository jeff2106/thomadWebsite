<?php include VIEWS . 'inc/header.php'; ?>

<div class="w-full h-screen flex">
    <div class="marginCenter lg:w-9/12 shadow-inner lg:h-5/6 bg-white lg:flex">
        <div class="h-full w-full lg:w-6/12 p-20 relative">
            <div class="lg:flex items-center justify-between w-full">
                <h1 class="text-3xl font-bold">Connexion</h1>
                <div class="flex items-center lg:justify-center">
                    <img width="20" height="20" class="mr-2" src="https://img.icons8.com/ios-filled/20/home.png" alt="home" />
                    <h1 class="font-Medium text-xl"><a href="<?php echo BASE_PATH_ . ""; ?>">Retour à l'accueil</a></h1>
                </div>
            </div>
            <h1 class="mt-4 text-gray-400 text-xl">Se connecter et s'amuser</h1>
            <form action="" method="post">
                <div class="h-20 w-full lg:w-7-12 border border-gray-300 p-5 mt-5 rounded">
                    <input name="Email" class="w-full h-full outline-none" placeholder="Nom d'utilisateur" />
                </div>
                <div class="h-20 w-7-12 border border-gray-300 p-5 mt-5 rounded">
                    <input class="w-full h-full outline-none" name="mot_de_passe" placeholder="Mot de passe" />
                </div>
                <div class="mt-5 items-center flex">
                    <input type="checkbox" class="" />
                    <span class="text-gray-400 ml-5">Me rappeler</span>
                </div>
                <?php
                if(!empty($_SESSION["message"]) && !empty($_SESSION["message"]) != null){
                    echo "<p class='text-red-300'>".$_SESSION["message"]."</p>";
                }
                ?>
                <div class="h-20 w-7-12 border border-gray-300 mt-5 rounded cursor-pointer">
                    <input type="submit" class="w-full h-full primary-bg text-white cursor-pointer text-2xl" value="Connexion" />
                </div>
            </form>
            <div class="lg:absolute bottom-10 right-10">
                <span class="text-gray-400 lg:text-xl">
                    vous n'avez pas de compte ? <span class="text-blue-300">S'inscrire</span>
                </span>
            </div>
        </div>
        <div class="bg-gray-300 h-full w-6/12 bg-img-connect bg-cover bg-no-repeat">

        </div>
    </div>
</div>
<?php include VIEWS . 'inc/footer.php'; ?>
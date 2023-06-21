<?php include VIEWS . 'inc/header.php'; ?>

<div class="w-full  bg-gray-100">
    <div class="marginCenter lg:w-9/12 p-10">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="lg:flex lg:items-center lg:justify-between">
                <h1 class="text-2xl font-bold text-center lg:text-left">Information</h1>
            </div>
            <div class="lg:flex items-start justify-between mt-10 mb-2">
                <div class="lg:w-2/12">
                    <center>
                        <input type="file" name="photo" class="circle bg-gray-300 rounded-full items-center"/>
                        <h1 class="text-center mt-4">Télécharger</h1>
                    </center>
                </div>
                <div class="lg:w-10/12 w-full">
                    <div class="lg:flex items-center w-full justify-evenly">
                        <div class="lg:h-16 lg:w-5/12">
                            <span>Numéro de téléphone</span>
                            <input name="Numero" class="w-full h-full border border-gray-300 p-5 mt-3 rounded" placeholder="" />
                        </div>
                        <div class="lg:h-16 lg:w-5/12">
                            <span>Email</span>
                            <input name="Email" class="w-full h-full border border-gray-300 p-5 mt-3 rounded" placeholder="" />
                        </div>
                    </div>
                    <div class="lg:flex items-center w-full justify-evenly mt-14">
                        <div class="lg:h-16 lg:w-5/12">
                            <span>Nom complet</span>
                            <input name="NomComplet" class="w-full h-full border border-gray-300 p-5 mt-3 rounded" placeholder="" />
                        </div>
                        <div class="lg:h-16 lg:w-5/12">
                            <span>Genre</span>
                            <select name="Genre" id="cars" class="w-full h-full border border-gray-300 p-5 mt-3 rounded">
                                <option value="1">Homme</option>
                                <option value="0">Femme</option>
                            </select>
                        </div>
                    </div>
                    <div class="lg:flex items-center w-full justify-evenly mt-14">
                        <div class="lg:h-16 hidden lg:block" style="width: 89%;">
                            <span>Adresse</span>
                            <input name="adresse" class="w-full h-full border border-gray-300 p-5 mt-3 rounded" placeholder="" />
                        </div>
                        <div class="lg:h-16 w-full block lg:hidden">
                            <span>Adresse</span>
                            <input name="adresse" class="w-full h-full border border-gray-300 p-5 mt-3 rounded" placeholder="" />
                        </div>
                    </div>
                    <div class="lg:flex lg:items-center w-full lg:justify-evenly mt-14">
                        <div class="lg:h-16 lg:w-3/12 lg:mr-4">
                            <span>État</span>
                            <input name="Etat" class="w-full h-full border border-gray-300 p-5 mt-3 rounded" placeholder="" />
                        </div>
                        <div class="lg:h-16 lg:w-3/12 lg:mr-4">
                            <span>Ville</span>
                            <input name="Ville" class="w-full h-full border border-gray-300 p-5 mt-3 rounded" placeholder="" />
                        </div>
                        <div class="lg:h-16 lg:w-3/12">
                            <span>code postal</span>
                            <input name="CodePostal" class="w-full h-full border border-gray-300 p-5 mt-3 rounded" placeholder="" />
                        </div>
                    </div>
                    <div class="lg:flex lg:items-center lg:w-full lg:justify-evenly mt-4 lg:mt-14">
                        <div class="lg:h-16 hidden lg:block" style="width: 89%;">
                            <span>Mot de passe</span>
                            <input name="mot_de_passe" class="w-full h-full border border-gray-300 p-5 mt-3 rounded" placeholder="" />
                        </div>
                        <div class="lg:h-16 w-full block lg:hidden" >
                            <span>Mot de passe</span>
                            <input name="mot_de_passe" class="w-full h-full border border-gray-300 p-5 mt-3 rounded" placeholder="" />
                        </div>
                    </div>
                    <div class="flex items-center w-full justify-evenly mt-14">
                        <div class="h-16" style="width: 89%;">
                            <input name="submit" class="w-full h-full border border-gray-300 bg-red-500 text-white rounded" type="submit" />
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="marginCenter w-9/12 p-10">
        <div class="flex items-end justify-end">
            <img width="20" height="20" class="mr-2" src="https://img.icons8.com/ios-filled/20/home.png" alt="home" />
            <h1 class="font-Medium text-xl">Retour à l'accueil</h1>
        </div>
    </div>
</div>

<?php include VIEWS . 'inc/footer.php'; ?>
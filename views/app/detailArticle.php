<?php include VIEWS . 'inc/header.php'; ?>
<div class="w-full lg:px-32 mt-24">

    <div class="lg:marginCenter lg:flex lg:justify-between w-full">
        <div class="w-full bg-white p-5">
            <?php
            function filtreObjet($objet)
            {
                return $objet['id'] == $_GET['id'];
            }

            $resultat = array_filter($_SESSION["Articles_Items"], 'filtreObjet');
            foreach ($resultat as $item) {
            ?>
                <div class="lg:flex w-full">
                    <form action="" method="post" class="lg:flex w-full">
                        <div class="h-72 bg-gray-600 w-full lg:w-3/12">
                            <img src="<?= "../../public/upload/" . $item['image']; ?>" style="object-fit: cover;" class=" h-full w-full" />
                        </div>
                        <div class="lg:ml-5 w-full lg:justify-between relative">
                            <h1 class="text-3xl font-bold"><?= $item['nom'] ?></h1>
                            <div class="mt-2">
                                <h1 class="text-base font-medium text-gray-400 mt-5 text-justify"><?= $item['description'] ?></h1>
                            </div>
                            <div class="flex items-center mt-2">
                                <img width="30" height="30" class="mb-1" src="https://img.icons8.com/fluency/30/star.png" alt="star" />
                                <span class="text-xl lg:ml-3 text-gray-400"><?= $item['id'] / 5 ?>/5</span>
                            </div>
                            <span class="text-base text-gray-400"></span>
                            <div class="lg:flex lg:items-center lg:justify-between w-ful lg:absolute bottom-3 left-0 right-0">
                                <div class="lg:w-2/12">
                                    <span><?= $item['prix'] ?>€ / each</span>
                                </div>
                                <div class="lg:flex w-full lg:w-10/12 lg:justify-end mt-5 lg:mt-0">
                                    <div class="border border-red-400  h-10 lg:w-3/12 lg:mr-4 items-center flex justify-center rounded">
                                        <img width="24" height="24" src="https://img.icons8.com/ios-filled/24/EB1A1A/like--v1.png" alt="like--v1" />
                                        <span class="text-black ml-2">Ajouter aux favoris</span>
                                    </div>
                                    <button name="insert" value="<?= $item['id'] ?>" class="mt-2 lg:mt-0 border border-red-400 primary-bg h-10 w-full lg:w-3/12 items-center flex justify-center rounded">
                                        <img width="24" height="24" src="https://img.icons8.com/material-outlined/24/FFFFFF/shopping-cart--v1.png" alt="shopping-cart--v1" />
                                        <span class="text-white">Ajouter au paniel</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
    <div class="marginCenter lg:flex justify-end w-full mt-10">

        <div class="w-full lg:w-6/12 h-max lg:ml-10 bg-white p-5">
            <h1 class="text-2xl text-gray-600 font-bold mb-5 lg:mb-0">Vous aimez peut-être...</h1>
            <div class="w-full flex-wrap flex items-center justify-center">
                <?php
                foreach ($_SESSION["Articles_Items"] as $item) {
                ?>
                    <div class="h-32 w-5/12 bg-gray-600 m-2">
                        <a href="<?php echo BASE_PATH_ . "/detailArticle?id=" . $item['id']; ?>">
                            <img src="<?= "../../public/upload/" . $item['image']; ?>" style="object-fit: cover;" class=" h-full w-full" />
                        </a>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>

</div>

<?php include VIEWS . 'inc/footer.php'; ?>
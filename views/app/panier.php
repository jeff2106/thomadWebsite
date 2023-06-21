<?php include VIEWS . 'inc/header.php'; ?>
<?php $isNotAuth = true; ?>
<div class="w-full lg:flex lg:px-32 mt-24">
    <div class="marginCenter lg:flex justify-between w-full">
        <div class="w-full lg:w-8/12 bg-white p-5">
            <h1 class="text-xl text-gray-600">Votre panier</h1>
            <?php if (count($_SESSION["Panier"]) < 1) { ?>
                <h1 class="text-center text-black mt-10">Panier vide</h1>
            <?php } ?>

            <?php foreach ($_SESSION["Panier"] as $item) { ?>
                <div class="lg:flex w-full mt-10">
                    <div class="h-36 bg-gray-600 lg:w-3/12">
                        <img src="<?= "../../public/upload/" . $item['image']; ?>" style="object-fit: cover;" class=" h-full w-full" />
                    </div>
                    <form action="" method="POST" class="lg:p-4 pt-0 lg:w-9/12">
                        <div class="lg:ml-5 w-full justify-between lg:relative">
                            <div class="lg:flex justify-between w-full">
                                <div>
                                    <h1 class="text-xl font-bold"><?= $item['nom'] ?></h1>
                                    <h2 class="text-base font-medium lg:w-7/12 text-justify mb-5"><?= $item['description'] ?></h2>
                                </div>
                                <button type="submit" value="<?= $item['id'] ?>" name="delete" class="h-10">
                                    <img width="24" height="24" src="https://img.icons8.com/material/24/trash--v1.png" alt="trash--v1" />
                                </button>
                            </div>
                            <div class="lg:flex justify-between w-full items-center">
                                <div>
                                    <h1 class="text-base text-gray-400">Unité prix <?= $item['prix'] ?>€</h1>
                                    <div class="flex border items-center justify-center border-gray-300">
                                        <button type="submit" name="incrementer" value="<?= $item['id'] ?>" class="h-10 flex items-center justify-center w-10  rounded">
                                            +
                                        </button>
                                        <div class="h-10 w-10 flex items-center justify-center rounded">
                                            <input type="text" name="number" value="<?= $item['number'] ?>" class="outline-none w-10 text-center" readonly />
                                        </div>
                                        <button type="submit" name="decrementer" value="<?= $item['id'] ?>" class="h-10 flex items-center justify-center w-10  rounded">
                                            <span class="font-bold text-base">-</span>
                                        </button>
                                    </div>
                                </div>
                                <div>
                                    Total <span id="total"><?= $item['prix'] * $item['number'] ?></span> €
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            <?php } ?>
        </div>
        <form action="" method="post" class="lg:w-4/12">
            <div class="w-full h-36 mt-5 lg:mt-0 lg:ml-10 bg-white p-5">
                <h1 class="text-xl text-gray-600">Total partiel pour <?= count($_SESSION["Panier"]) ?> articles : <?php
                                                                                                                    $total = 0;
                                                                                                                    foreach ($_SESSION["Panier"] as $objet) {
                                                                                                                        $total += ($objet['prix'] * $objet['number']);
                                                                                                                    }
                                                                                                                    echo $total;
                                                                                                                    ?>€</h1>
                <div class="h-12 w-full mt-10 mb-10">
                    <button class="h-full w-full  <?= count($_SESSION["Panier"]) > 0 ? "primary-bg" : "bg-gray-200" ?> text-white" type="submit" name="validPanier" value="validPanier" readonly=" <?= count($_SESSION["Panier"]) > 0 ? false : true ?>">
                    Valider
                    </button>
                </div>
            </div>
        </form>

    </div>

</div>
<script>
    function incrementer() {
        var spanElement = document.getElementById("valeur");
        var spanElementtotal = document.getElementById("total");
        var val_spanElementtotal = parseInt(spanElementtotal.innerText);
        var valeurActuelle = parseInt(spanElement.innerText);
        spanElement.innerText = valeurActuelle + 1;
        spanElementtotal.innerText = val_spanElementtotal * valeurActuelle;
    }

    function decrementer() {
        var spanElement = document.getElementById("valeur");
        var valeurActuelle = parseInt(spanElement.innerText);
        var spanElementtotal = document.getElementById("total");
        var val_spanElementtotal = parseInt(spanElementtotal.innerText);

        if (valeurActuelle > 1) {
            spanElement.innerText = valeurActuelle - 1;
            spanElementtotal.innerText = val_spanElementtotal / valeurActuelle;

        }
    }
</script>
<?php include VIEWS . 'inc/footer.php'; ?>
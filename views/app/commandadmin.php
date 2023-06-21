<?php include VIEWS . 'inc/header.php'; ?>

<div class="w-full h-screen items-center justify-center flex m-auto ">
    <div class="w-2/12 p-5 h-full secondary-bg" style="background-color:#262626;">
        <?php include VIEWS . 'inc/sidebar.php'; ?>
    </div>
    <div class="w-10/12 h-full p-20 bg-gray-200">
        <div class="h-14 w-full flex justify-between items-center">
            <div class="w-4/12 flex h-full">
                <div class="border h-ful w-6/12 mr-5 bg-white flex rounded-xl  items-center justify-center">
                    <img width="30" height="30" src="https://img.icons8.com/ios/30/empty-filter--v1.png" alt="plus-math--v1" />
                    <span>Filtres</span>
                </div>
            </div>
            <div class="w-3/12 border bg-white rounded h-full items-center flex justify-start pl-4">
                <img width="30" height="30" src="https://img.icons8.com/ios/30/search--v1.png" alt="plus-math--v1" />
                <input class="w-10/12" placeholder="Recherche" />
            </div>
        </div>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-10">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-black uppercase bg-gray-100">
                    <tr>
                        <th scope="col" class="px-6 py-3  h-14">
                            Voir Plus
                        </th>
                        <th scope="col" class="px-6 py-3  h-14">
                            Quantité
                        </th>
                        <th scope="col" class="px-6 py-3  h-14">
                            Prix Unitaire
                        </th>
                        <th scope="col" class="px-6 py-3  h-14">
                            Total de la Ligne
                        </th>
                        <th scope="col" class="px-6 py-3  h-14">
                            <span class="sr-only">Action</span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($_SESSION["Panier"] as $item) { ?>
                        <tr class="bg-white border-b">
                            <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap text-dark flex items-center justify-start">
                                <div class="h-10 w-10 rounded-full bg-gray-200 mr-2 overflow-hidden">
                                    <img src="<?= "../../public/upload/" . $item['image']; ?>" style="object-fit: cover;" class=" h-full w-full" />
                                </div>
                                <div>
                                    <span class="text-black"><?= $item['nom'] ?></span> <br />
                                </div>

                            </th>
                            <td class="px-6 py-4">
                                <span class="text-black"><?= $item['number'] ?></span>
                            </td>
                            <td class="px-6 py-4 w-2/12">
                                <span class="text-black"><span id="total"><?= $item['prix'] ?> €</span>
                            </td>
                            <td class="px-6 py-4 w-2/12">
                                <span class="text-black"><span id="total"><?= $item['prix'] * $item['number'] ?> €</span>
                            </td>
                            <td class="px-6 py-4 w-2/12">
                                <form action="" method="post">
                                    <div class="h-full w-2/12 flex ">
                                        <button type="submit" value="<?= $item['id'] ?>" name="delete" class="h-10">
                                            <img width="25" height="25" src="https://img.icons8.com/pastel-glyph/25/trash.png" alt="pencil--v1" class="ml-5" />
                                        </button>
                                    </div>
                                </form>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

    </div>
</div>
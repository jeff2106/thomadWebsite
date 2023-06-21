<?php include VIEWS . 'inc/header.php'; ?>

<div class="w-full h-screen items-center justify-center flex m-auto ">
    <div class="w-2/12 p-5 h-full secondary-bg" style="background-color:#262626;">
        <?php include VIEWS . 'inc/sidebar.php'; ?>
    </div>
    <div class="w-10/12 h-full p-20 bg-gray-200">
        <div class="h-14 w-full flex justify-between items-center">
            <div class="w-4/12 flex h-full">
                <div class="border w-6/12 h-full mr-5 bg-white flex rounded-xl  items-center justify-center">
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
                            Profits
                        </th>
                        <th scope="col" class="px-6 py-3  h-14">
                            password
                        </th>
                        <th scope="col" class="px-6 py-3  h-14">
                            Admin
                        </th>
                        <th scope="col" class="px-6 py-3  h-14">
                            <span class="sr-only">Action</span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($_SESSION["UsersLists"] as $item) {
                    ?>
                        <tr class="bg-white border-b">
                            <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap text-dark flex items-center justify-start">
                                <div class="h-10 w-10 rounded-full bg-gray-200 mr-2 flex items-center justify-center overflw-hiden">
                                    <img src="<?= "../../public/upload/" . $item['image']; ?>" />
                                </div>
                                <div>
                                    <span class="text-black font-bold"><?= $item['NomComplet'] ?></span> <br />
                                    <span class="text-black text-xs"><?= $item['Email'] ?></span> <br />
                                </div>

                            </th>
                            <td class="px-6 py-4">
                                <span class="text-black"><?= $item['mot_de_passe'] ?></span>
                            </td>
                            <form action="" method="post">
                                <td class="px-6 py-4">
                                    <span id="admin<?= $item['id'] ?>" class="text-black"><?= $item['isAdmin'] == 0 ? 'Non' : "Oui"  ?></span>
                                    <select name="val_admin" id="add-admin<?= $item['id'] ?>" class="hidden">
                                        <option value="1">Oui</option>
                                        <option value="0">Non</option>
                                    </select>
                                </td>
                                <td class="px-6 py-4 w-2/12">
                                    <div class="h-full w-full flex items-center justify-evenly ">
                                        <img id="edit<?= $item['id'] ?>" onclick="toggleDivVisibility(<?= $item['id'] ?>)" style="height:20%;width:20%;object-fit:cover;" src="https://img.icons8.com/fluency-systems-regular/25/pencil--v1.png" alt="pencil--v1" />
                                        <button name="edit-submit" value="<?= $item['id'] ?>" type="submit" id="edit-submit<?= $item['id'] ?>" class="w-14 h-14 hidden">
                                            <img id="edit<?= $item['id'] ?>" onclick="toggleDivVisibility(<?= $item['id'] ?>)" style="height:70%;width:100%;object-fit:contain;" src="https://img.icons8.com/doodle/40/checkmark.png" alt="pencil--v1" />
                                        </button>
                                        <button name="delete" value="<?= $item['id'] ?>" type="submit">
                                            <img width="25" height="25" src="https://img.icons8.com/pastel-glyph/25/trash.png" alt="pencil--v1" class="ml-5" />
                                        </button>
                                    </div>
                                </td>
                            </form>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>

    </div>
</div>
<script>

    function toggleDivVisibility(data) {
    var edit_submit = document.getElementById("edit-submit"+data);
        var admin = document.getElementById('admin'+data);
        var addadmin = document.getElementById('add-admin'+data);
        var edit = document.getElementById('edit'+data);

        if (admin.style.display === 'none') {
            admin.style.display = 'block';
            addadmin.style.display = 'none';
        } else {
            admin.style.display = 'none';
            addadmin.style.display = 'block';
            edit_submit.style.display = "block";
            edit.style.display = "none";

        }
    }
</script>
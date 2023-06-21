<?php
require(init_model . "/Panier.php");

class PanierController
{

    public static function Panier()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['delete'])) {
                $Panier = new Panier([
                    'id' => $_POST['delete']
                ]);
                $Panier->deletePanier();
                //unlink(PUBLIC_FOLDER . "upload/" . $_POST['file_unlink']);
            }
            if (isset($_POST['incrementer'])) {
                $Panier = new Panier([
                    "id" => $_POST['incrementer'],
                    "number" => $_POST['number'] + 1,
                ]);
                $Panier->updatePanier();
                //unlink(PUBLIC_FOLDER . "upload/" . $_POST['file_unlink']);
            }
            if (isset($_POST['decrementer'])) {

                if ($_POST['number'] == 1) {
                    echo "<script>alert('vous ne pouvez pas reduire jusqu à 0')</script>";
                } else {

                    $Panier = new Panier([
                        "id" => $_POST['decrementer'],
                        "number" => $_POST['number'] - 1,
                    ]);
                    $Panier->updatePanier();
                }
            }
            if (isset($_POST['insert'])) {
                $Panier = new Panier([
                    "item_id" => $_POST['item_id'],
                    "C_id" => $_SESSION['users']['id'],
                    "number" => $_POST['number'],
                ]);
                $Panier->insert();
                //unlink(PUBLIC_FOLDER . "upload/" . $_POST['file_unlink']);
            }
            if (isset($_POST['validPanier'])) {
                $Panier = new Panier([
                    "id" => $_SESSION['users']['id'],
                ]);
                $Panier->validPanier();
                //unlink(PUBLIC_FOLDER . "upload/" . $_POST['file_unlink']);
            }
        }
        $Panier =  new Panier([
            "id" => $_SESSION['users']['id'],
        ]);
        $Panier->getPanier();

        include VIEWS . "app/panier.php";
    }
}

<?php
require(init_model . "/Panier.php");
class CommandeAdminController
{

    public static function index()
    {
        if (isset($_POST['delete'])) {
            $Panier = new Panier([
                'id' => $_POST['delete']
            ]);
            $Panier->deletePanier();
            //unlink(PUBLIC_FOLDER . "upload/" . $_POST['file_unlink']);
        }
        $Panier =  new Panier([
            "id" => $_SESSION['users']['id'],
        ]);
        $Panier->getPanierAdmin();
        include VIEWS . "app/commandadmin.php";
    }



}
<?php
require(init_model . "/Panier.php");
class DetailArticleController
{

    public static function DetailArticle()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['insert'])) {
                $Panier = new Panier([
                    "item_id" => $_POST['insert'],
                    "C_id" => $_SESSION['users']['id'],
                    "number" => 1,
                ]);
                $Panier->insert();
                //unlink(PUBLIC_FOLDER . "upload/" . $_POST['file_unlink']);
            }
        }
        include VIEWS . "app/detailArticle.php";
    }



}
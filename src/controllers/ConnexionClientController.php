<?php
require(init_model . "/Customers.php");
class ConnexionClientController
{

    public static function ConnexionClient()
    {
        if (!empty($_POST)) {
            $Customers = new Customers([
                'Email'    =>        strtolower(htmlentities($_POST["Email"] ?? "")),
                'mot_de_passe'        =>        strtolower(htmlentities($_POST["mot_de_passe"] ?? "")),
            ]);
            $Customers->login();

            if (empty($_SESSION["message"])) {
                header("location:" . BASE_PATH_);
                exit;
            }
        }
        include VIEWS . "app/connexionClient.php";
    }



}
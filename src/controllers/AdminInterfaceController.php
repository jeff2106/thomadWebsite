<?php
require(init_model . "/Customers.php");

class AdminInterfaceController
{

    public static function index()
    {
        if (isset($_POST['delete'])) {
            $Customers = new Customers([]);
            $Customers->deleteUser($_POST['delete']);
        }
        if (isset($_POST['edit-submit'])) {
            $Customers = new Customers([]);
            $Customers->UpdateUser([
                "isAdmin" => $_POST['val_admin'],
                "id" => $_POST['edit-submit'],
            ]);
        }
        $Customers = new Customers([]);
        $Customers->getAllUsers();
        include VIEWS . "app/admininterface.php";
    }



}
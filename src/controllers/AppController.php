<?php
require(init_model . "/Categorie.php");
require(init_model."/Articles.php");
class AppController
{

    public static function index()
    {
        $categorie = new CategorieModele([
            'name' => "",
            'description' => "",
            'file' => ""
        ]);
        $categorie->get();
        $ArticleModele = new ArticleModele([]);
        $ArticleModele->get();
        include VIEWS . "app/home.php";
    }

}
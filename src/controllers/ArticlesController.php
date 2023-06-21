<?php
//require __DIR__.'/modele/Articles.php';
require(init_model."/Articles.php");
class ArticlesController
{
    
    public static function Articles()
    {
        $ArticleModele = new ArticleModele([]);
        $ArticleModele->get();
        include VIEWS . "app/articles.php";
    }



}
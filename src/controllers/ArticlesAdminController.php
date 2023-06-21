<?php
require(init_model . "/Articles.php");

class ArticlesAdminController
{

    public static function index()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (empty($_POST['delete'])) {
                $targetDirectory = PUBLIC_FOLDER . "upload/"; // Répertoire de destination pour enregistrer les fichiers téléchargés
                $targetFile = $targetDirectory . basename($_FILES['photo']['name']); // Chemin complet du fichier téléchargé
                $check = getimagesize($_FILES['photo']['tmp_name']); // Vérification si le fichier est une image valide
                if ($check !== false) {
                    if (file_exists($targetFile)) {
                        // Fichier existant avec le même nom, vous pouvez gérer cela ici
                    } else {
                        // Déplacer le fichier téléchargé vers le répertoire de destination
                        if (move_uploaded_file($_FILES['photo']['tmp_name'], $targetFile)) {
                            $ArticleModele = new ArticleModele([
                                "nom" => $_POST["nom"],
                                "prix" => $_POST["prix"],
                                "qte" => $_POST["qte"],
                                "id_categorie" => isset($_POST["id_categorie"]) ?? 0,
                                "image" => basename($_FILES['photo']['name']),
                                "description" => $_POST["description"]
                            ]);
                            $ArticleModele->insert();
                        } else {
                            // Erreur lors du déplacement du fichier téléchargé, vous pouvez gérer cela ici
                        }
                    }
                } else {
                    // Le fichier téléchargé n'est pas une image valide, vous pouvez gérer cela ici
                }
            } else {
                $ArticleModele = new ArticleModele([]);
                $ArticleModele->delete($_POST['delete']);
                unlink(PUBLIC_FOLDER . "upload/" . $_POST['file_unlink']);
            }
        }
        $ArticleModele = new ArticleModele([]);
        $ArticleModele->get();

        include VIEWS . "app/articlesadmin.php";
    }
}

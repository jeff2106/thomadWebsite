<?php
require(init_model . "/Categorie.php");
class CategorieAdminController
{
    public static function index()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (empty($_POST['delete'])) {
                $date = date_create();
                $targetDirectory = PUBLIC_FOLDER . "upload/"; // Répertoire de destination pour enregistrer les fichiers téléchargés
                $targetFile = $targetDirectory . basename($_FILES['photo']['name']); // Chemin complet du fichier téléchargé
                $name = strtolower(htmlentities($_POST["Nom"])); // Récupération du nom de la catégorie depuis le formulaire
                $description = strtolower(htmlentities($_POST["description"])); // Récupération de la description depuis le formulaire
                $check = getimagesize($_FILES['photo']['tmp_name']); // Vérification si le fichier est une image valide
                if ($check !== false) {
                    if (file_exists($targetFile)) {
                        // Fichier existant avec le même nom, vous pouvez gérer cela ici
                    } else {
                        // Déplacer le fichier téléchargé vers le répertoire de destination
                        if (move_uploaded_file($_FILES['photo']['tmp_name'], $targetFile)) {
                            $categorie = new CategorieModele([
                                'name' => $name,
                                'description' => $description,
                                'file' => $_FILES['photo']['name']
                            ]);
                            $categorie->insert(); // Insérer la nouvelle catégorie dans la base de données
                        } else {
                            // Erreur lors du déplacement du fichier téléchargé, vous pouvez gérer cela ici
                        }
                    }
                } else {
                    // Le fichier téléchargé n'est pas une image valide, vous pouvez gérer cela ici
                }
            } else {
                $categorie = new CategorieModele([
                    'name' => "",
                    'description' => "",
                    'file' => ""
                ]);

                // Supprimer le fichier selectionner de la base de données
                $categorie->delete($_POST['delete']);
                // Supprimer l'image de notre server après retrait de la base de donnée
                unlink(PUBLIC_FOLDER . "upload/" . $_POST['file_unlink']);
            }
        }

        // Récupérer toutes les catégories depuis la base de données
        $categorie = new CategorieModele([
            'name' => "",
            'description' => "",
            'file' => ""
        ]);
        $categorie->get();

        include VIEWS . "app/categorieadmin.php"; // Inclure le fichier de vue pour afficher la page
    }
}

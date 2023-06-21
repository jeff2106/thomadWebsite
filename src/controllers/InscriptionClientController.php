<?php
require(init_model . "/Customers.php");

class InscriptionClientController
{

    public static function InscriptionClient()
    {
        if (!empty($_POST)) {
            $targetDirectory = PUBLIC_FOLDER . "upload/"; // Répertoire de destination pour enregistrer les fichiers téléchargés
            $targetFile = $targetDirectory . basename($_FILES['photo']['name']); // Chemin complet du fichier téléchargé
            $check = getimagesize($_FILES['photo']['tmp_name']); // Vérification si le fichier est une image valide
            if ($check !== false) {
                if (file_exists($targetFile)) {
                    // Fichier existant avec le même nom, vous pouvez gérer cela ici
                } else {
                    // Déplacer le fichier téléchargé vers le répertoire de destination
                    if (move_uploaded_file($_FILES['photo']['tmp_name'], $targetFile)) {
                        $Customers = new Customers([
                            'NomComplet'        =>        strtolower(htmlentities($_POST["NomComplet"])),
                            'Numero'        =>        strtolower(htmlentities($_POST["Numero"])),
                            'Email'    =>        strtolower(htmlentities($_POST["Email"])),
                            'Genre'        =>        strtolower(htmlentities($_POST["Genre"])),
                            'Etat'        =>        strtolower(htmlentities($_POST["Etat"])),
                            'adresse'        =>        strtolower(htmlentities($_POST["adresse"])),
                            'Ville'        =>        strtolower(htmlentities($_POST["Ville"])),
                            'CodePostal'        =>        strtolower(htmlentities($_POST["CodePostal"])),
                            'mot_de_passe'        =>        strtolower(htmlentities($_POST["mot_de_passe"])),
                            'image'        =>        basename($_FILES['photo']['name']),
                        ]);

                        $Customers->insert();
                    } else {
                        // Erreur lors du déplacement du fichier téléchargé, vous pouvez gérer cela ici
                    }
                }
            } else {
                // Le fichier téléchargé n'est pas une image valide, vous pouvez gérer cela ici
            }


            if (empty($_POST["message"])) {
                header("location:" . BASE_PATH_ . "/connexion");
                exit;
            }
            return;
        }
        
        include VIEWS . "app/inscriptionClient.php";
    }
}

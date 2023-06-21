<?php
require(init_model . "/About.php");
class AproposController
{

    public static function Apropos()
    {
        function isEmail($email)
        {
            // Utiliser la fonction filter_var avec le filtre FILTER_VALIDATE_EMAIL pour vérifier l'e-mail
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                return true;
            } else {
                return false;
            }
        }
        if (!empty($_POST)) {
            $AboutModele = new AboutModele([
                'Email'    =>        strtolower(htmlentities($_POST["Email"])),
            ]);
            if (isEmail($AboutModele->getEmail())) {
                //echo "<script> alert('Ce email est invalide !!!') </script";
                $AboutModele->_suscribe_nl();
            } else {
                echo "<script>
                alert('Email est invalide !!!');
            </script>";
            }
        }

        include VIEWS . "app/apropos.php";
    }
}

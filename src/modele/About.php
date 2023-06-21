<?php


class AboutModele extends Db
{
    private $Email;


    public function __construct($data)
    {
        $this->setEmail($data['Email'] ?? "");
    }
    public function setEmail($Email)
    {
        $this->Email = $Email;
    }
    public  function getEmail()
    {
        return  $this->Email;
    }
    public function _suscribe_nl()
    {
        if ($this->getEmail() == "") {
            $_SESSION["message"] =  "Aucun email!!!";
        }
        $requete = "INSERT INTO `Subscribe_Nl` (`id`, `email`) VALUES (NULL, ?)";
        $requetePreparee = (self::getDb())->prepare($requete);
        $reponse = $requetePreparee->execute([
            $this->Email,
        ]);
        $req = $requetePreparee->fetch(PDO::FETCH_ASSOC);

        if (!$reponse) {
            //$_SESSION["message"] .= "Erreur lors de l'ajout en bdd";
            return;
        }
    }
}

<?php
class Panier extends Db
{
    private $id;
    private $item_id;
    private $C_id;
    private $number;

    public function __construct($data)
    {
        if (isset($data['id'])) {
            $this->id = $data['id'];
        }
        if (isset($data['item_id'])) {
            $this->item_id = $data['item_id'];
        }
        if (isset($data['C_id'])) {
            $this->C_id = $data['C_id'];
        }
        if (isset($data['number'])) {
            $this->number = $data['number'];
        }
    }

    // Getters
    public function getId()
    {
        return $this->id;
    }

    public function getItemId()
    {
        return $this->item_id;
    }

    public function getCId()
    {
        return $this->C_id;
    }

    public function getNumber()
    {
        return $this->number;
    }

    // Setters
    public function setId($id)
    {
        $this->id = $id;
    }

    public function setItemId($item_id)
    {
        $this->item_id = $item_id;
    }

    public function setCId($C_id)
    {
        $this->C_id = $C_id;
    }

    public function setNumber($number)
    {
        $this->number = $number;
    }

    public function insert()
    {;
        $requete = "INSERT INTO `Panier` (`id`, `item_id`, `C_id`, `number`) VALUES (null,?,?,?)";
        // Préparation de la requête SQL
        $requetePreparee = (self::getDb())->prepare($requete);
        // Exécution de la requête en passant les valeurs des variables correspondantes
        $reponse = $requetePreparee->execute([
            $this->item_id,
            $this->C_id,
            $this->number,
        ]);
        if (!$reponse) {
            $_SESSION["message"] .= "Erreur lors de l'ajout en bdd";
        }
    }
    public function getPanier()
    {
        //SELECT * FROM `Panier`
        $requete = "SELECT p.*, a.nom, a.prix, a.qte,a.id_categorie, a.image, a.description
        FROM Panier AS p
        JOIN Articles_Items AS a ON p.item_id = a.id
        WHERE p.C_id = ? AND p.state = 0";
        // Préparation de la requête SQL
        $requetePreparee = (self::getDb())->prepare($requete);
        // Exécution de la requête en passant les valeurs des variables correspondantes
        $reponse = $requetePreparee->execute([
            $this->id,
        ]);
        if (!$reponse) {
            $_SESSION["message"] = "Erreur lors de l'ajout en bdd";
            return;
        }
        $data = $requetePreparee->fetchAll(PDO::FETCH_ASSOC);
        $_SESSION["Panier"] = $data;
    }
    public function getPanierAdmin()
    {
        //SELECT * FROM `Panier`
        $requete = "SELECT p.*, a.nom, a.prix, a.qte,a.id_categorie, a.image, a.description
        FROM Panier AS p
        JOIN Articles_Items AS a ON p.item_id = a.id
        WHERE p.state = 1";
        // Préparation de la requête SQL
        $requetePreparee = (self::getDb())->prepare($requete);
        // Exécution de la requête en passant les valeurs des variables correspondantes
        $reponse = $requetePreparee->execute();
        if (!$reponse) {
            $_SESSION["message"] = "Erreur lors de l'ajout en bdd";
            return;
        }
        $data = $requetePreparee->fetchAll(PDO::FETCH_ASSOC);
        $_SESSION["Panier"] = $data;
    }
    public function updatePanier()
    {
        $requete = "UPDATE `Panier` SET `number` = ? WHERE `Panier`.`id` = ?";
        $requetePreparee = (self::getDb())->prepare($requete);
        $reponse = $requetePreparee->execute([
            $this->number,
            $this->id,
        ]);
        if (!$reponse) {
            $_SESSION["message"] = "Erreur lors de l'ajout en bdd";
            return;
        }
    }
    public function deletePanier()
    {
        $requete = "DELETE FROM Panier WHERE `Panier`.`id` = ?";
        $requetePreparee = (self::getDb())->prepare($requete);
        $reponse = $requetePreparee->execute([
            $this->id,
        ]);
        if (!$reponse) {
            $_SESSION["message"] = "Erreur lors de l'ajout en bdd";
            return;
        }
    }
    public function validPanier()
    {
        $requete = "UPDATE `Panier` SET `state` = '1' WHERE `Panier`.`C_id` = ?";
        $requetePreparee = (self::getDb())->prepare($requete);
        $reponse = $requetePreparee->execute([
            $this->id,
        ]);
        if (!$reponse) {
            $_SESSION["message"] = "Erreur lors de l'ajout en bdd";
            return;
        }
    }
}

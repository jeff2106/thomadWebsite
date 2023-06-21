<?php
class Customers extends Db
{
	private $id;
	private $NomComplet;
	private $Numero;
	private $Email;
	private $Genre;
	private $Etat;
	private $adresse;
	private $Ville;
	private $CodePostal;
	private $mot_de_passe;
	private $isAdmin;
	private $image;


	public  function __construct($data)
	{
		if (isset($data["NomComplet"])) {
			$this->setNom($data["NomComplet"]);
		}
		if (isset($data["adresse"])) {
			$this->setAdress($data["adresse"]);
		}
		if (isset($data["Numero"])) {
			$this->setNumero($data["Numero"]);
		}
		if (isset($data["CodePostal"])) {
			$this->setCodePostal($data["CodePostal"]);
		}
		if (isset($data["Email"])) {
			$this->setEmail($data["Email"]);
		}
		if (isset($data["Etat"])) {
			$this->setEtat($data["Etat"]);
		}
		if (isset($data["Genre"])) {
			$this->setGenre($data["Genre"]);
		}
		if (isset($data["mot_de_passe"])) {
			$this->setMotDePasse($data["mot_de_passe"]);
		}
		if (isset($data["Ville"])) {
			$this->setVille($data["Ville"]);
		}
		if (isset($data["image"])) {
			$this->setImage($data["image"]);
		}
	}

	public function insert()
	{
		$requete = "INSERT INTO `T_Customer` (`id`, `NomComplet`, `Numero`, `Email`, `Genre`, `Adresse`, `Etat`, `Ville`, `CodePostal`, `mot_de_passe`, `image`) " . "
		VALUES (null, ?, ?, ?, ?, ?, ?,?, ?,?, ?);";
		$requetePreparee = (self::getDb())->prepare($requete);
		$reponse = $requetePreparee->execute([
			$this->NomComplet,
			$this->Numero,
			$this->Email,
			$this->Genre,
			$this->Etat,
			$this->adresse,
			$this->Ville,
			$this->CodePostal,
			$this->mot_de_passe,
			$this->image,
		]);
		if (!$reponse) {
			$_SESSION["message"] .= "Erreur lors de l'ajout en bdd";
		}
	}
	public function login()
	{
		$requete = "SELECT * FROM `T_Customer` WHERE mot_de_passe = ? AND Email = ?";
		$requetePreparee = (self::getDb())->prepare($requete);
		$reponse = $requetePreparee->execute([
			$this->mot_de_passe,
			$this->Email,
		]);
		$req = $requetePreparee->fetch(PDO::FETCH_ASSOC);
		if ($requetePreparee->rowCount() < 1) {
			session_destroy();
			$_SESSION["message"] =  "Aucune utilisation ne correspond!!!";
			return;
		}
		$_SESSION['users'] = $req;
		if ($_SESSION["message"]) {
			$_SESSION["message"] = null;
		}
		if (!$reponse) {
			//$_SESSION["message"] .= "Erreur lors de l'ajout en bdd";
			return;
		}
	}
	public static function getAllUsers()
	{
		$requete = "SELECT * FROM `T_Customer`";
		$requetePreparee = (self::getDb())->prepare($requete);
		$reponse = $requetePreparee->execute();
		$req = $requetePreparee->fetchAll(PDO::FETCH_ASSOC);
		if (!$reponse) {
			$_SESSION["message"] .= "Erreur lors de l'ajout en bdd";
			return;
		}
		$_SESSION["UsersLists"] = $req;
	}
	public static function deleteUser($id)
	{
		$requete = "DELETE FROM T_Customer WHERE `T_Customer`.`id` = ? ";
		$requetePreparee = (self::getDb())->prepare($requete);
		$reponse = $requetePreparee->execute([$id]);
	}
	public static function UpdateUser($data)
	{
		$requete = "UPDATE `T_Customer` SET `isAdmin` = ? WHERE `T_Customer`.`id` = ?";
		$requetePreparee = (self::getDb())->prepare($requete);
		$reponse = $requetePreparee->execute([
			$data['isAdmin'],
			$data['id'],
		]);
	}
	public function setNom($NomComplet)
	{
		$this->NomComplet = $NomComplet;

		return $this;
	}


	public function setNumero($Numero)
	{
		$this->Numero = $Numero;

		return $this;
	}
	public function setEmail($Email)
	{
		$this->Email = $Email;

		return $this;
	}
	public function setNomComplet($NomComplet)
	{
		$this->NomComplet = $NomComplet;

		return $this;
	}
	public function setGenre($Genre)
	{
		$this->Genre = $Genre;

		return $this;
	}
	public function setAdress($Adress)
	{
		$this->adresse = $Adress;

		return $this;
	}
	public function setEtat($Etat)
	{
		$this->Etat = $Etat;

		return $this;
	}
	public function setVille($Ville)
	{
		$this->Ville = $Ville;

		return $this;
	}
	public function setCodePostal($CodePostal)
	{
		$this->CodePostal = $CodePostal;

		return $this;
	}
	public function setMotDePasse($mot_de_passe)
	{
		$this->mot_de_passe = md5($mot_de_passe);

		return $this;
	}
	public function setImage($image)
	{
		$this->image = $image;

		return $this;
	}

	/*
	Mes fonction pour avoir accès au valeur de mes constante
	*/
	public function getNumero()
	{

		return $this->Numero;
	}
	public function getEmail()
	{

		return $this->Email;
	}
	public function getNomComplet()
	{

		return $this->NomComplet;
	}
	public function getGenre()
	{

		return $this->Genre;
	}
	public function getAdress()
	{

		return $this->adresse;
	}
	public function getEtat()
	{

		return $this->Etat;
	}
	public function getVille()
	{

		return $this->Ville;
	}
	public function getCodePostal()
	{

		return $this->CodePostal;
	}
	public function getMotDePasse()
	{

		return $this->mot_de_passe;
	}
	public function getImage()
	{

		return $this->image;
	}
}

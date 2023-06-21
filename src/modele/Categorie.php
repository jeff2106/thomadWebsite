<?php


class CategorieModele extends Db
{
	private $id;
	private $name;
	private $description;
	private $file;


	public function __construct($data)
	{
		$this->setName($data['name']);
		$this->setDescription($data['description']);
		$this->setFile($data['file']);
	}
	public function setName($name)
	{
		$this->name = $name;
	}
	public  function getName()
	{
		return $this->name;
	}
	public function setDescription($description)
	{
		$this->description = $description;
	}
	public  function getDescription()
	{
		return $this->description;
	}
	public function setFile($file)
	{
		$this->file = $file;
	}
	public  function getFile()
	{
		return $this->file;
	}

	public function insert(){
		$requete = "INSERT INTO `T_Categorie` (`id`, `nom`, `description`, `image`) VALUES (NULL, ?,?,?);";
		$requetePreparee = (self::getDb())->prepare($requete);
		$reponse = $requetePreparee->execute([
			$this->name,
			$this->description,
			$this->file,
		]);
		if (!$reponse) {
			$_SESSION["message"] = "Erreur lors de l'ajout en bdd";
		}else{

		}
	}

	public function get(){
		$requete = "SELECT * FROM T_Categorie";
		$requetePreparee = (self::getDb())->prepare($requete);
		$reponse = $requetePreparee->execute();
		if (!$reponse) {
			$_SESSION["message"] = "Erreur lors de l'ajout en bdd";
			return;
		}
		$data = $requetePreparee->fetchAll(PDO::FETCH_ASSOC);
		$_SESSION["itemCategory"] = $data;
	}

	public function delete($id){
		$requete = "DELETE FROM T_Categorie WHERE `T_Categorie`.`id` = ?";
		$requetePreparee = (self::getDb())->prepare($requete);
		$reponse = $requetePreparee->execute([$id]);
		if (!$reponse) {
			$_SESSION["message"] = "Erreur lors de l'ajout en bdd";
			return;
		}
	}
}

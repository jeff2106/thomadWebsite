<?php


class ArticleModele extends Db
{
	private $id;
	private $nom;
	private $prix;
	private $qte;
	private $id_categorie;
	private $image;
	private $description;


	public function __construct($data)
	{
		if (isset($data['id'])) {
			$this->setId($data['id']);
		}
		if (isset($data['nom'])) {
			$this->setNom($data['nom']);
		}
		if (isset($data['prix'])) {
			$this->setPrix($data['prix']);
		}
		if (isset($data['qte'])) {
			$this->setQte($data['qte']);
		}
		if (isset($data['id_categorie'])) {
			$this->setIdCategorie($data['id_categorie']);
		}
		if (isset($data['image'])) {
			$this->setImage($data['image']);
		}
		if (isset($data['description'])) {
			$this->setDescription($data['description']);
		}
	}

	// Getter pour $id
	public function getId()
	{
		return $this->id;
	}

	// Setter pour $id
	public function setId($id)
	{
		$this->id = $id;
	}

	// Getter pour $nom
	public function getNom()
	{
		return $this->nom;
	}

	// Setter pour $nom
	public function setNom($nom)
	{
		$this->nom = $nom;
	}

	// Getter pour $prix
	public function getPrix()
	{
		return $this->prix;
	}

	// Setter pour $prix
	public function setPrix($prix)
	{
		$this->prix = $prix;
	}

	// Getter pour $qte
	public function getQte()
	{
		return $this->qte;
	}

	// Setter pour $qte
	public function setQte($qte)
	{
		$this->qte = $qte;
	}

	// Getter pour $id_categorie
	public function getIdCategorie()
	{
		return $this->id_categorie;
	}

	// Setter pour $id_categorie
	public function setIdCategorie($id_categorie)
	{
		$this->id_categorie = $id_categorie;
	}

	// Getter pour $image
	public function getImage()
	{
		return $this->image;
	}

	// Setter pour $image
	public function setImage($image)
	{
		$this->image = $image;
	}

	// Getter pour $description
	public function getDescription()
	{
		return $this->description;
	}

	// Setter pour $description
	public function setDescription($description)
	{
		$this->description = $description;
	}

	public function insert()
	{
		// Requête SQL pour insérer un nouvel enregistrement dans la table Articles_Items
		$requete = "INSERT INTO Articles_Items (id, nom, prix, qte, id_categorie, image, description) VALUES (null, ?, ?, ?, ?, ?, ?)";
		// Préparation de la requête SQL
		$requetePreparee = (self::getDb())->prepare($requete);
		// Exécution de la requête en passant les valeurs des variables correspondantes
		$reponse = $requetePreparee->execute([
			$this->nom,
			$this->prix,
			$this->qte,
			$this->id_categorie,
			$this->image,
			$this->description
		]);
		// Vérification du succès de l'exécution de la requête
		if (!$reponse) {
			$_SESSION["message"] .= "Erreur lors de l'ajout en bdd";
		}
	}

	public function get()
	{
		// Requête SQL pour récupérer tous les enregistrements de la table Articles_Items
		$requete = "SELECT * FROM `Articles_Items`";
		// Préparation de la requête SQL
		$requetePreparee = (self::getDb())->prepare($requete);
		// Exécution de la requête
		$reponse = $requetePreparee->execute();
		// Vérification du succès de l'exécution de la requête
		if (!$reponse) {
			$_SESSION["message"] .= "Erreur lors de l'ajout en bdd";
		}
		// Récupération des données (résultat de la requête) sous forme de tableau associatif
		$data = $requetePreparee->fetchAll(PDO::FETCH_ASSOC);
		// Stockage des données dans la variable de session "Articles_Items" pour l'utiliser dans nôtre application
		$_SESSION["Articles_Items"] = $data;
	}
	public function delete($id){
		$requete = "DELETE FROM Articles_Items WHERE `Articles_Items`.`id` = ?";
		$requetePreparee = (self::getDb())->prepare($requete);
		$reponse = $requetePreparee->execute([$id]);
		if (!$reponse) {
			$_SESSION["message"] = "Erreur lors de l'ajout en bdd";
			return;
		}
	}
}

<?php

/**
  * fichier class.University.php
  * contient la classe University qui fournit
  * un objet pdo et des méthodes pour récupérer les données de la base de donnée
  */
class University
{
		/**
		  * type et nom du serveur de bdd
		  * @var string $serveur
		  */
      	private static $serveur='mysql:host=localhost';
		/**
		* nom de la BD
		* @var string $bdd
		*/
      	private static $bdd='dbname=university';
		/**
		* nom de l'utilisateur utilisé pour la connexion
		* @var string $user
		*/
      	private static $user='root' ;
		/**
		* mdp de l'utilisateur utilisé pour la connexion
		* @var string $mdp
		*/
      	private static $mdp='' ;
		/**
		* objet pdo de la classe University pour la connexion
		* @var PDO $monPdo
		*/
		private static $monPdo;
		/**
		* utilisé pour savoir si l'objet de la classe Pdo a déjà été créé (ou pas pas créé=null)
		* @var University $myUniversity
		*/
		private static $myUniversity = null;
	/**
	 * Constructeur privé, crée l'instance de PDO qui sera sollicitée
	 * pour toutes les méthodes de la classe
	 */
	private function __construct()
	{
    		University::$monPdo = new PDO(University::$serveur.';'.University::$bdd, University::$user, University::$mdp);
			University::$monPdo->query("SET CHARACTER SET utf8");
	}
	/**
    * destructeur
    */
	public function _destruct(){
		University::$monPdo = null;
	}
	/**
	 * Fonction statique qui crée l'unique instance de la classe
	 *
	 * Appel : $instanceUniversity = University::getUniversity();
	 * @return University $myUniversity l'unique objet de la classe University
	 */
	public static function getUniversity()
	{
		if(University::$myUniversity == null)
		{
			University::$myUniversity= new University();
		}
		return University::$myUniversity;
	}

	/**
	 * Retourne les informations utilisateurs
	 * @return array $user les informations utilisateurs
	 */
	public function getUser($username, $password)
	{
		//$req = "select * from EMPLOYER WHERE id_categorie IN (SELECT DISTINCT code FROM CATEGORIE WHERE USERNAME = :username)";
		$req = "select * from EMPLOYER WHERE USERNAME = :username";
		$res = University::$monPdo->prepare($req);
		$res->execute(array('username' => $username));
		$lesLignes = $res->fetch();
		$categorie = $this->getCategorie($lesLignes[1]);
		if(password_verify($password, $lesLignes[5])) {
		$user = [
			"username" => $lesLignes[4],
			"password" => $lesLignes[5],
			"prenom" => $lesLignes[2],
			"nom" => $lesLignes[3],
			"id_categorie" => $lesLignes[1],
			"categorie" => $categorie
		];
		}
		else {
			$user = false;
		}
		return $user;
	}

	/**
	 * Retourne la catégorie à partir de l'id de la categorie
	 * @return string la categorie
	 */
	public function getCategorie($id)
	{
		//$req = "select * from EMPLOYER WHERE id_categorie IN (SELECT DISTINCT code FROM CATEGORIE WHERE USERNAME = :username)";
		$req = "select * from categorie WHERE ID_CATEGORIE = :categorie";
		$res = University::$monPdo->prepare($req);
		$res->execute(array('categorie' => $id));
		$lesLignes = $res->fetch();
		return $lesLignes[1];
	}

	/**
	 * Ajoute un étudiant à la base de donnée
	 */
	public function addEtudiant($nom, $prenom, $adresse, $tel, $mail)
	{
		//$req = "select * from EMPLOYER WHERE id_categorie IN (SELECT DISTINCT code FROM CATEGORIE WHERE USERNAME = :username)";
		$req = "INSERT INTO `etudiant` (`ID`, `NOM`, `PRENOM`, `ADRESSE`, `TEL`, `MAIL`) VALUES (NULL, :nom, :prenom, :adresse, :tel, :mail)";
		$res = University::$monPdo->prepare($req);
		$res->execute(array(
			'nom' => $nom,
			'prenom' => $prenom,
			'adresse' => $adresse,
			'tel' => $tel,
			'mail' => $mail
		));
	}

	/**
	 * Modifie un étudiant
	 */
	public function editEtudiant($id, $nom, $prenom, $adresse, $tel, $mail)
	{
		$req = "UPDATE `etudiant` SET NOM=:nom, PRENOM=:prenom, ADRESSE=:adresse, TEL=:tel, MAIL=:mail WHERE ID=:id";
		$res = University::$monPdo->prepare($req);
		$res->execute(array(
			'nom' => $nom,
			'prenom' => $prenom,
			'adresse' => $adresse,
			'tel' => $tel,
			'mail' => $mail,
			'id' => $id
		));
	}

	/**
	 * Récupères les étudiant(e)
	 */
	public function getEtudiants()
	{
		$req = "SELECT * FROM etudiant";
		$res = University::$monPdo->prepare($req);
		$res->execute();
		$lesLignes = $res->fetchAll();
		return $lesLignes;
	}

	/**
	 * Récupères un(e) étudiant(e)
	 */
	public function getEtudiant($id)
	{
		$req = "SELECT * FROM etudiant WHERE ID=:id";
		$res = University::$monPdo->prepare($req);
		$res->execute(array(
			'id' => $id
		));
		$lesLignes = $res->fetch();
		return $lesLignes;
	}

	/**
	 * Ajoute un service
	 */
	public function addService($libelle, $prix)
	{
		$req = "INSERT INTO `service` (`ID`, `LIBELLE`, `PRIX`) VALUES (NULL, :libelle, :prix)";
		$res = University::$monPdo->prepare($req);
		$res->execute(array(
			'libelle' => $libelle,
			'prix' => $prix
		));
	}

	/**
	 * Récupère les services
	 */
	public function getServices()
	{
		$req = "SELECT * FROM service";
		$res = University::$monPdo->prepare($req);
		$res->execute();
		$lesLignes = $res->fetchAll();
		return $lesLignes;
	}

	/**
	 * Récupère un service
	 */
	public function getService($id)
	{
		$req = "SELECT * FROM service WHERE ID=:id";
		$res = University::$monPdo->prepare($req);
		$res->execute(array(
			'id' => $id
		));
		$lesLignes = $res->fetch();
		return $lesLignes;
	}

	/**
	 * Modifie un service
	 */
	public function editService($id, $libelle, $prix)
	{
		$req = "UPDATE `etudiant` SET NOM=:libelle, PRENOM=:prix WHERE ID=:id";
		$res = University::$monPdo->prepare($req);
		$res->execute(array(
			'libelle' => $libelle,
			'prix' => $prix,
			'id' => $id
		));
	}

}
?>

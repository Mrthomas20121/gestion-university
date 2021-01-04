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
    $req = "select * from CATEGORIE INNER JOIN EMPLOYER ON CATEGORIE.code=EMPLOYER.id_categorie WHERE USERNAME = :username";
    $res = University::$monPdo->prepare($req);
    $res->execute(array('username' => $username));
    $lesLignes = $res->fetch();
    if(password_verify($password, $lesLignes[8])) {
      $user = [
          "id_categorie" => $lesLignes[0],
          "nom_categorie" => $lesLignes[1],
          "prenom" => $lesLignes[2],
          "adress" => $lesLignes[3],
          "cp" => $lesLignes[4],
      ];
    }
    else {
        $user = false;
    }
    return $user;
}


}
?>

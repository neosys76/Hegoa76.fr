<?php
// ======================================================================
// Auteurs : Dominique Dehareng
// Licence : CeCILL v2
// ======================================================================

require "class_page.php";                                              // - On inclut la class Page



class PageInscriptionConfirmation extends Page
{

    function __construct()
    {
      // - on appele le constructeur du parent
      parent::__construct();

    }

    // - Affichage de la page ou traitement des données
    public function Afficher()
    {
      // les valeurs transmises dans l'URL pour la confirmation
      $courriel = "";
      $cle= "";
      if(isset($_GET["email"])){$courriel = urldecode($_GET["email"]);}
      if(isset($_GET["cle"])){$cle = urldecode($_GET["cle"]);}

      // - Verifier l'URL transmis
      $sql = "SELECT * FROM \"libertribes\".\"COMPTE\" WHERE email = '".$courriel."'";
      $result = $this->db_connexion->Requete($sql);
      if($result){
      		$row = pg_fetch_array($result);
      		$clef = substr($row['password'],5,8);
      		if($cle==$clef){
				$sql = "UPDATE \"libertribes\".\"COMPTE\"  SET confirmation = TRUE where email = '".$courriel."'"; 
				if($this->db_connexion->Requete($sql)){
					header('Location: index.php?page=connexion&notice=1');
        			exit;			
				}
			else {
				//  la mise à jour du champ confirmation en BDD n'a pas pu avoir lieu
				header('Location: index.php?page=inscription&erreur=7');
        		exit;			
				} 		
      		}
      		else {
      			header('Location: index.php?page=inscription&erreur=5');
        		exit;
      		}
      	}
      	else {
			//  l'email n'a pas été trouvé dans la BDD (soit erreur d'accès soit l'email n'existe pas)
			header('Location: index.php?page=inscription&erreur=6');
        	exit;			
		}
      // - Gestion de l'affichage: pas d'affichage, que des redirections
	    //parent::Afficher();

    }// - Fin de la fonction Afficher

}// - Fin de la classe

?>
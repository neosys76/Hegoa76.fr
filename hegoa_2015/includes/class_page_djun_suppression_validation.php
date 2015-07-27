<?php
// ======================================================================
// Auteur : Donatien CELIA, Dominique Dehareng
// Licence : CeCILL v2
// ======================================================================

require "class_page.php";                                                       // - On inclut la class Page



class PageDjunSuppressionValidation extends Page
{

    function __construct()
    {
      // - on appele le constructeur du parent
      parent::__construct();

      // - on renseigne qq infos du parent
      parent::SetNomPage( "djun_suppression_validation" , "Suppression du D'jun");

      // - on ajoute les menus utiles
    }

    // - Affichage de la page
    public function Afficher()
    {
		if(isset($_SESSION["compte"])&&!empty($_SESSION["compte"])){
     	 // - gestion spécifique de la page
      		$account_id           = $_SESSION['compte']->id;
      		$djun_name            = $_SESSION['djun_choisi']->nom;

      		// - On supprime le D'jun
      		$sql  = "DELETE FROM \"libertribes\".\"AVATAR\"  WHERE compte_id = $account_id and avatar_nom ='$djun_name'";

      		$result = $this->db_connexion->Requete( $sql );
      		if ( ! $result || pg_affected_rows($result)==0)
      		{
      		  // - redirection vers la page djun_suppression avec un message d'erreur
      		  header('Location: index.php?page=djun_suppression&erreur=1');
      		  exit;
      		}
			//  restructurer la variable de session avatar s'il y a plusieurs avatars
			$avatars = array();
			$i=0;
			foreach($_SESSION['avatars'] as $avatar){
				if($avatar->nom != $_SESSION['djun_choisi']->nom){
				$avatars[$i] = $avatar;
				$i++;
				}
			}	
			unset($_SESSION['avatars']);	
			$_SESSION['avatars'] = $avatars;
			unset($_SESSION['djun_choisi']);
			unset($_SESSION["avatar_name"]);
		
      		// - redirection vers la page TDB
      		header('Location: index.php?page=tdb');
   			}
   		else {
			header('Location: index.php?page=connexion&erreur=3');
			exit;
		}
    }// - Fin de la fonction Afficher

}// - Fin de la classe

?>
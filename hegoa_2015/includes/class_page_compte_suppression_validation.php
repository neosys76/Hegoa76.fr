<?php
// ======================================================================
// Auteur : Donatien CELIA
// Licence : CeCILL v2
// ======================================================================

require "class_page.php";                                                       // - On inclut la class Page



class PageCompteSuppressionValidation extends Page
{

    function __construct()
    {
      // - on appele le constructeur du parent
      parent::__construct();

      // - on renseigne qq infos du parent
      parent::SetNomPage( "compte_suppression_validation","Suppression de compte" );

      // - on ajoute les menus utiles
    }

    // - Affichage de la page
    public function Afficher()
    {
		if(isset($_SESSION["compte"])&&!empty($_SESSION["compte"])){

      		// - gestion spécifique de la page
      		$account_id           = $_SESSION['compte']->id;

      		// - On supprime le compte
      		$sql  = "DELETE FROM \"libertribes\".\"COMPTE\"  WHERE compte_id = $account_id";

      		$result = $this->db_connexion->Requete( $sql );
      		if ( ! $result)
      		{
      		  // - redirection vers la page d'accueil du jeu
      		  header('Location: index.php?page=compte_suppression_validation&erreur=1');
      		  exit;
      		}
		session_destroy();
      	// - redirection vers la page compte
      	header('Location: index.php?page=accueil');
		}
		else {
			header('Location: index.php?page=connexion&erreur=3');
			exit;
		}

    }// - Fin de la fonction Afficher

}// - Fin de la classe

?>
<?php
// ======================================================================
// Auteur : Donatien CELIA, Dominique Dehareng
// Licence : CeCILL v2
// ======================================================================

require "class_page.php";                                                       // - On inclut la class Page



class PageChoixPeupleValidation extends Page
{

    function __construct()
    {
      // - on appele le constructeur du parent
      parent::__construct();

      // - on renseigne qq infos du parent
      parent::SetNomPage( "choix_peuple_validation", "Choix du peuple" );

      // - on ajoute les menus utiles
    }

    // - Affichage de la page
    public function Afficher()
    {
		if(isset($_SESSION["compte"])&&!empty($_SESSION["compte"])){
     	 // - gestion spécifique de la page
     		$account_id           = $_SESSION['compte']->id;
     		$choix_peuple         = $_POST['choix_peuple'];
			$test_races = true;
			$search = array("é","è");
			$replace = array("e","e");
			foreach($_SESSION['races_possibles'] as $race){
				$nom = str_replace($search,$replace,$race->nom);
				$test_races= $test_races || ($choix_peuple==$nom);
			}

      		if ($test_races)
      		{
      		  $_SESSION['choix_peuple'] = $choix_peuple;
	
	        // - redirection vers la page d'accueil du jeu
	        header('Location: index.php?page=choix_peuple_voir');
	        exit;
	      }
     	 else
     	 {
     	   $_SESSION['choix_peuple'] = "";
     	   // - redirection vers la page TDB
     	   header('Location: index.php?page=choix_peuple');
     	   exit;
     	 }
   		}
	else {
			header('Location: index.php?page=connexion&erreur=3');
			exit;
		}
    }// - Fin de la fonction Afficher

}// - Fin de la classe

?>
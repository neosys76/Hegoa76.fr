<?php
// ======================================================================
// Auteur : Donatien CELIA, Dominique Dehareng
// Licence : CeCILL v2
// ======================================================================

error_reporting(E_ALL);

require "class_page.php";                                              // - On inclut la class Page

class PageDjun extends Page
{
    function __construct()
    {
      // - on appele le constructeur du parent
      parent::__construct();

      // - on renseigne qq infos du parent
      parent::SetNomPage( "djun","Mon D'jun");
      parent::SetAffichageHeader( 1 );
      parent::SetAffichageMenu( 0 );
      parent::SetAffichageFooter( 0 );

      $this->AjouterCSS("page_djun.css");

      // - on ajoute les contenus utiles
      $this->AjouterContenu("contenu", "contenus/page_djun.php");

      // - on ajoute les menus utiles
      //$this->AjouterMenu("accueil","Accueil");
    }

    // - Affichage de la page
    public function Afficher()
    {
    	if(isset($_SESSION["compte"])&&!empty($_SESSION["compte"])){
    	//  pour le calcul du niveau mana
    	  include "utilitaires/calcul_mana.php";
    	  
    	  $account_id           = $_SESSION['compte']->id;
    	  $avatar_name          = $_GET["avatar"];
	
	      if ( !isset($avatar_name) || empty($avatar_name))
	      {
	        // - redirection vers la page tdb
	        header('Location: index.php?page=tdb');
	        exit();
	      }

     	 if ( !isset($_SESSION['avatars'])||empty($_SESSION['avatars']))
     	 {
     		   header('Location: index.php?page=tdb&erreur=no_djun');
     		   exit();
     	}

      		// - On stocke le djun choisi
      		foreach($_SESSION['avatars'] as $avatar){
      			if($avatar->nom == $avatar_name){
      				$_SESSION['djun_choisi'] = $avatar;
      				break;
      			}
	   		}
	   		
			//  on indique l'heure de connexion dans la table AVATAR (dernière_connexion)
			$le_moment = date("Y-m-d H:i:s");
			$sql = "UPDATE \"libertribes\".\"AVATAR\"  SET derniere_connexion = '".$le_moment."' where avatar_id = '".$_SESSION["djun_choisi"]->id."'"; 
			$this->db_connexion->Requete( $sql );

      		parent::Afficher();
		}
		else {
			header('Location: index.php?page=connexion&erreur=3');
			exit;
		}
    }// - Fin de la fonction Afficher

}// - Fin de la classe

?>
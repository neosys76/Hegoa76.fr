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

      // - on renseigne qq infos du parent
      parent::SetNomPage( "inscription_confirmation","Inscription" );
      parent::SetAffichageHeader( -1 );
      parent::SetAffichageMenu( 0 );
      parent::SetAffichageFooter( 0 );
      $this->message="";
      $this->AjouterCSS("page_inscription_validation.css");

      // - on ajoute les contenus utiles
      $this->AjouterContenu("contenu", "contenus/page_inscription_validation.php");
      
      // - on ajoute les menus utiles

    }

    // - Affichage de la page
    public function Afficher()
    {
    /* 
      *  traitement du formulaire d'inscription
    */

      // - On se connecte à la base de données
      parent::ConnecterBD();
		 include "constantes.inc.php";
      // les valeurs transmises dans l'URL pour la confirmation
      $courriel = "";
      $cle= ="";
      if(isset($_GET["email"])){$courriel = $_GET["email"];}
      if(isset($_GET["cle"])){$cle = $_GET["cle"];}

      // - Verifier l'URL transmis
      $cleok = false;
      $sql = "SELECT * FROM \"libertribes\".\"ACCOUNT\" WHERE email = '".$courriel."'";
      $result = parent::Requete($sql);
      if($result){
      		$row = pg_fetch_row($result);
      		$clef = substr($row['password'],5,8);
      		if($cle==$clef){
				$cleok = true;  		
      		}
      	}
      if !$result || !$cleok)
      {
      		$this->message = "Vous vous êtes trompé dans votre URL de confirmation. Réintroduisez cet URL dans votre barre de navigateur..";
			header('Location: index.php?page=inscription');
        	exit;
      }
      else {
			$sql = "UPDATE \"libertribes\".\"ACCOUNT\"  SET confirmation = TRUE where email = '".$courriel."'"; 
			if(parent::Requete($sql)){
      		$this->message = "Votre inscription a été confirmée et vous pouvez vous connecter dès à présent.";
			header('Location: index.php?page=connexion');
        	exit;			
			}
			else {
      		$this->message = "L'accès à la base de données a été interrompu. Recommencez plus tard.";
			header('Location: index.php?page=inscription');
        	exit;			
			}
      }

      // - Gestion de l'affichage
      parent::Afficher();

    }// - Fin de la fonction Afficher

}// - Fin de la classe

?>
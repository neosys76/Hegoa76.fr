<?php
// ======================================================================
// Auteur : Donatien CELIA, Dominique Dehareng
// Licence : CeCILL v2
// ======================================================================

error_reporting(E_ALL);

require "class_page.php";                                              // - On inclut la class Page

class PageDjunSuppression extends Page
{
    function __construct()
    {
      // - on appele le constructeur du parent
      parent::__construct();

      // - on renseigne qq infos du parent
      parent::SetNomPage( "djun_suppression","Suppression du D'jun");
      parent::SetAffichageHeader( 1 );
      parent::SetAffichageMenu( 0 );
      parent::SetAffichageFooter( 0 );
      //  les traductions spécifiques
      $this->traductions = $this->getTraductions();

      $this->AjouterCSS("page_djun_suppression.css");

      // - on ajoute les contenus utiles
      $this->AjouterContenu("contenu", "contenus/page_djun_suppression.php");

      // - on ajoute les menus utiles

    }

    // - Affichage de la page
    public function Afficher()
    {
    	if(isset($_SESSION["compte"])&&!empty($_SESSION["compte"])){
    		if(isset($_GET['erreur'])&&$_GET['erreur']==1){$this->message = "Pas de D'jun supprimé";}
      		parent::Afficher();

		}
		else {
			header('Location: index.php?page=connexion&erreur=3');
			exit;
		}
    }// - Fin de la fonction Afficher
    
    
    public function getTraductions(){
		$traductions["suppression-du-djun"] = array(
    		"fr"=>"Suppression du D&#39;jun",
    		"en"=>"",
    		"es"=>"",
    		"de"=>""
    	);
    	$traductions["message-attention"] = array(
    		"fr"=>"Attention,<br />vous êtes sur le point de supprimer votre D&#39;jun !!<br /><br />Êtes-vous sûr de vouloir le supprimer ?<br /><br />Cette opération est irréversible !<br />Vous perdrez votre expérience, vos villages, vos objets, vos héros, ...",
    		"en"=>"",
    		"es"=>"",
    		"de"=>""
    	);
    	
    	return $traductions;
    }

}// - Fin de la classe

?>
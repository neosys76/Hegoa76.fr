<?php
// ======================================================================
// Auteur : Donatien CELIA, Dominique Dehareng
// Licence : CeCILL v2
// ======================================================================

error_reporting(E_ALL);

require "class_page.php";                                              // - On inclut la class Page

class PageChoixVente extends Page
{
    function __construct()
    {
      // - on appele le constructeur du parent
      parent::__construct();

      // - on renseigne qq infos du parent
      parent::SetNomPage( "choix_vente","Choix de vente");
      parent::SetAffichageHeader( 1 );
      parent::SetAffichageMenu( 1 );
      parent::SetAffichageFooter( 0 );

      $this->AjouterCSS("page_choix_vente.css");

      // - on ajoute les contenus utiles
      $this->AjouterContenu("contenu", "contenus/page_choix_vente.php");
    }

    // - Affichage de la page
    public function Afficher()
    {
		if(isset($_SESSION["compte"])&&!empty($_SESSION["compte"])){
   		   parent::Afficher();
   		}
   		else {
			header('Location: index.php?page=connexion&erreur=3');
			exit;
		}

    }// - Fin de la fonction Afficher

}// - Fin de la classe

?>
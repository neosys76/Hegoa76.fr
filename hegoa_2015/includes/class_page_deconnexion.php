<?php
// ======================================================================
// Auteur : Donatien CELIA
// Licence : CeCILL v2
// ======================================================================

require "class_page.php";                                                       // - On inclut la class Page


class PageDeconnexion extends Page
{

    function __construct()
    {
      // - on appele le constructeur du parent
      parent::__construct();

      // - on renseigne qq infos du parent
      parent::SetNomPage( "deconnexion" );

      $this->AjouterCSS("page_deconnexion.css");

      // - on ajoute les menus utiles
      $this->AjouterMenu("accueil","Accueil");
    }

    // - Affichage de la page
    public function Afficher()
    {
      parent::Afficher();

      // - gestion spécifique de la page

    }// - Fin de la fonction Afficher

}// - Fin de la classe

?>
<?php
// ======================================================================
// Auteur : Donatien CELIA
// Licence : CeCILL v2
// ======================================================================

require "class_page.php";                                              // - On inclut la class Page


class PageMessageEcrireValidation extends Page
{

    function __construct()
    {
      // - on appele le constructeur du parent
      parent::__construct();

      // - on renseigne qq infos du parent
      parent::SetNomPage( "messagerie_ecrire_validation","Messagerie - écriture" );

      // - on ajoute les menus utiles
    }

    // - Affichage de la page
    public function Afficher()
    {
      // - On se connecte à la base de données
      parent::ConnecterBD();

      // - On controle le formulaire

      // - On insčre les données

      // - Gestion de l'affichage
      header('Location: index.php?page=messagerie');;

    }// - Fin de la fonction Afficher

}// - Fin de la classe

?>
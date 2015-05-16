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

    }

    // - Affichage de la page
    public function Afficher()
    {
    		session_unset();
       // - redirection vers la page d'accueil
 	   header('Location: index.php?page=accueil');
 	   exit();   

    }// - Fin de la fonction Afficher

}// - Fin de la classe

?>
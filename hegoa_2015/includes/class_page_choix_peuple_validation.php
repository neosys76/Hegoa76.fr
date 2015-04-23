<?php
// ======================================================================
// Auteur : Donatien CELIA
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
      // - On se connecte à la base de données
      parent::ConnecterBD();

      // - gestion spécifique de la page
      $account_id           = $_SESSION['account_id'];
      $choix_peuple         = $_POST['choix_peuple'];


      if (
        $choix_peuple == "bunsif" ||
        $choix_peuple == "humain" ||
        $choix_peuple == "nimhsine" ||
        $choix_peuple == "sulmis" )
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
      }
    }// - Fin de la fonction Afficher

}// - Fin de la classe

?>
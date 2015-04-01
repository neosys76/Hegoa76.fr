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
      parent::SetNomPage( "compte_suppression_validation" );

      // - on ajoute les menus utiles
    }

    // - Affichage de la page
    public function Afficher()
    {
      // - On se connescte à la base de données
      parent::ConnecterBD();

      // - gestion spécifique de la page
      $account_id           = $_SESSION['account_id'];

      // - On supprime le compte
      // - On insère les données
      $sql  = "DELETE FROM \"libertribes\".\"ACCOUNT\"  WHERE account_id = $account_id";

      $result = parent::Requete( $sql );
      if ( ! $result)
      {
        // - redirection vers la page d'accueil du jeu
        header('Location: index.php?page=compte_suppression_validation&erreur=1');
        exit;
      }


      // - redirection vers la page compte
      header('Location: index.php?page=accueil');
    }// - Fin de la fonction Afficher

}// - Fin de la classe

?>
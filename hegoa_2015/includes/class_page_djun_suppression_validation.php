<?php
// ======================================================================
// Auteur : Donatien CELIA
// Licence : CeCILL v2
// ======================================================================

require "class_page.php";                                                       // - On inclut la class Page



class PageDjunSuppressionValidation extends Page
{

    function __construct()
    {
      // - on appele le constructeur du parent
      parent::__construct();

      // - on renseigne qq infos du parent
      parent::SetNomPage( "djun_suppression_validation" );

      // - on ajoute les menus utiles
    }

    // - Affichage de la page
    public function Afficher()
    {
      // - On se connescte à la base de données
      parent::ConnecterBD();

      // - gestion spécifique de la page
      $account_id           = $_SESSION['account_id'];
      $djun_name            = $_SESSION['djun_name'];

      // - On supprime le compte
      // - On insère les données
      $sql  = "DELETE FROM \"libertribes\".\"AVATAR\"  WHERE account_id = $account_id and avatar_name ='$djun_name'";

      $result = parent::Requete( $sql );
      if ( ! $result)
      {
        // - redirection vers la page d'accueil du jeu
        header('Location: index.php?page=djun_suppression&erreur=1');
        exit;
      }


      // - redirection vers la page TDB
      header('Location: index.php?page=tdb');
    }// - Fin de la fonction Afficher

}// - Fin de la classe

?>
<?php
// ======================================================================
// Auteur : Donatien CELIA
// Licence : CeCILL v2
// ======================================================================

require "class_page.php";                                                       // - On inclut la class Page



class PageChoixPeupleVoirValidation extends Page
{

    function __construct()
    {
      // - on appele le constructeur du parent
      parent::__construct();

      // - on renseigne qq infos du parent
      parent::SetNomPage( "choix_peuple_voir_validation" );

      // - on ajoute les menus utiles

    }

    // - Affichage de la page
    public function Afficher()
    {
      // - On se connescte à la base de données
      parent::ConnecterBD();

      // - gestion spécifique de la page
      $account_id     = $_SESSION['account_id'];
      $avatar_name    = $_SESSION['avatar_name'];

      $choix_peuple   = $_POST['choix_peuple'];

      // - On insère les données
      $sql  = "UPDATE \"libertribes\".\"AVATAR\" set race_name = '$choix_peuple' ";
      $sql .= "WHERE account_id = '$account_id' and avatar_name = '$avatar_name'";

      parent::Requete( $sql );

      $_SESSION['avatar_name']    = "";

      // - redirection vers la page tdb
      header('Location: index.php?page=tdb');
      exit();
    }// - Fin de la fonction Afficher

}// - Fin de la classe

?>
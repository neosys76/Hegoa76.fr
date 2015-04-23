<?php
// ======================================================================
// Auteur : Donatien CELIA
// Licence : CeCILL v2
// ======================================================================

require "class_page.php";                                                       // - On inclut la class Page



class PageChoixDjunValidation extends Page
{

    function __construct()
    {
      // - on appele le constructeur du parent
      parent::__construct();

      // - on renseigne qq infos du parent
      parent::SetNomPage( "choix_djun_validation","Choix du D'jun" );

      // - on ajoute les menus utiles

    }

    // - Affichage de la page
    public function Afficher()
    {
      // - On se connecte à la base de données
      parent::ConnecterBD();

      // - gestion spécifique de la page
      $account_id           = $_SESSION['account_id'];
      $avatar_name          = $_POST['avatar_name'];
      $avatar_action        = $_POST['avatar_action'];
      $avatar_djun_id       = $_POST['avatar_djun_id'];

      // - On stocke dans la session
      $_SESSION['avatar_name'] = $avatar_name;

      if ( $avatar_action == "prev" )
      {
        // - on décrémente que si besoin
        if ( $avatar_djun_id > 1 )
        {
          $avatar_djun_id--;
        }

        // - On affiche l'image de l'avatar précédente
        $_SESSION['avatar_djun_id'] = $avatar_djun_id;
        $_SESSION['avatar_image'] = "images/djuns/djun". $avatar_djun_id . ".png";

        // - redirection vers la page choix_djun
        header('Location: index.php?page=choix_djun');
        exit();
      }

      if ( $avatar_action == "next" )
      {
        // - on incrémente que si besoin
        if ( $avatar_djun_id < $_SESSION['avatar_djun_id_max'] )
        {
          $avatar_djun_id++;
        }

        // - On affiche l'image de l'avatar suivante
        $_SESSION['avatar_djun_id'] = $avatar_djun_id;
        $_SESSION['avatar_image'] = "images/djuns/djun". $avatar_djun_id . ".png";

        // - redirection vers la page choix_djun
        header('Location: index.php?page=choix_djun');
        exit();
      }

      if ( $avatar_action == "valider" )
      {
        if ( parent::RequeteNbLignes("SELECT * FROM \"libertribes\".\"AVATAR\" WHERE avatar_name = '$avatar_name'") > 0 )
        {
          header('Location: index.php?page=choix_djun&erreur=1');
          exit();
        }

        // - On stocke l'information du nom de l'avatar
        $_SESSION['avatar_name'] = $avatar_name;

        // - On insère les données
        $sql  = "INSERT INTO \"libertribes\".\"AVATAR\" ( avatar_name, account_id )";
        $sql .= " values ('$avatar_name','$account_id')";

        parent::Requete( $sql );

        $_SESSION['avatar_djun_id'] = "";

        // - redirection vers la page compte
        header('Location: index.php?page=choix_peuple');
        exit();
      }

      // - redirection vers la page choix_djun par defaut
      header('Location: index.php?page=choix_djun');
      exit();
    }// - Fin de la fonction Afficher

}// - Fin de la classe

?>
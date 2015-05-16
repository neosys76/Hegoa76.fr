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
      for($i=1;$i<=$_SESSION['avatar_djun_id_max'];$i++){
      		$nom_post = "djun".$i."_x";
      		if(isset($_POST[$nom_post])){$avatar_djun_id = $i;break;}
   		}

      // - On stocke dans la session
      $_SESSION['avatar_name'] = $avatar_name;

        if ( parent::RequeteNbLignes("SELECT * FROM \"libertribes\".\"AVATAR\" WHERE avatar_name = '$avatar_name'") > 0 )
        {
          header('Location: index.php?page=choix_djun&erreur=1');
          exit();
        }

        // - On insère les données AVEC contrôle du nombre total possible
        include "constantes.inc.php";
        if ( parent::RequeteNbLignes("SELECT * FROM \"libertribes\".\"AVATAR\" WHERE account_id = '".$account_id."'") >= MAX_DJUNS )
        {
          header('Location: index.php?page=choix_djun&erreur=2');
          exit();
        }
        $sql  = "INSERT INTO \"libertribes\".\"AVATAR\" ( avatar_name, account_id,numero_image )";
        $sql .= " values ('$avatar_name','$account_id','$avatar_djun_id')";

        parent::Requete( $sql );
        
        // - redirection vers la page choix du peuple
        header('Location: index.php?page=choix_peuple');
        exit();
    }// - Fin de la fonction Afficher

}// - Fin de la classe

?>
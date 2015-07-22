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
      parent::SetNomPage( "choix_peuple_voir_validation","Choix du peuple" );

      // - on ajoute les menus utiles

    }

    // - Affichage de la page
    public function Afficher()
    {
      // - gestion spécifique de la page
      $account_id     = $_SESSION['account_id'];
      $avatar_name    = $_SESSION['avatar_nom_update'];

      $choix_peuple   = $_POST['choix_peuple'];
      //  traitement des accents dans les noms
      	$search = array("é","è");
		$replace = array("e","e");
		foreach($_SESSION['races_possibles'] as $race){
			$nom = str_replace($search,$replace,$race->nom);
			if($nom==$choix_peuple){$choix_peuple=$race->nom;}
		}

      // - On insère les données
      $sql  = "UPDATE \"libertribes\".\"AVATAR\" set race = '$choix_peuple' ";
      $sql .= "WHERE compte_id = '$account_id' and avatar_nom = '$avatar_name'";

      
      if($this->db_connexion->Requete( $sql )){
      	
      		unset($_SESSION['avatar_nom_update']);
      		unset($_SESSION['choix_peuple']);
      		// contrôle de la mise en SESSION du nouvel avatar
      		$avatars = array();
      		
      		$new_avatar = new Avatar($avatar_name);
      		
      		if(isset($_SESSION['avatars'])&&!empty($_SESSION['avatars'])){
      			$avatars = $_SESSION['avatars'];
      			unset($_SESSION['avatars']);
      			$nombre_avatars = count($avatars);
      			$avatars[$nombre_avatars] = $new_avatar;
      			$_SESSION['avatars'] = $avatars;
      		}
      		else {
      			$avatars[0] = $new_avatar;
      			$_SESSION['avatars'] = $avatars;
      		}
      		
      		// - redirection vers la page tdb
      		header('Location: index.php?page=tdb');
      		exit();
      		
      }
      else {
       	// - redirection vers la page tdb avec un message d'erreur
 	     header('Location: index.php?page=tdb&erreur=1');
 	     exit();     	
      	}
      
    }// - Fin de la fonction Afficher

}// - Fin de la classe

?>
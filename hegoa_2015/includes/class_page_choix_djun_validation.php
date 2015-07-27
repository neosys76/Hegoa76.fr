<?php
// ======================================================================
// Auteur : Donatien CELIA, Dominique Dehareng
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
    	if(isset($_SESSION["compte"])&&!empty($_SESSION["compte"])){
    	  // - gestion spécifique de la page
    	  $account_id           = $_SESSION['compte']->id;
    	  $avatar_name          = $_POST['avatar_name'];
    	  $max_djuns = MAX_DJUNS;
    	  for($i=1;$i<=$_SESSION['avatar_djun_images'];$i++){
    	  		$nom_post = "djun".$i."_x";
    	  		if(isset($_POST[$nom_post])){$avatar_djun_id = $i;break;}
   			}
	
	      // - On stocke dans la session
	      $_SESSION['avatar_nom_update'] = $avatar_name;
	
	        if ( $this->db_connexion->RequeteNbLignes("SELECT * FROM \"libertribes\".\"AVATAR\" WHERE avatar_nom = '$avatar_name'") > 0 )
	        {
	          header('Location: index.php?page=choix_djun&erreur=1');
	          exit();
	        }
	
	        // - On insère les données AVEC contrôle du nombre total possible
	        if ( $this->db_connexion->RequeteNbLignes("SELECT * FROM \"libertribes\".\"AVATAR\" WHERE compte_id = '".$account_id."'") >=  $max_djuns)
	        {
	          header('Location: index.php?page=choix_djun&erreur=2');
	          exit();
	        }
	        $sql  = "INSERT INTO \"libertribes\".\"AVATAR\" ( avatar_nom, compte_id,numero_image )";
	        $sql .= " values ('$avatar_name','$account_id','$avatar_djun_id')";
	         $this->db_connexion->Requete( $sql );
	        
	        // - redirection vers la page choix du peuple
	        header('Location: index.php?page=choix_peuple');
	        exit();
      }			//   fin du contrôle de connexion
		else {
			header('Location: index.php?page=connexion&erreur=3');
			exit;
		}
    }// - Fin de la fonction Afficher

}// - Fin de la classe

?>
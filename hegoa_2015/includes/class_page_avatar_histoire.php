<?php
// ======================================================================
// Auteur : Donatien CELIA
// Licence : CeCILL v2
// ======================================================================

error_reporting(E_ALL);

require "class_page.php";                                              // - On inclut la class Page

class PageAvatarHistoire extends Page
{

    function __construct()
    {
      // - on appele le constructeur du parent
      parent::__construct();

      // - on renseigne qq infos du parent
      parent::SetNomPage( "avatar", "Mon histoire de D'jun");
      parent::SetAffichageHeader( 1 );
      parent::SetAffichageMenu(0);
      parent::SetAffichageFooter( 0 );

      	//  les traductions spécifiques
      $this->traductions = $this->getTraductions();
      
      $this->AjouterCSS("page_avatar.css");

      // - on ajoute les contenus utiles et on récupère les traductions définies
		$les_traductions = $this->traductions;
      $this->AjouterContenu("contenu", "contenus/page_avatar.php");

      // - on ajoute les menus utiles

    }

    // - Affichage de la page
    public function Afficher()
    {
		if(isset($_SESSION["compte"])&&!empty($_SESSION["compte"])){
			if(isset($_SESSION['djun_choisi'])&&!empty($_SESSION['djun_choisi'])){
				if(isset($_POST['histoire'])&&!empty($_POST['histoire'])){
					$histoire = htmlspecialchars($_POST['histoire']);
					$histoire = str_replace("'","&#39;",$histoire);
					$sql = "UPDATE  \"libertribes\".\"AVATAR\"  SET histoire='".$histoire."' WHERE avatar_id=".$_SESSION['djun_choisi']->id;
					$result = $this->db_connexion->Requete( $sql );
      				if ( ! $result){
      					$this->message = $this->traductions["erreur_3"][$_SESSION['lang']];		//  erreur: pas d'update effectué dans la BDD
      				}
      				else {
						$_SESSION['djun_choisi']->histoire = $histoire;      				
      				}	      			
	      		}
	      		else {
	      			$this->message = $this->traductions["erreur_2"][$_SESSION['lang']];		//  warning: pas de texte histoire transmis
	      		}
      		}
      		else {
      			$this->message = $this->traductions["erreur_1"][$_SESSION['lang']];				//erreur: pas de D'jun choisi
      		}
      		parent::Afficher();
		}
		else {
			header('Location: index.php?page=connexion&erreur=3');
			exit;
		}
    }// - Fin de la fonction Afficher
    
    
    public function getTraductions(){
    	$traductions["index_agressivite"] = array(
    		"fr"=>"Index Agressivité",
    		"en"=>"Aggressiveness Index",
    		"es"=>"",
    		"de"=>""
    	);
    	$traductions["index_efficacite"] = array(
    		"fr"=>"Index Efficacité",
    		"en"=>"Efficiency Index",
    		"es"=>"",
    		"de"=>""
    	);
    	$traductions["index_escroquerie"] = array(
    		"fr"=>"Index Escroquerie",
    		"en"=>"Fraud Index",
    		"es"=>"",
    		"de"=>""
    	);
    	$traductions["index_commerce"] = array(
    		"fr"=>"Index Commerce",
    		"en"=>"Commercial Index",
    		"es"=>"",
    		"de"=>""
    	);
    	$traductions["nom"] = array(
    		"fr"=>"Nom",
    		"en"=>"Name",
    		"es"=>"Nombre",
    		"de"=>"Name"
    	);
    	$traductions["peuple"] = array(
    		"fr"=>"Peuple",
    		"en"=>"People",
    		"es"=>"Pueblos",
    		"de"=>""
    	);
    	$traductions["guilde"] = array(
    		"fr"=>"Guilde",
    		"en"=>"Guild",
    		"es"=>"Gremio",
    		"de"=>"Gilde"
    	);
    	$traductions["mon_histoire"] = array(
    		"fr"=>"Mon histoire",
    		"en"=>"My history",
    		"es"=>"",
    		"de"=>""
    	);
    	$traductions["erreur_1"] = array(
    		"fr"=>"Pas encore de D'jun choisi: <a class='ftsz1p2em colbrun1' href='?page=tdb'>retour au tableau de bord</a>",
    		"en"=>"No D'jun chosen yet: <a class='ftsz1p2em colbrun1' href='?page=tdb'>Back to the dashboard</a>",
    		"es"=>"",
    		"de"=>""
    	);
    	$traductions["erreur_2"] = array(
    		"fr"=>"N'avez-vous pas oublié de fournir votre histoire?<br/> <br/><a class='ftsz1p2em colvert2' href='?page=tdb'>NON, je reviens au tableau de bord</a>",
    		"en"=>"",
    		"es"=>"",
    		"de"=>""
    	);
    	$traductions["erreur_3"] = array(
    		"fr"=>"La mise à jour en base de données a échoué.<br/> <br/><a class='ftsz1p2em colbrun1' href='?page=avatar'>Réessayez.</a><br/><br/>",
    		"en"=>"",
    		"es"=>"",
    		"de"=>""
    	);

    	return $traductions;
    }
    

}// - Fin de la classe

?>
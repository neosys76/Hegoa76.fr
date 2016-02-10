<?php
// ======================================================================
// Auteur : Dominique DEHARENG
// Licence : CeCILL v2
// ======================================================================

error_reporting(E_ALL);

require "class_page.php";                                              // - On inclut la class Page

class PageAfficheEtatCase extends Page
{
    function __construct()
    {
      // - on appele le constructeur du parent
      parent::__construct();

      // - on renseigne qq infos du parent
      parent::SetNomPage( "affiche-etat-case","Etat de la case");
      parent::SetAffichageHeader( 1 );
      parent::SetAffichageMenu( 0 );
      parent::SetAffichageFooter( 0 );
		//  les traductions spécifiques
       $this->traductions = $this->getTraductions();
       
      $this->AjouterCSS("page_jeu.css");

      // - on ajoute les contenus utiles
      $this->AjouterContenu("contenu", "contenus/page_jeu.php");

      // - on ajoute les menus utiles
		//   On met les coordonnées transmises par GET dans la BDD et dans l'avatar sauvé en SESSION
		$point = "(".$_GET['absx'].",".$_GET['ordy'].")";
      $sql  = "UPDATE \"libertribes\".\"AVATAR\" set derniere_position = '".$point."' ";
      $sql .= "WHERE avatar_id = '".$_SESSION['djun_choisi']->id."'";
      $_SESSION['djun_choisi']->derniere_position = $point;
      if(!$this->db_connexion->Requete( $sql )){
      		$this->message = "<span style='color:#f00;'>!!! ".$this->traductions["cette-position-pas-sauvegardee"][$_SESSION['lang']]."</span>";
      }		
    }

    // - Affichage de la page
    public function Afficher()
    {
    	$couleur = "#".$_GET['couleur'];
    	$coord_case = "(".$_GET['absx'].",".$_GET['ordy'].")";

      // - On cherche le terrain
      $sql  = "SELECT * FROM \"libertribes\".\"TERRAIN\" WHERE couleur = '".$couleur."' ";

      $result = $this->db_connexion->Requete( $sql );
      if ($result)
      {
      		$row = pg_fetch_array($result);
      	}
      	if($row){
      		if($row['nom']=="eau"){
				//   si on est dans l'eau, on ne peut rien faire
				$this->message = $this->traductions["rien-possible-dans-eau"][$_SESSION['lang']];
			}
			else{
			switch($row['nom']){
				case "marais":
					$this->message = $this->traductions["vous-avez-choisi-une-zone-de"][$_SESSION['lang']]." <span class='ftsz1p3em colvert1'>".$this->traductions_debut["marais"][$_SESSION['lang']]."</span>.<br/>";
					break;
					
				case "montagne":
					$this->message = $this->traductions["vous-avez-choisi-une-zone-de"][$_SESSION['lang']]." <span class='ftsz1p3em colvert1'>".$this->traductions_debut["montagnes"][$_SESSION['lang']]."</span>.<br/>";
					break;
				
				case "jungle":
					$this->message = $this->traductions["vous-avez-choisi-une-zone-de"][$_SESSION['lang']]." <span class='ftsz1p3em colvert1'>".$this->traductions_debut["jungle"][$_SESSION['lang']]."</span>.<br/>";
					break;
				
				case "colline":
					$this->message = $this->traductions["vous-avez-choisi-une-zone-de"][$_SESSION['lang']]." <span class='ftsz1p3em colvert1'>".$this->traductions_debut["collines"][$_SESSION['lang']]."</span>.<br/>";
					break;
				
				case "foret":
					$this->message = $this->traductions["vous-avez-choisi-une-zone-de"][$_SESSION['lang']]." <span class='ftsz1p3em colvert1'>".$this->traductions_debut["foret"][$_SESSION['lang']]."</span>.<br/>";
					break;
				
				case "steppe":
					$this->message = $this->traductions["vous-avez-choisi-une-zone-de"][$_SESSION['lang']]." <span class='ftsz1p3em colvert1'>".$this->traductions_debut["steppes"][$_SESSION['lang']]."</span>.<br/>";
					break;
				
				case "toundra":
					$this->message = $this->traductions["vous-avez-choisi-une-zone-de"][$_SESSION['lang']]." <span class='ftsz1p3em colvert1'>".$this->traductions_debut["toundra"][$_SESSION['lang']]."</span>.<br/>";
					break;
				
				case "prairie":
					$this->message = $this->traductions["vous-avez-choisi-une-zone-de"][$_SESSION['lang']]." <span class='ftsz1p3em colvert1'>".$this->traductions_debut["prairies"][$_SESSION['lang']]."</span>.<br/>";
					break;
				
				case "desert":
					$this->message = $this->traductions["vous-avez-choisi-une-zone-de"][$_SESSION['lang']]." <span class='ftsz1p3em colvert1'>".$this->traductions_debut["desert"][$_SESSION['lang']]."</span>.<br/>";
					break;
				
				case "glace":
					$this->message = $this->traductions["vous-avez-choisi-une-zone-de"][$_SESSION['lang']]." <span class='ftsz1p3em colvert1'>".$this->traductions_debut["glaces"][$_SESSION['lang']]."</span>.<br/>";
					break;
				
				case "littoral":
					$this->message = $this->traductions["vous-avez-choisi-une-zone-de"][$_SESSION['lang']]." <span class='ftsz1p3em colvert1'>".$this->traductions_debut["littoral"][$_SESSION['lang']]."</span>.<br/>";
					break;
				
				case "plaine":
					$this->message = $this->traductions["vous-avez-choisi-une-zone-de"][$_SESSION['lang']]." <span class='ftsz1p3em colvert1'>".$this->traductions_debut["plaines"][$_SESSION['lang']]."</span>.<br/>";
					break;

			}
				//  contrôler si la case est encore disponible, dans la table CASE
				$req = "SELECT * FROM \"libertribes\".\"CASE\" WHERE coord ~= '".$coord_case."' ";			//   l'opérateur ~= est "same as" pour des types géométriques de postgresql
				$resu = $this->db_connexion->Requete( $req );	
				if($resu){$ligne = 	pg_fetch_array($resu);}
				if($ligne){
					$this->message .= $this->traductions["la-case-est-occupee-par-un"][$_SESSION['lang']]." ".$ligne['occupee_par'];
				}
				else {
					$this->message .= "<br/>".$this->traductions["la-case-est-libre"][$_SESSION['lang']]."<br/><br/>".ucfirst($this->traductions["coloniser"][$_SESSION['lang']])."? ".ucfirst($this->traductions_debut["cliquez"][$_SESSION['lang']])." <a style='font-size:1.5em;' href='?page=jeu&espace=colonisation&case=".$qu_str."&terrain=".$terrain."'>".$this->traductions_debut["ici"][$_SESSION['lang']]."</a>";
				}
			}
      	}
      	$this->message .= "<br/><br/>".$this->traductions["retour-a-la-carte"][$_SESSION['lang']]."? <br/>".ucfirst($this->traductions_debut["cliquez"][$_SESSION['lang']])." <a style='font-size:1.5em;' href='?page=jeu'>".$this->traductions_debut["ici"][$_SESSION['lang']]."</a><br/><br/>";
      	$this->AjouterCSS("page_etat_case.css");
      	$message = $this->message;
      $this->AjouterContenu("contenu_etat_case", "contenus/page_etat_case.php");
	      // - on ajoute le contenu du menu à gauche
      $this->AjouterContenu("contenu_menu", "contenus/page_jeu_menu.php");
      parent::Afficher();
    }// - Fin de la fonction Afficher
    
    
   	public function getTraductions(){
    	$traductions["cette-position-pas-sauvegardee"] = array(
    		"fr"=>"Cette position n&#39;a pas pu être sauvegardée comme votre &quot;dernière position &quot; en base de données",
    		"en"=>"",
    		"es"=>"",
    		"de"=>""
    	);
    	$traductions["vous-avez-choisi-une-zone-de"] = array(
			"fr"=>"Vous avez choisi une zone de",
			"en"=>"",
			"es"=>"",
			"de"=>""
    );	
    
    	$traductions["rien-possible-dans-eau"] = array(
    		"fr"=>"Rien n&#39;est possible dans l&#39;eau",
    		"en"=>"",
    		"es"=>"",
    		"de"=>""
    	);
    	
    	$traductions["la-case-est-libre"] = array(
    		"fr"=>"La case est libre",
    		"en"=>"",
    		"es"=>"",
    		"de"=>""
    	);
    	$traductions["coloniser"] = array(
    		"fr"=>"coloniser",
    		"en"=>"",
    		"es"=>"",
    		"de"=>""
    	);
    	$traductions["retour-a-la-carte"] = array(
    		"fr"=>"Retour à la carte",
    		"en"=>"",
    		"es"=>"",
    		"de"=>""
    	);
    	
    	$traductions["la-case-est-occupee-par-un"] = array(
    		"fr"=>"La case est occupée par un",
    		"en"=>"",
    		"es"=>"",
    		"de"=>""
    		);
    	
    	return $traductions;
    }    
    

}// - Fin de la classe

?>
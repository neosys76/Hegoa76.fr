<?php
// ======================================================================
// Auteur : Dominique DEHARENG
// Licence : CeCILL v2
// ======================================================================

error_reporting(E_ALL);

require "class_page.php";                                              // - On inclut la class Page

class PageActionsCase extends Page
{
    function __construct()
    {
      // - on appele le constructeur du parent
      parent::__construct();

      // - on renseigne qq infos du parent
      parent::SetNomPage( "actions-case","Actions sur une case");
      parent::SetAffichageHeader( 1 );
      parent::SetAffichageMenu( 0 );
      parent::SetAffichageFooter( 0 );
   
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
      		$this->message = "<span style='color:#f00;'>!!! Cette position n'a pas pu être sauvegardée comme votre 'dernière position' en base de données</span>";
      }		
    }
    
    function affiche_etat()
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
				$this->message = "Rien n'est possible dans l'eau";
			}
			else{
			switch($row['nom']){
				case "marais":
					$this->message = "Vous avez choisi une zone de <span class='ftsz1p3em colvert1'>marais</span>.<br/>";
					break;
					
				case "montagne":
					$this->message = "Vous avez choisi une zone de <span class='ftsz1p3em colvert1'>montagnes</span>.<br/>";
					break;
				
				case "jungle":
					$this->message = "Vous avez choisi une zone de <span class='ftsz1p3em colvert1'>jungle</span>.<br/>";
					break;
				
				case "colline":
					$this->message = "Vous avez choisi une zone de <span class='ftsz1p3em colvert1'>collines</span>.<br/>";
					break;
				
				case "foret":
					$this->message = "Vous avez choisi une zone de <span class='ftsz1p3em colvert1'>forêt</span>.<br/>";
					break;
				
				case "steppe":
					$this->message = "Vous avez choisi une zone de <span class='ftsz1p3em colvert1'>steppe</span>.<br/>";
					break;
				
				case "toundra":
					$this->message = "Vous avez choisi une zone de <span class='ftsz1p3em colvert1'>toundra</span>.<br/>";
					break;
				
				case "prairie":
					$this->message = "Vous avez choisi une zone de <span class='ftsz1p3em colvert1'>prairie</span>.<br/>";
					break;
				
				case "desert":
					$this->message = "Vous avez choisi une zone de <span class='ftsz1p3em colvert1'>désert</span>.<br/>";
					break;
				
				case "glace":
					$this->message = "Vous avez choisi une zone de <span class='ftsz1p3em colvert1'>glace</span>.<br/>";
					break;
				
				case "littoral":
					$this->message = "Vous avez choisi une zone de<span class='ftsz1p3em colvert1'> littoral</span>.<br/>";
					break;
				
				case "plaine":
					$this->message = "Vous avez choisi une zone de <span class='ftsz1p3em colvert1'>plaine</span>.<br/>";
					break;

			}
			
				//  contrôler si la case est encore disponible, dans la table CASE
				$req = "SELECT * FROM \"libertribes\".\"CASE\" WHERE coord ~= '".$coord_case."' ";			//   l'opérateur ~= est "same as" pour des types géométriques de postgresql
				$resu = $this->db_connexion->Requete( $req );	
				if($resu){$ligne = 	pg_fetch_array($resu);}
				if($ligne){
					$this->message .= "La case est occupée par un ".$ligne['occupee_par'];
				}
				else {
					$qu_str = $coord_case;
					$qu_str = urlencode($qu_str);
					$this->message .= "<br/>La case est libre<br/><br/>Coloniser? Cliquez <a style='font-size:1.5em;' href='?page=jeu&espace=colonisation&case=".$qu_str."&terrain=".$row['nom']."'>ici</a>";
					
				}
			}
      	}
      	$this->message .= "<br/><br/>Retour à la carte? <br/>Cliquez <a style='font-size:1.5em;' href='?page=jeu'>ici</a><br/><br/>";
      	
      	$this->AjouterCSS("page_voir_etat_case.css");
      	$message = $this->message;
      $this->AjouterContenu("contenu_etat_case", "contenus/page_voir_etat_case.php");
    
    }
    
    function construire_village(){
    
    }
    
    function installer_campement(){
    
    }
    
    function livraison(){
    
    }
    
    function espionnage(){
    
    }
    
    function attaquer(){
    
    }
    
    function etablir_marche(){
    
    }

   // - Affichage de la page
    public function Afficher()
    {
		if(isset($_GET['action'])&&$_GET['action']=="affiche-etat"){
			$this->affiche_etat();
		}
		if(isset($_GET['action'])&&$_GET['action']=="construire-village"){
			$this->construire_village();
		}
		if(isset($_GET['action'])&&$_GET['action']=="installer-campement"){
			$this->installer_campement();
		}
		if(isset($_GET['action'])&&$_GET['action']=="livraison"){
			$this->livraison();
		}
		if(isset($_GET['action'])&&$_GET['action']=="espionnage"){
			$this->espionnage();
		}
		if(isset($_GET['action'])&&$_GET['action']=="attaquer"){
			$this->attaquer();
		}
		if(isset($_GET['action'])&&$_GET['action']=="etablir-marche"){
			$this->etablir_marche();
		}


	      // - on ajoute le contenu du menu à gauche
      $this->AjouterContenu("contenu_menu", "contenus/page_jeu_menu.php");
      parent::Afficher();
    }// - Fin de la fonction Afficher

}// - Fin de la classe

?>
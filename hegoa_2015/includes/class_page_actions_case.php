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
    	/*
    	 *		on peut demander soit par les coordonnées séparées et la couleur (> JS) soit par le point coordonnée et le nom du terrain
    	 *
    	*/
    	if(isset($_GET['absx'])&&!empty($_GET['absx'])){
    		//   premier cas
    		$couleur = "#".$_GET['couleur'];
    		foreach($_SESSION['terrains_possibles'] as $un_terrain){
    			if($un_terrain->couleur==$couleur){
    				$terrain = $un_terrain->nom;
    				break;
    			}
    		}
    		$coord_case = "(".$_GET['absx'].",".$_GET['ordy'].")";
		}
		else {
			//  deuxième cas
			$coord_case = urldecode($_GET['case']);
			$terrain = $_GET["terrain"];
		}

      	if($terrain){
      		if($terrain=="eau"){
				//   si on est dans l'eau, on ne peut rien faire
				$this->message = "Rien n'est possible dans l'eau";
			}
			else{
			switch($terrain){
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
					$this->message .= "<br/>La case est libre<br/><br/>Coloniser? Cliquez <a style='font-size:1.5em;' href='?page=jeu&espace=colonisation&case=".$qu_str."&terrain=".$terrain."'>ici</a>";
				}
			}
      	}
      	$this->message .= "<br/><br/>Retour à la carte? <br/>Cliquez <a style='font-size:1.5em;' href='?page=jeu'>ici</a><br/><br/>";
      	
      	$this->AjouterCSS("page_voir_etat_case.css");
      	$message = $this->message;
      $this->AjouterContenu("contenu_etat_case", "contenus/page_voir_etat_case.php");
    
    }
    
    function construire_village($coord,$terrain,$nom){
    	//   le champ 'occupee_par' de la table CASE peut avoir 3 valeurs prédéfinies (ENUM type): village, marché, campement
    	//  création d'une table associative à transmettre à une instance Case
    	$tableau = array(
			"coord"=>$coord,
			"occupee_par"=>"village",
			"occupant_id"=>$_SESSION['djun_choisi']->id,
			"nom_terrain"=>$terrain
    	);
    	//  contrôler si la case est encore disponible, dans la table CASE
		$req = "SELECT * FROM \"libertribes\".\"CASE\" WHERE coord ~= '".$coord."' ";			//   l'opérateur ~= est "same as" pour des types géométriques de postgresql
		$resu = $this->db_connexion->Requete( $req );	
		if($resu){$ligne = 	pg_fetch_array($resu);}
		if($ligne){
			$this->message .= "La case est occupée par un ".$ligne['occupee_par'];
			header("Location: index.php?page=jeu&espace=colonisation");
			exit;
		}
    	else {
			//  la case est libre    		
    			//  On met le village dans la table VILLAGE si le d'jun a moins de 10 villages
    			$nombre_villages = 0;
    			if(!empty($_SESSION['djun_choisi']->villages)){
    				$nombre_villages = count($_SESSION['djun_choisi']->villages);
    			}
    			if($nombre_villages < 10 ){
    				$case = new Caza($tableau);
    				if(!$case->save()){
    					$urlcase = urlencode($case->coord);
    					$this->message = "Il semble que la mise en base de données n'ait pas pu avoir lieu.<br/>Contrôlez l'état actuel de la case, en cliquant <a href='index.php?page=actions_case&action=affiche-etat&case=".$urlcase."&terrain=".$case->nom_terrain."'>ici</a> <br/><br/>";
    					header("Location: index.php?page=jeu&espace=colonisation");
    					exit;
    				}
    				else{
    					//  la case est sauvée dans la BDD, faire de même pour le village 
    					//  aller à la page des villages
    					header("Location: index.php?page=jeu&espace=village");
    					exit;
    				}
    			}
    			else {
    				$this->message = "Vous avez déjà 10 villages et c'est la limite.";
    				header("Location: index.php?page=jeu&espace=colonisation");
    				exit;
    			}
    		}
    	}			//  fin de la fonction construire-village
    
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
    	if(isset($_SESSION['compte'])){
    		
			if(isset($_GET['action'])&&$_GET['action']=="affiche-etat"){
				$this->affiche_etat();
			}
			
			if(isset($_GET['action'])&&$_GET['action']=="construire-village"){
				/* on accède à cette option avec deux jeux possibles de variables GET: 
				 *     soit les coordonnées séparées et la couleur du terrain (GET['absx'], GET['ordy'], GET['couleur'] )
				 *     soit directement le point case et le nom du terrain  ( GET['case'] et GET['terrain'] )
				 *     il faut donc harmoniser ça et transmettre à la fonction les variables case et terrain 
				*/
				
				$case="";
				$terrain="";
				$nom="ND";			//  non défini => pourra être défini plus tard, dans la liste des villages
				if(isset($_GET['nom'])&&!empty($_GET['nom'])){$nom=$_GET['nom'];}
				if((isset($_GET['case'])&&!empty($_GET['case']))&&(isset($_GET['terrain'])&&!empty($_GET['terrain']))){
					//   cas de case + terrain
					$case = urldecode($_GET['case']);
					$terrain = $_GET['terrain'];
				}
				
				elseif( (isset($_GET['absx'])&&!empty($_GET['absx'])) && (isset($_GET['ordy'])&&!empty($_GET['ordy'])) && (isset($_GET['couleur'])&&!empty($_GET['couleur'])) ){
					$case = "(".$_GET['absx'].",".$_GET['ordy'].")";
					foreach($_SESSION['terrains_possibles'] as $un_terrain){
						if($un_terrain->couleur == "#".$_GET['couleur']){
							$terrain = $un_terrain->nom;
							break;
						}
					}
				}
				else {
					//   aucune des 2 possibilités => erreur
					header("Location: index.php?page=jeu&espace=colonisation");
					exit;
				}
				$this->construire_village($case,$terrain,$nom);
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
    	 }
		else {
			header('Location: index.php?page=connexion&erreur=3');
			exit;
		}
    }// - Fin de la fonction Afficher
}// - Fin de la classe

?>
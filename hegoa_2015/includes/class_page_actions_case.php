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
      /*  Les traductions   */  
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
		elseif(isset($_GET['case'])&&!empty($_GET['case'])) {
			//  deuxième cas, coord de case avec terrain
			$coord_case = urldecode($_GET['case']);
			$terrain = $_GET["terrain"];
		}
		else {
			$terrain = "";
		}

      	if(isset($terrain)&&!empty($terrain)){
			//   déterminer si on se trouve dans le rayon de colonisation dans le cas du premier village du D'jun
			//  distance par rapport au point de référence, calculée en unité case
			$sql = "SELECT centre,rayon from \"libertribes\".\"RAYON\"";
			$resul = $this->db_connexion->Requete( $sql);
			$ligne = pg_fetch_array($resul);
			include HOMEPATH.UTILPATH."distance_entre_points.php";
			$distance = distance($ligne["centre"],$coord_case);
			//  on arrondit et on multiplie par la dimension d'une case
			$distance = DIM_CASE*ceil($distance);

			if(count($_SESSION['djun_choisi']->villages)<=0&&$distance<=$ligne["rayon"]){
				//  on peut coloniser 
      			if($terrain=="eau"){
					//   si on est dans l'eau, on ne peut rien faire
					$this->message = $this->traductions["rien-possible-dans-eau"][$_SESSION['lang']];
				}
				else{
				switch($terrain){
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
						$this->message .= $this->traductions["la-case-est-occupee-par-un"][$_SESSION['lang']]." <span class='colbrun1 ftsz1p3em'>".$ligne['occupee_par']."</span>";
					}
					else {
						$qu_str = $coord_case;
						$qu_str = urlencode($qu_str);
						$token = substr(str_shuffle(str_shuffle("abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQSRTUVWXYZ0123456789?+@#")),10,20);
						$_SESSION['token_colonisation'] = $token;
						$this->message .= "<br/>".$this->traductions["la-case-est-libre-et-colonisable"][$_SESSION['lang']]."<br/><br/>".ucfirst($this->traductions["coloniser"][$_SESSION['lang']])."? ".ucfirst($this->traductions_debut["cliquez"][$_SESSION['lang']])." <a style='font-size:1.5em;' href='?page=jeu&espace=colonisation&case=".$qu_str."&terrain=".$terrain."&token_colonisation=".$token."'>".$this->traductions_debut["ici"][$_SESSION['lang']]."</a>";
					}
				}
			}
			else {
				//  pas de colonisation possible 
				$this->message .= "<br/>".$this->traductions["la-case-est-non-colonisable"][$_SESSION['lang']]."<br/>";	
			}
      	}
      	$this->message .= "<br/><br/>".$this->traductions["retour-a-la-carte"][$_SESSION['lang']]."? <br/>".ucfirst($this->traductions_debut["cliquez"][$_SESSION['lang']])." <a style='font-size:1.5em;' href='?page=jeu'>".$this->traductions_debut["ici"][$_SESSION['lang']]."</a><br/><br/>";
      	
      	$this->AjouterCSS("page_voir_etat_case.css");
      $this->AjouterContenu("contenu_etat_case", "contenus/page_voir_etat_case.php");
    
    }
    
    
    function construire_village(){
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
				//     tester la zone de colonisation
				include HOMEPATH.UTILPATH."colonisation.php";
				if(check_zone($this->db_connexion,$case,$terrain)){
					$_SESSION["djun_choisi"]->derniere_position = $case;
					include HOMEPATH.UTILPATH."creer_village_et_case.php";
					creer_village_et_case($this->db_connexion,$case,$terrain,$nom);
				}
				else {
					$_SESSION['message-erreur'] = $this->traductions["impossible-creer-village"][$_SESSION['lang']];
					header("Location: index.php?page=jeu&espace=colonisation");
					exit;
				}
					
    }
    
    
    function creer_village_en_bdd($case){
    	//   case est l'identifiant de la case 
    	$req = "INSERT into  \"libertribes\".\"VILLAGE\" (casa,avatar_iden) VALUES (".$case.",".$_SESSION['djun_choisi']->id.")";
		if(!$this->db_connexion->Requete( $req)){
			$token = substr(str_shuffle(str_shuffle("abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQSRTUVWXYZ0123456789?+@#")),10,20);
			$_SESSION['token_colonisation'] = $token;
			$_SESSION['message-erreur'] = $this->traductions_debut["semble-initialisation-en-bdd-echoue-reinitialisez-clic"][$_SESSION['lang']]." <a href='index.php?page=actions_case&action=creer-village-en-bdd&case=".$lacase->id."&token_colonisation=".$token.">".$this->traductions_debut["ici"][$_SESSION['lang']]."</a> <br/><br/>";
    		header("Location: index.php?page=jeu&espace=colonisation");
			exit;   						
		}
    	//  aller à la page de finalisation, ie formulaire avec le nom du village
		header("Location: index.php?page=jeu&espace=colonisation&finalisation=village");
    	exit;    
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
    	if(isset($_SESSION['compte'])){
    		
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
				if(isset($_GET['token_colonisation'])&&isset($_SESSION['token_colonisation'])&&$_GET['token_colonisation']==$_SESSION['token_colonisation']){
					$this->etablir_marche();
				}
				else {
					$_SESSION['message-erreur'] = $this->traductions_debut["token-incorrect"][$_SESSION['lang']]."<br/>";
    				header("Location: index.php?page=jeu&espace=colonisation");
					exit; 					
				}
			}
			if(isset($_GET['action'])&&$_GET['action']=="creer-village-en-bdd"){
				if(isset($_GET['token_colonisation'])&&isset($_SESSION['token_colonisation'])&&$_GET['token_colonisation']==$_SESSION['token_colonisation']){
					$this->creer_village_en_bdd($_GET['case']);
				}
				else {
					$_SESSION['message-erreur'] = $this->traductions_debut["token-incorrect"][$_SESSION['lang']]."<br/>";
    				header("Location: index.php?page=jeu&espace=colonisation");
					exit; 					
				}
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
    	$traductions["la-case-est-libre-et-colonisable"] = array(
    		"fr"=>"La case est libre et colonisable",
    		"en"=>"",
    		"es"=>"",
    		"de"=>""
    	);
    	$traductions["la-case-est-non-colonisable"] = array(
    		"fr"=>"La case n&#39;est pas colonisable",
    		"en"=>"",
    		"es"=>"",
    		"de"=>""
    	);
    	$traductions["impossible-creer-village"] = array(
    		"fr"=>"Pour une raison inconnue, il n&#39;est pas possible de créer le village",
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
    	$traductions["token-incorrect"] = array(
			"fr"=>"Le jeton de sécurité est incorrect",
			"en"=>"Token invalid",
			"es"=>"",
			"de"=>""
		);
    
    return $traductions;
    }
}// - Fin de la classe

?>
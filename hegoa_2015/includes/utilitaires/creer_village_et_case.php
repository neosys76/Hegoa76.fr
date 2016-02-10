<?php
    
    function creer_village_et_case($connexion,$coord,$terrain,$nom){
    	//  déterminer le panneau dans lequel se trouve la case
		$parties = explode(",",$coord);
		$casex = intval(substr($parties[0],1));
		$casey =  intval($parties[1]);
		$coord1 = ($casex-1)*DIM_CASE;
		$coord2 = ($casey-1)*DIM_CASE; 
		$nbcaspanx = round(LARGEUR_PANNEAU/DIM_CASE);
		$nbcaspany = round(HAUTEUR_PANNEAU/DIM_CASE);
		$ind2 = ceil($coord1/LARGEUR_PANNEAU);
		$ind1 = ceil($coord2/HAUTEUR_PANNEAU);
    	$pan_index = $ind1."-".$ind2;
    	$nbsvgx = $casex-(($ind2-1)*$nbcaspanx);
    	$nbsvgy = $casey-(($ind1-1)*$nbcaspany);
    	$svgx=1;
    	$svgy=1;
    	if($nbsvgx>SVG_CX){$svgx=2;}
    	if($nbsvgy>SVG_CY){$svgy=2;}
    	$pan_svg = $svgy."-".$svgx;

    	//   le champ 'occupee_par' de la table CASE peut avoir 3 valeurs prédéfinies (ENUM type): village, marché, campement
    	//  création d'une table associative à transmettre à une instance Case
    	$tableau = array(
			"coord"=>$coord,
			"occupee_par"=>"village",
			"occupant_id"=>$_SESSION['djun_choisi']->id,
			"nom_terrain"=>$terrain,
			"panneau"=>$pan_index,
			"svg"=>$pan_svg
    	);
    	//  !!! le contrôle de la disponibilité de la case doit avoir été fait avant pour initialiser la variable $_SESSION[$coord] = "OK"; sinon, on contrôle alors dans la table 
    	if(!isset($_SESSION[$coord])||empty($_SESSION[$coord])){
			$req = "SELECT * FROM \"libertribes\".\"CASE\" WHERE coord ~= '".$coord."' ";			//   l'opérateur ~= est "same as" pour des types géométriques de postgresql
			$resu = $connexion->Requete( $req );	
			if($resu){$ligne = 	pg_fetch_array($resu);}
			if($ligne){
				$_SESSION['message-erreur'] = $this->traductions_debut["la-case-est-occupee-par-un"][$_SESSION['lang']]." ".$ligne['occupee_par'];
				header("Location: index.php?page=jeu&espace=colonisation");
				exit;
			}
			else {
				$_SESSION[$coord] = "OK";
			}
		}
		if($_SESSION[$coord]!="OK"){
			$_SESSION['message-erreur'] = $this->traductions_debut["la-case-est-deja-occupee"][$_SESSION['lang']];
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
    					$_SESSION['message-erreur'] = $this->traductions_debut["il-semble-que-mise-en-bdd-pas-lieu"][$_SESSION['lang']].".<br/>".$this->traductions_debut["controlez-etat-case-en-cliquant"][$_SESSION['lang']]." <a href='index.php?page=actions_case&action=affiche-etat&case=".$urlcase."&terrain=".$case->nom_terrain."'>".$this->traductions_debut["ici"][$_SESSION['lang']]."</a> <br/><br/>";
    					header("Location: index.php?page=jeu&espace=colonisation");
    					exit;
    				}
    				else{
    					//  la case est sauvée dans la BDD, faire de même pour le village et update dans la table CASE_TIMING
    					//  obtenir l'id de la case et mettre à jour CASES_TIMING
    					$lacase = new Caza($coord);
    					$sql = "INSERT into \"libertribes\".\"CASES_TIMING\" (temps_changement,case_id) VALUES ('".time()."','".$lacase->id."')";
    					if(!$connexion->Requete( $sql)){
    						$req = "DELETE FROM \"libertribes\".\"CASE\" WHERE id=".$lacase->id;
    						$connexion->Requete( $req);
    						$urlcase = urlencode($coord);
    						$_SESSION['message-erreur'] = $this->traductions_debut["il-semble-que-mise-en-bdd-pas-lieu"][$_SESSION['lang']].".<br/>".$this->traductions_debut["controlez-etat-case-en-cliquant"][$_SESSION['lang']]." <a href='index.php?page=actions_case&action=affiche-etat&case=".$urlcase."&terrain=".$case->nom_terrain."'>".$this->traductions_debut["ici"][$_SESSION['lang']]."</a> <br/><br/>";
    						header("Location: index.php?page=jeu&espace=colonisation");
    						exit;
    					}
    					$req = "INSERT into  \"libertribes\".\"VILLAGE\" (nom_village,casa,avatar_iden) VALUES ('".$nom."',".$lacase->id.",".$_SESSION['djun_choisi']->id.")";
    					$urlcase = urlencode($coord);
    					if(!$connexion->Requete( $req)){
							$token = substr(str_shuffle(str_shuffle("abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQSRTUVWXYZ0123456789?+@#")),10,20);
							$_SESSION['token_colonisation'] = $token;
     						$_SESSION['message-erreur'] = $this->traductions_debut["semble-initialisation-en-bdd-echoue-reinitialisez-clic"][$_SESSION['lang']]." <a href='index.php?page=actions_case&action=creer-village-en-bdd&case=".$lacase->id."&token_colonisation=".$token.">".$this->traductions_debut["ici"][$_SESSION['lang']]."</a> <br/><br/>";
    						header("Location: index.php?page=jeu&espace=colonisation");
    						exit;   						
    					}
    					//  aller à la page colonisation pour finaliser 
						$token = substr(str_shuffle(str_shuffle("abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQSRTUVWXYZ0123456789?+@#")),10,20);
						$_SESSION['token_colonisation'] = $token;
    					header("Location: index.php?page=jeu&espace=colonisation&case_id=".$lacase->id."&token_colonisation=".$token);
    					exit;
    				}
    			}
    			else {
    				$_SESSION['message-erreur'] = $this->traductions_debut["vous-avez-10-villages-et-limite"][$_SESSION['lang']];
    				header("Location: index.php?page=jeu&espace=colonisation");
    				exit;
    			}
    		}			//   find du else ie case libre
    	}			//  fin de la fonction creer_village_et_case
?>
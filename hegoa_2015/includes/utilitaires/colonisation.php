<?php
    
    function occupation($connexion,$coord,$terrain){
    	//  déterminer le panneau dans lequel se trouve la case
		$parties = explode(",",$coord);
		$casex = intval(substr($parties[0],1));
		$casey =  intval($parties[1]);
		$coord1 = ($casex-1)*DIM_CASE;
		$coord2 = ($casey-1)*DIM_CASE; 
    	//  contrôler si la case est encore disponible, dans la table CASE
		$req = "SELECT * FROM \"libertribes\".\"CASE\" WHERE coord ~= '".$coord."' ";			//   l'opérateur ~= est "same as" pour des types géométriques de postgresql
		$resu = $connexion->Requete( $req );	
		
		if($resu){$ligne = 	pg_fetch_array($resu);}
		if($ligne){
			$_SESSION[$coord] = "notOK";
			$_SESSION['message-erreur'] = $this->traductions_debut["la-case-est-occupee-par-un"][$_SESSION['lang']]." ".$ligne['occupee_par'];
			header("Location: index.php?page=jeu&espace=colonisation");
			exit;
		}
    	else {
			//  la case est libre    		
			$_SESSION[$coord] = "OK";
			return true;
    		}			//   find du else ie case libre
    	}			//  fin de la fonction occupation
    	
    	function check_zone($connexion,$coord,$terrain){
    		if(occupation($connexion,$coord,$terrain)){
 				$parties = explode(",",$coord);
				$casex = intval(substr($parties[0],1));
				$casey =  intval($parties[1]);
				$coord1 = ($casex-1)*DIM_CASE;
				$coord2 = ($casey-1)*DIM_CASE;    	
    			//  contrôler quel est le rayon actuel par rapport au point de référence
				$req = "SELECT * FROM \"libertribes\".\"RAYON\"";			
				$resu = $connexion->Requete( $req );		
				if($resu){$ligne = 	pg_fetch_array($resu);}
				if($ligne){		
					$parties = explode(",",$ligne['centre']);
					$crefx = intval(substr($parties[0],1));
					$crefy =  intval($parties[1]);
					$cref1 = ($crefx-1)*DIM_CASE;
					$cref2 = ($crefy-1)*DIM_CASE; 
					$extension_rayon = $ligne["rayon"]+RAYON_EXTENSION;			//   ?????? A REVOIR ?? 
					$distx = $cref1-$coord1;
					$disty = $cref2-$coord2;
					$distance_point_reference = sqrt($distx*$distx + $disty*$disty);
					if($distance_point_reference<$extension_rayon){
						//   le point se situe dans la zone colonisable
						if($distance_point_reference>$ligne["rayon"]){
							//  le rayon est plus grand que le rayon précédent, il est donc mis à jour dans la table RAYON
							$req = "UPDATE \"libertribes\".\"RAYON\" SET rayon='".$distance_point_reference."' where centre='".$ligne['centre']."'";			
							$connexion->Requete( $req );	
						}
						$_SESSION[$coord] = "OK";
						return true;
					}
					else {
						$_SESSION[$coord] = "notOK";
						$_SESSION['message-erreur'] = $this->traductions_debut["en-dehors-zone-colonisable"][$_SESSION['lang']];
    					header("Location: index.php?page=jeu&espace=colonisation");
						exit;
					}
    			}
    		}
    		else {
    			$_SESSION[$coord] = "notOK";
    			$_SESSION['message-erreur'] = $this->traductions_debut["la-case-est-deja-occupee"][$_SESSION['lang']];
    			header("Location: index.php?page=jeu&espace=colonisation");
				exit;
    		}
    	}
    	
    	function coloniser_au_hasard($connexion){
    		//  actuellement, la fonction n'est pas implémentée => message d'erreur 
    		    $_SESSION['message-erreur'] = "Option non encore implémentée";
    			header("Location: index.php?page=jeu&espace=colonisation");
				exit;
    	    		// il faut connaître le type de compte du joueur et le nombre de dés qu'il a pu lancer
    		/*
    			Ceci n'a d'impact que sur la taille et les niveau de défense, pas sur la position
    		*/
    		/*   Pour plus tard ...
    		$nombre_tirages = $_SESSION['compte']->nombre_des;
    		$type_compte = $SESSION['compte']->type_compte;
    		
    	*/
    	}
    	
?>
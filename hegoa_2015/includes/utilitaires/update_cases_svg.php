<?php 
	//    NB   la variable  "this"  se réfère au contrôleur dans lequel cette partie de code est insérée 
$num_panneau = substr($this->nom_panneau,4);

$langue = "fr";
$only_ajout = 1;							//   cas où il n'y a que des cases à ajouter, pas de suppression
if(isset($_SESSION['lang'])&&!empty($_SESSION['lang'])){$langue = $_SESSION['lang'];}

//   On cherche les cases à superposer	 => test sur la table CASES_TIMING
//  on cherche s'il y a eu des changements
$req0 = "SELECT * FROM \"libertribes\".\"CASES_TIMING\" where svg_cree=FALSE";
$resu_svg_cree = array();
if($resultat0 = $this->db_connexion->Requete($req0)){
	if(pg_num_rows($resultat0)>0){
	//   OUI il y a eu des changements
	//   check si les changements ne sont que des ajouts ou incluent également des suppressions
	include (HOMEPATH."includes/utilitaires/ajout_cases_to_svg.php");
	 $type_chg = 0;
	 $les_cases = array();
	 while($resu0 = pg_fetch_array($resultat0)){
	 	$resu_svg_cree[] = $resu0["case_id"];
	 	if($resu0['type_changement']=="suppression"){$type_chg++;}
	 }

	 if($type_chg>0){
		$req = "SELECT * FROM \"libertribes\".\"CASE\" as ca1 inner join \"libertribes\".\"CASES_TIMING\" as ca2 on ca1.id = ca2.case_id and where ca2.svg_cree=false and where ca1.panneau = '".$num_panneau."' and where ca1.svg = '".$this->svg."' ";			//  pour obtenir toutes les cases 
	}	
	else {
		$only_ajout = 0;
		// il y a eu des suppression de cases => on reprend toutes les cases dans la table CASE
		$req = "SELECT * FROM \"libertribes\".\"CASE\" ";			//  pour obtenir toutes les cases 	
	}	

	if($resultats = $this->db_connexion->Requete($req)){
			if(pg_num_rows($resultats)>0){
				while($result = pg_fetch_array($resultats)){
					$les_cases[] = new Caza($result);
				}
			}
			else {
				$message_erreur = $this->traductions["texte_erreur_acces_changements"][$langue];
			}
		}
		if(isset($les_cases)&&!empty($les_cases)){
			//   OK 
			$resu = ajout_cases_to_svg($only_ajout,$les_cases);
			if($resu["00"]){
				//   les nouveaux svg ont tous été créés, mettre les svg_cree associés à TRUE dans la table CASES_TIMING
				foreach($resu_svg_cree as $acase){
					$requete = "UPDATE  \"libertribes\".\"CASES_TIMING\" SET svg_cree=TRUE where case_id=".$acase;
					if(!$this->db_connexion->Requete($requete)){
						if(!isset($message_erreur)){
							$message_erreur = $this->traductions["texte_erreur_mise_en_bdd"][$langue].$acase->id."<br/>";
						}
						else {
							$message_erreur .= $this->traductions["texte_erreur_mise_en_bdd"][$langue].$acase->id."<br/>";
						}
					}
				}
				
			}
			else {
				$message_erreur = $this_traductions["texte_erreur_creation_svg"][$langue];
			}
		}	
	
	}		//    fin du if sur les changements de cases
	
}

	$svg_dir = HOMEPATH.DIR_MAP_SVG."pan_".$num_panneau."/";
	$handle = opendir($svg_dir );
	$allfiles = array();
	while($file=readdir($handle)) {
		$allfiles[] = $file;
	}
	$les_needles = array("1-1","1-2","2-1","2-2");
	for($ineedle = 0;$ineedle<4;$ineedle++){
		$myneedle = "cases_".$les_needles[$ineedle]."_";
		$myfiles = array();
		foreach($allfiles as $file){	
			if(strpos(" ".$file,$myneedle)>0){
				$myfiles[] = $file;
			}
		}

			rsort($myfiles);
			$svgfile = $myfiles[0];	

			if(count($myfiles)>2){			//  s'il y a plus de 2 fichiers, il y en a de vieux à éliminer
				for($j=1;$j<count($myfiles)-1;$j++){
					$file2delete = HOMEPATH.DIR_MAP_SVG."pan_".$num_panneau."/".$myfiles[$j];
					if(file_exists($file2delete)){unlink($file2delete);}
				}
			}
			if(isset($svgfile)&&(!strpos(" ".$svgfile,"100000000"))){
				$svgfileuri[$ineedle] = HOMEURI.DIR_MAP_SVG."pan_".$num_panneau."/".$svgfile;	
			}
		}//   fin boucle ineedle pour les 4 svg "cases" du panneau		

?>
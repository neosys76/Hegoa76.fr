<?php
function ajout_cases_to_svg($only_ajout,$cases) {
	$ok["00"] = TRUE;
	foreach($cases as $case){
		$num_panneau = $case->panneau;
		$num_svg = $case->svg;
		//  le répertoire où se trouvent les sous-répertoires des svg de panneaux
		$svg_dir = HOMEPATH.DIR_MAP_SVG."pan_".$num_panneau."/";
		//   on lit le svg à changer
		$myneedle = "cases_".$num_svg."_";
		if(!isset($svgfile[$num_panneau][$num_svg])||empty($svgfile[$num_panneau][$num_svg])){
			if($only_ajout==1){
				$handle = opendir($svg_dir );
				$myfiles = array();
				while($file=readdir($handle)) {
					if(strpos(" ".$file,$myneedle)>0){
						$myfiles[] = $file;
					}
				}
				rsort($myfiles);
				$svgfile[$num_panneau][$num_svg] = $myfiles[0];
			}
			else {
				$svgfile[$num_panneau][$num_svg] = "cases_".$num_svg."_1000000000.svg";
			}
			$svg_content[$num_panneau][$num_svg] = file_get_contents($svg_dir.$svgfile[$num_panneau][$num_svg]);
			$svg_content[$num_panneau][$num_svg] = str_replace("</svg>","",$svg_content[$num_panneau][$num_svg]);		//   on élimine la terminaison </svg> de l'image
		}
		$lepoint = $case->coord;
		$parts_pan = explode("-",$num_panneau);
		$partspoint = explode(",",$lepoint);
		$xcase = ((intval(substr($partspoint[0],1))-1) - round(LARGEUR_PANNEAU/DIM_CASE)*($parts_pan[1]-1))*DIM_CASE;
		$ycase = ((intval($partspoint[1])-1) - round(HAUTEUR_PANNEAU/DIM_CASE)*($parts_pan[0]-1))*DIM_CASE;
		$type_case = str_replace("é","e",$case->occupee_par);
		$la_ligne = "<use id=\"".$case->id."\" xlink:href=\"#".$type_case."\" x=\"".$xcase."\" y=\"".$ycase."\" />\n";  	
		$svg_content[$num_panneau][$num_svg] .= $la_ligne;	
	}
	
	foreach($svg_content as $pan_num=>$svg_svg){
		foreach($svg_svg as $svg_num=>$content){
			$content .= "</svg>";
			$timestamp=time();
			$svg_dir = HOMEPATH.DIR_MAP_SVG."pan_".$pan_num."/";
			$nouveau_svg = "cases_".$svg_num."_".$timestamp.".svg";
			if(file_put_contents($svg_dir.$nouveau_svg,$content)){
				$ok[$pan_num."-".$svg_num] = $timestamp;
				$ok["00"] = ($ok["00"] AND TRUE);
			}
			else {
				$ok[$pan_num."-".$svg_num] = false;
				$ok["00"] = false;
			}
		}	
	}
		return $ok;	
}
?>
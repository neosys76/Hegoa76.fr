<?php
	//	fonction de calcul de distance entre deux points (x,y)
	function distance($point1,$point2){
			$parties_p1 = explode(",", $point1);
			$parties_p2 = explode(",", $point2);
			$x1 = floatval(trim(substr($parties_p1[0], 1)));
			$y1 = floatval(trim($parties_p1[1]));
			$x2 = floatval(trim(substr($parties_p2[0], 1)));
			$y2 = floatval(trim($parties_p2[1]));
			$distance = pow(($x1-$x2),2) + pow(($y1-$y2),2);
			$distance = sqrt($distance);
			return $distance;
	}

	//	fonction d'extraction du x d'un point donné par (x,y)
	function get_le_x($point){
			$parties_p1 = explode(",", $point);
			$le_x = floatval(trim(substr($parties_p1[0], 1)));
			return $le_x;
	}
	
	//	fonction d'extraction du y d'un point donné par (x,y)
	function get_le_y($point){
			$parties_p1 = explode(",", $point);
			$le_y = floatval(trim($parties_p1[1]));
			return $le_y;
	}


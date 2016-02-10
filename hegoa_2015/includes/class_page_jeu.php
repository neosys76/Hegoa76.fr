<?php
// ======================================================================
// Auteurs : Dominique DEHARENG, Donatien CELIA
// Licence : CeCILL v2
// ======================================================================

error_reporting(E_ALL);

require "class_page.php";                                              // - On inclut la class Page

class PageJeu extends Page
{
    function __construct()
    {
      // - on appele le constructeur du parent
      parent::__construct();

      // - on renseigne qq infos du parent
      parent::SetNomPage( "jeu","Le jeu - Accueil");
      parent::SetAffichageHeader( 1 );
      parent::SetAffichageMenu( 0 );
      parent::SetAffichageFooter( 0 );
		      	//  les traductions spécifiques
      $this->traductions = $this->getTraductions();

      $this->AjouterCSS("page_jeu.css");

      // - on ajoute les contenus utiles
      $this->AjouterContenu("contenu", "contenus/page_jeu.php");
    }
    // -------------------------------------------------------------------------

    public function charger_village()
    {
    	
      // - Chargement des données du village
      /*
      *		On contrôle que les différens villages mis en session pour l'avatar sont tous bien initialisés
      *     Sinon, on les initialise
      */

      $nbr_villages_crees_non_initialises = array();
		$nbr_villages = count($_SESSION['djun_choisi']->villages);
		for($i=0;$i<$nbr_villages;$i++){
			if($_SESSION['djun_choisi']->villages[$i]->nom=="ND"){
				$nbr_villages_crees_non_initialises[] = $i;
			}
		}
		if(!empty($nbr_villages_crees_non_initialises)){
			foreach($nbr_villages_crees_non_initialises as $num_village){
				$village_casa = $_SESSION['djun_choisi']->villages[$num_village]->case_village;
				$un_message = $this->initialiser_village($village_casa,true);		//    true signifie que la fonction doit renvoyer (return) un message car on est dans une boucle 
				if(!empty($un_message)){
					if(isset($this->message)&&!empty($this->message)){
						$this->message .= "<br/>".$un_message;
					}
					else {
						$this->message = $un_message;
					}				
				}
			}
		}

      // - on ajoute le contenu du village
      $this->AjouterCSS("page_jeu_village.css");
      //   définition du village éventuel choisi
      unset($_SESSION['village_choisi']);
      if(!isset($_SESSION['village_choisi'])||empty($_SESSION['village_choisi'])){
     		 if(count($_SESSION['djun_choisi']->villages)>0){
     	 	 $_SESSION['village_choisi'] = $_SESSION['djun_choisi']->villages[0];
      		}
      		else {
      			$_SESSION['village_choisi'] = new Village();
      		}
      }
      $this->AjouterContenu("contenu_village", "contenus/page_jeu_village.php");
    }
    // -------------------------------------------------------------------------

    public function charger_village_liste()
    {
      $_SESSION['village_type'] = $_GET['type'];
      // - on ajoute le contenu du panneau
      $this->AjouterCSS("page_jeu_village_liste.css");
      $this->AjouterContenu("contenu_village_liste", "contenus/page_jeu_village_liste.php");
    }
    // -------------------------------------------------------------------------

    public function charger_quete()
    {
      if(isset($_GET['type'])&&!empty($_GET['type'])){
      		$_SESSION['quete_type'] = $_GET['type'];
      }
      else {
      		$_SESSION['quete_type'] = "list_current";
      }

      // - Quel type ?
      if ($_SESSION['quete_type'] == "create")
      {
        // - Création de quete
        $this->AjouterCSS("page_jeu_quete_creer.css");
        $this->AjouterContenu("contenu_quete", "contenus/page_jeu_quete_creer.php");
      }
      elseif($_SESSION['quete_type'] == "read")
      {
      	    $this->AjouterCSS("page_jeu_quete_lire.css");
          $this->AjouterContenu("contenu_quete", "contenus/page_jeu_quete_lire.php");
		}
		else {
          $this->AjouterCSS("page_jeu_quete.css");
          $this->AjouterContenu("contenu_quete", "contenus/page_jeu_quete.php");		
		}
    }
    // -------------------------------------------------------------------------

    public function charger_commerce()
    {
      $type = $_GET['type'];                                                        // On recupère le type de commerce

      // - Quel type de commerce ?
      if ($type == "bourse")
      {
        // - Onglet bourse
        $_SESSION['commerce_type'] = $type;
      }
      else
      {
        if ($type == "marche")
        {
          // - Onglet marche
          $_SESSION['commerce_type'] = $type;
        }
        else
        {
          // - Onglet cours (par défaut)
          $_SESSION['commerce_type'] = "cours";
        }
      }

      // - on ajoute le css & contenu du panneau
      $this->AjouterCSS("page_jeu_commerce.css");
      $this->AjouterContenu("contenu_commerce", "contenus/page_jeu_commerce.php");
    }
    // -------------------------------------------------------------------------

    public function charger_batiment()
    {
      // - On récupère les informations nécessaires
      $account_id = $_SESSION['djun_id'];
      $village_id = $_SESSION['village_id'];

      // - Initialisation
      $_SESSION['batiment_id']    = array();
      $_SESSION['batiment_titre'] = array();
      $_SESSION['batiment_image'] = array();
      $_SESSION['batiment_info']  = array();
      $_SESSION['batiment_livre'] = array();
      $_SESSION['batiment_is_active'] = array();


      $iCpt = 0;
      // - on stocke les messages
      $_SESSION['batiment_id'][$iCpt]     = $iCpt;
      $_SESSION['batiment_titre'][$iCpt]  = "titre" . $iCpt;
      $_SESSION['batiment_image'][$iCpt]  = "images/jeu/batiment/batiments/batiment.png";
      $_SESSION['batiment_info'][$iCpt]   = 1;
      $_SESSION['batiment_livre'][$iCpt]  = 1;
      $_SESSION['batiment_actif'][$iCpt]  = 1;
      $iCpt++;

      $_SESSION['batiment_id'][$iCpt]     = $iCpt;
      $_SESSION['batiment_titre'][$iCpt]  = "titre" . $iCpt;
      $_SESSION['batiment_image'][$iCpt]  = "images/jeu/batiment/batiments/batiment_locked.png";
      $_SESSION['batiment_info'][$iCpt]   = 1;
      $_SESSION['batiment_livre'][$iCpt]  = 1;
      $_SESSION['batiment_actif'][$iCpt]  = 0;
      $iCpt++;

      $_SESSION['batiment_id'][$iCpt]     = $iCpt;
      $_SESSION['batiment_titre'][$iCpt]  = "titre" . $iCpt;
      $_SESSION['batiment_image'][$iCpt]  = "images/jeu/batiment/batiments/batiment_locked.png";
      $_SESSION['batiment_info'][$iCpt]   = 1;
      $_SESSION['batiment_livre'][$iCpt]  = 1;
      $_SESSION['batiment_actif'][$iCpt]  = 0;
      $iCpt++;

      $_SESSION['batiment_id'][$iCpt]     = $iCpt;
      $_SESSION['batiment_titre'][$iCpt]  = "titre" . $iCpt;
     $_SESSION['batiment_image'][$iCpt]  = "images/jeu/batiment/batiments/batiment_locked.png";
      $_SESSION['batiment_info'][$iCpt]   = 1;
      $_SESSION['batiment_livre'][$iCpt]  = 1;
      $_SESSION['batiment_actif'][$iCpt]  = 0;
      $iCpt++;

      $_SESSION['batiment_id'][$iCpt]     = $iCpt;
      $_SESSION['batiment_titre'][$iCpt]  = "titre" . $iCpt;
      $_SESSION['batiment_image'][$iCpt]  = "images/jeu/batiment/batiments/batiment_locked.png";
      $_SESSION['batiment_info'][$iCpt]   = 1;
      $_SESSION['batiment_livre'][$iCpt]  = 1;
      $_SESSION['batiment_actif'][$iCpt]  = 0;
      $iCpt++;

      $_SESSION['batiment_id'][$iCpt]     = $iCpt;
      $_SESSION['batiment_titre'][$iCpt]  = "titre" . $iCpt;
      $_SESSION['batiment_image'][$iCpt]  = "images/jeu/batiment/batiments/batiment_locked.png";
      $_SESSION['batiment_info'][$iCpt]   = 1;
      $_SESSION['batiment_livre'][$iCpt]  = 1;
      $_SESSION['batiment_actif'][$iCpt]  = 0;
      $iCpt++;

      $_SESSION['batiment_id'][$iCpt]     = $iCpt;
      $_SESSION['batiment_titre'][$iCpt]  = "titre" . $iCpt;
      $_SESSION['batiment_image'][$iCpt]  = "images/jeu/batiment/batiments/batiment_locked.png";
      $_SESSION['batiment_info'][$iCpt]   = 1;
      $_SESSION['batiment_livre'][$iCpt]  = 1;
      $_SESSION['batiment_actif'][$iCpt]  = 0;
      $iCpt++;

      $_SESSION['batiment_id'][$iCpt]     = $iCpt;
      $_SESSION['batiment_titre'][$iCpt]  = "titre" . $iCpt;
      $_SESSION['batiment_image'][$iCpt]  = "images/jeu/batiment/batiments/batiment_locked.png";
      $_SESSION['batiment_info'][$iCpt]   = 1;
      $_SESSION['batiment_livre'][$iCpt]  = 1;
      $_SESSION['batiment_actif'][$iCpt]  = 0;
      $iCpt++;

      $_SESSION['batiment_compteur'] = $iCpt;

      // - Gestion du nb de pages
      $iNbPages = ceil( $_SESSION['batiment_compteur'] / 8 );
      if( $iNbPages == 0 )
      {
        $iNbPages = 1;
      }

      $_SESSION['batiment_nb_pages'] = $iNbPages;

      // - Gestion du no de page
      if ( ! isset($_POST['batiment_no_page']) )
      {
        $_SESSION['batiment_no_page'] = 1;
      }
      else
      {
        $iPage = $_POST['batiment_no_page'];

        if ( $iPage < 0 )
        {
          $iPage = 1;
        }

        if ( $iPage > $iNbPages )
        {
          $iPage = $iNbPages;
        }

        $_SESSION['batiment_no_page'] = $iPage;
      }

      // - on ajoute le css & contenu du panneau
      $this->AjouterCSS("page_jeu_batiment.css");
      $this->AjouterContenu("contenu_batiment", "contenus/page_jeu_batiment.php");
    }
    // -------------------------------------------------------------------------

    public function charger_batiment_construction()
    {
      // - Récupération des variables

      // - on ajoute le css & contenu du panneau
      $this->AjouterCSS("page_jeu_batiment_construction.css");
      $this->AjouterContenu("contenu_batiment", "contenus/page_jeu_batiment_construction.php");

    }
    // -------------------------------------------------------------------------

    public function charger_batiment_amelioration()
    {
      // - Récupération des variables

      // - on ajoute le css & contenu du panneau
      $this->AjouterCSS("page_jeu_batiment_amelioration.css");
      $this->AjouterContenu("contenu_batiment", "contenus/page_jeu_batiment_amelioration.php");
    }
    // -------------------------------------------------------------------------


    public function charger_objet()
    {
      $type   = $_GET['type'];                                                  // - On recupère le type

          if ( $type == "suppression" )
          {
            $_SESSION['objet_type']   = $type;
            $this->AjouterCSS("page_jeu_objet_suppression.css");
          }
          else
          {
            if ( $type == "creation" )
            {
              $_SESSION['objet_type']   = $type;
              $this->AjouterCSS("page_jeu_objet_creation.css");
            }
            else
            {
              if ( $type == "detail" )
              {
                $_SESSION['objet_type']   = $type;
                $this->AjouterCSS("page_jeu_objet_detail.css");
              }
              else
              {
                  $_SESSION['objet_type']   = "liste";
                  $this->AjouterCSS("page_jeu_objet_liste.css");

                // - on charge les données requises
                include "chargement_objet_liste.php";
              }
            }
          }



      // - on ajoute le css & contenu du panneau
      $this->AjouterCSS("page_jeu_objet.css");
      $this->AjouterContenu("contenu_objet", "contenus/page_jeu_objet.php");
    }
    // -------------------------------------------------------------------------

    public function charger_hua()
    {

      $onglet = $_GET['onglet'];                                                // - On recupère l'onglet
      $type   = $_GET['type'];                                                  // - On recupère le type

      // - Quel type d'armée ?
      if ($onglet == "armee")
      {
          // - Onglet armee
          $_SESSION['hua_onglet'] = $onglet;


          if ( $type == "suppression" )
          {
            $_SESSION['hua_type']   = $type;
            $this->AjouterCSS("page_jeu_hua_armee_suppression.css");
          }
          else
          {
            if ( $type == "creation" )
            {
              $_SESSION['hua_type']   = $type;
              $this->AjouterCSS("page_jeu_hua_armee_creation.css");
            }
            else
            {
              if ( $type == "detail" )
              {
                $_SESSION['hua_type']   = $type;
                $this->AjouterCSS("page_jeu_hua_armee_detail.css");
              }
              else
              {
                  $_SESSION['hua_type']   = "liste";
                  $this->AjouterCSS("page_jeu_hua_armee_liste.css");
              }
            }
          }
      }
      else
      {
        if ($onglet == "unite")
        {
          // - Onglet unite
          $_SESSION['hua_onglet'] = $onglet;

          if ( $type == "vendre" )
          {
            $_SESSION['hua_type']   = $type;
            $this->AjouterCSS("page_jeu_hua_unite_vendre.css");
          }
          else
          {
            if ( $type == "infos" )
            {
              $_SESSION['hua_type']   = $type;
              $this->AjouterCSS("page_jeu_hua_unite_infos.css");
            }
            else
            {
              if ( $type == "ajouter" )
              {
                $_SESSION['hua_type']   = $type;
                $this->AjouterCSS("page_jeu_hua_unite_ajouter.css");
              }
              else
              {
                $_SESSION['hua_type']   = "defaut";
                $this->AjouterCSS("page_jeu_hua_unite_defaut.css");
              }
            }
          }
        }
        else
        {
          // - Onglet hero (par défaut)
          $_SESSION['hua_onglet'] = "hero";


          if ( $type == "suppression" )
          {
            $_SESSION['hua_type']   = $type;
            $this->AjouterCSS("page_jeu_hua_hero_suppression.css");
          }
          else
          {
            if ( $type == "creation" )
            {
              $_SESSION['hua_type']   = $type;
              $this->AjouterCSS("page_jeu_hua_hero_creation.css");
            }
            else
            {
              if ( $type == "detail" )
              {
                $_SESSION['hua_type']   = $type;
                $this->AjouterCSS("page_jeu_hua_hero_detail.css");
              }
              else
              {
                if ( $type == "equiper" )
                {
                  $_SESSION['hua_type']   = $type;
                  $this->AjouterCSS("page_jeu_hua_hero_equiper.css");
                }
                else
                {
                  $_SESSION['hua_type']   = "liste";
                  $this->AjouterCSS("page_jeu_hua_hero_liste.css");
                }
              }
            }
          }
        }
      }

      // - on ajoute le css & contenu du panneau
      $this->AjouterCSS("page_jeu_hua.css");
      $this->AjouterContenu("contenu_hua", "contenus/page_jeu_hua.php");
    }
    // -------------------------------------------------------------------------

    public function charger_magie()
    {
      if ( $type == "detail" )
      {
        $_SESSION['magie_type']   = $type;
        $this->AjouterCSS("page_jeu_magie_detail.css");
      }
      else
      {
        $_SESSION['magie_type']   = "liste";
        $this->AjouterCSS("page_jeu_magie_liste.css");

        // - on charge les données requises
        include "chargement_magie_liste.php";
      }

      // - on ajoute le css & contenu du panneau
      $this->AjouterCSS("page_jeu_magie.css");
      $this->AjouterContenu("contenu_magie", "contenus/page_jeu_magie.php");
    }
    // -------------------------------------------------------------------------

    public function charger_science()
    {
      if ( $type == "detail" )
      {
        $_SESSION['science_type']   = $type;
        $this->AjouterCSS("page_jeu_science_detail.css");
      }
      else
      {
        $_SESSION['science_type']   = "liste";
        $this->AjouterCSS("page_jeu_science_liste.css");

        // - on charge les données requises
        include "chargement_science_liste.php";
      }

      // - on ajoute le css & contenu du panneau
      $this->AjouterCSS("page_jeu_science.css");
      $this->AjouterContenu("contenu_science", "contenus/page_jeu_science.php");
    }
    // -------------------------------------------------------------------------

    public function charger_carte()
	{
		//   récupération de la zone constructible
		include HOMEPATH.UTILPATH."distance_entre_points.php";
		$sql = "SELECT * FROM \"libertribes\".\"RAYON\"";
		$resultat = $this->db_connexion->Requete( $sql);
		if($resultat || pg_num_rows($resultat) > 0){
			$ligne = pg_fetch_array($resultat);
			$this->rayon_constructible = $ligne['rayon'];
			$this->case_reference = $ligne['centre'];
		}
		if(isset($_SESSION["djun_choisi"]->derniere_position)){
			$derniere_position = $_SESSION["djun_choisi"]->derniere_position;			//   position == indices de case
		}
		else {
			$derniere_position = $this->case_reference;
		}
		
		if(isset($_GET['zone'])&&$_GET['zone']=="colonisable"){
			//  on recentre sur la partie extérieure de la zone colonisable 

			$dist_centre = distance($this->case_reference,$derniere_position)*DIM_CASE;
			if($dist_centre>$this->rayon_constructible){
				$ratio = 0.9*$this->rayon_constructible/$dist_centre;
				$le_x_ref = get_le_x($this->case_reference);
				$le_y_ref = get_le_y($this->case_reference);
				$new_x = $ratio*(get_le_x($derniere_position) - $le_x_ref) + $le_x_ref;
				if($new_x<$le_x_ref){ $new_x = $le_x_ref;}
				$new_y = $ratio*(get_le_y($derniere_position) - $le_y_ref) + $le_y_ref;
				if($new_y<$le_y_ref){ $new_y = $le_y_ref;}
				$derniere_position = "(".$new_x.",".$new_y.")";
			}
		}
		if(isset($derniere_position)){
				//  on détermine le panneau à charger et les coordonnées du milieu de la case
			$parties = explode(",", $derniere_position);
			$num_case_x = substr($parties[0], 1);
			$num_case_y = substr($parties[1],0,(strlen($parties[1])-1));
			$this->carte_x = (round(floatval($num_case_x)) - 1 )*DIM_CASE + round(DIM_CASE/2);
			$this->carte_y =  (round(floatval($num_case_y)) - 1 )*DIM_CASE + round(DIM_CASE/2);
			$indixx = floor($this->carte_x/LARGEUR_PANNEAU);
			$indixy = floor($this->carte_y/HAUTEUR_PANNEAU);
			$indixx_codes = floor($this->carte_x/LARGEUR_PANNEAU_CODES);
			$indixy_codes = floor($this->carte_y/HAUTEUR_PANNEAU_CODES);
				//  détermination du panneau de la carte à télécharger
			$panx = $indixx +1;
			$pany = $indixy +1;
			$panx_codes = $indixx_codes +1;
			$pany_codes = $indixy_codes +1;
			$this->nom_panneau = "pan_".$pany."-".$panx;
			$this->nom_panneau_codes = "pan_".$pany_codes."-".$panx_codes;
				//  recherche de l'indice du svg-cases-user correspondant
			$pan_case_x = floor(($this->carte_x - ($indixx_codes*LARGEUR_PANNEAU_CODES))/DIM_CASE)+1;			//  n° de la case dans le panneau svg-codes sur x
			$pan_case_y = floor(($this->carte_y - ($indixy_codes*HAUTEUR_PANNEAU_CODES))/DIM_CASE)+1;			//  n° de la case dans le panneau svg-codes sur y
			$svg_x = 1;
			$svg_y = 1;
			if($pan_case_x>SVG_CX){
				$svg_x = 2;				//  il n'y a que deux fois deux svg dans un  panneau
			}
			if($pan_case_y>SVG_CY){
				$svg_y = 2;				//  il n'y a que deux fois deux svg dans un  panneau
			}
			$this->svg = $svg_y."-".$svg_x;
		}
		else {
			$this->nom_panneau = "pan_1-1";
			$this->nom_panneau_codes = "pan_1-1";
			$this->carte_x = (LE_X0 - 1 )*DIM_CASE + round(DIM_CASE/2);
			$this->carte_y =  (LE_Y0 - 1 )*DIM_CASE + round(DIM_CASE/2);
			$this->svg = "1-1";
		}

      // - on ajoute le css & contenu 
      $this->AjouterCSS("page_jeu_carte.css");
      $this->AjouterContenu("cases_svg", HOMEPATH.UTILPATH."update_cases_svg.php");	
      //   $this->svgfileuri est un tableau qui contient les noms des 4 fichiers svg à charger
      $this->AjouterContenu("contenu_carte", "contenus/page_jeu_carte.php");		
	}
    	
    // -------------------------------------------------------------------------
    
    public function coloniser($tableau)
	{
		/*
		*		fonction créant une case en base de donnée correspondant à un village, un campement, un marché ...
		*/
		
		// - on ajoute le css & contenu du panneau
      $this->AjouterCSS("page_jeu_colonisation.css");
      
      //   condition sur le token de sécurité testé avant l'appel à la fonction
		if(!isset($tableau['token'])||$tableau['token']!="OK"){
			$this->message = $this->traductions["token-incorrect"][$_SESSION['lang']];
		}
      //  s'il y a déjà un message, c'est qu'il y a une erreur
      //  sinon, on continue
      if((!isset($_SESSION['message-erreur'])||empty($_SESSION['message-erreur']))&&(!isset($this->message)||empty($this->message))){
      		if(!isset($tableau['terrain'])||empty($tableau['terrain'])){
				$_SESSION['message-erreur'] = $this->traductions["manque-terrain-case"][$_SESSION['lang']].". <a href='index.php?page=jeu&espace=etoile'>".$this->traductions_debut['recommencer-operation'][$_SESSION['lang']].".</a>";
				header('Location: index.php?page=jeu&espace=colonisation');
				exit;
			}
			elseif(!isset($tableau['coord_case'])||empty($tableau['coord_case'])){
				$_SESSION['message-erreur'] = $this->traductions["manque-coord-case"][$_SESSION['lang']].". <a href='index.php?page=jeu&espace=etoile'>".$this->traductions_debut['recommencer-operation'][$_SESSION['lang']].".</a>";
				header('Location: index.php?page=jeu&espace=colonisation');
				exit;			
			}
			
			//   on transmet les coordonnées et le terrain de la case à créer, ou l'id de la case déjà créée (initialisation de village ou ... ratée)
			$condition1 = (isset($tableau['terrain'])&&!empty($tableau['terrain']) && isset($tableau['coord_case'])&&!empty($tableau['coord_case']));
			$condition2 = (isset($tableau['case_id'])&&!empty($tableau['case_id']));
			
			if($condition1){
				//   on a transmis les coordonnées et le terrain à coloniser
				//  on crée la case dans la table CASE
				$sql = "INSERT INTO \"libertribes\".\"CASE\" (coord,nom_terrain,occupant_id) VALUES ('".$tableau['coord_case']."','".$tableau['terrain']."',".$_SESSION['djun_choisi']->id.")";
				if(!$this->db_connexion->Requete( $sql)){
					$_SESSION['message-erreur'] = $this->traductions["impossible-creer-case-en-bdd"][$_SESSION['lang']].". <a href='index.php?page=jeu&espace=etoile'>".$this->traductions_debut['recommencer-operation'][$_SESSION['lang']].".</a>";
					header('Location: index.php?page=jeu&espace=colonisation');
					exit;	
				}	
				else {
					$sql = "SELECT id FROM \"libertribes\".\"CASE\" WHERE occupant_id=".$_SESSION['djun_choisi']->id." ORDER BY id DESC";			//   => dernières cases créées par le Djun
					$results = $this->db_connexion->Requete( $sql);
					if($results){
						if(pg_num_rows($results)==1){
							$line = pg_fetch_array($results);
							$tableau["case_id"] = $line["id"];
						}
						else {
							$_SESSION['message-erreur'] = $this->traductions["impossible-recuperer-case-en-bdd"][$_SESSION['lang']].". <a href='index.php?page=jeu&espace=etoile'>".$this->traductions_debut['recommencer-operation'][$_SESSION['lang']].".</a>";
							header('Location: index.php?page=jeu&espace=colonisation');
							exit;						
						}
					}
					else {
						$_SESSION['message-erreur'] = $this->traductions["impossible-recuperer-case-en-bdd"][$_SESSION['lang']].". <a href='index.php?page=jeu&espace=etoile'>".$this->traductions_debut['recommencer-operation'][$_SESSION['lang']].".</a>";
						header('Location: index.php?page=jeu&espace=colonisation');
						exit;						
					}
				}					
			}
			elseif($condition2) {
				//    on a transmis l'id de la case déjà créée => déterminer ce qu'il faut en faire
				//   la case colonisée a été simplement initialisée dans la table CASE et son id a été récupéré
				if(isset($tableau["nom_village"])&&!empty($tableau["nom_village"])){
					//  on vient du formulaire de définition du village
					//  contrôle de l'existence du village dans la table VILLAGE
					$sql = "SELECT * FROM \"libertribes\".\"VILLAGE\" WHERE casa=".$tableau["case_id"];
					$res = $this->db_connexion->Requete( $sql);
					if(isset($res)&&!empty($res)&&pg_num_rows($res)==1){
						//   la création du village a été entamée dans la page actions (NB: la table CASES_TIMING aura été mise à jour également) => on continue
						$village = pg_fetch_array($res);
						$req = "UPDATE \"libertribes\".\"VILLAGE\" SET nom_village='".$tableau['nom_village']."', date_creation='".date('Y-m-d h:i:s')."' WHERE casa=".$tableau["case_id"];
						if($this->db_connexion->Requete( $req)){
							//   le village est associé à une case et possède un nom et une date de création: on peut l'initialiser et mettre à jour la table CASE							
							$this->initialiser_village($village->case_village,false);
						}
						else {
							$token = substr(str_shuffle(str_shuffle("abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQSRTUVWXYZ0123456789?+@#")),10,20);
							$_SESSION['token_colonisation'] = $token;
							$_SESSION['message-erreur'] = $this->traductions["creation-village-pas-lieu"][$_SESSION['lang']].". <a href='index.php?page=jeu&espace=colonisation&case_id=".$tableau["case_id"]."&token_colonisation=".$token."'>".$this->traductions_debut['recommencer-operation'][$_SESSION['lang']]."</a>";
							header('Location: index.php?page=jeu&espace=colonisation');
							exit;						
						}
					}
					else {
						//  le village n'existe pas encore
						$req = "INSERT into \"libertribes\".\"VILLAGE\"  (nom_village,avatar_iden,date_creation,casa) VALUES ('".$tableau['nom_village']."',".$_SESSION['djun_choisi']->id.",'".date('Y-m-d h:i:s')."',".$tableau['case_id'].")";
						if($this->db_connexion->Requete( $req)){
							$temps_changement = time();
							$sql = "INSERT INTO \"libertribes\".\"CASES_TIMING\" (temps_changement, case_id,type_changement,svg_cree) VALUES ('".$temps_changement."','".$tableau['case_id']."','ajout','".$svg_cree."')"; 			//   inscription dans la table CASES_TIMING
							
							
							
							
							$this->initialiser_village($tableau['case_id'],false);			//   si OK, redirige vers page_village, sinon, revient vers colonisation
						}
						else {
							$token = substr(str_shuffle(str_shuffle("abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQSRTUVWXYZ0123456789?+@#")),10,20);
							$_SESSION['token_colonisation'] = $token;
							$_SESSION['message-erreur'] = $this->traductions["creation-village-pas-lieu"][$_SESSION['lang']].". <a href='index.php?page=jeu&espace=colonisation&case_id=".$tableau["case_id"]."&token_colonisation=".$token."'>".$this->traductions_debut['recommencer-operation'][$_SESSION['lang']]."</a>";
							header('Location: index.php?page=jeu&espace=colonisation');
							exit;						
						}					
					}
				}
				elseif(isset($tableau["campement"])&&!empty($tableau["campement"])){
					//   concerne un campement de troupe ???
				}
				elseif(isset($tableau["nom_marche"])&&!empty($tableau["nom_marche"])){
					//   concerne un marche???
				}				
			}
			else {
				//  pas de données de case transmise
				
			}

		}			//   fin du test sur l'existence de messages d'erreur
		
		$this->AjouterContenu("contenu_carte", "contenus/page_jeu_colonisation_voir.php");	
		
	}
    	
    // -------------------------------------------------------------------------
    
    public function initialiser_village($village_casa,$boucle){
		/*
		*			Si boucle est true, on est dans le processus de vérification de l'initialisation de tous les villages
		*			Sinon, on initialise qu'une seul village, celui qu'on est en train de créer 
		*/
    	
    	/*   le village existe déjà en BDD avec son id, son nom, son avatar, sa date de création et l'id de la case associée
    	*		il faut définir tous les autres paramètres pour commencer 
    	*    les points de fer, bois et cyniam de départ sont fixés par les constantes POINTS_XXX_DEPART
    	*/
		include HOMEPATH.UTILPATH."taille_village.php";
		include HOMEPATH.UTILPATH."niveau_defense.php";
		foreach($_SESSION['races_possibles'] as $larace){
			if($larace->race_nom==$_SESSION['djun_choisi']->race){
				$paysans = round(POINTS_VIE_DEPART/$larace->vitalite_unite);
				break;
			}
		}
		$req = "UPDATE \"libertribes\".\"VILLAGE\" SET taille_village='".$taille_village."', niveau_defense=".$niveau_defense.", niveau_fer=".POINTS_FER_DEPART.", niveau_cyniam=".POINTS_CYNIAM_DEPART.", niveau_bois=".POINTS_BOIS_DEPART.", paysans=".$paysans."  WHERE casa=".$village_casa;      
		if($this->db_connexion->Requete( $req)){
			
			// mise à jour de la variable de session
			$nbr_villages = count($_SESSION['djun_choisi']->villages);
			$check_sess = $nbr_villages;
			for($i=0;$i<$nbr_villages ;$i++){
				if($_SESSION['djun_choisi']->villages[$i]->case_village==$village_casa){
					$check_sess=$i;
					break;
				}
			}		
			include HOMEPATH.MODELPATH."class_village.php";
			$req = "SELECT * FROM \"libertribes\".\"VILLAGE\"  WHERE casa=".$village_casa;
			$resultat = $this->db_connexion->Requete( $req);
			$row = pg_fetch_array($resultat);
			if(isset($row)&&!empty($row)){
				$_SESSION['djun_choisi']->villages[$check_sess] = new Village($row);
				//  mise à jour de la table CASE
				$req = "UPDATE \"libertribes\".\"CASE\" SET occupee_par = 'village', occupant_id =".$row['id'];
				if(!$this->db_connexion->Requete( $req)){
					$_SESSION['message-erreur'] = $this->traductions["erreur-update-table-case"][$_SESSION['lang']].". <a href='index.php?page=mise-a-jour-case&case_id=".$village_casa."&occupee_par=village&occupant_id=".$row['id']."'>".ucfirst($this->traductions['erreur-update-table-case'][$_SESSION['lang']])."</a>";
					header('Location: index.php?page=jeu&espace=colonisation');
					exit;				
				}				
			}
			if(!$boucle){
				header('Location: index.php?page=jeu&espace=village');
				exit;
			}
			else {
				$message="";
				return $message;
			}
		}
		else {
			if(!$boucle){
				$token = substr(str_shuffle(str_shuffle("abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQSRTUVWXYZ0123456789?+@#")),10,20);
				$_SESSION['token_colonisation'] = $token;
				$_SESSION['message-erreur'] = $this->traductions["village-non-initialise"][$_SESSION['lang']].". <a href='index.php?page=jeu&espace=colonisation&case_id=".$tableau["case_id"]."&token_colonisation=".$token."'>".ucfirst($this->traductions_debut['reessayez'][$_SESSION['lang']])."</a>";
				header('Location: index.php?page=jeu&espace=colonisation');
				exit;	
			}
			else {
				
				$message = $this->traductions["village-non-initialise"][$_SESSION['lang']].". <a href='index.php?page=jeu&espace=colonisation&case_id=".$tableau["case_id"]."&boucle=ok'>".ucfirst($this->traductions_debut['reessayez'][$_SESSION['lang']])."</a>";
				return $message;
			}					
	
		}
}	

    // -  Coloniser au hasard, dans la zone constructible 
    
    public function coloniser_au_hasard(){
    	//  "sous-traiter" à une fonction rangée dans les utilitaires
    	include HOMEPATH.UTILPATH."colonisation.php";
    	coloniser_au_hasard($this->db_connexion);
    	
    }
    
    // -------------------------------------------------------------------------
    
    public function entree_jeu(){
    	if(isset($_SESSION['djun_choisi']->mes_cases)&&!empty($_SESSION['djun_choisi']->mes_cases)){
    		//   le joueur a déjà des cases => afficher ses villages
    		header('Location: index.php?page=jeu&espace=village');
		   exit();    		
    	}
    	else {
    		//   le joueur n'a pas encore créer de village => afficher la carte en redirigeant
    		header('Location: index.php?page=jeu&espace=etoile');
		   exit();
    	}
    
    
    }
    

    // - Affichage de la page
    public function Afficher()
    {
      // - gestion spécifique de la page, si on est connecté
		if(isset($_SESSION['compte'])){
			
			// - on ajoute le contenu du menu à gauche
   	   		$this->AjouterContenu("contenu_menu", "contenus/page_jeu_menu.php");
			
			// - On récupère la variable de l'espace choisi
			if(isset($_GET['espace'])&&!empty($_GET['espace'])){
				$jeu_espace = $_GET['espace'];
		
		      if( $jeu_espace == "village" )
		      {
		        $jeu_type = $_GET['type'];
		
		        if ( $jeu_type == "vendre" )
		        {
		          // - redirection vers la page choix_vente
		          header('Location: index.php?page=choix_vente');
		          exit();
		        }
		
		        $this->charger_village();
		
		        if ( $jeu_type == "liste" )
		        {
		          // - redirection vers la page choix_vente
		          $this->charger_village_liste();
		        }
		
		      }
		
		      if( $jeu_espace == "quete" )
		      {
		        $this->charger_quete();
		      }
		
		      if( $jeu_espace == "commerce" )
		      {
		        $this->charger_commerce();
		      }
		
		      if( $jeu_espace == "batiment" )
		      {
		        $batiment_type = $_GET['type'];
		
		        $this->charger_village();
		
		        if ( $batiment_type == "construction" )
		        {
		          // - Création de quete
		          $_SESSION['batiment_type'] = $batiment_type;
			
	          	// - redirection vers la page choix_vente
	   	       	$this->charger_batiment_construction();
	    	    }
	    	    else
	    	    {
	    	      if ( $batiment_type == "amelioration" )
	    	      {
	    	        // - Création de quete
	    	        $_SESSION['batiment_type'] = $batiment_type;
		
		            // - redirection vers la page choix_vente
		            $this->charger_batiment_amelioration();
		          }
		          else
		          {
		            $this->charger_batiment();
		          }
		        }
		      }
		
		      if( $jeu_espace == "objet" )
		      {
		        $this->charger_village();
		        $this->charger_objet();
		      }
		
		      if( $jeu_espace == "hua" )
		      {
		        $this->charger_village();
		        $this->charger_hua();
		      }
		
		      if( $jeu_espace == "magie" )
		      {
		        $this->charger_village();
		        $this->charger_magie();
		      }
		
		      if( $jeu_espace == "science" )
		      {
		        $this->charger_village();
		        $this->charger_science();
		      }
		      
		      if( $jeu_espace == "etoile" )
		      {
		        $this->charger_carte();
		      }
		      
		      if($jeu_espace == "colonisation" )
				{
					if(isset($_SESSION['message-erreur'])&&!empty($_SESSION['message-erreur'])){
						$this->message = $_SESSION['message-erreur'];
					}
					$tableau = array();			
					//    on vient du formulaire de définition de colonisation
					if(isset($_POST['choix_colonisation_x'])&&!empty($_POST['choix_colonisation_x'])){
						//  on a choisi le type de colonisation à partir du script contenus/page_jeu_colonisation_voir.php, ie choix simple et direct à partir de la carte  
						if($_POST['type_colonisation']=="village"){
							//  colonisation de la case par un village
							if(isset($_POST['nom_village'])&&!empty($_POST['nom_village'])){
								$tableau["nom_village"] = htmlspecialchars($_POST['nom_village']);
							}		
							$tableau["case_id"]= $_POST['case_id'];			//   id de la case???  NON la case n'a pas encore été coloniée
						}
						elseif($_POST['type_colonisation']=="campement"){
							//  colonisation de la case par un campement de troupe
							//   en réflexion !!
							$this->message = "Page au stade gestatif ;)";
						}
						elseif($_POST['type_colonisation']=="livraison"){
							//  colonisation de la case par une livraison
							//   en réflexion !!
							$this->message = "Page au stade gestatif ;)";
						}
						elseif($_POST['type_colonisation']=="espionnage"){
							//  colonisation de la case par un espion
							//   en réflexion !!
							$this->message = "Page au stade gestatif ;)";
						}
						elseif($_POST['type_colonisation']=="attaque"){
							//  la case est attaquée
							//   en réflexion !!
							$this->message = "Page au stade gestatif ;)";
						}
						elseif($_POST['type_colonisation']=="marche"){
							//  colonisation de la case par un marché
							//   en réflexion !!
							$this->message = "Page au stade gestatif ;)";
						}
						else {
							//  problème avec l'option POST['type_colonisation']
							$this->message = "L'option n'existe pas !";
						}		
				
					}   //  FIN DE "choix direct à partir de la carte et du formulaire"

					else {
						//   simple affichage de message ou du formulaire de choix de colonisation directe
						//  s'il y a déjà un message, il y a eu une erreur ; sinon on continue
						if(!isset($this->message)||empty($this->message)){
							//  transmission de l'id de case par URL
							if(isset($_GET['case_id'])&&!empty($_GET['case_id'])){
								$tableau["case_id"]= $_GET['case_id'];
							}
							
							//  possibilité éventuelle d'accéder par coordonnées et terrain transmis, par la page des actions-case
							elseif(isset($_GET['terrain'])&&!empty($_GET['terrain'])&&isset($_GET['case'])&&!empty($_GET['case'])){
								$tableau["coord_case"] = urldecode($_GET["case"]);
								$tableau["terrain"] = $_GET["terrain"];
							}
						}     
					}
					//   transmission d'un token de sécurité pour la colonisation
					if(isset($_GET['token_colonisation'])&&isset($_SESSION['token_colonisation'])&&$_SESSION['token_colonisation']==$_GET['token_colonisation']){
						$tableau['token'] = "OK";
					} 	
		      		$this->coloniser($tableau);
		      }
			}
			
			// - On récupère la variable de l'action choisie
			elseif(isset($_GET['action'])&&!empty($_GET['action'])){
				if($_GET['action']=="colonisation-au-hasard"){
					$this->coloniser_au_hasard();
				}
			}
						
			else {
				$this->entree_jeu();
			}

		
   	   parent::Afficher();
   	   
     	}		//   fin du if sur le compte 
		else {
			header('Location: index.php?page=connexion&erreur=3');
			exit;
		}

    }// - Fin de la fonction Afficher
    
	public function getTraductions(){
    	$traductions["texte_erreur_creation_svg"] = array(
			"fr"=>"Le nouveau fichier image svg n'a pas pu être créé",
			"en"=>"The new SVG image file could not be created",
			"es"=>"El nuevo archivo de imagen SVG no se pudo crear",
			"de"=>"Die neue SVG-Image-Datei konnte nicht erstellt werden"
		);
		$traductions["texte_erreur_mise_en_bdd"] = array(
			"fr"=>"Problème: la mise à jour n'a pas pu être notée en base de données pour la case ",
			"en"=>"Problem: the update could not be recorded in database for the box ",
			"es"=>"Problema: la actualización no puede ser registrada en la base de datos para la caja ",
			"de"=>"Problem: Das Update konnte nicht in der Datenbank erfasst werden für die Box "
		);
		$traductions["texte_erreur_acces_changements"] = array(
			"fr"=>"Une erreur est survenue dans la mise en forme des changements de case",
			"en"=>"An error has occurred in setting up box changes",
			"es"=>"Se ha producido un error en la aplicación de los cambios de cajas",
			"de"=>""
		);
		$traductions["agriculteur"] = array(
			"fr"=>"agriculteur",
			"en"=>"",
			"es"=>"",
			"de"=>""
		);
		$traductions["guerrier-cac"] = array(
			"fr"=>"guerrier au corps-à-corps",
			"en"=>"",
			"es"=>"",
			"de"=>""
		);
		$traductions["guerrier-distant"] = array(
			"fr"=>"guerrier à distance",
			"en"=>"",
			"es"=>"",
			"de"=>""
		);
		$traductions["magie"] = array(
			"fr"=>"magie",
			"en"=>"",
			"es"=>"",
			"de"=>""
		);
		$traductions["chariots-guerre"] = array(
			"fr"=>"chariots de guerre",
			"en"=>"",
			"es"=>"",
			"de"=>""
		);
		$traductions["chariots-transport"] = array(
			"fr"=>"chariots de transport",
			"en"=>"",
			"es"=>"",
			"de"=>""
		);
		$traductions["invocations"] = array(
			"fr"=>"invocations",
			"en"=>"",
			"es"=>"",
			"de"=>""
		);
		$traductions["bois"] = array(
			"fr"=>"bois",
			"en"=>"",
			"es"=>"",
			"de"=>""
		);
		$traductions["metal"] = array(
			"fr"=>"métal",
			"en"=>"",
			"es"=>"",
			"de"=>""
		);
		$traductions["ceci-derniere-case"] = array(
			"fr"=>"Ceci est la dernière case visitée",
			"en"=>"",
			"es"=>"",
			"de"=>""
		);
		$traductions["activer-javascript"] = array(
			"fr"=>"Activez javascript sur votre navigateur",
			"en"=>"",
			"es"=>"",
			"de"=>""
		);
		$traductions["browser-no-canvas"] = array(
			"fr"=>"Votre navigateur ne supporte pas la balise canvas de HTML5.",
			"en"=>"Your browser does not support the HTML5 canvas tag.",
			"es"=>"",
			"de"=>""
		);
		$traductions["village-non-initialise"] = array(
			"fr"=>"L&#39;initialisation du village créé n&#39;a pas pu avoir lieu",
			"en"=>"",
			"es"=>"",
			"de"=>""
		);
		$traductions["erreur-update-table-case"] = array(
			"fr"=>"Erreur de mise à jour de la table CASE",
			"en"=>"Error in the update of the table CASE",
			"es"=>"",
			"de"=>""
		);
		$traductions["message_choix_colonisation"] = array(
			"fr"=>"Vous n&#39;avez pas encore de village. Il est temps de coloniser Hegoa et de déployer vos qualités de D&#39;jun. Vous pouvez choisir de faire confiance au hasard pour coloniser dans les zones constructibles, ou vous pouvez choisir votre emplacement. A vous de décider.",
			"en"=>"",
			"es"=>"",
			"de"=>""
		);

		$traductions["coloniser-au-hasard"] = array(
			"fr"=>"Coloniser au hasard",
			"en"=>"",
			"es"=>"",
			"de"=>""
		);
		$traductions["choisir-emplacement"] = array(
			"fr"=>"Choisir sur la carte",
			"en"=>"",
			"es"=>"",
			"de"=>""
		);
		$traductions["chargement-carte"] = array(
			"fr"=>"Un peu de patience, la carte se charge",
			"en"=>"",
			"es"=>"",
			"de"=>""
		);
		$traductions["manque-terrain-case"] = array(
			"fr"=>"Il manque le terrain de la case pour la colonisation",
			"en"=>"",
			"es"=>"",
			"de"=>""
		);
		$traductions["manque-coord-case"] = array(
			"fr"=>"Il manque les coordonnées de la case pour la colonisation",
			"en"=>"",
			"es"=>"",
			"de"=>""
		);
		$traductions["impossible-creer-case-en-bdd"] = array(
			"fr"=>"Erreur: impossible de créer la case en base de données.",
			"en"=>"",
			"es"=>"",
			"de"=>""
		);
		$traductions["impossible-recuperer-case-en-bdd"] = array(
			"fr"=>"Erreur: impossible de récupérer la case créée en base de données",
			"en"=>"",
			"es"=>"",
			"de"=>""
		);
		$traductions["creation-village-pas-lieu"] = array(
			"fr"=>"La création du village n&#39;a pas pu avoir lieu",
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
		$traductions[""] = array(
			"fr"=>"",
			"en"=>"",
			"es"=>"",
			"de"=>""
		);
		$traductions[""] = array(
			"fr"=>"",
			"en"=>"",
			"es"=>"",
			"de"=>""
		);
		$traductions[""] = array(
			"fr"=>"",
			"en"=>"",
			"es"=>"",
			"de"=>""
		);
		$traductions[""] = array(
			"fr"=>"",
			"en"=>"",
			"es"=>"",
			"de"=>""
		);
		
		return $traductions;
		
	}			//  Fin de la fonction getTraductions
	
}// - Fin de la classe

?>
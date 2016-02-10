<?php
// ======================================================================
// Auteurs : Donatien CELIA, Dominique Dehareng
// Licence : CeCILL v2
// ======================================================================

$connexion_incluse = 0;
$compte_inclus = 0;
$village_inclus = 0;
$avatar_inclus = 0;
$race_incluse = 0;
$caza_incluse = 0;
require_once HOMEPATH.MODELPATH."class_connexion.php";										//   on inclut la classe Connexion
$connexion_incluse = 1;
require_once HOMEPATH.MODELPATH."class_compte.php";										//   on inclut la classe Compte
$compte_inclus = 1;
require  HOMEPATH.MODELPATH."class_avatar.php";										//   on inclut la classe Avatar qui inclut les classes Connexion et Village
$avatar_inclus = 1;
if($village_inclus==0){
require HOMEPATH.MODELPATH."class_village.php";										//   on inclut la classe Village, qui inclut les classes Connexion, Avatar et Race
$village_inclus = 1;
}
if($race_incluse==0){
require HOMEPATH.MODELPATH."class_race.php";										//   on inclut la classe Race
$race_incluse = 1;
}
if($caza_incluse==0){
require   HOMEPATH.MODELPATH."class_caza.php";                                                       // - On inclut la class Caza; NB: on ne peut pas donner le nom Case car ça provoque un problème 
$caza_incluse=1;
}
require HOMEPATH.MODELPATH."class_terrain.php";										//   on inclut la classe Terrain

class Page
{
    // - Déclarations des variables
    private $strFonctionBodyOnLoad;

    private $bAfficherHeader;
    private $bAfficherMenu;
    private $bAfficherFooter;

    private $strNomPage;                                                        // - Nom de fichier de la page
    private $strTitrePage;                                                        // - Titre de la page (à dissocier du nom de page)
    private $tCSS;                                                              // Array
    private $tMenu;                                                             // Array
    private $tContenu;                                                          // Array

    protected $db_connexion	; 													//  objet Connexion
    
    protected $message;  			// contiendra les messages d'erreur ou autre ŕ transmettre aux contenus 
    
    protected $carte_x;				//   dans le jeu, contient l'abscisse x du point sélectionné à transmettre à la vue
    protected $carte_y;				//   dans le jeu, contient l'ordonnée y du point sélectionné à transmettre à la vue
    protected $nom_panneau;			//   nom du panneau image jpg à télécharger 
    protected $nom_panneau_codes;			//   nom du panneau svg-codes-couleurs à télécharger 
    protected $svg;								//   nom du panneau svg de cases à télécharger 
    protected $svgfileuri;			//   est un tableau qui contient les noms des 4 fichiers svg à charger
    protected $rayon_constructible;				//    rayon, en px, définissant la zone constructible autour du point de référence mis en BDD dans la table RAYON
    protected $case_reference;						//    case de référence définissant la zone constructible mis en BDD dans la table RAYON
    
    
    
    protected $traductions_debut;					//  contiendra les traductions associées à ce qui est commun
    protected $traductions;					//  contiendra les traductions associées à chaque contrôleur/page
    
    // - Constructeur
    function __construct()
    {
      $this->strFonctionBodyOnLoad = "";
      $this->bAfficherHeader  = 1;
      $this->bAfficherMenu    = 0;
      $this->bAfficherFooter  = 1;
		$this->db_connexion = new Connexion();
		$races_possibles = array();
      session_start();
      //  charger les races possibles et leurs caractéristiques, et les mettre en SESSION
      if(!isset($_SESSION['races_possibles'])||empty($_SESSION['races_possibles'])||!isset($_SESSION['races_possibles'][0]->nom)){
			$sql  = "SELECT * FROM \"libertribes\".\"RACE\"";
      		$result = $this->db_connexion->Requete( $sql );
      		if (isset($result)&&!empty( $result ))
      			{
      				$i=0;
      				while ($row = pg_fetch_array($result)) 
      					{
      						$races_possibles[$i] = new Race($row);
      						$i++;
      					}
      				$_SESSION['races_possibles']=$races_possibles;
      			}
      	}
      	//  charger les terrains possibles et leurs caractéristiques, et les mettre en SESSION
      if(!isset($_SESSION['terrains_possibles'])||empty($_SESSION['terrains_possibles'])||!isset($_SESSION['terrains_possibles'][0]->nom)){
			$sql  = "SELECT * FROM \"libertribes\".\"TERRAIN\"";
      		$result = $this->db_connexion->Requete( $sql );
      		if (isset($result)&&!empty( $result ))
      			{
      				$i=0;
      				while ($row = pg_fetch_array($result)) 
      					{
      						$terrains_possibles[$i] = new Terrain($row);
      						$i++;
      					}
      				$_SESSION['terrains_possibles']=$terrains_possibles;
      			}
      	}
      	
      	//  les traductions de début
      $this->traductions_debut = $this->getTraductionsDebut();
      
    }

// - Partie public
    public function SetNomPage( $strNomPagePar, $strTitrePagePar )
    {
      $this->strNomPage = $strNomPagePar;
      $this->strTitrePage = $strTitrePagePar;
    }

    public function SetFonctionBodyOnLoad( $strNomFonctionPar )
    {
      $this->strFonctionBodyOnLoad = $strNomFonctionPar;
    }

    public function SetAffichageHeader( $bAfficherPar )
    {
      $this->bAfficherHeader = $bAfficherPar;
    }

    public function SetAffichageMenu( $bAfficherPar )
    {
      $this->bAfficherMenu = $bAfficherPar;
    }

    public function SetAffichageFooter( $bAfficherPar )
    {
      $this->bAfficherFooter = $bAfficherPar;
    }



    // - Ajout d'un élément du menu
    public function AjouterCSS($nomCSSPar)
    {
      // - si le tableau est vide
      if ( ! isset( $this->tCSS ) )
      {
         $this->tCSS = array();
      }

      // - on ajoute l'élément
       $this->tCSS[$nomCSSPar] = "<link rel=\"stylesheet\" type=\"text/css\" href=\"./css/$nomCSSPar\" media=\"screen\" />";

    }

    // - Ajout d'un élément du menu
    public function AjouterMenu($nomPagePar, $strLibellePar)
    {
      // - si le tableau est vide
      if ( ! isset( $this->tMenu ) )
      {
         $this->tMenu = array();
      }

      // - on ajoute l'élément
       $this->tMenu[$nomPagePar] = $strLibellePar;

    }// - Fin de la fonction AjouterMenu

    // - Ajout d'un contenu
    public function AjouterContenu($nomContenuPar, $strFichierPar)
    {
      // - si le tableau est vide
      if ( ! isset( $this->tContenu ) )
      {
         $this->tContenu = array();
      }

      // - on ajoute l'élément
       $this->tContenu[$nomContenuPar] = $strFichierPar;

    }// - Fin de la fonction AjouterContenu

    // - Affichage du header de la page
    public function AfficherHeader()
    {
    	$userAgent = $_SERVER["HTTP_USER_AGENT"];
		if(strpos($userAgent,"Trident")||strpos($userAgent,"MSIE")){$browser = "ie";}
		elseif(strpos($userAgent,"Firefox")) {$browser = "firefox";}
		elseif(strpos($userAgent,"OPR")||strpos($userAgent,"Opera")) {$browser = "opera";}
		elseif(strpos($userAgent,"Chrome")) {$browser = "chrome";}
		elseif(strpos($userAgent,"Safari")) {$browser = "safari";}
		else {$browser = "chrome";}
		//    Spécifique à la page jeu
		$sections_width = RATIO_AFFICH_PANNEAU*LARGEUR_PANNEAU;
		$style_width_sections_jeu = "<style type='text/css'>section#plage_jeu_1, section#plage_jeu_2 {width:".round($sections_width)."px;}</style>";		
?>
      <html lang="<?php echo $_SESSION['lang'] ?>">
      <head>
        <title>LiberTribes - <?php echo $this->strTitrePage; ?></title>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
        <meta http-equiv="Pragma" content="no-cache">

        <link rel="stylesheet" type="text/css" href="./css/style.css" media="screen" />
        <?php
        if(isset($_GET['page'])&&$_GET['page']=="jeu"&&isset($_GET['espace'])&&$_GET['espace']=="etoile"){
        	echo $style_width_sections_jeu;
        }
        ?>
        
        <?php
        if($this->strNomPage=="accueil"){
        	//  on inclut ce qui concerne le player
        ?>
        <link rel="stylesheet" type="text/css" href="./css/style_player.css" media="screen" />
        
        <?php
        }
        ?>

<?php
      foreach ( $this->tCSS as $strNom => $strCSS)
      {
        echo "$strCSS\n";
      }
      //  on inclut ensuite tout ce qui est spécifique aux navigateurs 
?>
		<link rel="stylesheet" type="text/css" href="./css/style_specific_<?php echo $browser; ?>.css">
		
      </head>


<?php
      if ( $this->strFonctionBodyOnLoad != "" )
      {
        echo "<body onload=\"" . $this->strFonctionBodyOnLoad ."\">";
      }
      else
      {
        echo "<body>";
      }


      echo "<div id=\"page\">\n";

      if ( $this->bAfficherHeader == -1 )
      {
        echo "<div id=\"header_outside\">\n";

        include "contenus/header_outside.php";

        echo "</div>\n";
      }

      if ( $this->bAfficherHeader == 1 )
      {
        echo "<div id=\"header\">\n";

        include "contenus/header.php";

        echo "</div>\n";
      }

      echo "<div id=\"centre\">\n";
      
			if($this->strNomPage=="accueil"){
				//   si c'est la page d'accueil, on inclut le player
				
				include "contenus/player.php";
				
			}

      echo "<div id=\"contenu\">\n";
      
    }

    // - Affichage du footer de la page
    public function AfficherFooter()
    {
    	echo "</div>\n";                                                            // - fin de la balise contenu

      if ( $this->bAfficherMenu == 1 )
      {
        // - Gestion de l'affichage du menu
        foreach ( $this->tMenu as $strNom => $strLibelle)
        {
	        echo "<div id=\"menu_$strNom\"><a href=\"index.php?page=$strNom\" alt=\"$strLibelle\"><img src=\"./images/menu_{$strNom}.png\" /></a></div>\n";
        }
        
      }                                                            // - fin de la balise menu

      echo "</div>\n";                                                            // - fin de la balise centre

      if ( $this->bAfficherFooter == 1 )
      {
        echo "<div id=\"footer\">\n";
        echo "</div>\n";                                                            // - fin de la balise footer
      }

      echo "</div>\n";                                                            // - fin de la balise page

      echo "</body>\n";

      echo "</html>\n";
    }
    
    public function getTraductionsDebut(){

    	/*
    	 *   ====================
    	 *    Mots ou groupes de mots simples
    	 *   ====================
    	*/    	
    	
    	$traductions["Univers"] = array(
    		"fr" => "Univers",
			"en" => "Universe",
			"es" => "Universo",	
			"de" => "Universum"
			);
		$traductions["Medias"] = array(
			"fr" => "Médias",
			"en" => "Media",
			"es" => "Medios",	
			"de" => "Medien"
			);
		$traductions["News"] = array(
			"fr" => "Actualités",
			"en" => "News",
			"es" => "Noticias",	
			"de" => "Nachrichten"
			);
		$traductions["GalerieImages"] = array(
			"fr" => "Galerie d&#39;images",
			"en" => "Image Gallery",
			"es" => "Galería de imágenes",	
			"de" => "Fotogalerie"
			);
		$traductions["Videos"] = array(
			"fr" => "Vidéos",
			"en" => "Videos",
			"es" => "Videos",	
			"de" => "Videos"
			);
		$traductions["FondsEcran"] = array(
			"fr" => "Fonds d&#39;écran",
			"en" => "Wallpapers",
			"es" => "Fondos de pantalla",	
			"de" => "Hintergrundbilder"
			);
			
		$traductions["Histoire"] = array(
    		"fr"=>"Histoire",
    		"en"=>"History",
    		"es"=>"Historia",
    		"de"=>"Geschichte"
    	);
    	$traductions["humain"] = array(
    		"fr"=>"Les Humains",
    		"en"=>"The Humans",
    		"es"=>"Los Humanos",
    		"de"=>"Die Menschen"
    	);
    	$traductions["bunsif"] = array(
    		"fr"=>"Les Bunsifs",
    		"en"=>"The Bunsifs",
    		"es"=>"Los Bunsifs",
    		"de"=>"Die Bunsifs"
    	);
    	$traductions["sulmis"] = array(
    		"fr"=>"Les Sulmis",
    		"en"=>"The Sulmis",
    		"es"=>"Los Sulmis",
    		"de"=>"Die Sulmis"
    	);
    	$traductions["nimhsines"] = array(
    		"fr"=>"Les Nimhsinés",
    		"en"=>"The Nimhsinés",
    		"es"=>"Las Nimhsinés",
    		"de"=>"Die Nimhsinés"
    	);
    	$traductions["marais"] = array(
    		"fr"=>"marais",
    		"en"=>"",
    		"es"=>"",
    		"de"=>""
    	);
    	$traductions["montagnes"] = array(
    		"fr"=>"montagnes",
    		"en"=>"",
    		"es"=>"",
    		"de"=>""
    	);
    	$traductions["jungle"] = array(
    		"fr"=>"jungle",
    		"en"=>"",
    		"es"=>"",
    		"de"=>""
    	);
    	$traductions["collines"] = array(
    		"fr"=>"collines",
    		"en"=>"",
    		"es"=>"",
    		"de"=>""
    	);
    	$traductions["foret"] = array(
    		"fr"=>"forêt",
    		"en"=>"",
    		"es"=>"",
    		"de"=>""
    	);
    	$traductions["steppes"] = array(
    		"fr"=>"steppes",
    		"en"=>"",
    		"es"=>"",
    		"de"=>""
    	);
    	$traductions["toundra"] = array(
    		"fr"=>"toundra",
    		"en"=>"",
    		"es"=>"",
    		"de"=>""
    	);
    	$traductions["prairies"] = array(
    		"fr"=>"prairies",
    		"en"=>"",
    		"es"=>"",
    		"de"=>""
    	);
    	$traductions["desert"] = array(
    		"fr"=>"désert",
    		"en"=>"",
    		"es"=>"",
    		"de"=>""
    	);
    	$traductions["glaces"] = array(
    		"fr"=>"glaces",
    		"en"=>"",
    		"es"=>"",
    		"de"=>""
    	);
    	$traductions["littoral"] = array(
    		"fr"=>"littoral",
    		"en"=>"",
    		"es"=>"",
    		"de"=>""
    	);
    	$traductions["plaines"] = array(
    		"fr"=>"plaines",
    		"en"=>"",
    		"es"=>"",
    		"de"=>""
    	);
    	$traductions["eau"] = array(
    		"fr"=>"eau",
    		"en"=>"",
    		"es"=>"",
    		"de"=>""
    	);
    	$traductions["ici"] = array(
    		"fr"=>"ici",
    		"en"=>"here",
    		"es"=>"aquí",
    		"de"=>"hier"
    	);
    	$traductions["nom"] = array(
    		"fr"=>"nom",
    		"en"=>"name",
    		"es"=>"nombre",
    		"de"=>"Name"
    	);
    	$traductions["nom-de-famille"] = array(
    		"fr"=>"nom",
    		"en"=>"last name",
    		"es"=>"apellido",
    		"de"=>"Nachname"
    	);
    	$traductions["prenom"] = array(
    		"fr"=>"prénom",
    		"en"=>"first name",
    		"es"=>"nombre",
    		"de"=>"Name"
    	);
    	$traductions["peuple"] = array(
    		"fr"=>"peuple",
    		"en"=>"people",
    		"es"=>"pueblo",
    		"de"=>"Volk"
    	);
    	$traductions["guilde"] = array(
    		"fr"=>"guilde",
    		"en"=>"guild",
    		"es"=>"gremio",
    		"de"=>"Gilde"
    	);
    	$traductions["connexion"] = array(
    		"fr"=>"connexion",
    		"en"=>"connection",
    		"es"=>"conexión",
    		"de"=>"Anschluss"
    	);
    	$traductions["deconnexion"] = array(
    		"fr"=>"déconnexion",
    		"en"=>"disconnection",
    		"es"=>"desconexión",
    		"de"=>"Unterbrechung"
    	);
    	$traductions['attention-avertir'] = array(
    		"fr"=>"attention",
    		"en"=>"warning",
    		"es"=>"cuidado",
    		"de"=>"Vorsicht"
    	);
    	$traductions['ville'] = array(
    		"fr"=>"ville",
    		"en"=>"city",
    		"es"=>"ciudad",
    		"de"=>"Stadt"
    	);
    	$traductions['pays'] = array(
    		"fr"=>"pays",
    		"en"=>"country",
    		"es"=>"país",
    		"de"=>"Land"
    	);
    	$traductions['mot-de-passe'] = array(
    		"fr"=>"mot de passe",
    		"en"=>"password",
    		"es"=>"contraseña",
    		"de"=>"Passwort"
    	);
    	$traductions['suivant'] = array(
    		"fr"=>"suivant",
    		"en"=>"next",
    		"es"=>"",
    		"de"=>""
    	);
    	$traductions['precedent'] = array(
    		"fr"=>"précédent",
    		"en"=>"previous",
    		"es"=>"",
    		"de"=>""
    	);
    	$traductions['pages'] = array(
    		"fr"=>"pages",
    		"en"=>"pages",
    		"es"=>"páginas",
    		"de"=>"Seiten"
    	);
    	$traductions['jouer'] = array(
    		"fr"=>"jouer",
    		"en"=>"play",
    		"es"=>"jugar",
    		"de"=>"spielen"
    	);
    	$traductions['niveau'] = array(
    		"fr"=>"niveau",
    		"en"=>"level",
    		"es"=>"nivel",
    		"de"=>""
    	);
    	$traductions['agressivite'] = array(
    		"fr"=>"agressivité",
    		"en"=>"aggressiveness",
    		"es"=>"agresividad",
    		"de"=>""
    	);
    	$traductions['escroquerie'] = array(
    		"fr"=>"escroquerie",
    		"en"=>"fraud",
    		"es"=>"fraude",
    		"de"=>""
    	);
    	$traductions['efficacite'] = array(
    		"fr"=>"efficacité",
    		"en"=>"efficacy",
    		"es"=>"eficacia",
    		"de"=>""
    	);
    	$traductions['commerce'] = array(
    		"fr"=>"commerce",
    		"en"=>"trade",
    		"es"=>"comercio",
    		"de"=>""
    	);
    	$traductions['population'] = array(
    		"fr"=>"population",
    		"en"=>"",
    		"es"=>"",
    		"de"=>""
    	);
    	$traductions['naissances'] = array(
    		"fr"=>"naissances",
    		"en"=>"",
    		"es"=>"",
    		"de"=>""
    	);
    	$traductions['liste'] = array(
    		"fr"=>"liste",
    		"en"=>"",
    		"es"=>"",
    		"de"=>""
    	);
    	$traductions['vente'] = array(
    		"fr"=>"vente",
    		"en"=>"",
    		"es"=>"",
    		"de"=>""
    	);
    	$traductions[''] = array(
    		"fr"=>"",
    		"en"=>"",
    		"es"=>"",
    		"de"=>""
    	);
    	
    	
    	
    	//  Les verbes
    	$traductions['soumettre'] = array(
    		"fr"=>"soumettre",
    		"en"=>"submit",
    		"es"=>"presentar",
    		"de"=>"einreichen"
    	);
    	$traductions['envoyer'] = array(
    		"fr"=>"envoyer",
    		"en"=>"send",
    		"es"=>"enviar",
    		"de"=>"senden"
    	);
		$traductions['supprimer'] = array(
    		"fr"=>"supprimer",
    		"en"=>"remove",
    		"es"=>"quitar",
    		"de"=>"entfernen"
    	);
    	$traductions["cliquez"] = array(
    		"fr"=>"cliquez",
    		"en"=>"",
    		"es"=>"",
    		"de"=>""
    	);
    	$traductions["recommencez"] = array(
    		"fr"=>"recommencez",
    		"en"=>"",
    		"es"=>"",
    		"de"=>""
    	);
    	$traductions["reessayez"] = array(
    		"fr"=>"réessayez",
    		"en"=>"try again",
    		"es"=>"",
    		"de"=>""
    	);
    	
    	/*
    	 *   ====================
    	 *    Phrases diverses
    	 *   ====================
    	*/
    	
    	$traductions['recommencer-operation'] = array(
    		"fr"=>"Recommencez l&#39;opération",
    		"en"=>"",
    		"es"=>"",
    		"de"=>""
    	);
    	$traductions['retour-accueil'] = array(
    		"fr"=>"Retour à la page d&#39;accueil",
    		"en"=>"Back to homepage",
    		"es"=>"",
    		"de"=>""
    	);
    	$traductions['retour-tdb'] = array(
    		"fr"=>"Retour au tableau de bord",
    		"en"=>"",
    		"es"=>"",
    		"de"=>""
    	);
    	$traductions['retour-choix-peuple'] = array(
    		"fr"=>"Retour au choix du peuple",
    		"en"=>"",
    		"es"=>"",
    		"de"=>""
    	);
    	$traductions['retour-page-jeu'] = array(
    		"fr"=>"Retour à la page jeu",
    		"en"=>"",
    		"es"=>"",
    		"de"=>""
    	);
    	

    	/*
    	 *   ====================
    	 *    Messages d'erreur
    	 *   ====================
    	*/
    	$traductions['nous-sommes-desoles'] = array(
    		"fr"=>" nous sommes désolés",
    		"en"=>"",
    		"es"=>"",
    		"de"=>""
    	);    	
    	$traductions['probleme-non-identifie'] = array(
    		"fr"=>"Un problème non identifié est survenu",
    		"en"=>"",
    		"es"=>"",
    		"de"=>""
    	);   
    	$traductions['probleme-acces-bdd'] = array(
    		"fr"=>"Un problème d&#39;accès à la base de données est survenu",
    		"en"=>"",
    		"es"=>"",
    		"de"=>""
    	);   
    	$traductions['jeton-securite-incorrect'] = array(
    		"fr"=>"Le jeton de sécurité est incorrect",
    		"en"=>"",
    		"es"=>"",
    		"de"=>""
    	);   
    	$traductions['il-manque-votre-mot-de-passe'] = array(
    		"fr"=>"Il manque votre mot de passe",
    		"en"=>"",
    		"es"=>"",
    		"de"=>""
    	);   
    	
    	/*
    	*		===========================
    	*		Concerne les traductions dans les utilitaires
    	*		============================
    	*/
    	
    	/*
    	*			dans creer_village_et_case.php et check_zone_colonisation
    	*/
    	
    	$traductions["la-case-est-occupee-par-un"] = array(
    		"fr"=>"La case est occupée par un",
    		"en"=>"",
    		"es"=>"",
    		"de"=>""
    		);
    		$traductions["il-semble-que-mise-en-bdd-pas-lieu"] = array(
    		"fr"=>"Il semble que la mise en base de données n&#39;ait pas pu avoir lieu",
    		"en"=>"",
    		"es"=>"",
    		"de"=>""
	    	);
	    	$traductions["controlez-etat-case-en-cliquant"] = array(
    		"fr"=>"Contrôlez l&#39;état actuel de la case, en cliquant",
    		"en"=>"",
    		"es"=>"",
    		"de"=>""
    		);
    		$traductions["semble-initialisation-en-bdd-echoue-reinitialisez-clic"] = array(
    		"fr"=>"Il semble que l&#39;initialisation du village en base de données ait échoué. Réinitialisez en cliquant",
    		"en"=>"",
    		"es"=>"",
    		"de"=>""
    		);
    		$traductions["vous-avez-10-villages-et-limite"] = array(
    		"fr"=>"Vous avez déjà 10 villages et c&#39;est la limite",
    		"en"=>"",
    		"es"=>"",
    		"de"=>""
    		);
    	$traductions["la-case-est-deja-occupee"] = array(
    		"fr"=>"La case est déjà occupée",
    		"en"=>"",
    		"es"=>"",
    		"de"=>""
    		);    	
    	$traductions["en-dehors-zone-colonisable"] = array(
    		"fr"=>"Vous êtes au-delà du rayon de la zone colonisable",
    		"en"=>"",
    		"es"=>"",
    		"de"=>""
    		);  
   
    	
		return $traductions;
    }

    // - Affichage de la page
    public function Afficher()
    {unset($_SESSION['lang']);
		if(!isset($_SESSION['lang'])||empty($_SESSION['lang'])){
			$accept_lang = $_SERVER['HTTP_ACCEPT_LANGUAGE'];
			$lang = substr($accept_lang,0,2);
			//   Ceci sera OK quand toutes les langues seront implémentées
			if($lang!="fr"||$lang!="en"||$lang!="es"||$lang!="de"){
				$lang = "en";
			}
			//   Actuellement, seul le fr est implémenté =>
			$lang = "fr";
			$_SESSION['lang'] = $lang;
		}
		
    	echo "<!DOCTYPE html>";
      $this->AfficherHeader();
      
      //   message d'erreur éventuel , à afficher dans une vue
		if(isset($this->message)){$message = $this->message;}
		
		//  coordonnées éventuelles du point sélectionné, avec le nom du panneau à télécharger
		if(isset($this->carte_x)){
			$carte_x = $this->carte_x;
			$carte_y = $this->carte_y;
			$nom_panneau = $this->nom_panneau;
			$nom_panneau_codes = $this->nom_panneau_codes;
		}
		
		//  On récupère les traductions définies
      // - On inclut les contenu
      foreach ( $this->tContenu as $strNomContenu => $strFichier)
      {
        include "$strFichier";
      }

      $this->AfficherFooter();
    }// - Fin de la fonction Afficher

}// - Fin de la classe

?>
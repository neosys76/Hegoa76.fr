<?php
// ======================================================================
// Auteurs : Donatien CELIA, Dominique Dehareng
// Licence : CeCILL v2
// ======================================================================

$connexion_incluse = 0;
$compte_inclus = 0;
$avatar_inclus = 0;
$village_inclus = 0;
$avatar_inclus = 0;
$race_incluse = 0;

require_once "modeles/class_connexion.php";										//   on inclut la classe Connexion
$connexion_incluse = 1;
require_once "modeles/class_compte.php";										//   on inclut la classe Compte
$compte_inclus = 1;
require  "modeles/class_avatar.php";										//   on inclut la classe Avatar qui inclut les classes Connexion et Village
$avatar_inclus = 1;
if($village_inclus==0){
require "modeles/class_village.php";										//   on inclut la classe Village, qui inclut les classes Connexion, Avatar et Race
$village_inclus = 1;
}
if($race_incluse==0){
require "modeles/class_race.php";										//   on inclut la classe Race
$race_incluse = 1;
}
require "modeles/class_terrain.php";										//   on inclut la classe Terrain

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
    protected $nom_panneau;			//   nom du panneau à télécharger 
    
    
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
?>
      <html lang="fr">
      <head>
        <title>LiberTribes - <?=$this->strTitrePage?></title>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
        <meta http-equiv="Pragma" content="no-cache">

        <link rel="stylesheet" type="text/css" href="./css/style.css" media="screen" />
        
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

    // - Affichage de la page
    public function Afficher()
    {echo "<!DOCTYPE html>";
      $this->AfficherHeader();
      
      //   message d'erreur éventuel , à afficher dans une vue
		if(isset($this->message)){$message = $this->message;}
		
		//  coordonnées éventuelles du point sélectionné, avec le nom du panneau à télécharger
		if(isset($this->carte_x)){
			$carte_x = $this->carte_x;
			$carte_y = $this->carte_y;
			$nom_panneau = $this->nom_panneau;
		}

      // - On inclut les contenu
      foreach ( $this->tContenu as $strNomContenu => $strFichier)
      {
        include "$strFichier";
      }

      $this->AfficherFooter();
    }// - Fin de la fonction Afficher

}// - Fin de la classe

?>
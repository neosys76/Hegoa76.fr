<?php
// ======================================================================
// Auteurs : Donatien CELIA, Dominique Dehareng
// Licence : CeCILL v2
// ======================================================================

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

    private $db_connect;
    
    protected $message;  			// contiendra les messages d'erreur ou autre ŕ transmettre aux contenus 

    // - Constructeur
    function __construct()
    {
      $this->strFonctionBodyOnLoad = "";
      $this->bAfficherHeader  = 1;
      $this->bAfficherMenu    = 1;
      $this->bAfficherFooter  = 1;

      session_start();
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

    public function ConnecterBD( )
    {
      // - Connexion à la BD
      include "constantes.inc.php";
      // - connexion à la base de données
      $this->db_connect = pg_connect("host=".HOSTNAME." dbname=".BASE." user=".LOGIN." password=".PASSWORD);

    }

    public function Requete( $strSQLPar )
    {
      // retourne une ressource
      return pg_query($this->db_connect, $strSQLPar);
    }

    public function RequeteNbLignes( $strSQLPar )
    {
      // retourne une ressource
      $result = pg_query($this->db_connect, $strSQLPar);

      return pg_num_rows( $result );
    }

    public function AfficherRequete( $resultPar )
    {
      if ($resultPar)
      {
        while ($row = pg_fetch_row($resultPar))
        {
          foreach( $row as $cle => $valeur )
          {
            echo "$cle = $valeur ";

          }
          echo "<br />\n";
        }// - Fin du while
      }
      else
      {
        echo "AfficherRequete : pas de Ressource.\n";
      }

    }

    // - Affichage du header de la page
    public function AfficherHeader()
    {

?>
      <!DOCTYPE html>
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
?>
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
    {
      $this->AfficherHeader();
      //   message d'erreur éventuel , à afficher dans une vue
		$message = $this->message;
      // - On inclut les contenu
      foreach ( $this->tContenu as $strNomContenu => $strFichier)
      {
        include "$strFichier";
      }

      $this->AfficherFooter();
    }// - Fin de la fonction Afficher

}// - Fin de la classe

?>
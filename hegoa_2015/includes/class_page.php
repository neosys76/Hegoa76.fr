<?php
// ======================================================================
// Auteur : Donatien CELIA
// Licence : CeCILL v2
// ======================================================================

class Page
{
    // - Déclarations des variables
    private $strFonctionBodyOnLoad;

    private $bAfficherHeader;
    private $bAfficherMenu;
    private $bAfficherFooter;

    private $strNomPage;                                                        // - Nom de la page
    private $tCSS;                                                              // Array
    private $tMenu;                                                             // Array
    private $tContenu;                                                          // Array

    private $db_connect;
    
    protected $message;  			// contiendra les messages d'erreur ou autre à transmettre aux contenus 

    // - Constructeur
    function __construct()
    {
      $this->strFonctionBodyOnLoad = "";
      $this->bAfficherHeader  = 1;
      $this->bAfficherMenu    = 1;
      $this->bAfficherFooter  = 1;


      session_cache_expire(30);                                                 // 30 minutes de session
      session_start();
    }

// - Partie public
    public function SetNomPage( $strNomPagePar )
    {
      $this->strNomPage = $strNomPagePar;
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
      //$db_connect     = mysql_connect(HOSTNAME, LOGIN, PASSWORD);
      //$base_selection	= mysql_select_db(BASE, $db_connect);
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

//      <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
//      <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr-FR" lang="fr-FR">
?>
      <!DOCTYPE html>
      <html lang="fr">
      <head>
        <title>LiberTribes - Nom de la page : <?=$this->strNomPage?></title>
        <meta http-equiv="Content-type" content="text/html;charset=ISO-8859-1" />
        <meta name="author" content="Dominique Dehareng" />
        <meta http-equiv="Pragma" content="no-cache">

        <link rel="stylesheet" type="text/css" href="./css/style.css" media="screen" />

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

      echo "<div id=\"contenu\">\n";
    }

    // - Affichage du footer de la page
    public function AfficherFooter()
    {
      echo "</div>\n";                                                            // - fin de la balise contenu

      if ( $this->bAfficherMenu == 1 )
      {
        //echo "<div id=\"menu\">\n";

        // - Gestion de l'affichage du menu
        foreach ( $this->tMenu as $strNom => $strLibelle)
        {
          //echo "<div id=\"menu_$strNom\"><a href=\"index.php?page=$strNom\">$strLibelle</a></div>\n";
	        echo "<div id=\"menu_$strNom\"><a href=\"index.php?page=$strNom\" alt=\"$strLibelle\"><img src=\"./images/menu_{$strNom}.png\" /></a></div>\n";
        }
        //echo "</div>\n";
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
      //   message d'erreur éventuel , à afficher dans une des vues
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
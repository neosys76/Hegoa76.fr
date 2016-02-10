<?php
// ======================================================================
// Auteur : Donatien CELIA
// Licence : CeCILL v2
// ======================================================================

error_reporting(E_ALL);

require "class_page.php";                                              // - On inclut la class Page

class PageUniversSulmis extends Page
{
    function __construct()
    {
      // - on appele le constructeur du parent
      parent::__construct();

      // - on renseigne qq infos du parent
      parent::SetNomPage( "univers_sulmis","Univers - les sulmis");
      parent::SetAffichageHeader( -1 );
      parent::SetAffichageFooter( 0 );
      $this->traductions = $this->getTraductions();

      $this->AjouterCSS("page_univers_sulmis.css");

      // - on ajoute les contenus utiles
      $this->AjouterContenu("contenu", "contenus/page_univers_sulmis.php");

      // - on ajoute les menus utiles

    }

    // - Affichage de la page
    public function Afficher()
    {
      parent::Afficher();
    }// - Fin de la fonction Afficher
    
    public function getTraductions(){
    	$traductions["presentation-sulmis"] = array(
    		"fr"=>"N&eacute;s d&#39;une incantation magique, les Sulmis apparaissent au monde sur les ruines du massacre perp&eacute;tr&eacute; par le terrible &quot;Nilbrock&quot;. De grande taille, ces &ecirc;tres &agrave; la crois&eacute;e de l&#39;homme et du scorpion, extr&eacute;mement r&eacute;sistants gr&acirc;ce &agrave; la carapace qui les enveloppe, sont pourvus d&#39;une queue qui s&#39;av&egrave;re &ecirc;tre une arme redoutable. Ils communiquent entre eux gr&acirc;ce &agrave; leurs mandibules et aux capteurs olfactifs diss&eacute;min&eacute;s sous leur carapace. De par leur histoire, les Sulmis &eacute;x&egrave;crent la violence bien qu&#39;ils n&#39;h&eacute;sitent pas &agrave; se défendre, pr&eacute;f&eacute;rant ainsi utiliser la diplomatie dans les conflits. C&#39;est un peuple qui voue sa vie &agrave; la connaissance : f&eacute;rus d&#39;histoire, de philosophie et de politique, leur organisation en castes d&eacute;veloppe et enrichit les talents de chacun. Les Sulmis terminent leur vie par la r&eacute;daction d&#39;ouvrages qui relatent leurs v&eacute;cus et leurs exp&eacute;riences. Attach&eacute;s &agrave; la spiritualit&eacute;, ils croient en Molsrreft, &quot;celui qui est, celui qui offre&quot;.",
    		"en"=>"",
    		"es"=>"",
    		"de"=>""
    	);

    	
    	return $traductions;
    }

}// - Fin de la classe

?>
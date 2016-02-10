<?php
// ======================================================================
// Auteur : Donatien CELIA
// Licence : CeCILL v2
// ======================================================================

error_reporting(E_ALL);

require "class_page.php";                                              // - On inclut la class Page

class PageUniversHumain extends Page
{
    function __construct()
    {
      // - on appele le constructeur du parent
      parent::__construct();

      // - on renseigne qq infos du parent
      parent::SetNomPage( "univers_humain","Univers - les humains");
      parent::SetAffichageHeader( -1 );
      parent::SetAffichageFooter( 0 );
      $this->traductions = $this->getTraductions();

      $this->AjouterCSS("page_univers_humain.css");

      // - on ajoute les contenus utiles
      $this->AjouterContenu("contenu", "contenus/page_univers_humain.php");

      // - on ajoute les menus utiles

    }

    // - Affichage de la page
    public function Afficher()
    {
      parent::Afficher();
    }// - Fin de la fonction Afficher
    
    public function getTraductions(){
    	$traductions["presentation-humains"] = array(
    		"fr"=>"Le peuple humain est le premier &agrave; avoir habit&eacute; H&eacute;goa. Ils ressemblent aux humains que nous connaissons mis &agrave; part leurs tatouages fait de Cyniam. Ils sont r&eacute;alis&eacute;s comme ceux du premier homme qui a &eacute;t&eacute; en relation avec le Djun &quot;Gjiure&quot;. Ceux-ci leurs permettent de contr&ocirc;ler leurs technologies, qui associent la m&eacute;canique et la nature gr&acirc;ce &agrave; la magie produite par le Cyniam, et leur enseignent comment le trouver ainsi que l&#39;exploiter. Lors de leurs recherches avec les Bunsifs pour d&eacute;geler H&eacute;goa, ils ont cr&eacute;&eacute; des animaux, &quot;les B&eacute;lims&quot;. Un B&eacute;lim cale sa gestation avec celle de son maître pour que leur enfant voit le jour en m&ecirc;me temps et ainsi unir leurs destins. Ils vivent dans des huttes solides, en bois ou en pierre, qui se fondent dans la nature.  Leur soci&eacute;t&eacute; est r&eacute;gie par les anciens qui vont partager leurs exp&eacute;riences et leurs savoirs avec les nouvelles g&eacute;n&eacute;rations. Ils ma&icirc;trisent la magie.",
    		"en"=>"",
    		"es"=>"",
    		"de"=>""
    	);

    	
    	return $traductions;
    }

}// - Fin de la classe

?>
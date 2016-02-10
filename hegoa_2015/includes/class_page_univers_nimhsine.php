<?php
// ======================================================================
// Auteur : Donatien CELIA
// Licence : CeCILL v2
// ======================================================================

error_reporting(E_ALL);

require "class_page.php";                                              // - On inclut la class Page

class PageUniversNimhsine extends Page
{
    function __construct()
    {
      // - on appele le constructeur du parent
      parent::__construct();

      // - on renseigne qq infos du parent
      parent::SetNomPage( "univers_nimhsine","Univers - les nihmsynés");
      parent::SetAffichageHeader( -1 );
      //parent::SetAffichageMenu( 0 );
      parent::SetAffichageFooter( 0 );
      $this->traductions = $this->getTraductions();

      $this->AjouterCSS("page_univers_nimhsine.css");

      // - on ajoute les contenus utiles
      $this->AjouterContenu("contenu", "contenus/page_univers_nimhsine.php");

      // - on ajoute les menus utiles
      //$this->AjouterMenu("inscription","Inscription");
      //$this->AjouterMenu("connexion","Connexion");
    }

    // - Affichage de la page
    public function Afficher()
    {
      parent::Afficher();
    }// - Fin de la fonction Afficher
    
    public function getTraductions(){
    	$traductions["presentation-nimhsines"] = array(
    		"fr"=>"Lors de l&#39;&nbsp;Eqyast, les humains et les Sulmis ont &eacute;t&eacute; contraints de se retrancher dans les souterrains d&#39;&nbsp;H&eacute;goa. Dans leur laboratoire, ils ont cherch&eacute; une solution pour d&eacute;geler leur plan&egrave;te et vont r&eacute;ussir &agrave; cr&eacute;er un v&eacute;g&eacute;tal intelligent : les Nimhsin&eacute;. Elles sont fertiles et tr&egrave;s r&eacute;sistantes aux intemp&eacute;ries. Leur faiblesse est d&#39;&ecirc;tre fr&ecirc;les physiquement. Malgr&eacute; un aspect diff&eacute;rent selon leur graine d&#39;origine, elles ont deux particularit&eacute;s communes : une grande main avec cinq doigts ac&eacute;r&eacute;s ainsi que des racines afin de se mouvoir et d&#39;extraire le Cyniam pour sa magie. Pour se reproduire, deux Nimhsin&eacute;s se pol&eacute;nisent et enterrent la graine f&eacute;cond&eacute;e. Sa germination va d&eacute;geler H&eacute;goa. Elles communiquent oralement. Leur nature sauvage leur donne la r&eacute;putation d&#39;&ecirc;tre aggressives et virulentes. Elles vivent dans le respect et l&#39;ob&eacute;issance de leurs a&icirc;n&eacute;s. Leur science du vivant leur permet de faire pousser leur habitat.",
    		"en"=>"",
    		"es"=>"",
    		"de"=>""
    	);

    	
    	return $traductions;
    }

}// - Fin de la classe

?>
<?php
// ======================================================================
// Auteur : Donatien CELIA
// Licence : CeCILL v2
// ======================================================================

error_reporting(E_ALL);

require "class_page.php";                                              // - On inclut la class Page

class PageUniversBunsif extends Page
{
    function __construct()
    {
      // - on appele le constructeur du parent
      parent::__construct();

      // - on renseigne qq infos du parent
      parent::SetNomPage( "univers_bunsif","Univers - les bunsifs");
      parent::SetAffichageHeader( -1 );
      parent::SetAffichageFooter( 0 );
      $this->traductions = $this->getTraductions();

      $this->AjouterCSS("page_univers_bunsif.css");

      // - on ajoute les contenus utiles
      $this->AjouterContenu("contenu", "contenus/page_univers_bunsif.php");

      // - on ajoute les menus utiles

    }

    // - Affichage de la page
    public function Afficher()
    {
      parent::Afficher();
    }// - Fin de la fonction Afficher
    
    public function getTraductions(){
    	$traductions["presentation-bunsifs"] = array(
    		"fr"=>"A l&#39;origine, les Bunsifs &eacute;taient des machines, créées par les Naelys afin de se lib&eacute;rer de certaines t&acirc;ches. Contr&ocirc;l&eacute;s par les Naelys gr&acirc;ce &agrave; la conscience commune, celle-ci permit aux Bunsifs de passer du statut de machines serviles &agrave; celui de machines dou&eacute;es d&#39;intelligence. Selon la l&eacute;gende, l&#39;extinction des Naelys permit aux Bunsifs de se lib&eacute;rer du joug de la conscience commune, et ainsi d&#39;acqu&eacute;rir une v&eacute;ritable ind&eacute;pendance. Naturellement r&eacute;sistants car compos&eacute;s de silice, leur corps est recouvert de cristaux qui agissent comme r&eacute;cepteurs et &eacute;metteurs d&#39;ondes, leur permettant ainsi de communiquer entre eux. Leur coeur est anim&eacute; par une r&eacute;action nucl&eacute;aire, celle ci conf&egrave;re aux Bunsifs une telle long&eacute;vit&eacute; que nul ne parvient &agrave; la mesurer. Bien qu&#39;il ma&icirc;trisent tous les langages, les Bunsifs pr&eacute;f&egrave;rent vivre entre eux. Malgr&eacute; tout, b&acirc;tisseurs dans l&#39;&acirc;me ils aiment participer à la r&eacute;alisation de grands &eacute;difices. Fins strat&egrave;ges militaires, cette qualit&eacute; compense une certaine sensibilit&eacute; &agrave; la magie",
    		"en"=>"",
    		"es"=>"",
    		"de"=>""
    	);
    	
    	return $traductions;
    }

}// - Fin de la classe

?>
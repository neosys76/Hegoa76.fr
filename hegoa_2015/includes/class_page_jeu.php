<?php
// ======================================================================
// Auteur : Donatien CELIA
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
      parent::SetAffichageMenu( 1 );
      parent::SetAffichageFooter( 0 );

      $this->AjouterCSS("page_jeu.css");

      // - on ajoute les contenus utiles
      $this->AjouterContenu("contenu", "contenus/page_jeu.php");
    }
    // -------------------------------------------------------------------------

    public function charger_village()
    {
      // - Initialisation
      $village_nom                = "Nom du village";

      $village_mana               = 0;
      $village_cyniam             = 0;
      $village_bois               = 0;
      $village_metal              = 0;

      $village_population         = 0;
      $village_naissance          = 0;
      $village_naissance_temps    = 0;

      $village_agriculteur        = 0;
      $village_guerrier_cac       = 0;
      $village_guerrier_distance  = 0;
      $village_mage               = 0;
      $village_chariot_guerre     = 0;
      $village_chariot_transport  = 0;
      $village_invoc_magique      = 0;

      // - Chargement des données du village


      //
      $_SESSION['village_nom']                = $village_nom;
      $_SESSION['village_mana']               = $village_mana;
      $_SESSION['village_cyniam']             = $village_cyniam;
      $_SESSION['village_bois']               = $village_bois;
      $_SESSION['village_metal']              = $village_metal;

      $_SESSION['village_population']         = $village_population;
      $_SESSION['village_naissance']          = $village_naissance;
      $_SESSION['village_naissance_temps']    = $village_naissance_temps;

      $_SESSION['village_agriculteur']        = $village_agriculteur;
      $_SESSION['village_guerrier_cac']       = $village_guerrier_cac;
      $_SESSION['village_guerrier_distance']  = $village_guerrier_distance;
      $_SESSION['village_mage']               = $village_mage;
      $_SESSION['village_chariot_guerre']     = $village_chariot_guerre;
      $_SESSION['village_chariot_transport']  = $village_chariot_transport;
      $_SESSION['village_invoc_magique']      = $village_invoc_magique;



      // - on ajoute le contenu du panneau
      $this->AjouterCSS("page_jeu_village.css");
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
      $type = $_GET['type'];                                                        // On recupère le type de quête

      // - Quel type ?
      if ($type == "create")
      {
        // - Création de quete
        $_SESSION['quete_type'] = $type;

        // - on ajoute le contenu du panneau
        $this->AjouterCSS("page_jeu_quete_creer.css");
        $this->AjouterContenu("contenu_quete", "contenus/page_jeu_quete_creer.php");
      }
      else
      {
        // - Quel type ?
        if ($type == "read")
        {
          // - Création de quete
          $_SESSION['quete_type'] = $type;

          // - on ajoute le contenu du panneau
          $this->AjouterCSS("page_jeu_quete_lire.css");
          $this->AjouterContenu("contenu_quete", "contenus/page_jeu_quete_lire.php");
        }
        else
        {
          // - Les listes de quetes
          if ($type == "list_create")
          {
            // - Onglet create
            $_SESSION['quete_type'] = $type;
          }
          else
          {
            if ($type == "list_finish")
            {
              // - Onglet finish
              $_SESSION['quete_type'] = $type;
            }
            else
            {
              // - Onglet current (par défaut)
              $_SESSION['quete_type'] = "list_current";
            }
          }

          // - on ajoute le contenu du panneau
          $this->AjouterCSS("page_jeu_quete.css");
          $this->AjouterContenu("contenu_quete", "contenus/page_jeu_quete.php");
        }
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
/*
      // - On charge la liste des batiments (en dur pour moment )
      // - On récupère les données
      $sql  = "SELECT batiment_id, titre, image, info, livre, is_active";
      $sql .= " FROM \"libertribes\".\"BATIMENT\"";
      $sql .= " WHERE djun_id  = $djun_id";
      $sql .= " AND village_id = $village_id";

      $result = parent::Requete( $sql );
      if ($result)
      {
        $iCpt = 0;
        while ($row = pg_fetch_row($result) )
        {
          // - on stocke les batiments
          $_SESSION['batiment_id'][$iCpt]     = $row[0];
          $_SESSION['batiment_titre'][$iCpt]  = $row[1];
          $_SESSION['batiment_image'][$iCpt]  = $row[2];
          $_SESSION['batiment_info'][$iCpt]   = $row[3];
          $_SESSION['batiment_livre'][$iCpt]  = $row[4];
          $_SESSION['batiment_actif'][$iCpt]  = $row[5];

          $iCpt++;
        }

        $_SESSION['batiment_compteur'] = $iCpt;
      }
*/
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

    // - Affichage de la page
    public function Afficher()
    {
      // - On récupčre la variable de l'espace choisi
      $jeu_espace = $_GET['espace'];
      $_SESSION['jeu_espace'] =  $jeu_espace;

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


      // - on ajoute le contenu du menu à gauche
      $this->AjouterContenu("contenu_menu", "contenus/page_jeu_menu.php");

      parent::Afficher();

      // - gestion spécifique de la page

    }// - Fin de la fonction Afficher

}// - Fin de la classe

?>
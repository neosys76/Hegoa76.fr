<?php
// ======================================================================
// Auteur : Donatien CELIA
// Licence : CeCILL v2
// ======================================================================

// - Chargement de la liste des sciences
      // - On récupère les informations nécessaires
      $account_id = $_SESSION['djun_id'];
      $village_id = $_SESSION['village_id'];

      // - Initialisation
      $_SESSION['science_id']    = array();
      $_SESSION['science_titre'] = array();
      $_SESSION['science_image'] = array();
      $_SESSION['science_info']  = array();
      $_SESSION['science_livre'] = array();
      $_SESSION['science_is_active'] = array();


      $iCpt = 0;
      // - on stocke les messages
      $_SESSION['science_id'][$iCpt]     = $iCpt;
      $_SESSION['science_titre'][$iCpt]  = "titre" . $iCpt;
      $_SESSION['science_image'][$iCpt]  = "images/jeu/science/science_locked.png";
      $_SESSION['science_info'][$iCpt]   = 1;
      $_SESSION['science_livre'][$iCpt]  = 1;
      $_SESSION['science_actif'][$iCpt]  = 0;
      $iCpt++;

      $_SESSION['science_id'][$iCpt]     = $iCpt;
      $_SESSION['science_titre'][$iCpt]  = "titre" . $iCpt;
      $_SESSION['science_image'][$iCpt]  = "images/jeu/science/science_locked.png";
      $_SESSION['science_info'][$iCpt]   = 1;
      $_SESSION['science_livre'][$iCpt]  = 1;
      $_SESSION['science_actif'][$iCpt]  = 0;
      $iCpt++;

      $_SESSION['science_id'][$iCpt]     = $iCpt;
      $_SESSION['science_titre'][$iCpt]  = "titre" . $iCpt;
      $_SESSION['science_image'][$iCpt]  = "images/jeu/science/science_locked.png";
      $_SESSION['science_info'][$iCpt]   = 1;
      $_SESSION['science_livre'][$iCpt]  = 1;
      $_SESSION['science_actif'][$iCpt]  = 0;
      $iCpt++;

      $_SESSION['science_id'][$iCpt]     = $iCpt;
      $_SESSION['science_titre'][$iCpt]  = "titre" . $iCpt;
      $_SESSION['science_image'][$iCpt]  = "images/jeu/science/science_locked.png";
      $_SESSION['science_info'][$iCpt]   = 1;
      $_SESSION['science_livre'][$iCpt]  = 1;
      $_SESSION['science_actif'][$iCpt]  = 0;
      $iCpt++;

      $_SESSION['science_id'][$iCpt]     = $iCpt;
      $_SESSION['science_titre'][$iCpt]  = "titre" . $iCpt;
      $_SESSION['science_image'][$iCpt]  = "images/jeu/science/science_locked.png";
      $_SESSION['science_info'][$iCpt]   = 1;
      $_SESSION['science_livre'][$iCpt]  = 1;
      $_SESSION['science_actif'][$iCpt]  = 0;
      $iCpt++;

      $_SESSION['science_id'][$iCpt]     = $iCpt;
      $_SESSION['science_titre'][$iCpt]  = "titre" . $iCpt;
      $_SESSION['science_image'][$iCpt]  = "images/jeu/science/science_locked.png";
      $_SESSION['science_info'][$iCpt]   = 1;
      $_SESSION['science_livre'][$iCpt]  = 1;
      $_SESSION['science_actif'][$iCpt]  = 0;
      $iCpt++;

      $_SESSION['science_id'][$iCpt]     = $iCpt;
      $_SESSION['science_titre'][$iCpt]  = "titre" . $iCpt;
      $_SESSION['science_image'][$iCpt]  = "images/jeu/science/science_locked.png";
      $_SESSION['science_info'][$iCpt]   = 1;
      $_SESSION['science_livre'][$iCpt]  = 1;
      $_SESSION['science_actif'][$iCpt]  = 0;
      $iCpt++;

      $_SESSION['science_id'][$iCpt]     = $iCpt;
      $_SESSION['science_titre'][$iCpt]  = "titre" . $iCpt;
      $_SESSION['science_image'][$iCpt]  = "images/jeu/science/science_locked.png";
      $_SESSION['science_info'][$iCpt]   = 1;
      $_SESSION['science_livre'][$iCpt]  = 1;
      $_SESSION['science_actif'][$iCpt]  = 0;
      $iCpt++;

      $_SESSION['science_compteur'] = $iCpt;
/*
      // - On charge la liste des sciences (en dur pour moment )
      // - On récupère les données
      $sql  = "SELECT science_id, titre, image, info, livre, is_active";
      $sql .= " FROM \"libertribes\".\"SCIENCE\"";
      $sql .= " WHERE djun_id  = $djun_id";
      $sql .= " AND village_id = $village_id";

      $result = parent::Requete( $sql );
      if ($result)
      {
        $iCpt = 0;
        while ($row = pg_fetch_row($result) )
        {
          // - on stocke les magies
          $_SESSION['science_id'][$iCpt]     = $row[0];
          $_SESSION['science_titre'][$iCpt]  = $row[1];
          $_SESSION['science_image'][$iCpt]  = $row[2];
          $_SESSION['science_info'][$iCpt]   = $row[3];
          $_SESSION['science_livre'][$iCpt]  = $row[4];
          $_SESSION['science_actif'][$iCpt]  = $row[5];

          $iCpt++;
        }

        $_SESSION['science_compteur'] = $iCpt;
      }
*/
      // - Gestion du nb de pages
      $iNbPages = ceil( $_SESSION['science_compteur'] / 8 );
      if( $iNbPages == 0 )
      {
        $iNbPages = 1;
      }

      $_SESSION['science_nb_pages'] = $iNbPages;

      // - Gestion du no de page
      if ( ! isset($_POST['science_no_page']) )
      {
        $_SESSION['science_no_page'] = 1;
      }
      else
      {
        $iPage = $_POST['science_no_page'];

        if ( $iPage < 0 )
        {
          $iPage = 1;
        }

        if ( $iPage > $iNbPages )
        {
          $iPage = $iNbPages;
        }

        $_SESSION['science_no_page'] = $iPage;
      }
?>
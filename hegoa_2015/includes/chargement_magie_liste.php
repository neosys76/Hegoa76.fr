<?php
// ======================================================================
// Auteur : Donatien CELIA
// Licence : CeCILL v2
// ======================================================================

// - Chargement de la liste des magies

      // - On récupère les informations nécessaires
      $account_id = $_SESSION['djun_id'];
      $village_id = $_SESSION['village_id'];

      // - Initialisation
      $_SESSION['magie_id']    = array();
      $_SESSION['magie_titre'] = array();
      $_SESSION['magie_image'] = array();
      $_SESSION['magie_info']  = array();
      $_SESSION['magie_livre'] = array();
      $_SESSION['magie_is_active'] = array();


      $iCpt = 0;
      // - on stocke les messages
      $_SESSION['magie_id'][$iCpt]     = $iCpt;
      $_SESSION['magie_titre'][$iCpt]  = "titre" . $iCpt;
      $_SESSION['magie_image'][$iCpt]  = "images/jeu/magie/magie_locked.png";
      $_SESSION['magie_info'][$iCpt]   = 1;
      $_SESSION['magie_livre'][$iCpt]  = 1;
      $_SESSION['magie_actif'][$iCpt]  = 0;
      $iCpt++;

      $_SESSION['magie_id'][$iCpt]     = $iCpt;
      $_SESSION['magie_titre'][$iCpt]  = "titre" . $iCpt;
      $_SESSION['magie_image'][$iCpt]  = "images/jeu/magie/magie_locked.png";
      $_SESSION['magie_info'][$iCpt]   = 1;
      $_SESSION['magie_livre'][$iCpt]  = 1;
      $_SESSION['magie_actif'][$iCpt]  = 0;
      $iCpt++;

      $_SESSION['magie_id'][$iCpt]     = $iCpt;
      $_SESSION['magie_titre'][$iCpt]  = "titre" . $iCpt;
      $_SESSION['magie_image'][$iCpt]  = "images/jeu/magie/magie_locked.png";
      $_SESSION['magie_info'][$iCpt]   = 1;
      $_SESSION['magie_livre'][$iCpt]  = 1;
      $_SESSION['magie_actif'][$iCpt]  = 0;
      $iCpt++;

      $_SESSION['magie_id'][$iCpt]     = $iCpt;
      $_SESSION['magie_titre'][$iCpt]  = "titre" . $iCpt;
      $_SESSION['magie_image'][$iCpt]  = "images/jeu/magie/magie_locked.png";
      $_SESSION['magie_info'][$iCpt]   = 1;
      $_SESSION['magie_livre'][$iCpt]  = 1;
      $_SESSION['magie_actif'][$iCpt]  = 0;
      $iCpt++;

      $_SESSION['magie_id'][$iCpt]     = $iCpt;
      $_SESSION['magie_titre'][$iCpt]  = "titre" . $iCpt;
      $_SESSION['magie_image'][$iCpt]  = "images/jeu/magie/magie_locked.png";
      $_SESSION['magie_info'][$iCpt]   = 1;
      $_SESSION['magie_livre'][$iCpt]  = 1;
      $_SESSION['magie_actif'][$iCpt]  = 0;
      $iCpt++;

      $_SESSION['magie_id'][$iCpt]     = $iCpt;
      $_SESSION['magie_titre'][$iCpt]  = "titre" . $iCpt;
      $_SESSION['magie_image'][$iCpt]  = "images/jeu/magie/magie_locked.png";
      $_SESSION['magie_info'][$iCpt]   = 1;
      $_SESSION['magie_livre'][$iCpt]  = 1;
      $_SESSION['magie_actif'][$iCpt]  = 0;
      $iCpt++;

      $_SESSION['magie_id'][$iCpt]     = $iCpt;
      $_SESSION['magie_titre'][$iCpt]  = "titre" . $iCpt;
      $_SESSION['magie_image'][$iCpt]  = "images/jeu/magie/magie_locked.png";
      $_SESSION['magie_info'][$iCpt]   = 1;
      $_SESSION['magie_livre'][$iCpt]  = 1;
      $_SESSION['magie_actif'][$iCpt]  = 0;
      $iCpt++;

      $_SESSION['magie_id'][$iCpt]     = $iCpt;
      $_SESSION['magie_titre'][$iCpt]  = "titre" . $iCpt;
      $_SESSION['magie_image'][$iCpt]  = "images/jeu/magie/magie_locked.png";
      $_SESSION['magie_info'][$iCpt]   = 1;
      $_SESSION['magie_livre'][$iCpt]  = 1;
      $_SESSION['magie_actif'][$iCpt]  = 0;
      $iCpt++;

      $_SESSION['magie_compteur'] = $iCpt;
/*
      // - On charge la liste des objets (en dur pour moment )
      // - On récupère les données
      $sql  = "SELECT magie_id, titre, image, info, livre, is_active";
      $sql .= " FROM \"libertribes\".\"MAGIE\"";
      $sql .= " WHERE djun_id  = $djun_id";
      $sql .= " AND village_id = $village_id";

      $result = parent::Requete( $sql );
      if ($result)
      {
        $iCpt = 0;
        while ($row = pg_fetch_row($result) )
        {
          // - on stocke les magies
          $_SESSION['magie_id'][$iCpt]     = $row[0];
          $_SESSION['magie_titre'][$iCpt]  = $row[1];
          $_SESSION['magie_image'][$iCpt]  = $row[2];
          $_SESSION['magie_info'][$iCpt]   = $row[3];
          $_SESSION['magie_livre'][$iCpt]  = $row[4];
          $_SESSION['magie_actif'][$iCpt]  = $row[5];

          $iCpt++;
        }

        $_SESSION['magie_compteur'] = $iCpt;
      }
*/
      // - Gestion du nb de pages
      $iNbPages = ceil( $_SESSION['magie_compteur'] / 8 );
      if( $iNbPages == 0 )
      {
        $iNbPages = 1;
      }

      $_SESSION['magie_nb_pages'] = $iNbPages;

      // - Gestion du no de page
      if ( ! isset($_POST['magie_no_page']) )
      {
        $_SESSION['magie_no_page'] = 1;
      }
      else
      {
        $iPage = $_POST['magie_no_page'];

        if ( $iPage < 0 )
        {
          $iPage = 1;
        }

        if ( $iPage > $iNbPages )
        {
          $iPage = $iNbPages;
        }

        $_SESSION['magie_no_page'] = $iPage;
      }

?>
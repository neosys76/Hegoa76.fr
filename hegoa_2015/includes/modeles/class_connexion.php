<?php
// ======================================================================
// Auteur : Dominique Dehareng
// Licence : CeCILL v2
// ======================================================================

error_reporting(E_ALL);

class Connexion
{
	private $db_connect;

    public function __construct()
    {
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
      // retourne un nombre de ligne pour une requête
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


}
<?php
// ======================================================================
// Auteur : Donatien CELIA
// Licence : CeCILL v2
// ======================================================================

error_reporting(E_ALL);

include "includes/function_GetPageObject.php";                                  // - On inclut la function GetPageObject

// - on récupère le nom de la page
$strNomPage = "";
if ( ! isset($_GET['page']) )
{
  $strNomPage = "accueil";
}
else
{
  $strNomPage = $_GET['page'];
}

// - Gestion de la page à afficher
$pageCurrent = GetPageObject($strNomPage);
$pageCurrent->Afficher();
?>
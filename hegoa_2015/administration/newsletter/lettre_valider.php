<?php
set_time_limit(300);

  define("HOSTNAME",  "localhost"); // - ou localhost
  define("BASE",      "hegoa");
  define("LOGIN",     "hegoa");
  define("PASSWORD",	"Subsystem0");

$sujet = trim(stripslashes($_POST["sujet"]));
$contenu = trim(stripslashes($_POST["contenu"]));
$format = trim(stripslashes($_POST["format"]));

$tErreur = array();

if($sujet == "")
{
	array_push($tErreur, "Le sujet doit �tre renseign�.");
}
if($format == "")
{
	array_push($tErreur, "Le format doit �tre renseign�.");
}
if($contenu == "")
{
	array_push($tErreur, "Le contenu doit �tre renseign�.");
}


if(count($tErreur) == 0)
{
  $db_connect = pg_connect("host=".HOSTNAME." dbname=".BASE." user=".LOGIN." password=".PASSWORD);

	$sql = "SELECT DISTINCT email FROM \"libertribes\".\"NEWSLETTER\"";

	$result = pg_query($db_connect, $sql);
	if($result)
	{

		if(pg_num_rows($result) > 0)
		{

      $entete = "From: Hegoa <contact@hegoa.eu>\r\n";
      $entete .= "Content-Type: $format; charset=iso-8859-1\r\n";

			while($row = pg_fetch_row($result))
			{
				$destinataire = $row[0];

				if(!@mail($destinataire, $sujet, $contenu, $entete))
				{
					array_push($tErreur, "L'envoi � <b>$destinataire</b> a �chou�.");
				}

			}
		}

		pg_free_result($result);
	}
	else
	{
		array_push($tErreur, "Erreur ".mysql_errno()." : ".mysql_error());
	}
}

if(count($tErreur) > 0)
{
    echo "<h1>Erreur - Envoi de la newsletter</h1>";
    echo "<br>";

    foreach($tErreur as $erreur)
    {
    	echo "<p align=\"center\">$erreur</p>";
    }
    echo "<form action=\"lettre.php\" method=\"post\">";

    //addHiddenInput("erreur", "1");
	  //addHiddenInput("sujet", $sujet);
	  //addHiddenInput("contenu", $contenu);
	  //addHiddenInput("format", $format);

	  echo "<p align=\"center\"><input type=\"submit\" value=\"Retour\"></p>";
    echo "</form>";
}
else
{
    echo "<h1>Envoi r�ussi</h1>";
    echo "<br>";

	  echo "<p align=\"center\">L'envoi de la newsletter a �t� effectu� avec succ�s.</p>";
}

?>
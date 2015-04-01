<h1>Newsletter</h1>

<?php

echo "<form action=\"lettre_valider.php\" method=\"post\">";

echo "Sujet :";
echo "<br />";

echo "<input type=\"text\" name=\"sujet\" size=\"50\">";
echo "<br />";
echo "<br />";

echo "<textarea rows=\"15\" cols=\"80\" name=\"contenu\"></textarea>";
echo "<br />";

echo "<input type=\"radio\" name=\"format\" value=\"text/plain\">Texte";
echo "<input type=\"radio\" name=\"format\" value=\"text/html\">HTML";
echo "<br />";

//echo "<input type=\"submit\" name=\"btEnvoyer\">";
echo "<input type=\"image\" src=\"./../images/valider.png\" name=\"btEnvoyer\">";
echo "<br />";

echo "</form>";


?>
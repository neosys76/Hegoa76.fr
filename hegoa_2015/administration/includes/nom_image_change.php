<?php
$nom = $_POST['nom'];
$ancien_nom = $_POST['oldname'];
$dir = $_POST['dir']."/";
$parties = explode(".",$ancien_nom);
$extension = $parties[count($parties)-1];
$oldname = $dir.$ancien_nom;
$newname = $dir.$nom.".".$extension;
rename($oldname,$newname);
?>
<script type="text/javascript">
window.location = 'index.php?page=media_images';
</script>

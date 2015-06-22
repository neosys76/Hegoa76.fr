<!DOCTYPE html>
<html lang="fr">
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
	<meta http-equiv="Pragma" content="no-cache">
	<link href="./css/style.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="../js/jquery-1.11.0.min.js"></script>
</head>
<body>
<div id="admin_contenu">
<?php
	include "./includes/config.php";
	include "./includes/header.php";
	include "./includes/menu.php";
	include "./includes/".$_GET['page'].".php";
?>
</div>
</body>
</html>



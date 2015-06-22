<?php

$content_dir = '../images/media/images/'; 
$inputfile = "image_file";
$ok=true;
var_dump($_FILES);
$nb_files = count($_FILES[$inputfile]['name']);
echo "<br/>nb_files: ".$nb_files."<br/>";
for($i=0;$i<$nb_files;$i++){
		$tmp_file = $_FILES[$inputfile]['tmp_name'][$i];
		$name_file = $_FILES[$inputfile]['name'][$i];
		echo "<br/>namefile: ".$name_file."<br/>";
		
		if(!empty($tmp_file)){
			if( !is_uploaded_file($tmp_file) )
				{
					echo "
						<script type='text/javascript'>
						alert('Fichier non trouvé');
						</script>
					";
					$ok=false;
				}

    // on copie le fichier dans le dossier de destination
			$name_file = $content_dir.$name_file;
			if(file_exists($name_file)){unlink($name_file);}
			if( !move_uploaded_file($tmp_file,$name_file) )
				{
					echo "
						<script type='text/javascript'>
						alert('Fichier non transféré dans le répertoire');
						</script>
					";
					$ok=false;
				}
			if(!$ok){     //  problème au transfert du fichier
				echo "<h3>Problème de transfert de fichier</h3>";
			}
		}
		else {
			$ok=false;
			echo "
				<script type='text/javascript'>
				alert('Fichier vide');
				</script>
				";
		}
		
	}
	if($ok){
	?>
	<p>Le chargement s'est bien déroulé</p>
	<?php
	}
	else {
	?>
	<p>Le chargement n'a pas eu lieu correctement.</p>
	<?php	
	}
?>
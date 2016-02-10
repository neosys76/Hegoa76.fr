<?php
$village_choisi = $_SESSION['village_choisi'];
?>
  <div class="panneau_village">

    <div class="cadre_village">
      <img src="images/jeu/village/village_defaut.jpg">
      <a class="lien_village_liste" href="index.php?page=jeu&espace=village&type=liste" title="<?php echo ucfirst($this->traductions_debut['liste'][$_SESSION['lang']]); ?>">
        <img src="images/jeu/village/bouton_parcourir.png" alt="<?php echo ucfirst($this->traductions_debut['liste'][$_SESSION['lang']]); ?>">
      </a>
      <a class="lien_village_vente" href="index.php?page=jeu&espace=village&type=vendre" title="<?php echo ucfirst($this->traductions_debut['vente'][$_SESSION['lang']]); ?>">
        <img  src="images/jeu/village/bouton_vendre.png" alt="<?php echo ucfirst($this->traductions_debut['vente'][$_SESSION['lang']]); ?>">
      </a>
    </div>
<div class="cadre_data">
    <p>
    <?php 
    	if(isset($village_choisi->nom)&&!empty($village_choisi->nom)){
    		echo $village_choisi->nom; 
    	}	
    	else {
			echo "&nbsp;";    	
    	}
    ?>
    </p>

    <div>
    <span class="mana">
      <img src="images/jeu/village/icone_mana.png" alt="mana">
    		<span>
    <?php 
    	if(isset($village_choisi->mana)&&!empty($village_choisi->mana)){
    		echo $village_choisi->valeur_mana; 
    	}	
    	else {
			echo "&nbsp;";    	
    	}
    ?>
    		</span>
    </span>

	<span class="population">
      <img src="images/jeu/village/icone_population.png" alt="<?php echo ucfirst($this->traductions_debut['population'][$_SESSION['lang']]); ?>">
    		<span>
    <?php 
    	if(isset($village_choisi->nom)&&!empty($village_choisi->nom)){
    		echo $village_choisi->calculPopulation(); 
    	}	
    	else {
			echo "&nbsp;";    	
    	}
    ?>
    		</span>
</span>
	<span class="naissances">
      <img  src="images/jeu/village/icone_naissance.png" alt="<?php echo ucfirst($this->traductions_debut['naissances'][$_SESSION['lang']]); ?>">
    		<span>
    <?php 
    	if(isset($village_choisi->nom)&&!empty($village_choisi->nom)){
    		echo $village_choisi->calculNaissances(); 
    		echo "&nbsp;&nbsp;(".$village_choisi->calculTempsExistence().")"; 
    	}	
    	else {
			echo "&nbsp;";    	
    	}
    ?>
    		</span>   
    </span>   
    </div>

    <div>
    	<div class="village_props">
      <img src="images/jeu/village/icone_agriculteur.png" alt="<?php echo ucfirst($this->traductions['agriculteur'][$_SESSION['lang']]); ?>">
      <p><?php echo $village_choisi->paysans; ?></p>
		</div>
		<div class="village_props">
      <img src="images/jeu/village/icone_guerrier_cac.png" alt="<?php echo ucfirst($this->traductions['guerrier-cac'][$_SESSION['lang']]); ?>">
      <p class="colbrun1"><?php echo $village_choisi->guerrier_cac; ?></p>
		</div>
		<div class="village_props">
      <img src="images/jeu/village/icone_guerrier_distance.png" alt="<?php echo ucfirst($this->traductions['guerrier-distant'][$_SESSION['lang']]); ?>">
      <p><?php echo $village_choisi->guerrier_dist; ?></p>
		</div>
		<div class="village_props">
      <img src="images/jeu/village/icone_mage.png" alt="<?php echo ucfirst($this->traductions['magie'][$_SESSION['lang']]); ?>">
      <p class="colbrun1"><?php echo $village_choisi->mages; ?></p>
		</div>
		<div class="village_props">
      <img src="images/jeu/village/icone_chariot_guerre.png" alt="<?php echo ucfirst($this->traductions['chariots-guerre'][$_SESSION['lang']]); ?>">
      <p><?php echo $village_choisi->chariots_guerre; ?></p>
		</div>
		<div class="village_props">
      <img src="images/jeu/village/icone_chariot_transport.png" alt="<?php echo ucfirst($this->traductions['chariots-transport'][$_SESSION['lang']]); ?>">
      <p class="colbrun1"><?php echo $village_choisi->transport; ?></p>
		</div>
		<div class="village_props">
      <img src="images/jeu/village/icone_invoc_magique.png" alt="<?php echo ucfirst($this->traductions['invocations'][$_SESSION['lang']]); ?>">
      <p><?php echo $village_choisi->invocations; ?></p>
		</div>
		<div class="village_props">
      <img  src="images/jeu/village/icone_cyniam.png" alt="Cyniam">
      <p class="colbrun1"><?php echo $village_choisi->cyniam; ?></p>
		</div>
		<div class="village_props">
      <img src="images/jeu/village/icone_bois.png" alt="<?php echo ucfirst($this->traductions['bois'][$_SESSION['lang']]); ?>">
      <p><?php echo $village_choisi->bois; ?></p>
		</div>
		<div class="village_props">
      <img src="images/jeu/village/icone_metal.png" alt="<?php echo ucfirst($this->traductions['metal'][$_SESSION['lang']]); ?>">
      <p class="colbrun1"><?php echo $village_choisi->fer; ?></p>
		</div>    
      
    </div>
   </div>
  </div>
  
  <div class="cadre_village_contenu">
  <?php
if(isset($village_choisi->nom)&&!empty($village_choisi->nom)){
?>
<p style="font-size:30px;">Ici, une belle illustration de village !!</p>
<?php
}
else {
?>
<p style="font-size:30px;text-align:center;">En fond, une belle illustration de village !!</p>
<?php
echo $this->traductions['message_choix_colonisation'][$_SESSION['lang']];
?>
<a class="bouton_choix" href="index.php?page=jeu&action=colonisation-au-hasard"><?php echo $this->traductions['coloniser-au-hasard'][$_SESSION['lang']]; ?></a>
<a class="bouton_choix" href="index.php?page=jeu&espace=etoile&zone=colonisable"><?php echo $this->traductions['choisir-emplacement'][$_SESSION['lang']]; ?></a>
<?php
}
  ?>
  </div>


<h1>Avatar</h1>

<div class="avatar_cadre_photo">
<img class="avatar_photo" src"">
</div>

<div class="avatar_cadre_index">
  <div class="avatar_index_agressivite_libelle">Index Agressivité</div>
  <div class="avatar_index_agressivite_valeur"><?=$index_agressivite?></div>

  <div class="avatar_index_efficacite_libelle">Index Efficacité</div>
  <div class="avatar_index_efficacite_valeur"><?=$index_efficacite?></div>

  <div class="avatar_index_escroquerie_libelle">Index Escroquerie</div>
  <div class="avatar_index_escroquerie_valeur"><?=$index_escroquerie?></div>

  <div class="avatar_index_commerce1_libelle">Index Commerce1</div>
  <div class="avatar_index_commerce1_valeur"><?=$index_commerce1?></div>

  <div class="avatar_index_commerce2_libelle">Index Commerce2</div>
  <div class="avatar_index_commerce2_valeur"><?=$index_commerce2?></div>
</div>

<div class="avatar_cadre_saisie">
<?php
  if ( $est_valider )
  {
?>

    <div class="avatar_pseudo_libelle">Pseudo</div>
    <div class="avatar_pseudo_valeur"><?=$pseudo?></div>

    <div class="avatar_peuple_libelle">Peuple</div>
    <div class="avatar_peuple"><?=$peuple?></div>

    <div class="avatar_guilde_libelle">Guilde d'appartenance :</div>
    <div class="avatar_guilde"><?=$guilde?></div>
<?php
  }
  else
  {
?>
  <form action="index.php?page=avatar_validation" method="post">
    <input type="hidden" name="type_formulaire" value="saisie">

    <div class="avatar_pseudo_libelle">Pseudo</div>
    <div class="avatar_pseudo_valeur"><input type="text" name="pseudo" value=""></div>
    <div class="avatar_peuple_libelle">Peuple</div>
    <div class="avatar_peuple">A faire - Mettre une combo</div>
    <div class="avatar_guilde_libelle">Guilde d'appartenance :</div>
    <div class="avatar_guilde"><?=$guilde?></div>

    <input type="submit" value="Valider">

  </form>

<?php
  }
?>

</div>

<div class="avatar_cadre_saisie_libre">
  <form action="index.php?page=avatar_validation" method="post">
    <input type="hidden" name="type_formulaire" value="saisie_libre">

    <div class="avatar_histoire_libelle">Histoire de l'avatar</div>
    <div class="avatar_histoire_valeur"><textarea rows="5" cols="50"><?=$histoire_valeur?></textarea></div>

    <input type="submit" value="Valider">
  </form>
</div>

<div class="avatar_cadre_evenements">
    <div class="avatar_evenements_libelle">Liste des &eacute;v&egrave;nements</div>
    A faire - Gerer une liste d'évènements
</div>


<script type="text/javascript">
//<![CDATA[

</script>


<!--Saisir les informations dans un formulaire!-->
<div class="container">
  <form action="" method=post>
    <fieldset>
      <legend>Entrez les données sur le visiteur à modifier </legend>
      <label> Matricule :</label>
      <label><?php echo $liste["mat"]; ?> </label>
      <input type="hidden" name="VIS_MATRICULE" value="<?php echo $liste["mat"]; ?>" /><br />
      <label>Nom :</label>
      <input type="text" name="VIS_NOM" value="<?php echo $liste["nom"]; ?>" size="20" /><br />
      <label>Prénom :</label>
      <input type="text" name="VIS_PRENOM" value="<?php echo $liste["prenom"]; ?>" size="10" /><br /> 
    </fieldset>
    <button type="submit" class="btn btn-primary">Modifier</button>
    <button type="reset" class="btn">Annuler</button>
    <p />
  </form> 
</div>




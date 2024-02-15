<!--Saisie des informations dans un formulaire!-->
<div class="container">

<form name="formAjout" action="" method="post" onSubmit="return valider()">
  <fieldset>
    <legend>Entrez les données sur le visiteur et le matériel </legend>
    <label> Matricule du visiteur :</label> <input type="text" name="MatVisit" size="20" /><br />
    <label> Reference du matériel: </label> <input type="text" placeholder=""name="RefMat" size="10" /><br />
    <label>Date d'emprunt :</label> <input type="Date" name="DateEmp" size="10" /><br />
  </fieldset>
  <button type="submit" class="btn btn-primary">Enregistrer</button>
  <button type="reset" class="btn">Annuler</button>
  <p />
</form>
</div>



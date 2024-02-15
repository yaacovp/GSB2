<script type="text/javascript">
//<![CDATA[

function valider(){
 frm=document.forms['formAjout'];
  // si le prix est positif
  if(frm.elements['prix'].value >0) {
    // les données sont ok, on peut envoyer le formulaire    
    return true;
  }
  else {
    // sinon on affiche un message
    alert("Le prix doit être positif !");
    // et on indique de ne pas envoyer le formulaire
    return false;
  }
}
//]]>
</script>

<!--Saisie des informations dans un formulaire!-->
<div class="container">

<form name="formAjout" action="" method="post" onSubmit="return valider()">
  <fieldset>
    <legend>Entrez les données sur le visiteur </legend>
    <label> Reference : </label> <input autofocus required="" type="text" placeholder=""name="Reference" size="10" /><br />
    <label>Id :</label>     
    <select name="IdModele">
      <option value="1">Tablette Archos 10B G2</option>
      <option value="2">Ordinateur portable Inspiron Mini 10</option>
    </select><br />
    <label>Marque :</label> <input type="text" name="Marque" size="10" /><br />
    <label>Prix :</label> <input type="text" name="Prix" size="10" /><br />
  <button type="submit" class="btn btn-primary">Enregistrer</button>
  <button type="reset" class="btn">Annuler</button>
  <p />
</form>
</div>



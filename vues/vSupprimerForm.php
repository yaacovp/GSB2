<!--Formulaire de suppression à partir de l'identifiant -->

<div class="container">

<form action="" method=post>
<fieldset>
<legend>Entrez le matricule du visiteur  à supprimer </legend>
<select name="mat" class="form-control">
	<?php
	for($i=0; $i <count($liste);$i++)
	{
		?>
		<option value ="<?php echo $liste[$i]["mat"]?>" name= "mat"><?php echo $liste[$i]["nom"], " ",$liste[$i]["prenom"];?> </option>
		<?php
	}
	?>
	
</fieldset>
</option> 
</select>
<button type="submit" class="btn btn-primary">Supprimer</button>
<button type="reset" class="btn">Annuler</button>
</form>

</div>


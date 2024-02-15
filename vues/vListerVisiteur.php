

<!-- Affichage des informations sur les fleurs-->

<div class="container">

    <table class="table table-bordered table-striped table-condensed">
      <thead>
        <tr>
          <th>Matricule</th>
          <th>Nom</th>
          <th>Prénom</th>
        </tr>
      </thead>
      <tbody>  
<?php
    $i = 0;
    while($i < count($liste))
    { 
 ?>     
        <tr>
            <td><?php echo $liste[$i]["mat"]?></td>
            <td><?php echo $liste[$i]["nom"]?></td>
            <td><?php echo $liste[$i]["prenom"]?></td>
        </tr>
<?php
        $i = $i + 1;
     }
?>       
       </tbody>       
     </table>    
  </div>

 

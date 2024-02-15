

<!-- Affichage des informations sur les fleurs-->

<div class="container">

    <table class="table table-bordered table-striped table-condensed">
      <thead>
        <tr>
          <th>Réference</th>
          <th>Modèle</th>
          <th>Marque</th>
          <th>Prix</th>
          <th>Panne</th>
        </tr>
      </thead>
      <tbody>  
<?php
    $i = 0;
    while($i < count($liste))
    { 
 ?>     
        <tr>
            <td><?php echo $liste[$i]["ref"]?></td>
            <td><?php echo $liste[$i]["idmod"]?></td>
            <td><?php echo $liste[$i]["marque"]?></td>
            <td><?php echo $liste[$i]["prx"]?></td>
            <td><?php echo $liste[$i]["panne"]?></td>
        </tr>
<?php
        $i = $i + 1;
     }
?>       
       </tbody>       
     </table>    
  </div>

 

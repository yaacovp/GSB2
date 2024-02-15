

<!-- Affichage des informations sur les fleurs-->

<div class="container">

    <table class="table table-bordered table-striped table-condensed">
      <thead>
        <tr>
          <th>Reference Visiteur </th>
          <th>Reference Materiel</th>
          <th>Date Attribution</th>
        </tr>
      </thead>
      <tbody>  
<?php
    $i = 0;
    while($i < count($liste))
    { 
 ?>     
        <tr>
            <td><?php echo $liste[$i]["refV"]?></td>
            <td><?php echo $liste[$i]["refM"]?></td>
            <td><?php echo $liste[$i]["DateA"]?></td>
        </tr>
<?php
        $i = $i + 1;
     }
?>       
       </tbody>       
     </table>    
  </div>

 

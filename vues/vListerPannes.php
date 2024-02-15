<!-- Affichage des informations sur les fleurs-->

<div class="container">

    <table class="table table-bordered table-striped table-condensed">
      <thead>
        <tr>
          <th>Reference</th>
          <th>Modèle</th>
          <th>Prix</th>
        </tr>
      </thead>
      <tbody>  
<?php
    $i = 0;
    if(!is_null($liste)){
      while($i < count($liste))
      { 
   ?>     
          <tr>
              <td><?php echo $liste[$i]["Ref"]?></td>
              <td><?php echo $liste[$i]["Mod"]?></td>
              <td><?php echo $liste[$i]["Prix"]?></td>
          </tr>
  <?php
          $i = $i + 1;
       }
     }
  ?>       
       </tbody>       
     </table>    
  </div>

 

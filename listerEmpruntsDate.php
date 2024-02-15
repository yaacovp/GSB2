<?php
/** 
 * Script de contrôle et d'affichage du cas d'utilisation "Rechercher"
 * @package default
 * @todo  RAS
 */
 
  $repInclude = './include/';
  $repVues = './vues/';
  
  require($repInclude . "_init.inc.php");
  $uneDate=lireDonneePost("dateList","");
  
  if (count($_POST)==0)
  {
    $etape = 1;
  }

  else{
    $etape = 2;
    $liste = listerEmpruntsDate($uneDate);
  }
  
  // Construction de la page Rechercher
  // pour l'affichage (appel des vues)
  include($repVues."entete.php") ;
  include($repVues."menu.php") ;
  
  if($etape == 1){
    include($repVues."vListerEmpruntsDateForm.php");
  }

  else{
    include($repVues."vListerEmprunts.php");
  }

  include($repVues."pied.php") ;
  ?>
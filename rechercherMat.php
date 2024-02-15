<?php
/** 
 * Script de contrôle et d'affichage du cas d'utilisation "Ajouter"
 * @package default
 * @todo  RAS
 */
 
$repInclude = './include/';
$repVues = './vues/';

require($repInclude . "_init.inc.php");
  
$unPrix=lireDonneePost("prix", "");

if (count($_POST)==0)
{
  $etape = 1;
}
else
{
  $etape = 2;
  $liste=RechercherMatPrix($unPrix,$tabErreurs);
  if ($liste == null) {
    $etape = 1;
  }
}

// Construction de la page Rechercher
// pour l'affichage (appel des vues)
include($repVues."entete.php") ;
include($repVues."menu.php") ;
include($repVues ."erreur.php");
if ($etape==1)
{
  include($repVues."vRechercherMatPrix.php"); ;
}
else
{
  include($repVues."vListerMateriel.php") ;
}
include($repVues."pied.php") ;
?>
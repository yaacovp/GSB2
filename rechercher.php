<?php
/** 
 * Script de contrôle et d'affichage du cas d'utilisation "Ajouter"
 * @package default
 * @todo  RAS
 */
 
$repInclude = './include/';
$repVues = './vues/';

require($repInclude . "_init.inc.php");
  
$unNom=lireDonneePost("nom", "");

if (count($_POST)==0)
{
  $etape = 1;
}
else
{
  $etape = 2;
  $liste=rechercherVisiteur($unNom,$tabErreurs);
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
  include($repVues."vRechercherForm.php"); ;
}
else
{
  include($repVues."vListerVisiteur.php") ;
}
include($repVues."pied.php") ;
?>
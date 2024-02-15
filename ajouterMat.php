<?php
/** 
 * Script de contrôle et d'affichage du cas d'utilisation "Ajouter"
 * @package default
 * @todo  RAS
 */
 
$repInclude = './include/';
$repVues = './vues/';

require($repInclude . "_init.inc.php");
  
$uneRef=lireDonneePost("Reference", "");
$unId=lireDonneePost("IdModele", "");
$uneMarque=lireDonneePost("Marque", "");
$unPrix=lireDonneePost("Prix", "");

if (count($_POST)==0)
{
  $etape = 1;
}
else
{
  $etape = 2;
  ajouterMat($uneRef, $unId, $uneMarque,$unPrix, $tabErreurs);
}

// Construction de la page Rechercher
// pour l'affichage (appel des vues)
include($repVues."entete.php") ;
include($repVues."menu.php") ;
include($repVues ."erreur.php");
include($repVues."vAjouterMat.php") ;
include($repVues."pied.php") ;
?>
  

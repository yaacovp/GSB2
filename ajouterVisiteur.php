<?php
/** 
 * Script de contr�le et d'affichage du cas d'utilisation "Ajouter"
 * @package default
 * @todo  RAS
 */
 
$repInclude = './include/';
$repVues = './vues/';

require($repInclude . "_init.inc.php");
  
$unMat=lireDonneePost("VIS_MATRICULE", "");
$unNom=lireDonneePost("VIS_NOM", "");
$unPrenom=lireDonneePost("VIS_PRENOM", "");

if (count($_POST)==0)
{
  $etape = 1;
}
else
{
  $etape = 2;
  ajouterVisiteur($unMat, $unNom, $unPrenom,$tabErreurs);
}

// Construction de la page Rechercher
// pour l'affichage (appel des vues)
include($repVues."entete.php") ;
include($repVues."menu.php") ;
include($repVues ."erreur.php");
include($repVues."vAjouterForm.php") ;
include($repVues."pied.php") ;
?>
  

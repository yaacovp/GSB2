<?php
/** 
 * Script de contrôle et d'affichage du cas d'utilisation "Ajouter"
 * @package default
 * @todo  RAS
 */
 
$repInclude = './include/';
$repVues = './vues/';

require($repInclude . "_init.inc.php");
  


if (count($_POST)==0)
{
  $etape = 1;
}

else
{
  if (count($_POST) == 1)
  {
    $unMat=lireDonneePost("VIS_MATRICULE","");
    $liste=rechercherCli1($unMat, $tabErreurs);
    
    if (count($liste) > 0)
    {                      
      $etape = 2;   
    }
    else
    {
      $etape = 1;
      echo "Echec de la modification : le visiteur n'existe pas !";
    }
  }
  else
  {
    $etape = 3;
    $unMat=lireDonneePost("VIS_MATRICULE","");
    $unNom = $_POST["VIS_NOM"];
    $unPrenom = $_POST["VIS_PRENOM"];
    modifierVisiteur($unMat,$unNom, $unPrenom);
  }
}

// Construction de la page Rechercher
// pour l'affichage (appel des vues)
include($repVues."entete.php") ;
include($repVues."menu.php") ;
include($repVues ."erreur.php");

if ($etape == 1)
{
  include($repVues."vModifierRefForm.php"); 
}
elseif ($etape == 2)
{
  include($repVues."vModifierForm.php") ;
}
include($repVues."pied.php") ;
?>
  


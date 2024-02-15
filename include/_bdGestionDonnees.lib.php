<?php

// MODIFs A FAIRE
// Ajouter en têtes 
// Voir : jeu de caractères à la connection

/** 
 * Se connecte au serveur de données                     
 * Se connecte au serveur de données à partir de valeurs
 * prédéfinies de connexion (hôte, compte utilisateur et mot de passe). 
 * Retourne l'identifiant de connexion si succès obtenu, le booléen false 
 * si problème de connexion.
 * @return resource identifiant de connexion
 */
function connecterServeurBD() 
{
    $PARAM_hote='localhost'; // le chemin vers le serveur
    $PARAM_port='3306';
    $PARAM_nom_bd='gsb_php'; // le nom de votre base de données
    $PARAM_utilisateur='root'; // nom d'utilisateur pour se connecter
    $PARAM_mot_passe=''; // mot de passe de l'utilisateur pour se connecter
    $connect = new PDO('mysql:host='.$PARAM_hote.';port='.$PARAM_port.';dbname='.$PARAM_nom_bd, $PARAM_utilisateur, $PARAM_mot_passe);
    return $connect;

    //$hote = "localhost";
    // $login = "root";
    // $mdp = "";
    // return mysql_connect($hote, $login, $mdp);
}


/** 
 * Ferme la connexion au serveur de données.
 * Ferme la connexion au serveur de données identifiée par l'identifiant de 
 * connexion $idCnx.
 * @param resource $idCnx identifiant de connexion
 * @return void  
 */
function deconnecterServeurBD($idCnx) {

}


function listerVisiteur()
{
  $connexion = connecterServeurBD();
  
  // Si la connexion au SGBD à réussi
  if (TRUE) 
  {
      
           
      $requete="select * from visiteur";
      
      $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant

      $jeuResultat->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le résultat soit récupérable sous forme d'objet     
      $i = 0;
      $ligne = $jeuResultat->fetch();
      while($ligne)
      {
          $fleur[$i]['mat']=$ligne->VIS_MATRICULE;
          $fleur[$i]['nom']=$ligne->VIS_NOM;
          $fleur[$i]['prenom']=$ligne->VIS_PRENOM;
          $ligne=$jeuResultat->fetch();
          $i = $i + 1;
      }
  }
  $jeuResultat->closeCursor();   // fermer le jeu de résultat
  // deconnecterServeurBD($idConnexion);
  return $fleur;
}


function ajouterVisiteur($unMat, $unNom, $unPrenom,&$tabErr)
{
  // Ouvrir une connexion au serveur mysql en s'identifiant
  $connexion = connecterServeurBD();
  
  // Si la connexion au SGBD à réussi
  if (TRUE) 
  {
    
    // Vérifier que la référence saisie n'existe pas déja
    $requete="select * from visiteur";
    $requete=$requete." where VIS_MATRICULE = '".$unMat."';"; 
    $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant

    $jeuResultat->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le résultat soit récupérable sous forme d'objet     
    
    $ligne = $jeuResultat->fetch();
    if($ligne)
    {
      $message="Echec de l'ajout : le matricule existe déjà !";
      ajouterErreur($tabErr, $message);
    }
    else
    {
      // Créer la requête d'ajout 
       $requete="insert into visiteur"
       ."(VIS_MATRICULE,VIS_NOM,VIS_PRENOM) values ('"
       .$unMat."','"
       .$unNom."','"
       .$unPrenom."');";
       
        // Lancer la requête d'ajout 
        $ok=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
       
        // Si la requête a réussi
        if ($ok)
        {
          $message = "Le visiteur a été correctement ajouté";
          ajouterErreur($tabErr, $message);
        }
        else
        {
          $message = $requete;
          ajouterErreur($tabErr, $message);
        } 

    }
    // fermer la connexion
    // deconnecterServeurBD($idConnexion);
  }
  else
  {
    $message = "problème à la connexion <br />";
    ajouterErreur($tabErr, $message);
  }
} 

function rechercherVisiteur($Nom,&$tabErr)
{
    $connexion = connecterServeurBD();
    
    $liste = array();
   
    $requete="select * from visiteur";
      $requete=$requete." where VIS_NOM LIKE '%".$Nom."%';";
    
    $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant

    $ligne = $jeuResultat->fetch();

    if($ligne){
      $i = 0;
      while($ligne)
      {
          $liste[$i]['mat']=$ligne['VIS_MATRICULE'];
          $liste[$i]['nom']=$ligne['VIS_NOM'];
          $liste[$i]['prenom']=$ligne['VIS_PRENOM'];
          $ligne = $jeuResultat->fetch();
          $i = $i + 1 ;
      }
      $jeuResultat->closeCursor();   // fermer le jeu de résultat
    }
    else
    {
      $message = "Aucun visiteur ne correspond à cette description";
      ajouterErreur($tabErr, $message);
    }

    return $liste;
}

function modifierVisiteur($mat, $nom, $prenom, &$tabErr)
{
    $connexion = connecterServeurBD();
    // Si la connexion au SGBD à réussi
    if (TRUE) 
    {
      // Vérifier que la référence saisie n'existe pas déja
      $requete="select * from visiteur";
      $requete=$requete." where VIS_MATRICULE = '".$mat."';"; 
      $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
  
      $jeuResultat->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le résultat soit récupérable sous forme d'objet     
      
      $ligne = $jeuResultat->fetch();
      if(!$ligne)
      {
        $message="Echec de la modification : le visiteur n'existe pas !";
        ajouterErreur($tabErr, $message);
      }
      else{
        $requete = "update visiteur set  VIS_NOM = '".$nom."',  VIS_PRENOM = '".$prenom."'
        where VIS_MATRICULE = '".$mat."';";
        // Lancer la requête de modification
        $ok=$connexion->query($requete); 
        // Si la requête a échoué
        if ($ok)
        {        
          $message = "La modification du visiteur a abouti ";
          ajouterErreur($tabErr, $message);
        }
        else
        {
          $message = "Attention, la modification du visiteur a échoué !!! <br />";
          ajouterErreur($tabErr, $message);
        }
      }

      }
    else
    {
      $message = "problème à la connexion <br />";
      ajouterErreur($tabErr, $message);
    }
}

function rechercherCli1($Mat)
{
    $connexion = connecterServeurBD();
    
    $liste = array();
   
    $requete="select * from visiteur";
      $requete=$requete." where VIS_MATRICULE='".$Mat."';";
    
    $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant

    $ligne = $jeuResultat->fetch();
    while($ligne)
    {
        $liste['mat']=$ligne['VIS_MATRICULE'];
        $liste['nom']=$ligne['VIS_NOM'];
        $liste['prenom']=$ligne['VIS_PRENOM'];
        $ligne = $jeuResultat->fetch();

    }
     $ok=$connexion->query($requete); 
    if ($ok)
        {
          $message = "La fleur a été correctement ajoutée";
          ajouterErreur($tabErr, $message);
        }
    $jeuResultat->closeCursor();   // fermer le jeu de résultat

    return $liste;
}

function supprimerVisiteur($unMat,&$tabErr)
{
  // Ouvrir une connexion au serveur mysql en s'identifiant
  $connexion = connecterServeurBD();
  
  // Si la connexion au SGBD à réussi
  if (TRUE) 
  {
    
    // Vérifier que la référence saisie n'existe pas déja
    $requete="select * from visiteur";
    $requete=$requete." where VIS_MATRICULE = '".$unMat."';"; 
    $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant

    $jeuResultat->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le résultat soit récupérable sous forme d'objet     
    
    $ligne = $jeuResultat->fetch();
    if(!$ligne)
    {
      $message="Echec de la suppression : le visiteur n'existe pas !";
      ajouterErreur($tabErr, $message);
    }
    else
    {
      // Créer la requête d'ajout 
       $requete="delete from visiteur 
       where VIS_MATRICULE = '" .$unMat."';";
       
        // Lancer la requête d'ajout 
        $ok=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
       
        // Si la requête a réussi
        if ($ok)
        {
          $message = "Le visiteur a été correctement supprimé";
          ajouterErreur($tabErr, $message);
        }
        else
        {
          $message = $requete;
          ajouterErreur($tabErr, $message);
        } 

    }
    // fermer la connexion
    // deconnecterServeurBD($idConnexion);
  }
  else
  {
    $message = "problème à la connexion <br />";
    ajouterErreur($tabErr, $message);
  }
}
function ajouterMat($uneReference, $unId, $uneMarque, $unPrix, &$tabErr)
{
  // Ouvrir une connexion au serveur mysql en s'identifiant
  $connexion = connecterServeurBD();
  
  // Si la connexion au SGBD à réussi
  if (TRUE) 
  {
    
    // Vérifier que la référence saisie n'existe pas déja
    $requete="select * from materiel";
    $requete=$requete." where Reference = '".$uneReference."';"; 
    $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant

    $jeuResultat->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le résultat soit récupérable sous forme d'objet     
    
    $ligne = $jeuResultat->fetch();
    if($ligne)
    {
      $message="Echec de l'ajout : le matricule existe déjà !";
      ajouterErreur($tabErr, $message);
    }
    if($unPrix<0)
       {
        $message = "Le prix doit etre positiif";
        ajouterErreur($tabErr, $message);
       }

    else
    {
      // Créer la requête d'ajout 
       $requete="insert into materiel"
       ."(Reference,IdModele,Marque,Prix) values ('"
       .$uneReference."','"
       .$unId."','"
       .$uneMarque."','"
       .$unPrix."');";
              
        // Lancer la requête d'ajout 
        $ok=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
       
        // Si la requête a réussi
        if ($ok)
        {
          $message = "Le materiel  a été correctement ajouté";
          ajouterErreur($tabErr, $message);
        }
        else
        {
          $message = $requete;
          ajouterErreur($tabErr, $message);
        } 

    }
    // fermer la connexion
    // deconnecterServeurBD($idConnexion);
  }
  else
  {
    $message = "problème à la connexion <br />";
    ajouterErreur($tabErr, $message);
  }
}

function listerMateriel()
{
  $connexion = connecterServeurBD();
  
  // Si la connexion au SGBD à réussi
  if (TRUE) 
  {
      
           
      $requete="SELECT materiel.Reference,materiel.Marque,materiel.Prix,modele.Libelle,materiel.Panne FROM materiel,modele WHERE modele.Identifiant=materiel.IdModele  ";

      $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant

      $jeuResultat->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le résultat soit récupérable sous forme d'objet     
      $i = 0;
      $ligne = $jeuResultat->fetch();
      while($ligne)
      {
          $fleur[$i]['ref']=$ligne->Reference;
          $fleur[$i]['idmod']=$ligne->Libelle;
          $fleur[$i]['marque']=$ligne->Marque;
          $fleur[$i]['prx']=$ligne->Prix;
          $fleur[$i]['panne']=$ligne->Panne;
          $ligne=$jeuResultat->fetch();
          $i = $i + 1;
      }
  }
  $jeuResultat->closeCursor();   // fermer le jeu de résultat
  // deconnecterServeurBD($idConnexion);
  return $fleur;
} 

function rechercherMatPrix($Prix,&$tabErr)
{
    $connexion = connecterServeurBD();
    
    $fleur = array();
   
    $requete="select * from materiel";
      $requete=$requete." where Prix <= '".$Prix."';";
    
    $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant

    $ligne = $jeuResultat->fetch();

    if($ligne){
      $i = 0;
      while($ligne)
      {
          $fleur[$i]['ref']=$ligne['Reference'];
          $fleur[$i]['idmod']=$ligne['IdModele'];
          $fleur[$i]['marque']=$ligne['Marque'];
          $fleur[$i]['prx']=$ligne['Prix'];
          $fleur[$i]['panne']=$ligne['Panne'];
          $ligne = $jeuResultat->fetch();
          $i = $i + 1 ;
      }
      $jeuResultat->closeCursor();   // fermer le jeu de résultat
    }
    else
    {
      $message = "Aucun materiel ne correspond à cette recherche";
      ajouterErreur($tabErr, $message);
    }
    return $fleur;
}

function supprimerMateriel($uneRef,&$tabErr)
{
  // Ouvrir une connexion au serveur mysql en s'identifiant
  $connexion = connecterServeurBD();
  
  // Si la connexion au SGBD à réussi
  if (TRUE) 
  {
    
    // Vérifier que la référence saisie n'existe pas déja
    $requete="select * from materiel";
    $requete=$requete." where Reference = '".$uneRef."';"; 
    $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant

    $jeuResultat->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le résultat soit récupérable sous forme d'objet     
    
    $ligne = $jeuResultat->fetch();
    if(!$ligne)
    {
      $message="Echec de la suppression : le matériel n'existe pas !";
      ajouterErreur($tabErr, $message);
    }
    else
    {
      // Créer la requête d'ajout 
       $requete="delete from materiel 
       where Reference = '" .$uneRef."';";
       
        // Lancer la requête d'ajout 
        $ok=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
       
        // Si la requête a réussi
        if ($ok)
        {
          $message = "Le matériel a été correctement supprimé";
          ajouterErreur($tabErr, $message);
        }
        else
        {
          $message = $requete;
          ajouterErreur($tabErr, $message);
        } 

    }
    // fermer la connexion
    // deconnecterServeurBD($idConnexion);
  }
  else
  {
    $message = "problème à la connexion <br />";
    ajouterErreur($tabErr, $message);
  }
}  

function listerEmprunts()
{
  $connexion = connecterServeurBD();
  
  // Si la connexion au SGBD à réussi
  if (TRUE) 
  {
    $requete="select * from attribuer";
    
    $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissan
    $jeuResultat->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le résultat soit récupérable sous forme d'objet     
    $i = 0;
    $ligne = $jeuResultat->fetch();
    if($ligne){
    	while($ligne)
    	{
    	    $fleur[$i]['refV']=$ligne->RefVisiteur;
    	    $fleur[$i]['refM']=$ligne->RefMateriel;
    	    $fleur[$i]['DateA']=$ligne->DateAttribution;
    	    $ligne=$jeuResultat->fetch();
    	    $i = $i + 1;
    	    
    	}
      return $fleur;
    }
  }
  $jeuResultat->closeCursor();   // fermer le jeu de résultat
  // deconnecterServeurBD($idConnexion);
  
}

function listerEmpruntsDate($dateList)
{
  $connexion = connecterServeurBD();
  
  // Si la connexion au SGBD à réussi
  if (TRUE) 
  {
    $requete="select * from attribuer where DateAttribution <= '".$dateList."'  ";
    
    $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissan
    $jeuResultat->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le résultat soit récupérable sous forme d'objet     
    $i = 0;
    $ligne = $jeuResultat->fetch();
    if($ligne){
      while($ligne)
      {
          $fleur[$i]['refV']=$ligne->RefVisiteur;
          $fleur[$i]['refM']=$ligne->RefMateriel;
          $fleur[$i]['DateA']=$ligne->DateAttribution;
          $ligne=$jeuResultat->fetch();
          $i = $i + 1;
          
      }
      return $fleur;
    }
  }
  $jeuResultat->closeCursor();   // fermer le jeu de résultat
  // deconnecterServeurBD($idConnexion);
  
}

function ajouterEmprunt($RefMat, $MatVisit, $DateEmp, &$tabErr)
{
  // Ouvrir une connexion au serveur mysql en s'identifiant
  $connexion = connecterServeurBD();
  
  // Si la connexion au SGBD à réussi
  if (TRUE) 
  {
    
    // Vérifier que la référence saisie n'existe pas déja
    $requete="select * from attribuer";
    $requete=$requete." where RefMateriel = '".$RefMat."';"; 
    $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant

    $jeuResultat->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le résultat soit récupérable sous forme d'objet     
    
    $ligne = $jeuResultat->fetch();
    if($ligne)
    {
      $message="Echec de l'emprunt : le matériel a déjà été emprunté!";
      ajouterErreur($tabErr, $message);
    }
    else
    {
      $requete="select * from materiel";
      $requete=$requete." where Reference = '".$RefMat."';"; 
      $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
      $jeuResultat->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le résultat soit récupérable sous forme d'objet
      $ligne = $jeuResultat->fetch();
      $fleur['panne']=$ligne->Panne;
      if ($fleur['panne'] == 1) {
          $message = "L'emprunt ne peut pas être effectué, le matériel est en panne";
          ajouterErreur($tabErr, $message);        
      }
      else{

        // Créer la requête d'ajout 
        $requete="insert into attribuer"
        ."(RefVisiteur,RefMateriel,DateAttribution) values ('".$MatVisit."', '".$RefMat."', '".$DateEmp."');";
       
        // Lancer la requête d'ajout 
        $ok=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
       
        // Si la requête a réussi
        if ($ok)
        {
          $message = "L'emprunt a été correctement effectué";
          ajouterErreur($tabErr, $message);
        }
        else
        {
          $message = $requete;
          ajouterErreur($tabErr, $message);
        } 
      }
    } 
    // fermer la connexion
    // deconnecterServeurBD($idConnexion);
  }
  else
  {
    $message = "problème à la connexion <br />";
    ajouterErreur($tabErr, $message);
  }
} 

function supprimerEmprunt($RefMat, &$tabErr)
{

  // Ouvrir une connexion au serveur mysql en s'identifiant
  $connexion = connecterServeurBD();
  
  // Si la connexion au SGBD à réussi
  if (TRUE) 
  {
    
    // Vérifier que la référence saisie n'existe pas déja
    $requete="select * from attribuer";
    $requete=$requete." where RefMateriel = '".$RefMat."';"; 
    $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant

    $jeuResultat->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le résultat soit récupérable sous forme d'objet     
    
    $ligne = $jeuResultat->fetch();
    if(!$ligne)
    {
      $message="Echec de la restitution : le matériel n'a pas été emprunté!";
      ajouterErreur($tabErr, $message);
    }
    else
    {
      // Créer la requête d'ajout 
       $requete="delete from attribuer"
       ." WHERE '".$RefMat."' = RefMateriel";
        // Lancer la requête d'ajout 
        $ok=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
       
        // Si la requête a réussi
        if ($ok)
        {
          $message = "La restitution a été correctement effectuée";
          ajouterErreur($tabErr, $message);
        }
        else
        {
          $message = "La restitution n'a pas été effectuée";
          ajouterErreur($tabErr, $message);
        } 

    }
    // fermer la connexion
    // deconnecterServeurBD($idConnexion);
  }
  else
  {
    $message = "problème à la connexion <br />";
    ajouterErreur($tabErr, $message);
  }
} 

function listerPanne()
{
  $connexion = connecterServeurBD();
  
  // Si la connexion au SGBD à réussi
  if (TRUE) 
  {
        
      $requete="select m.Reference,m.Prix,mo.Libelle from materiel m, modele mo where panne = 1
      AND m.IdModele = mo.Identifiant";
      
      $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant

      $jeuResultat->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le résultat soit récupérable sous forme d'objet     
      $i = 0;
      $ligne = $jeuResultat->fetch();
      if($ligne){
        while($ligne)
        {
            $fleur[$i]['Ref']=$ligne->Reference;
            $fleur[$i]['Mod']=$ligne->Libelle;
            $fleur[$i]['Prix']=$ligne->Prix;
            $ligne=$jeuResultat->fetch();
            $i = $i + 1;
        }
        return $fleur;
      }
  }
  $jeuResultat->closeCursor();   // fermer le jeu de résultat
}

function supprimerPanne($Mat, &$tabErr)
{
  $connexion = connecterServeurBD();
  
  // Si la connexion au SGBD à réussi
  if (TRUE) 
  {
        
    // Vérifier que la référence saisie n'existe pas déja
    $requete="select * from materiel";
    $requete=$requete." where Reference = '".$Mat."' AND Panne = NULL;"; 
    $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant

    $jeuResultat->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le résultat soit récupérable sous forme d'objet     
    
    $ligne = $jeuResultat->fetch();
    if($ligne)
    {
      $message="Ce matériel n'est pas en panne";
      ajouterErreur($tabErr, $message);
    }
    else
    {
        //Créer la requête de suppression
        $requete="update materiel set Panne = NULL where Reference = '".$Mat."';"; 
        // Lancer la requête d'ajout 
        $ok=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
       
        // Si la requête a réussi
        if ($ok)
        {
          $message = "Le matériel n'est plus en panne";
          ajouterErreur($tabErr, $message);
        }
        else
        {
          $message = "Le matériel est toujours en panne";
          ajouterErreur($tabErr, $message);
        } 

    }
    // fermer la connexion
    // deconnecterServeurBD($idConnexion);
  }
  else
  {
    $message = "problème à la connexion <br />";
    ajouterErreur($tabErr, $message);
  }
}

?>
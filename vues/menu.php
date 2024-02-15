
  <!-- Navbar
    ================================================== -->
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
         
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="active">
                <a href="./index.php">Accueil</a>
              </li>
              
              <li class="dropdown">
                  <a data-toggle="dropdown" class="dropdown-toggle" href="#">Visiteur  <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                      <li><a href="listerVisiteur.php">Lister</a></li>
                      <li><a href="ajouterVisiteur.php">Ajouter</a></li>
                      <li><a href="rechercher.php">Rechercher</a></li>
                      <li><a href="modifier.php">Modifier</a></li>
                      <li><a href="supprimerVisiteur.php">Supprimer</a></li>
                      
                  </ul>
              </li>   
               <li class="dropdown">
                  <a data-toggle="dropdown" class="dropdown-toggle" href="#">Materiel <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                      <li><a href="ajouterMat.php">Ajouter</a></li>
                      <li><a href="listerMateriel.php">Lister</a></li>
                      <li><a href="supprimerMateriel.php">Supprimer</a></li>
                      <li><a href="rechercherMat.php">Rechercher selon un prix</a></li>
                  </ul>
              </li>  
              <li class="dropdown">
                  <a data-toggle="dropdown" class="dropdown-toggle" href="#">Gestion des emprunts <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                      <li><a href="ajouterEmprunts.php">Ajouter</a></li>
                      <li><a href="listerEmprunts.php">Lister</a></li>
                      <li><a href="listerEmpruntsDate.php">Lister selon une date</a></li>
                      <li><a href="supprimerEmprunts.php">Restituer</a></li>
                  </ul>
              </li> 
              <li class="dropdown">
                  <a data-toggle="dropdown" class="dropdown-toggle" href="#">Gestion des pannes<b class="caret"></b></a>
                  <ul class="dropdown-menu">
                      <li><a href="listerPannes.php">Lister les matériels en panne</a></li>
                      <li><a href="ajouterPannes.php">Ajouter une panne</a></li>
                      <li><a href="supprimerPannes.php">Supprimer une panne</a></li>
                  </ul>
              </li>               
            </ul>
          </div>
        </div>
      </div>
    </div>
</div>


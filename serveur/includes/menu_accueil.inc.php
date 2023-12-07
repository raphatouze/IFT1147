<!-- Menu de navigation -->
<nav class="navbar navbar-expand-lg navbar-light bg-nav-perso">
    <div class="container-fluid">

        <img class="navbar-brand logo-center" src="serveur\images_articles\Logo.png" alt="LOCAFILMS Logo" height="200"> 
        <span class="navbar-brand navbar-center"><em>LocaFilms</em></span>
        <a class="navbar-brand" href="#">Films</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a id="cat" class="nav-link dropdown-toggle" href="#" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Catégories
                    </a>
                    <ul id="selCategs" class="dropdown-menu dropdown-menu-dark">
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a id="ac" class="nav-link dropdown-toggle" href="#" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Langue
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark">
                        <li><a class="dropdown-item" href="javascript:obtenirXML('fr');">Français</a></li>
                        <li><a class="dropdown-item" href="javascript:obtenirXML('en');">English</a></li>
                        <li><a class="dropdown-item" href="javascript:obtenirXML('es');">Espagnol</a></li>
                    </ul>
                </li>
            </ul>
        </div>

        <ul class='navbar-nav'>
            <li class="nav-item">
                <a id="dm" class="nav-link" data-bs-toggle="modal" data-bs-target="#enregModal" href="#"> <img src="client\public\images\user1.png">Devenir membre</a>
            </li>
            <li class="nav-item">
                <a id="co" class="nav-link" data-bs-toggle="modal" data-bs-target="#modalConnexion" href="#"> <img src="client\public\images\connexion.png">Connexion</a>
            </li>
        </ul>

    </div>
</nav>
<!-- Fin de menu de navigation -->

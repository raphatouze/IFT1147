<!-- Menu de navigation -->
<nav class="navbar navbar-expand-lg navbar-light bg-perso">
    <div class="container-fluid">
        <a id="idmt" class="navbar-brand" href="#">Membres</a>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a id="cat" class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Catégories
                    </a>
                    <ul id="selCategs" class="dropdown-menu dropdown-menu-dark"
                        aria-labelledby="navbarDarkDropdownMenuLink">
                    </ul>
                </li>
                <li class="nav-item">
                    <a id="pr" class="nav-link" data-bs-toggle="modal" data-bs-target="#modalEnreg" href="#">Profil</a>
                </li>
                <li class="nav-item">

                </li>
            </ul>
        </div>

    </div>
    <a id="pa" class="nav-link" href="javascript:afficherPanier();"><i class="bi bi-cart panierPlus"></i></a><span
        id="nbart">(0)</span>
    <a id="bdc" class="nav-link" onClick="deconnecter();"><i class="bi bi-forward-fill deconnexion"></i></a>
</nav>
<!-- Fin de menu de navigation -->

<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link @if (request()->is('Admin')) active @endif" aria-current="page" href="/Admin">
                    <span data-feather="home"></span>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if (request()->is('Admin/Produit') || request()->is('Admin/Produit/*')) active @endif" href="/Admin/Produit">
                    <span data-feather="file"></span>
                    Produits
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if (request()->is('Admin/Category') || request()->is('Admin/Category/*')) active @endif" href="/Admin/Category">
                    <span data-feather="file"></span>
                    Categories
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/">
                    <span data-feather="file"></span>
                    Retour
                </a>
            </li>
        </ul>
    </div>
</nav>



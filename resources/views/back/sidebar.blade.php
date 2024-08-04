<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Yelema - Admin</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
        </div>
        <ul class="sidebar-menu">
            <li class="dropdown">
                <a href="{{ route('admin.items.index') }}" class="nav-link "><i class="fas fa-fire"></i><span>Tableau de bord</span></a>
            </li>
            <li class="dropdown">
                <a href="{{ route('admin.commandes') }}" class="nav-link "><i
                        class="fas fa-box"></i><span>Commandes</span><span class="badge badge-pill">0</span></a>

            </li>
            <li class="dropdown">
                <a href="{{ route('admin.settings') }}" class="nav-link "><i
                        class="fas fa-cog"></i><span>Paramètres</span></a>
            </li>
        </ul>

    </aside>
</div>

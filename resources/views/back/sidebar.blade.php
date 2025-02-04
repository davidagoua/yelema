<div class="main-sidebar sidebar-style-2" x-data="{nbCommande: {}}">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('admin.items.index') }}">Yelema - Admin</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('admin.items.index') }}">St</a>
        </div>
        <ul class="sidebar-menu" x-init="nbCommande = await ( await fetch('{{ route('commandes_by_status') }}')).json()">
            <li class="dropdown {{ request()->route()->getName() === 'admin.items.index' ? 'active' : ''  }}">
                <a href="{{ route('admin.items.index') }}" class="nav-link "><i class="fas fa-fire"></i><span>Tableau de bord</span></a>
            </li>
            <li class="menu-header">Commandes</li>
            <li class=" {{ request()->route()->getName() === 'admin.commandes' ? 'active' : ''  }}">
                <a href="{{ route('admin.commandes') }}" class="nav-link "><i class="fas fa-file-signature"></i><span>En attente</span><span class="badge badge-pill" x-text="nbCommande[0] ?? 0"></span></a>
            </li>
            <li class=" {{ request()->route()->getName() === 'admin.commande_valide' ? 'active' : ''  }}">
                <a href="{{ route('admin.commande_valide') }}" class="nav-link "><i class="fas fa-check-circle"></i><span>Validé</span><span class="badge badge-pill" x-text="nbCommande[10] ?? 0"></span></a>
            </li>
            <li class=" {{ request()->route()->getName() === 'admin.commande_completed' ? 'active' : ''  }}">
                <a href="{{ route('admin.commande_completed') }}" class="nav-link "><i class="fas fa-box"></i><span>Terminées</span><span class="badge badge-pill" x-text="nbCommande[50] ?? 0"></span></a>
            </li>

            <li class="menu-header">Paramètres</li>
            <li class="dropdown {{ request()->route()->getName() === 'admin.settings' ? 'active' : ''  }}">
                <a href="{{ route('admin.settings') }}" class="nav-link "><i
                        class="fas fa-cog"></i><span>Pack & Articles</span></a>
            </li>
            <li class="dropdown {{ request()->route()->getName() === 'admin.messages' ? 'active' : ''  }}">
                <a href="{{ route('admin.messages') }}" class="nav-link "><i
                        class="fas fa-envelope"></i><span>Messages</span></a>
            </li>
        </ul>

    </aside>
</div>

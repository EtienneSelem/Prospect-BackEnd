<!-- need to remove -->
<li class="nav-item">
    <a href="{{ route('home') }}" class="{{ request()->is('home') ? 'nav-link active' : 'nav-link' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Home</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('map_index') }}" class="nav-link">
        <i class="nav-icon fas fa-map-marked"></i>
        <p>Map</p>
    </a>
</li>
<li class="{{ (request()->is('region') || request()->is('region') || request()->is('region')) ? 'nav-item menu-open' : 'nav-item' }}">
    <a href="#" class="{{ (request()->is('region-statut-attente') || request()->is('region-statut-valider') || request()->is('region-statut-rejeter')) ? 'nav-link active' : 'nav-link' }}">
        <i class="nav-icon fa-solid fa-location-dot"></i>
        <p>
            Regions
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('province') }}" class="nav-link">
                <i class="nav-icon fas fa-map"></i>
                <p>Provinces</p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('ville') }}" class="nav-link">
                <i class="nav-icon fas fa-city"></i>
                <p>Villes</p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('zone') }}" class="nav-link">
                <i class="nav-icon fas fa-landmark"></i>
                <p>Zones</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('commune') }}" class="nav-link">
                <i class="nav-icon fas fa-building"></i>
                <p>Communes</p>
            </a>
        </li>
    </ul>
</li>
<li class="nav-item">
    <a href="{{ route('offre') }}" class="nav-link">
        <i class="far fa-circle nav-icon"></i>
        <p>Offres</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('typeActivity') }}" class="nav-link">
        <i class="far fa-circle nav-icon"></i>
        <p>Type Activité</p>
    </a>
</li>
    <a href="{{ route('user') }}" class="{{ request()->is('users')? 'nav-link active' : 'nav-link' }}">
        <i class="nav-icon fas fa-user"></i>
        <p>Users</p>
    </a>
</li>

@can('Admin')
<li class="nav-item">
    <a href="{{ route('roles.index') }}" class="{{ request()->is('roles')? 'nav-link active' : 'nav-link' }}">
        <i class="nav-icon fas fa-briefcase"></i>
        <p>Roles</p>
    </a>
</li>
@endcan

@can('Admin')
<li class="nav-item">
    <a href="{{ route('group.index') }}" class="{{ request()->is('group')? 'nav-link active' : 'nav-link' }}">
        <i class="nav-icon fas fa-users"></i>
        <p>Groups</p>
    </a>
</li>
@endcan
<li class="{{ (request()->is('prospect') || request()->is('prospect') || request()->is('prospect')) ? 'nav-item menu-open' : 'nav-item' }}">
    <a href="#" class="{{ (request()->is('prospects/statut/attente') || request()->is('prospects/statut/valider') || request()->is('prospects/statut/rejeter')) ? 'nav-link active' : 'nav-link' }}">
            <i class="nav-icon fa-solid fa-location-dot"></i>
        <p>
            Prospects
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('prospect.attente') }}" class="{{ request()->is('prospect-statut-attente') ? 'nav-link active' : 'nav-link' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>En Attentes</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('prospect.valider') }}" class="{{ request()->is('prospect-statut-valider') ? 'nav-link active' : 'nav-link' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Validés</p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('prospect.rejeter') }}" class="{{ request()->is('prospect/statut/rejeter') ? 'nav-link active' : 'nav-link' }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Rejetés</p>
            </a>
        </li>
    </ul>
</li>

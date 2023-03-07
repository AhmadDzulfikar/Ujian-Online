<li class="menu-header">Starter</li>

<li class="{{ request()->is('admin/dashboard') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('admin.dashboard') }}">
        <i class="far fa-square"></i>
        <span>Dashboard</span>
    </a>
</li>
<li class="{{ request()->is('admin/guru') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('admin.guru') }}">
        <i class="far fa-square"></i>
        <span>Guru</span>
    </a>
</li>

<li class="{{ request()->is('admin/mapel') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('admin.mapel') }}">
        <i class="far fa-square"></i>
        <span>Mapel</span>
    </a>
</li>

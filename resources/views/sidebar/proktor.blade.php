<li class="menu-header">Starter</li>
{{-- <li class="dropdown active">
    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
        <span>Layout</span></a>
    <ul class="dropdown-menu">
        <li class=active><a class="nav-link" href="layout-default.html">Default Layout</a>
        </li>
    </ul>
</li> --}}
<li>
    <a class="nav-link" href="{{ route('proktor.dashboard') }}">
        <i class="far fa-square"></i>
        <span>Dashboard</span>
    </a>
</li>
<li>
    <a class="nav-link" href="{{ route('proktor.generate-token') }}">
        <i class="far fa-square"></i>
        <span>Token</span>
    </a>
    <a class="nav-link" href="{{ route('proktor.status-peserta') }}">
        <i class="far fa-square"></i>
        <span>Status Peserta</span>
    </a>
</li>

<li class="menu-header">Starter</li>
{{-- <li class="dropdown active">
    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
        <span>Layout</span></a>
    <ul class="dropdown-menu">
        <li class=active><a class="nav-link" href="layout-default.html">Default Layout</a>
        </li>
    </ul>
</li> --}}

<li class="{{ request()->is('guru/dashboard') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('guru.dashboard') }}">
        <i class="far fa-square"></i>
        <span>Dashboard</span>
    </a>
</li>
<li class="{{ request()->is('guru/mapel') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('guru.mapel') }}">
        <i class="far fa-square"></i> 
        <span>Data Mapel</span>
    </a>
</li>
<li>
    <a class="nav-link" href="blank.html">
        <i class="far fa-square"></i> 
        <span>Data Ujian</span>
    </a>
</li>
<li>
    <a class="nav-link" href="blank.html">
        <i class="far fa-square"></i> 
        <span>Input Soal</span>
    </a>
</li>
<li>
    <a class="nav-link" href="blank.html">
        <i class="far fa-square"></i> 
        <span>Cetak Nilai</span>
    </a>
</li>
<li>
    <a class="dropdown-item" href="{{ route('logout') }}"
        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
        <i class="far fa-square"></i> 

        {{ __('Logout') }}
    </a>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
</li>

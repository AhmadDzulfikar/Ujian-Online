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
    <a class="nav-link" href="blank.html">
        <i class="far fa-square"></i>
        <span>Dashboard</span>
    </a>
</li>
<li>
    <a class="nav-link" href="blank.html">
        <i class="far fa-square"></i>
        <span>Status Peserta</span>
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

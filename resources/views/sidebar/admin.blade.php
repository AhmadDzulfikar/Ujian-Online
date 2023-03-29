<li class="menu-header">Starter</li>

<li class="{{ request()->is('admin/dashboard') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('admin.dashboard') }}">
        <i class="fas fa-th-large"></i>
        <span>Dashboard</span>
    </a>
</li>
<li class="{{ request()->is('admin/guru') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('admin.guru') }}">
        <i class="fas fa-chalkboard-teacher"></i>
        <span>Guru</span>
    </a>
</li>

<li class="{{ request()->is('admin/siswa') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('admin.siswa') }}">
        <i class="fas fa-user"></i>
        <span>Siswa</span>
    </a>
</li>

<li class="{{ request()->is('admin/mapel') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('admin.mapel') }}">
        <i class="fas fa-book"></i>
        <span>Mapel</span>
    </a>
</li>

<li class="{{ request()->is('admin/kelas') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('admin.kelas') }}">
        <i class="far fa-square"></i>
        <span>Kelas</span>
    </a>
</li>

<li class="menu-header">Starter</li>
<li class="{{ request()->is('admin/ujian') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('admin.ujian') }}">
        <i class="far fa-square"></i>
        <span>Ujian</span>
    </a>
</li>


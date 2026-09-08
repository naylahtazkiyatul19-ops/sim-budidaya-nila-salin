<nav class="sidebar" id="sidebar">
    <div class="brand">
        <h4><i class="fas fa-fish"></i> NILA SALIN</h4>
        <small>Desa Wanantara, Indramayu</small>
    </div>
    
    <div class="nav-section">Main Menu</div>
    <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
        <i class="fas fa-th-large"></i> Dashboard
    </a>
    
    <div class="nav-section">Data Master</div>
    <a href="{{ route('pembudidaya.index') }}" class="nav-link {{ request()->routeIs('pembudidaya.*') ? 'active' : '' }}">
        <i class="fas fa-users"></i> Pembudidaya
    </a>
    <a href="{{ route('kolam.index') }}" class="nav-link {{ request()->routeIs('kolam.*') ? 'active' : '' }}">
        <i class="fas fa-water"></i> Kolam
    </a>
    <a href="{{ route('benih.index') }}" class="nav-link {{ request()->routeIs('benih.*') ? 'active' : '' }}">
        <i class="fas fa-seedling"></i> Benih
    </a>
    <a href="{{ route('pakan.index') }}" class="nav-link {{ request()->routeIs('pakan.*') ? 'active' : '' }}">
        <i class="fas fa-box"></i> Pakan
    </a>
    
    <div class="nav-section">Operasional</div>
    <a href="{{ route('pemberian-pakan.index') }}" class="nav-link {{ request()->routeIs('pemberian-pakan.*') ? 'active' : '' }}">
        <i class="fas fa-clock"></i> Pemberian Pakan
    </a>
   <a href="{{ route('panen.index') }}" class="nav-link {{ request()->routeIs('panen.*') ? 'active' : '' }}">
    <i class="fas fa-fish"></i> Panen
</a>
    <a href="{{ route('penjualan.index') }}" class="nav-link {{ request()->routeIs('penjualan.*') ? 'active' : '' }}">
        <i class="fas fa-money-bill-wave"></i> Penjualan
    </a>
    
    <div class="nav-section">Promosi</div>
    <a href="{{ route('promosi.index') }}" class="nav-link {{ request()->routeIs('promosi.*') ? 'active' : '' }}">
        <i class="fas fa-bullhorn"></i> Promosi Hasil Panen
    </a>
    
    <div class="nav-section">Laporan</div>
    <a href="{{ route('laporan.index') }}" class="nav-link {{ request()->routeIs('laporan.*') ? 'active' : '' }}">
        <i class="fas fa-file-alt"></i> Laporan
    </a>
    
    <div class="nav-section">Sistem</div>
    <a href="{{ route('profil') }}" class="nav-link {{ request()->routeIs('profil') ? 'active' : '' }}">
        <i class="fas fa-info-circle"></i> Profil
    </a>
    <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <i class="fas fa-sign-out-alt"></i> Logout
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
        @csrf
    </form>
</nav>
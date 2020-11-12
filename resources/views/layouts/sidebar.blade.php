<div class="main-sidebar">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="#">Point of Sale</a>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <a href="#">POS</a>
      </div>
      <ul class="sidebar-menu">

          <li class="menu-header">Dashboard</li>
          <li class="nav-item dropdown {{ Request::is('dashboard') ? 'sidebar-item active' : '' }}">
            <a href="{{ route('dashboard') }}" class="nav-link ">
              <i class="fas fa-fire"></i>
              <span>Dashboard</span>
            </a>
          </li>

          @if (auth()->user()->level=="manager")
            <li class="menu-header">Data Master</li>
            <li class="nav-item dropdown {{ Request::is('user', 'create_user') ? 'sidebar-item active' : '' }}">
              <a href="{{ route('user') }}" class="nav-link">
                <i class="fas fa-columns"></i> 
                <span>Data User</span>
              </a>
            </li>
          @endif

          @if (auth()->user()->level=="admin")
            <li class="nav-item dropdown {{ Request::is('barang', 'create_barang') ? 'sidebar-item active' : '' }}">
              <a class="nav-link" href="{{ route('barang') }}">
                <i class="far fa-square"></i> 
                <span>Data Barang</span>
              </a>
            </li>
          @endif
          
          @if (auth()->user()->level=="admin")
          <li class="nav-item dropdown {{ Request::is('merek', 'create_merek') ? 'sidebar-item active' : '' }}">
            <a href="{{ route('merek') }}" class="nav-link">
              <i class="fas fa-ellipsis-h"></i> 
              <span>Data Merek</span>
            </a>
          </li>
          @endif

          @if (auth()->user()->level=="admin")
          <li class="nav-item dropdown {{ Request::is('distributor', 'create_distributor') ? 'sidebar-item active' : '' }}">
            <a href="{{ route('distributor') }}" class="nav-link">
              <i class="fas fa-pencil-ruler"></i> 
              <span>Data Distributor</span>
            </a>
          </li>
          @endif

          @if (auth()->user()->level=="kasir")
            <li class="nav-item dropdown {{ Request::is('index_transaksi', 'transaksi') ? 'sidebar-item active' : '' }}">
              <a href="{{ route('index_transaksi') }}" class="nav-link">
                <i class="far fa-file-alt"></i>
                <span>Transaksi</span>
              </a>
            </li>
          @endif
        </ul>
    </aside>
  </div>
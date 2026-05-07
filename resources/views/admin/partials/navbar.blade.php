<nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
  <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
    <a class="navbar-brand brand-logo ps-4" href="{{ route('admin.dashboard') }}" style="font-family: 'Poppins', sans-serif; font-weight: 700; letter-spacing: 1px; color: #b66dff;">
      QUALIPRO
    </a>
    <a class="navbar-brand brand-logo-mini" href="{{ route('admin.dashboard') }}">
      <span style="color: #b66dff; font-weight: bold;">QP</span>
    </a>
  </div>
  
  <div class="navbar-menu-wrapper d-flex align-items-stretch">
    <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
      <span class="mdi mdi-menu"></span>
    </button>
    
    <ul class="navbar-nav navbar-nav-right" style="font-family: 'Poppins', sans-serif;">
      <li class="nav-item d-none d-lg-block">
        <a class="nav-link" href="{{ route('home') }}" target="_blank">
          <span class="me-2">Voir le site</span>
          <i class="mdi mdi-web text-primary"></i>
        </a>
      </li>

      <li class="nav-item nav-logout d-none d-lg-block">
        <a class="nav-link" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
          <span class="me-2">Déconnexion</span>
          <i class="mdi mdi-power text-danger"></i>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
      </li>
    </ul>
    
    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
      <span class="mdi mdi-menu"></span>
    </button>
  </div>
</nav>
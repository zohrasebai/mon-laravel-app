<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav" style="font-family: 'Poppins', sans-serif;">
    <li class="nav-item nav-profile">
      <a href="#" class="nav-link">
        <div class="nav-profile-image">
          <img src="{{ asset('bigdash/assets/images/faces/face1.jpg') }}" alt="profile">
          <span class="login-status online"></span>
        </div>
        <div class="nav-profile-text d-flex flex-column ms-3">
          <span class="font-weight-bold mb-2">Administrateur</span>
          <span class="text-secondary text-small">Gestion du site</span>
        </div>
      </a>
    </li>

    <li class="nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
      <a class="nav-link" href="{{ route('admin.dashboard') }}">
        <span class="menu-title">Tableau de Bord</span>
        <i class="mdi mdi-home menu-icon text-primary"></i>
      </a>
    </li>

    <li class="nav-item {{ request()->routeIs('admin.settings') ? 'active' : '' }}">
      <a class="nav-link" href="{{ route('admin.settings') }}">
        <span class="menu-title">Paramètres Généraux</span>
        <i class="mdi mdi-cog menu-icon text-danger"></i>
      </a>
    </li>

    <li class="nav-item {{ request()->routeIs('admin.nav-links') ? 'active' : '' }}">
      <a class="nav-link" href="{{ route('admin.nav-links') }}">
        <span class="menu-title">Menu Navigation</span>
        <i class="mdi mdi-link-variant menu-icon text-info"></i>
      </a>
    </li>
    
    <li class="nav-item {{ request()->routeIs('admin.about.*') ? 'active' : '' }}">
      <a class="nav-link" href="{{ route('admin.about.index') }}">
        <span class="menu-title">Sommes-Nous</span>
        <i class="mdi mdi-account-group menu-icon text-secondary"></i>
      </a>
    </li>
    <li class="nav-item {{ request()->routeIs('admin.video.*') ? 'active' : '' }}">
      <a class="nav-link" href="{{ route('admin.video.index') }}">
        <span class="menu-title">Section Vidéo</span>
        <i class="mdi mdi-video menu-icon text-dark"></i>
      </a>
    </li>
    <li class="nav-item {{ request()->routeIs('admin.services.*') ? 'active' : '' }}">
      <a class="nav-link" href="{{ route('admin.services.index') }}">
        <span class="menu-title">Section Services</span>
        <i class="mdi mdi-briefcase menu-icon text-primary"></i>
      </a>
    </li>
    <li class="nav-item {{ request()->routeIs('admin.core_values.*') ? 'active' : '' }}">
      <a class="nav-link" href="{{ route('admin.core_values.index') }}">
        <span class="menu-title">Valeurs Fondamentales</span>
        <i class="mdi mdi-star-circle menu-icon text-warning"></i>  
      </a>
    </li>

    <li class="nav-item {{ request()->routeIs('admin.partners.*') ? 'active' : '' }}">
      <a class="nav-link" href="{{ route('admin.partners.index') }}">
        <span class="menu-title">Partenaires</span>
        <i class="mdi mdi-handshake menu-icon text-info"></i>
      </a>
    </li>

    <li class="nav-item sidebar-actions">
      <span class="nav-link">
        <div class="border-bottom">
          <h6 class="font-weight-normal mb-3 text-muted">2026 - 2031</h6>
        </div>
        <a href="{{ route('home') }}" target="_blank" class="btn btn-block btn-lg btn-gradient-primary mt-4">
            <i class="mdi mdi-open-in-new"></i> Web Site
        </a>
      </span>
    </li>
  </ul>


  
</nav>
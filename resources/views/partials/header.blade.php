@php
    // Récupération des paramètres globaux
    $phone = $global_settings['phone'] ?? "0699 75 80 30 / 0776 70 75 80"; 
    $email = $global_settings['email'] ?? "qualiproplus16@gmail.com";
    $logo  = asset('assets/images/logo/Image1.png'); 
    
    $footerSocial = [
        ['icon' => 'fa fa-facebook', 'url' => 'https://www.facebook.com/share/17Sx6r89As/'],
        ['icon' => 'fa fa-linkedin', 'url' => 'https://www.linkedin.com/company/qualipro-plus/'],
        ['icon' => 'fa fa-instagram', 'url' => 'https://www.instagram.com/quali_proplus'],
    ];

    $home_link = route('home');

    $achievements = [
        (object)['icon' => 'fa fa-lightbulb-o', 'title' => 'Accompagnement', 'desc' => 'Systèmes & Certifications'],
        (object)['icon' => 'fa fa-user-circle-o', 'title' => 'Formation', 'desc' => 'Développement des compétences'],
        (object)['icon' => 'fa fa-check-square-o', 'title' => 'Audit ', 'desc' => 'Conformité & Performance'],
    ];
@endphp

<style>
    /* Empêcher le bandeau jaune de dépasser */
    .nav-header {
        position: relative;
        overflow: visible !important; /* Changé en visible pour laisser descendre le sous-menu */
    }

    .nav-header::after {
        bottom: 0 !important; 
        height: 100% !important; 
    }

    /* Style des liens principaux (Raccourcis pour éviter que ce soit trop long) */
    .navbar-nav .nav-link {
         
        text-transform: uppercase !important;
        font-size: 13px !important;
        font-weight: 800 !important;
        letter-spacing: 0.5px !important;
        color: #176363 !important; 
        padding: 15px 12px !important; 
        transition: all 0.3s ease !important;
    }
    
    .navbar-nav .nav-link:hover {
        color: #00bcd4 !important; 
    }

    /* 🔥 FORCE L'APPARITION DU SOUS-MENU AU SURVOL 🔥 */
    .dropdown:hover .dropdown-menu {
        display: block !important;
        opacity: 1 !important;
        visibility: visible !important;
    }

    /* Style de la boîte qui contient les sous-titres */
    .dropdown-menu {
        display: none;
        position: absolute;
        background-color: #ffffff !important;
        border: 1px solid #e0e0e0 !important;
        box-shadow: 0px 5px 15px rgba(0,0,0,0.1) !important;
        padding: 10px 0 !important;
        min-width: 160px;
        z-index: 9999 !important;
        top: 100%; /* Se place juste en dessous du titre */
        left: 0;
    }

    /* Style des liens à l'intérieur du sous-menu */
    .dropdown-item {
        display: block;
        width: 100%;
        padding: 8px 20px !important;
        color: #176363 !important;
        font-size: 13px !important;
        font-weight: 800 !important;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .dropdown-item:hover {
        background-color: #f8f9fa !important;
        color: #00bcd4 !important;
    }
</style>

<header id="header" class="header-4 nav-on-top">

    {{-- TOP HEADER --}}
    <div id="top" class="top-header bg-secondery color-white icon-primary d-md-none d-lg-block">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-5">
                    <ul>
                        <li><i class="fa fa-phone mr-10"></i>{{ $phone }}</li>
                        <li><i class="fa fa-envelope mr-10"></i>{{ $email }}</li>
                    </ul>
                </div>
                <div class="col-lg-7 col-md-7">
                    <ul class="color-white-a hover-primary float-right">
                        <li class="list-inline-item mr-10">
                            <span class="d-none d-md-inline opacity-75" style="font-weight: 900 !important;">Nous contacter :</span>
                        </li>
                        @foreach($footerSocial as $social)
                            <li class="list-inline-item">
                                <a href="{{ $social['url'] ?? '#' }}"><i class="{{ $social['icon'] ?? '' }}" aria-hidden="true"></i></a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

    {{-- LOGO & INFOS --}}
    <div class="logo-box py-30 bg-white">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-3 col-lg-3 col-md-3">
                    <a class="navbar-brand mt-1" href="{{ $home_link }}">
                        <img src="{{ $logo }}" alt="QualiPro Plus" style="max-height: 70px;">
                    </a>
                </div>

                <div class="col-xl-9 col-lg-9 col-md-10">
                    <div class="d-flex justify-content-end align-items-center h-100">
                        @foreach($achievements as $ach)
                            <div class="d-flex align-items-center px-4 {{ !$loop->last ? 'border-right' : '' }}" style="border-color: #e0e0e0 !important;">
                                
                                <div class="icon-circle d-flex align-items-center justify-content-center mr-3" 
                                     style="width: 42px; height: 42px; border-radius: 50%; background-color: rgba(0, 102, 102, 0.05);">
                                    <i class="{{ $ach->icon }}" style="font-size: 18px; color: #176363;"></i>
                                </div>
                                
                                <div class="text-left">
                                    <h6 class="mb-0" style="font-weight: 900; color: #176363; font-size: 14px; text-transform: uppercase; letter-spacing: 0.5px;">
                                        {{ $ach->title }}
                                    </h6>
                                    <p class="mb-0" style="font-size: 11px; color: #ff0000; line-height: 1.2;">
                                        {{ $ach->desc }}
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- NAVBAR --}}
    <div class="nav-header bg-gray py-10 position-relative">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light px-0">
                
                <button class="toggle-btn" data-toggle="collapse" data-target="#mainMenu">
                    <span></span><span></span><span></span>
                </button>

                <div class="collapse navbar-collapse" id="mainMenu">
                    <ul class="navbar-nav mr-auto">
                        
                        {{-- 1. Accueil --}}
                        <li class="nav-item">
                            <a class="nav-link" href="{{ $home_link }}">Accueil</a>
                        </li>

                        {{-- 2. Qui nous sommes (Avec ses sous-titres cachés dedans) --}}
                       <li class="nav-item dropdown">
                            <a class="nav-link" href="#about">
                                Qui nous sommes <i class="fa fa-angle-down ml-1" style="font-size: 12px;"></i>
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#core">Nos Valeurs</a>
                                <a class="dropdown-item" href="#team">Notre Équipe</a>
                            </div>
                        </li>

                        {{-- 3. Compétences (Raccourci pour que ce soit moins long) --}}
                        <li class="nav-item">
                            <a class="nav-link" href="#causes">Nos Compétences</a>
                        </li>

                        {{-- 4. Clients --}}
                        <li class="nav-item">
                            <a class="nav-link" href="#partners">Clients Nous Font Confiance</a>
                        </li>

                    </ul>
                </div>
            </nav>
        </div>
    </div>
</header>
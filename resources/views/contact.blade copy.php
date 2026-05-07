@php

    // Récupération des paramètres globaux (AppServiceProvider)
    $phone = $global_settings['phone'] ?? "+213 699 75 80 30"; 
    $email = $global_settings['email'] ?? "qualiproplus16@gmail.com";
    $logo  = asset('assets/images/logo/logo.png'); 

    // Liens Statiques en Français
    $devis_link   = route('contact'); // أو أي رابط مخصص لطلب تسعيرة
    $contact_link = route('contact');
    $home_link    = route('home');

    // Statistiques (Achievements)
    $achievements = $global_achievements->count() > 0 ? $global_achievements : [
        (object)['count' => '100%', 'title' => 'Satisfaction Client'],
        (object)['count' => '10', 'title' => 'Normes Maîtrisées'],
        (object)['count' => '4', 'title' => 'Types d\'Audits'],
    ];

    // Navigation dynamique
    $nav_links = $global_nav_links;
@endphp


<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- CSS Files - Targeted to assets --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/scrollcue.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/remixicon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/dark-theme.css') }}">

    {{-- Google Font: Poppins --}}
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <title>{{ config('app.name', 'QualiPro Plus - Expertise ISO') }}</title>
    
    {{-- Favicon --}}
    <link rel="icon" type="image/png" href="{{ asset('assets/img/logo/favicon.png') }}">

    <style>
        body { font-family: 'Poppins', sans-serif; background-color: #fff; }
        .text_primary { color: #b66dff !important; }
        .bg-primary { background-color: #b66dff !important; }
        .btn-primary { background-color: #b66dff; border-color: #b66dff; }
        .btn-primary:hover { background-color: #a350f9; border-color: #a350f9; }
        
        .map-area:after {
            position: absolute;
            bottom: 0;
            left: 0;
            content: "";
            width: 100%;
            height: 50%;
            background-color: #ffffff;
            z-index: -1;
        }
        .contact-card {
            background: #fdfbff;
            padding: 20px;
            border-radius: 15px;
            transition: 0.3s;
        }
        .contact-card:hover { transform: translateY(-5px); box-shadow: 0 10px 20px rgba(0,0,0,0.05); }
    </style>
</head>
<body>

    {{-- Preloader --}}
    <div class="preloader-area" id="preloader">
        <div class="spinner">
            <div></div><div></div><div></div><div></div><div></div>
        </div>
    </div>

    <div id="smooth-wrapper">
        <div id="smooth-content">

            {{-- Header/Navbar --}}
            <div class="nav-header bg-gray py-10 position-relative">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light px-0">
                <a class="navbar-brand two" href="{{ $home_link }}">
                    <img src="{{ $logo }}" alt="logo">
                </a>

                <button class="toggle-btn" data-toggle="collapse" data-target="#mainMenu">
                    <span></span><span></span><span></span>
                </button>

                <div class="collapse navbar-collapse" id="mainMenu">
                    <ul class="navbar-nav mr-auto">
                        <!-- @foreach($nav_links as $item)
                            @if($item->is_active)
                            <li class="nav-item">
                                <a class="nav-link" href="{{ $item->url }}">{{ $item->title }}</a>
                            </li>
                            @endif
                        @endforeach -->

                        @foreach($nav_links as $item)
                            {{-- جرب إزالة هذا الشرط مؤقتاً للتأكد --}}
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ $item->url }}">{{ $item->title }}</a>
                                </li>
                        @endforeach
                        
                    </ul>

                    <ul class="ml-auto nav-right-part">
                        <li><a class="quote-btn btn-primary" href="{{ $contact_link }}">Demander Devis</a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>

            {{-- Breadcrumb --}}
            <div class="breadcrumb-area bg-f round-20 position-relative z-1" style="background: linear-gradient(45deg, #f8f9fa, #f1f4f9); padding: 100px 0;">
                <div class="container text-center">
                    <ul class="br-menu text-center d-inline-block list-unstyled mb-15 px-4 py-2 round-5" style="background: rgba(182, 109, 255, 0.1);">
                        <li class="position-relative fs-13 fw-semibold ls-1 d-inline-block me-3">
                            <a href="{{ route('home') }}" class="text-dark decoration-none">Accueil</a>
                        </li>
                        <li class="position-relative fs-13 fw-semibold ls-1 d-inline-block text_primary">Contact</li>
                    </ul>
                    <h2 class="section-title style-one fw-bold font-secondary text-black text-center mb-6" style="font-size: 2.5rem;">
                        Contactez QualiPro Plus
                    </h2>
                </div>
            </div>

            {{-- Contact Section --}}
            <div class="container style-one pt-100 pb-100">
                <div class="row align-items-center">
                    {{-- Contact Form --}}
                    <div class="col-lg-5 mb-md-50">
                        <div class="comment-form-box round-20 shadow-lg p-5 bg-white border">
                            <form action="{{ route('contact.send') }}" method="POST" class="comment-form" id="contact-form">
                                @csrf
                                <h3 class="fs-24 fw-bold mb-30 text-dark">Parlons de votre projet</h3>

                                @if(session('success'))
                                    <div class="alert alert-success border-0 shadow-sm mb-4">
                                        <i class="ri-checkbox-circle-line me-2"></i> {{ session('success') }}
                                    </div>
                                @endif

                                <div class="form-group mb-20">
                                    <input type="text" name="name" required class="form-control ht-52 round-10 border-light bg-light" placeholder="Nom complet *">
                                </div>
                                <div class="form-group mb-20">
                                    <input type="email" name="email" required class="form-control ht-52 round-10 border-light bg-light" placeholder="Email professionnel *">
                                </div>
                                <div class="form-group mb-20">
                                    <input type="text" name="subject" required class="form-control ht-52 round-10 border-light bg-light" placeholder="Objet (Ex: Certification ISO 9001)">
                                </div>
                                <div class="form-group mb-20">
                                    <textarea name="message" cols="30" rows="5" required class="form-control round-10 border-light bg-light resize-0" placeholder="Votre message..."></textarea>
                                </div>

                                <div class="form-check mb-25">
                                    <input class="form-check-input" type="checkbox" id="agree" required>
                                    <label class="form-check-label fs-14 text-muted" for="agree">
                                        J'accepte le traitement de mes données selon la <a href="#" class="text_primary">politique de confidentialité</a>.
                                    </label>
                                </div>

                                <button class="btn btn-primary w-100 fw-bold py-3 shadow-sm round-10" type="submit">
                                    Envoyer le message <i class="ri-send-plane-fill ms-2"></i>
                                </button>
                            </form>
                        </div>
                    </div>

                    {{-- Contact Info Content --}}
                    <div class="col-lg-7 ps-lg-5">
                        <div class="contact-content ps-lg-4">
                            <h6 class="text_primary fw-bold text-uppercase mb-3">Cabinet de Conseil & Audit</h6>
                            <h2 class="fw-bold text-dark mb-4" style="line-height: 1.3;">
                                Prêt à élever vos standards de qualité avec <span class="text_primary">QualiPro Plus</span> ?
                            </h2>
                            <p class="fs-16 text-muted mb-40">
                                Que vous soyez au début de votre démarche de certification ou que vous souhaitiez auditer votre système actuel, nos experts sont là pour vous guider.
                            </p>

                            <div class="row g-4">
                                <div class="col-md-6">
                                    <div class="contact-card">
                                        <div class="icon mb-3">
                                            <i class="ri-phone-fill fs-24 text_primary"></i>
                                        </div>
                                        <h6 class="fw-bold mb-2">Téléphone</h6>
                                        <p class="mb-0 text-muted">{{ $global_settings['phone'] ?? '+213 699 75 80 30' }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="contact-card">
                                        <div class="icon mb-3">
                                            <i class="ri-mail-open-fill fs-24 text_primary"></i>
                                        </div>
                                        <h6 class="fw-bold mb-2">Email</h6>
                                        <p class="mb-0 text-muted">{{ $global_settings['email'] ?? 'contact@qualiproplus.com' }}</p>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="contact-card d-flex align-items-center">
                                        <div class="icon me-3">
                                            <i class="ri-map-pin-2-fill fs-24 text_primary"></i>
                                        </div>
                                        <div>
                                            <h6 class="fw-bold mb-1">Localisation</h6>
                                            <p class="mb-0 text-muted">Alger, Algérie - Bureau d'expertise QualiPro Plus</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-50 text-center text-lg-start">
                                <img src="{{ asset('assets/img/contact-vector.png') }}" alt="Expert QualiPro" class="img-fluid" style="max-width: 300px;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Map Section --}}
            <div class="map-area position-relative z-1">
                <div class="container-fluid p-0">
                    <div class="comp-map shadow-sm">
                        <iframe 
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3197.35123!2d3.058!3d36.75!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMzbCsDQ1JzAwLjAiTiAzwrAwMycyOC44IkU!5e0!3m2!1sfr!2sdz!4v1625000000000!5m2!1sfr!2sdz" 
                            width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy">
                        </iframe>
                    </div>
                </div>
            </div>

            {{-- Footer --}}
            @include('partials.footer')

        </div>
    </div>

    {{-- JS Files - Targeted to assets --}}
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/gsap.min.js') }}"></script>
    <script src="{{ asset('assets/js/scrollTrigger.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
</body>
</html>
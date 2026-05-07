@php
    // Récupération des sliders actifs
    $activeSliders = \App\Models\Slider::orderBy('order', 'asc')->get();
    
    // Chemin vidéo depuis la BDD
    $videoPath = asset($video->video_file ?? 'assets/videos/vd.mp4');

    // Images fallbacks (Déjà présentes)
    $k1 = asset('assets/images/slider/k1.png');
    $k2 = `assets/images/slider/k2.png`;
    $k3 = `assets/images/slider/k3.png`;
    $f1 = `assets/images/slider/f1.png`;
    @endphp

<style>
    /* --- STYLE HERO SECTION --- */
    .hero-section {
        min-height:  <span class="color-primary">{{ $coreSettings->subtitle_fr ?? 'Accompagnement & Certification' }}</span>
        <h1>Votre partenaire vers la <span class="color-primary"> Certification</span>Internationale</h1>
        <p class="mb-30">
            {{ $coreSettings->desc_fr ?? ' Accompagnement, Formation et Audit. Nous transformons les ambitions de votre entreprise en résultats durables.' }}
        </p>

        <div class="d-flex gap-3">
            <a href="#causes" class="hero-btn">Découvrir nos services</a>
            <a href="#partners" class="btn btn-outline-secondary px-4 py-2" style="border-radius:5px;">
                Nos Partenaires
            </a>
        </div>
    </div>

    <style>
    .hero-section {
         min-height: auto;
        background-color: #f8f9fa; 
       
    }
    
    .hero-text h1 {
        color: #1c2c52; /* Bleu Marine */
        font-weight: 800;
        line-height: 1.2;
        margin-bottom: 20px;
    }

    .hero-text .highlight {
        color: #176363; /* Bleu Vert Principal */
    }

    .hero-text p {
        font-size: 1.1rem;
        color: #555;
        margin-bottom: 30px;
    }

    .hero-btn {
        background-color: #176363;
        color: #fff;
        padding: 12px 30px;
        border-radius: 5px;
        font-weight: 600;
        text-decoration: none;
        transition: 0.3s;
        border: 2px solid #176363;
    }

    .hero-btn:hover {
        background-color: #fff;
        color: #176363;
    }

    /* --- CONTENEUR VIDEO --- */
    .video-container {
        position: relative;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 20px 40px rgba(0,0,0,0.1);
        background: #000;
    }
    
    video {
        width: 100%;
        height: auto;
        display: block;
        outline: none;
    }

    /* --- STYLE DES BOUTONS --- */
    .video-btn {
        position: absolute;
        bottom: 20px;
        width: 50px;
        height: 50px;
        background-color: rgba(28, 44, 82, 0.8);
        color: #fff;
        border: none;
        border-radius: 50%;
        cursor: pointer;
        z-index: 10;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
        font-size: 20px;
    }

    .video-btn:hover {
        background-color: #1c2c52;
        transform: scale(1.1);
    }

    .btn-play-pause {
        right: 20px; /* À droite */
    }

    .btn-sound {
        right: 80px; /* Un peu plus à gauche (80px) */
    }
</style>

<!-- SECTION HERO DIVISÉE -->
<section class="hero-section d-flex align-items-center" >
    <div class="container">
        <div class="row align-items-center">
            <!-- COLONNE GAUCHE : TEXTE -->
            <div class="col-lg-6 mb-5 mb-lg-0 hero-text">
                <span class="badge badge-pill px-3 py-2 mb-3" style="background:#e6f7ff; color:#176363; font-size:0.9rem;">
                    Accompagnement & Certification
                </span>
                <h1>Votre partenaire vers la<span class="highlight"> Certification</span> Internationale</h1>
                
                <p>
                    Accompagnement, Formation et Audit. Nous transformons les ambitions de votre entreprise en résultats durables.
                </p>
                
                <div class="d-flex gap-3">
                    <a href="#causes" class="hero-btn">Découvrir nos services</a>
                </div>
            </div>

            <!-- COLONNE DROITE : VIDEO -->
            <div class="col-lg-6">
                <div class="video-container">
                    
                    <!-- LE LECTEUR VIDEO -->
                    <video 
                        id="heroVideo"
                        autoplay 
                        loop 
                        playsinline 
                        preload="auto">
                        <source src="{{ $videoPath }}" type="video/mp4">
                        Votre navigateur ne supporte pas la vidéo.
                    </video>

                    <!-- BOUTON 1 : PLAY / PAUSE -->
                    <button class="video-btn btn-play-pause" onclick="toggleHeroVideo()">
                        <i id="videoIcon" class="fa fa-pause" aria-hidden="true"></i>
                    </button>

                    <!-- BOUTON 2 : SON -->
                    <button class="video-btn btn-sound" onclick="toggleHeroSound()">
                        <i id="soundIcon" class="fa fa-volume-up" aria-hidden="true"></i>
                    </button>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- JAVASCRIPTS POUR LES BOUTONS -->
<script>
    // 1. Gérer le Play / Pause
    function toggleHeroVideo() {
        var video = document.getElementById('heroVideo');
        var icon = document.getElementById('videoIcon');
        
        if(video.paused) {
            video.play();
            icon.classList.remove('fa-play');
            icon.classList.add('fa-pause');
        } else {
            video.pause();
            icon.classList.remove('fa-pause');
            icon.classList.add('fa-play');
        }
    }

    // 2. Gérer le Son (Icônes FontAwesome 4)
    function toggleHeroSound() {
        var video = document.getElementById('heroVideo');
        var icon = document.getElementById('soundIcon');
        
        if(video.muted) {
            video.muted = false; 
            // Icône : Haut-parleur normal
            icon.classList.remove('fa-volume-off'); 
            icon.classList.add('fa-volume-up');
        } else {
            video.muted = true; 
            // Icône : Haut-parleur barré
            icon.classList.remove('fa-volume-up'); 
            icon.classList.add('fa-volume-off');
        }
    }
</script>
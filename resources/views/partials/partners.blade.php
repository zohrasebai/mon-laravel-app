@php
    // Récupération des variables ou valeurs par défaut
    $partnersSubtitle = 'Ils Nous Font Confiance';
    $partnersTitle = 'Nos Partenaires & Clients';
    $partnersDesc = 'Nous collaborons avec des entreprises de divers secteurs (agroalimentaire, pharmaceutique, cosmétique) pour bâtir des démarches d’amélioration continue et garantir leur conformité aux normes.';
@endphp

<style>
    /* --- STYLE SECTION PARTENAIRES --- */
    
    /* 1. Fond de couleur unie (au lieu d'image) */
    .our-partners-two {
        background-color: #f8f9fa; /* Tu peux changer #f8f9fa par la couleur que tu veux, ex: #ffffff ou #e9ecef */
    }

    /* 2. Suppression complète du fond d'image (au cas où l'ancien CSS reste en mémoire) */
    .our-partners-two::before, 
    .our-partners-two::after {
        background-image: none !important;
        content: none !important;
    }

    /* 3. Style des logos */
    .our-partners-two .item img {
        max-height: 70px; 
        width: auto; 
        object-fit: contain;
        display: inline-block !important;
        /* Plus de filtre noir et blanc grâce à notre correction précédente */
    }
</style>

<section id="partners" class="our-partners-two position-relative py-80">
    <div class="container">
        <div style="height: 10px;"></div>
        <div class="row align-items-center">
            
            {{-- BLOC GAUCHE : TEXTES --}}
            <div class="col-md-12 col-lg-5">
                <div class="title mb-30 wow animated slideInLeft">
                    <span class="color-primary">{{ $partnersSubtitle }}</span>
                    <h2 class="position-relative va-lb-line-w50-h2-primary pb-15 mb-20">{{ $partnersTitle }}</h2>
                    <p>{{ $partnersDesc }}</p>
                </div>
            </div>

            {{-- BLOC DROIT : CARROUSEL (DYNAMIQUE via BDD) --}}
            <div class="col-md-12 col-lg-7">
                <div class="owl-carousel partners-slider wow animated slideInRight">
                    
                    @forelse($partners as $partner)
                        <div class="item text-center p-20">
                            {{-- Utilisation dynamique de l'image chargée depuis l'admin --}}
                            <img src="{{ asset($partner->image) }}" alt="{{ $partner->name ?? 'Partenaire' }}">
                        </div>
                    @empty
                        <div class="item text-center">
                            <p class="text-muted">Aucun partenaire trouvé (Ajoutez-les via l'admin).</p>
                        </div>
                    @endforelse

                </div>
            </div>
            
        </div>
    </div>
</section>

@push('scripts')
<script>
document.addEventListener("DOMContentLoaded", function() {
    if (typeof jQuery !== 'undefined' && jQuery().owlCarousel) {
        jQuery('.partners-slider').owlCarousel({
            loop: true,
            margin: 30,
            autoplay: true,
            autoplayTimeout: 2000, 
            nav: false,
            dots: false,
            responsive: {
                0: { items: 2 },
                600: { items: 3 },
                1000: { items: 4 }
            }
        });
    }
});
</script>
@endpush
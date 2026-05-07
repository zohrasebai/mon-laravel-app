@php
    // Utilisation de la variable $about envoyée par le contrôleur
    $aboutImg = $about->image ?? 'assets/images/background/consulting.jpg';
    $aboutTitle = $about->title_fr ?? 'Qui Sommes-Nous';
    $aboutText1 = $about->text_1_fr ?? '';
    $aboutText2 = $about->text_2_fr ?? '';
    $aboutReadMoreUrl = '#contact'; // Fixe ou dynamique
    $aboutReadMoreText = $about->button_text_fr ?? 'Demander Devis';
@endphp
<section id="about" class="about-us-3 position-relative bg-light">
    <div class="container">
        <div style="height: 10px;"></div>
        <div class="row">
            <div class="col-md-12 col-lg-12 col-xl-5">
                <div class="about-img-2 wow animated slideInRight animated">
                    <img src="{{ filter_var($aboutImg, FILTER_VALIDATE_URL) ? $aboutImg : asset($aboutImg) }}" alt="Notre Équipe">
                </div>
            </div>
            <div class="col-md-12 col-lg-12 col-xl-7">
                <div class="position-relative">
                    <div class="inner-title mb-30">
                        <h2 class="color-secondery xl-mt-30 wow animated slideInUp animated">{{ $aboutTitle }}</h2>
                    </div>
                    <div class="text-area mb-30 wow animated slideInUp animated">
                        <p class="mb-15">{{ $aboutText1 }}</p>
                    </div>
                    <div class="about-area-2 bg-secondery d-flex color-white p-40 wow animated slideInUp animated">
                        <p>{{ $aboutText2 }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
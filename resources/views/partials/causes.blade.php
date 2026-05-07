
<section id="causes" class="bg-light py-5">
    <div class="container">
<div style="height: 85px;"></div>
        {{-- TITRE --}}
        <div class="row">
            <div class="col-md-12 col-lg-12 col-xl-12">
                <div class="title mb-30 w-75 text-center mx-auto wow animated slideInUp">

                    <span class="color-primary" style="color: #ffcc00; font-weight: bold;">
                        Expertise en Certification
                    </span>

                    <h2 class="position-relative va-c-line-w50-h1-primary pb-15 mb-20">
                        Nos Domaines De Compétence
                    </h2>

                    <p>
                       Nous accompagnons les entreprises vers l’excellence via le conseil, la formation et l’audit.
                    </p>

                </div>
            </div>
        </div>

        {{-- CONTENU --}}
        <div class="row align-items-stretch">

            {{-- IMAGE --}}
            <div class="col-md-12 col-lg-5 mb-30">
                <div style="width: 100%; height: 100%; border-radius: 12px; overflow: hidden;">
                    <img src="{{ asset('assets/images/background/Gemini_Gisoo.png') }}"
                         alt="Certifications"
                         style="width: 100%; height: 100%; object-fit: contain;">
                </div>
            </div>

            {{-- SERVICES --}}
            <div class="col-md-12 col-lg-7">
                <div>

                   @foreach($services as $item)
    <div class="bg-white p-25 mb-20 shadow-smooth-black-01"
         style="border-radius: 8px; border-left: 4px solid #1c2c52;">
        
        {{-- Si une image existe, on l'affiche --}}
        @if($item->image)
            <div class="mb-20 text-center">
                <img src="{{ asset($item->image) }}" alt="{{ $item->title_fr }}" style="max-height: 100px; object-fit: contain;">
            </div>
        @endif

        <h4 style="color:#333; font-weight:600; font-size:18px;">
            {{ $item->title_fr }}
        </h4>

        <p style="font-size:15px; line-height:1.7;">
           {!! nl2br(e($item->desc_fr)) !!}
        </p>

    </div>
@endforeach

                </div>
            </div>

        </div>
    </div>
</section>
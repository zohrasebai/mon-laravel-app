@php
    // Fallbacks si la BDD est vide
    $videoTitle = $video->title_fr ?? 'QualiPro Plus : Votre partenaire pour l’excellence durable';
    $videoDesc = $video->text_fr ?? 'Accompagner les entreprises vers la certification est notre mission...';
@endphp

<section class="video-full" style="background: url({{ $video->video_bg ? asset($video->video_bg) : 'https://t3.ftcdn.net/jpg/03/66/54/12/360_F_366541291_RSi2errucp00Y8c7gfyEYNJTooaqVFmn.jpg' }}) no-repeat fixed center center/cover;">
    <div class="container">
        <div class="row align-items-center">
            
            {{-- COLONNE GAUCHE : LA VIDÉO --}}
            <div class="col-xl-6">
                <div class="position-relative">
                    
                    {{-- SI UN FICHIER MP4 EXISTE (Uploadé depuis l'admin) --}}
                    @if($video->video_file)
                        <video controls autoplay muted loop class="img-fluid rounded shadow-lg" style="width:100%; max-height:400px;">
                            <source src="{{ asset($video->video_file) }}" type="video/mp4">
                            Votre navigateur ne supporte pas la vidéo.
                        </video>
                    
                    {{-- SINON, ON AFFICHE LE LIEN YOUTUBE (Fallback) OU IMAGE --}}
                    @else
                        <img src="{{ asset('assets/images/video-placeholder.jpg') }}" alt="QualiPro Video" class="img-fluid rounded shadow-lg">
                        <div class="personal-video xy-middle">
                            <a data-fancybox="" class="video-popup bg-primary color-white" href="{{ $video->video_url ?? '#' }}">
                                <i class="fa fa-play" aria-hidden="true"></i>
                            </a>
                        </div>
                    @endif

                </div>
            </div>

            {{-- COLONNE DROITE : TEXTE (MODIFIABLE DANS L'ADMIN) --}}
            <div class="col-xl-6">
                <div class="video-content color-white" style="margin: 55px 0">
                    <h2 class="mb-15 color-white va-lb-line-w50-h2-primary pb-15 position-relative">
                        {{ $videoTitle }}
                    </h2>
                    <p class="lead">
                        {{ $videoDesc }}
                    </p>
                </div>
            </div>

        </div>
    </div>
</section>
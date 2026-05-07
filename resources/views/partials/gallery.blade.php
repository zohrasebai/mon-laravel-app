@php
    // ================================
    //      Portfolio Variables
    // ================================

    // 10 caractères
    $gallerySubtitle = 'Nos Travaux';

    // 13 caractères
    $galleryTitle = 'Notre Portef';

    // 136 caractères
    $galleryDesc = 'Découvrez une sélection de projets reflétant notre expertise en qualité, audit et accompagnement. Chaque mission illustre notre engagement durable.';

    // Gallery Filters
    $galleryFilters = [
        ['label' => 'Tous', 'filter' => '*', 'active' => true],
        ['label' => 'Business', 'filter' => '.item1'],
        ['label' => 'Conseil', 'filter' => '.item2'],
        ['label' => 'Finance', 'filter' => '.item3'],
        ['label' => 'Marketing', 'filter' => '.item4'],
    ];

    // Gallery Items
    $galleryItems = [
        [
            'img' => asset('assets/images/gallery/1.jpg'),
            'view' => asset('assets/images/gallery/1.jpg'),
            'link' => '#',
            'class' => 'item2 item4',
            'category' => 'Entreprise',
            // 16 caractères
            'title' => 'Aider les Enfants',
        ],
        [
            'img' => asset('assets/images/gallery/2.jpg'),
            'view' => asset('assets/images/gallery/2.jpg'),
            'link' => '#',
            'class' => 'item1',
            'category' => 'Entreprise',
            // 17 caractères
            'title' => 'Créer Mieux Vivr',
        ],
        [
            'img' => asset('assets/images/gallery/3.jpg'),
            'view' => asset('assets/images/gallery/3.jpg'),
            'link' => '#',
            'class' => 'item2 item3',
            'category' => 'Entreprise',
            // 17 caractères
            'title' => 'Aider Enfant Afr',
        ],
        [
            'img' => asset('assets/images/gallery/4.jpg'),
            'view' => asset('assets/images/gallery/4.jpg'),
            'link' => '#',
            'class' => 'item1 item4',
            'category' => 'Entreprise',
            // 13 caractères
            'title' => 'Repas de Vie',
        ],
        [
            'img' => asset('assets/images/gallery/6.jpg'),
            'view' => asset('assets/images/gallery/6.jpg'),
            'link' => '#',
            'class' => 'item1 item3',
            'category' => 'Entreprise',
            // 15 caractères
            'title' => 'Chercher Orphel',
        ],
        [
            'img' => asset('assets/images/gallery/5.jpg'),
            'view' => asset('assets/images/gallery/5.jpg'),
            'link' => '#',
            'class' => 'item2 item4',
            'category' => 'Entreprise',
            // 14 caractères
            'title' => 'École Gratuite',
        ],
        [
            'img' => asset('assets/images/gallery/7.jpg'),
            'view' => asset('assets/images/gallery/7.jpg'),
            'link' => '#',
            'class' => 'item1 item3',
            'category' => 'Entreprise',
            // 17 caractères
            'title' => 'Traitement Médic',
        ],
    ];
@endphp


<section id="portfolio" class="gallery">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="title mb-30 w-50 lg-w-80 text-center mx-auto">
                    <span class="color-primary">{{ $gallerySubtitle }}</span>
                    <h2 class="position-relative va-c-line-w50-h1-primary pb-15 mb-20">{{ $galleryTitle }}</h2>
                    <p>{{ $galleryDesc }}</p>
                </div>
            </div>
            <div class="col-md-12 col-lg-12 col-xl-12">
                <div class="gallery-1 mt-30">
                    <div class="row">
                        <div class="col-md-12">
                            <ul class="gallery-navbar mx-auto d-table">
                                @foreach($galleryFilters as $filter)
                                    <li class="{{ ($filter['active'] ?? false) ? 'active' : '' }}" 
                                        data-filter="{{ $filter['filter'] }}">
                                        {{ $filter['label'] }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row grid">
                                @foreach($galleryItems as $item)
                                <div class="col-md-6 col-lg-4 grid-item {{ $item['class'] }}">
                                    <div class="porofilio-item color-white position-relative overflow-hidden">
                                        <img src="{{ $item['img'] }}" alt="image">
                                        <div class="portfolio-content">
                                            <a class="view" href="{{ $item['view'] }}" data-fancybox="gallery">
                                                <i class="fa fa-search-plus" aria-hidden="true"></i>
                                            </a>
                                            <a class="link" href="{{ $item['link'] }}">
                                                <i class="fa fa-link" aria-hidden="true"></i>
                                            </a>
                                            <div class="porftolio-details">
                                                <span class="pi-category color-primary">{{ $item['category'] }}</span>
                                                <h4 class="pi-project-title color-white">{{ $item['title'] }}</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ================== المشاريع ================== -->
<div class="container style-one pt-130">
    <div class="row align-items-center mb-40">
        <div class="col-xl-6 col-md-8">
            <span class="d-block fs-14 fw-bold ls-15 text_primary mb-12">مشاريعنا</span>
            <h2 class="section-title style-one fw-medium text-title">
                مشاريعنا المبتكرة في مجال التكنولوجيا والذكاء الاصطناعي
            </h2>
        </div>
        <div class="col-xl-6 col-md-4">
            <div class="slider-btn style-three d-flex flex-wrap align-items-center justify-content-md-end">
                <button class="prev-btn project-prev position-relative border-0 me-2 d-flex flex-column align-items-center justify-content-center rounded-circle">
                    <img src="{{ asset('assets/img/icons/left-arrow-black.svg') }}" alt="أيقونة">
                </button>
                <button class="next-btn project-next position-relative border-0 ms-2 d-flex flex-column align-items-center justify-content-center rounded-circle">
                    <img src="{{ asset('assets/img/icons/right-arrow-black.svg') }}" alt="أيقونة">
                </button>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid pb-130">
    <div class="project-slider-one swiper">
        <div class="swiper-wrapper">

            @php
                $projects = [
                    [
                        'counter' => '01',
                        'category' => 'AI & IoT',
                        'title' => 'Friend Band',
                        'description' => 'A smart wearable designed to enhance communication and emotional connection between friends using AI-based signals.',
                        'link' => 'project-single.html',
                        'bg' => 'bg-1',
                    ],
                    [
                        'counter' => '02',
                        'category' => 'Health Tech',
                        'title' => 'Smart Bracelet for Autism (Tilia Autism)',
                        'description' => 'An innovative smart bracelet that helps monitor emotions and stress levels in autistic children to support caregivers and therapists.',
                        'link' => 'project-single.html',
                        'bg' => 'bg-2',
                    ],
                    // يمكن إضافة مشاريع جديدة هنا بسهولة
                ];
            @endphp

            @foreach($projects as $project)
                <div class="swiper-slide">
                    <div class="project-card style-one position-relative z-1">
                        <div class="project-bg bg-f {{ $project['bg'] }} position-absolute top-0 start-0 w-100 h-100"></div>
                        <span class="project-counter">{{ $project['counter'] }}</span>
                        <div class="project-info d-flex flex-wrap align-items-end justify-content-between">
                            <div>
                                <a href="projects.html" class="project-category d-inline-block fs-15 fw-medium round-oval">{{ $project['category'] }}</a>
                                <h3 class="fs-24 fw-semibold mb-0">
                                    <a href="{{ $project['link'] }}" class="text-black link-hover-white trasnition">{{ $project['title'] }}</a>
                                </h3>
                                <p class="text-muted mt-2 fs-15">{{ $project['description'] }}</p>
                            </div>
                            <a href="{{ $project['link'] }}" class="project-link d-flex flex-column align-items-center justify-content-center rounded-circle bg_primary">
                                <img src="{{ asset('assets/img/icons/up-right-arrow-white.svg') }}" alt="أيقونة">
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</div>
<!-- ================== نهاية المشاريع ================== -->

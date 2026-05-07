<section id="helped" class="bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-12 col-xl-12">
                <div class="bg-white px-30 py-40 shadow-smooth-black-01">
                    <div class="row">
                        <div class="col-md-12 col-lg-12 col-xl-12">
                            <div class="title w-50 wow animated slideInUp animated">
                                <span class="color-primary">{{ $testimonialSettings->subtitle_fr ?? '' }}</span>
                                <h2 class="position-relative va-lb-line-w50-h2-primary pb-15 mb-20">{{ $testimonialSettings->title_fr ?? '' }}</h2>
                                <p>{{ $testimonialSettings->desc_fr ?? '' }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="owl-carousel testimonial-4 slide-3 owl-dots-none mt-30">
                        @foreach($testimonialItems as $testimonial)
                        <div class="testimonial-four position-relative mt-30 bg-dark wow animated slideInUp animated">
                            <div class="position-relative py-40 px-30">
                                <h4 class="position-relative va-lb-line-w50-h2-primary color-white pb-15 mb-20">{{ $testimonial->name }}</h4>
                                <div class="text-area color-light-gray">
                                    <p>{{ $testimonial->text_fr }}</p>
                                </div>
                                <div class="feedback-2 icon-primary mt-20">
                                    <i class="flaticon-star-1"></i>
                                    <i class="flaticon-star-1"></i>
                                    <i class="flaticon-star-1"></i>
                                    <i class="flaticon-star-1"></i>
                                    <i class="flaticon-star-1"></i>
                                </div>
                                {{-- عرض الصورة المرفوعة أو صورة افتراضية --}}
                                <img src="{{ $testimonial->img ? asset($testimonial->img) : asset('assets/images/testimonial/default.jpg') }}" alt="image">
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
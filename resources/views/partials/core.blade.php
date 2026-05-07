<section class="core-value position-relative"  id="core">
    <div class="container">
        <div style="height: 10px;"></div>
        <div class="row">
            <div class="col-md-12 col-lg-12 col-xl-12">
                <div class="title mb-30 w-75 text-center mx-auto wow animated slideInUp animated">
                    {{-- عرض العنوان الفرعي والرئيسي والوصف من جدول الإعدادات --}}
                    <span class="color-primary">{{ $coreSettings->subtitle_fr }}</span>
                    <h2 class="position-relative va-c-line-w50-h1-primary pb-15 mb-20">{{ $coreSettings->title_fr }}</h2>
                    <p>{{ $coreSettings->desc_fr }}</p>
                </div>
            </div>
            <div class="col-xl-7 col-lg-12">
                <div class="core-value-box bg-secondery p-30 z-index-1 position-relative" style="margin: 80px -80px 50px 0">
                    <div class="row">
                        {{-- عرض العناصر الأربعة من قاعدة البيانات --}}
                        @foreach($coreItems as $i => $item)
                        <div class="col-xl-6 col-lg-6">
                            <div class="Valuable-item bg-light p-30 text-center{{ $i > 1 ? ' mt-30' : ($i == 1 ? ' lg-mt-30' : '') }} wow animated slideInUp animated">
                                <h4 class="mb-15">{{ $item->title_fr }}</h4>
                                <p>{{ $item->desc_fr }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-xl-5 col-lg-12">
                <div class="core-images mt-30">
                    {{-- عرض الصورة من قاعدة البيانات أو صورة افتراضية --}}
                    <img src="{{ $coreSettings->image ? asset($coreSettings->image) : 'https://cdn.bcs-express.ru/article-head/7180.jpg' }}" alt="QualiPro Values">
                </div>
            </div>
        </div>
    </div>
</section>
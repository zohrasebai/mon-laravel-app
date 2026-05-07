<!-- Banner One Start -->
<div class="page-banner overlay-secondery-8" 
     style="background: url({{ asset('images/background/2.jpg') }}) bottom center/ cover; padding: 150px 0;">
    <div class="container">
        <div class="banner-text text-center">
            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <h1 class="position-relative va-c-line-w50-h1-primary pb-15 mb-20 color-white">
                        {{ $title ?? 'Page Title' }}
                    </h1>

                    <nav class="breadcrumb-one d-table m-auto bg-white px-30" aria-label="breadcrumb">
                        <ol class="breadcrumb bg-transparent mb-0">
                            <li class="breadcrumb-item">
                                <a href="{{ url('/') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                            </li>
                        </ol>
                    </nav>

                    <div class="text-area color-white w-50 lg-w-80 md-w-100 d-table mx-auto mt-20">
                        <p>
                            {{ $subtitle ?? 'Default description goes here...' }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Banner One End -->

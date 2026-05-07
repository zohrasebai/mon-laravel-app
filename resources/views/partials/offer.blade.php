<div class="connect-us position-relative py-80 overlay-secondery" 
     style="background: url({{ $offer->bg_image ? asset($offer->bg_image) : asset('assets/images/others/3.jpg') }}) no-repeat fixed top center/cover;">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="get-help bg-dark p-40 lg-mt-30 wow animated slideInRight animated">
                    <h3 class="thumb-title color-white">{{ $offer->title_fr }}</h3>
                    <div class="text-area color-white mt-15">
                        <p>{{ $offer->text_fr }}</p>
                    </div>
                    <form class="mt-15" action="#" method="post">
                        <div class="form-group">
                            <input class="form-control bg-gray" type="text" name="email" placeholder="E-mail">
                        </div>
                    </form>
                    <div class="btn-group mt-10">
                        <a class="btn btn-primary mr-30 d-block md-mr-0" href="{{ $offer->btn_url }}">{{ $offer->btn_text_fr }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
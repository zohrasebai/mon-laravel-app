<div class="page-banner overlay-secondery-8" style="background: url({{ asset('bigdash/assets/images/background/2.jpg') }}) bottom center/ cover; padding: 150px 0;">
    <div class="container">
        <div class="banner-text text-center">
            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <h1 class="position-relative va-c-line-w50-h1-primary pb-15 mb-20 color-white">Contactez QualiPro Plus</h1>
                    <nav class="breadcrumb-one d-table m-auto bg-white px-30" aria-label="breadcrumb">
                      <ol class="breadcrumb bg-transparent mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Accueil</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Contact</li>
                      </ol>
                    </nav>
                    <div class="text-area color-white w-50 lg-w-80 md-w-100 d-table mx-auto mt-20">
                        <p>Expertise en audit et conseil ISO. Nous sommes là pour répondre à vos questions et accompagner votre démarche qualité.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="position-relative background-map py-80">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-6">
                <div class="title">
                    <span class="color-primary">Contact</span>
                    <h2 class="position-relative va-lb-line-w50-h2-primary pb-15 mb-30">Support Technique & Conseil</h2>
                </div>
                <div class="contact-form-2">
                    <form class="contact-message-2" id="contact-form" action="{{ route('contact.send') }}" method="post">
                        @csrf
                        @if(session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif
                        <div class="form-group mb-3">
                            <input class="form-control" type="text" name="name" placeholder="Nom complet*" required/>
                        </div>
                        <div class="form-group mb-3">
                            <input class="form-control" type="email" name="email" placeholder="Email professionnel*" required/>
                        </div>
                        <div class="form-group mb-3">
                            <input class="form-control" id="subject" type="text" name="subject" placeholder="Objet (Certification/Audit)*" required/>
                        </div>
                        <div class="form-group mb-3">
                            <textarea class="form-control" id="message" rows="5" name="message" placeholder="Votre message*" required></textarea>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-secondery" type="submit">Envoyer le Message</button>
                        </div>
                    </form>
                </div>
            </div>
            
            <div class="col-md-6 col-lg-6">
                <div class="contact-info md-mt-50">
                    <div class="title">
                        <span class="color-primary">Aide</span>
                        <h2 class="position-relative va-lb-line-w50-h2-primary pb-15 mb-30">Informations de Contact</h2>
                    </div>
                    <ul class="color-secondery list-unstyled">
                        <li class="mb-20">
                            <strong>Téléphone :</strong> 
                            <span class="d-block text_primary">{{ $global_settings['phone'] ?? '+213 699 75 80 30' }}</span>
                        </li>
                        <li class="mb-20">
                            <strong>Email :</strong> 
                            <span class="d-block text_primary">{{ $global_settings['email'] ?? 'contact@qualiproplus.com' }}</span>
                        </li>
                        <li class="mb-20">
                            <strong>Adresse :</strong> 
                            <span class="d-block text-muted">Alger, Algérie - Bureau QualiPro Plus</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<div id="map" class="map-canvas" style="width: 100%; height: 450px;">
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2693.1852918981135!2d3.0349547758360598!3d36.75000987226143!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x128fb304a6bba58b%3A0x166063d2354f77bc!2sQualicar%20Algerie%20-%20Location%20de%20voitures%20a%C3%A9roport%20Alger!5e1!3m2!1sen!2sdz!4v1767096392255!5m2!1sen!2sdz" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>
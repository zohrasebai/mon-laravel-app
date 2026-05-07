<footer class="bg-secondery">
    <div class="container">
        
        <div class="row py-80">
            {{-- COLO 1: LOGO & DESC --}}
            <div class="col-xl-3 col-lg-4 col-md-6">
                <div class="footer-widget sm-mt-0">
                    <div class="footer-logo mb-20">
                        <a href="#"><img src="{{ $footerData['logo'] }}" alt="images"></a>
                    </div>
                    <div class="text-area color-white">
                        <p>{{ $footerData['text'] }}</p>
                    </div>
                </div>
            </div>

            {{-- COLO 2: LINKS (Exemple, peux venir de la BDD aussi) --}}
            <div class="col-xl-2 col-lg-4 col-md-6">
                <div class="footer-widget">
                    <h3 class="footer-widget-title position-relative va-lb-line-w50-h2-primary pb-15 mb-20 color-white">Links</h3>
                    <ul class="hover-white-primary link-list-b-15">
                        <li><a href="#services">Nos Domaines De Compétence</a></li>
                        <li><a href="#about">Qui sommes-nous ?</a></li>
                        <li><a href="#core">Nos Valeurs</a></li>
                    </ul>
                </div>
            </div>

            {{-- COLO 3: NEWS (Statique pour l'exemple) --}}
            <div class="col-xl-3 col-lg-4 col-md-6">
                <div class="footer-widget">
                    <h3 class="footer-widget-title position-relative va-lb-line-w50-h2-primary pb-15 mb-20 color-white">Dernières nouvelles</h3>
                    <ul class="hover-white-primary link-list-b-20">
                        <li>
                            <a href="https://www.facebook.com/share/p/18HJff9PLW/">Clôture de la formation en ligne HACCP</a>
                            <div class="post-meta color-light-gray f-12 mt-5">Nov 2025</div>
                        </li>
                         <li>
                            <a href="https://www.facebook.com/share/p/1QQAFnUUwe/">Retour en images formation #HACCP </a>
                            <div class="post-meta color-light-gray f-12 mt-5">Nov 2025</div>
                        </li>
                         <li>
                            <a href="https://www.facebook.com/reel/1561412478682431">Formation en HACCP animée avec engagement et passion</a>
                            <div class="post-meta color-light-gray f-12 mt-5">Avrl 2026</div>
                        </li>
                    </ul>
                </div>
            </div>

            {{-- COLO 4: CONTACT & SOCIAL --}}
            <div class="col-xl-4 col-lg-12 col-md-6">
                <div class="footer-widget color-white xl-mt-50">
                    <h3 class="footer-widget-title position-relative va-lb-line-w50-h2-primary pb-15 mb-20 color-white">Nous contacter</h3>
                     <p class="color-white">
    Expertise en audit et conseil ISO. Nous sommes là pour répondre à vos questions et vous accompagner dans votre démarche qualité.
</p>
                    <ul class="widget-contact-info color-white icon-primary link-list-b-15 mt-30">
                        @foreach($footerData['contacts'] as $contact)
                            <li>
                                <span class="mr-20"><i class="{{ $contact['icon'] }}" aria-hidden="true"></i></span> 
                                {{ $contact['text'] }}
                            </li>
                        @endforeach
                    </ul>
                    
                    <ul class="socal media-two d-inline-block color-secondery mt-30">
                        @foreach($footerData['socials'] as $social)
                            <li>
                                <a href="{{ $social['url'] }}"><i class="{{ $social['icon'] }}" aria-hidden="true"></i></a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    
    <hr class="border-t-1-dark">
    <div class="copyright-2 bg-secondery">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <ul class="copyright-style-2 d-table w-100 hover-primary color-white py-15">
                        <li class="float-left">{{ $footerData['copyright'] }}</li>
                        <li class="float-right color-white-a">
                            <a href="#">Politique de Confidentialité</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
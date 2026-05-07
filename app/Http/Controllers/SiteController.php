<?php

namespace App\Http\Controllers;

use App\Models\Achievement;
use App\Models\NavLink;
use App\Models\VideoSection;
use App\Models\Slider;
use App\Models\About;
use App\Models\Setting;
use App\Models\Service;
use App\Models\CoreValue;
use App\Models\CoreValueItem;
use App\Models\Testimonial;
use App\Models\TestimonialItem;
use App\Models\OfferSection;
use App\Models\Partner;
use App\Models\SectionSetting;

class SiteController extends Controller
{
    public function index()
    {
        // --- 1. Données Globales ---
        $achievements = Achievement::orderBy('order', 'asc')->get();
        $nav_links = NavLink::where('is_active', true)->orderBy('position')->get();
        // Pluck transforme une table key-value en simple tableau ['key' => 'value']
        $global_settings = Setting::pluck('value', 'key'); 

        // --- 2. Données Sections ---
        $activeSliders = Slider::orderBy('order', 'asc')->get();
        
        // Correction: On récupère l'objet About (ou un vide si null)
        $about = About::first() ?: new About(); 
        
        $services = Service::orderBy('order', 'asc')->get();
        $video = VideoSection::first() ?: new VideoSection();

        $coreSettings = CoreValue::first() ?: new CoreValue();
        $coreItems = CoreValueItem::all();

        $testimonialSettings = Testimonial::first() ?: new Testimonial();
        $testimonialItems = TestimonialItem::all();

        $offer = OfferSection::first() ?: new OfferSection();
        
        // IMPORTANT: On récupère les partenaires depuis la BD, pas avec glob()
        $partners = Partner::orderBy('order')->get();

        // --- 3. Section "Nos Compétences" (Causes) ---
        $causesSection = SectionSetting::where('section_name', 'causes_section')->first();
        $causes = [
            'subtitle' => $causesSection->subtitle_fr ?? 'Expertise en Certification',
            'title'    => $causesSection->title_fr ?? 'Nos Domaines d’Action',
            'desc'     => $causesSection->desc_fr ?? 'Nous accompagnons les entreprises vers l’excellence...',
        ];

        // --- 4. Préparation du Footer (Pour qu'il soit modifiable) ---
        // Au lieu de hardcoder dans la vue, on prépare ici (ou on utilise une table FooterSettings)
        $footerData = [
            'logo' => asset('assets/images/logo/logo.png'),
            'text' => $global_settings['footer_text'] ?? 'Plus qu’un cabinet, nous sommes votre partenaire pour l’excellence...',
            'contacts' => [
                ['icon' => 'fa fa-phone', 'text' => $global_settings['phone'] ?? ''],
                ['icon' => 'fa fa-envelope', 'text' => $global_settings['email'] ?? ''],
                ['icon' => 'fa fa-map-marker', 'text' => $global_settings['address'] ?? 'Alger, Algérie'],
            ],
            'socials' => [
                ['icon' => 'fa fa-facebook', 'url' => $global_settings['facebook_url'] ?? '#'],
                ['icon' => 'fa fa-linkedin', 'url' => $global_settings['linkedin_url'] ?? '#'],
                ['icon' => 'fa fa-instagram', 'url' => $global_settings['instagram_url'] ?? '#'],
            ],
            'copyright' => 'QualiPro Plus @ ' . date('Y') . '. Tous droits réservés.'
        ];

        return view('home', [
            // Global
            'global_settings'    => $global_settings,
            'achievements'       => $achievements,
            'nav_links'          => $nav_links,
            'home_link'          => route('home'),
            
            // Content
            'activeSliders'      => $activeSliders,
            'video'              => $video,
            'about'              => $about, // Correction variable name
            'services'           => $services,
            'coreSettings'       => $coreSettings,
            'coreItems'          => $coreItems,
            'testimonialSettings'=> $testimonialSettings,
            'testimonialItems'   => $testimonialItems,
            'offer'              => $offer,
            'partners'           => $partners, // Utilisé dans la vue
            'causes'             => $causes,
            'footerData'         => $footerData, // Passé au footer
        ]);
    }
}
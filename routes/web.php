<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\SoulContactController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\VideoSectionController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\CoreValueController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\OfferController;
use App\Http\Controllers\Admin\PartnerController;

// --- Routes Publiques ---
Route::get('/', [SiteController::class, 'index'])->name('home');

Route::get('/a-propos', fn() => view('AboutUs'))->name('AboutUs');
Route::get('/equipe', fn() => view('team'))->name('team');
Route::get('/blog', fn() => view('blog'))->name('blog');
Route::get('/processus', fn() => view('Process'))->name('Process');

// Routes Spécifiques Soul
Route::get('/a-propos-soul', fn() => view('aboutsoul'))->name('aboutsoul');
Route::get('/groupe-amis', fn() => view('friendband'))->name('friendband');
Route::get('/tele-autisme', fn() => view('teleautism'))->name('teleautism');

// Contact
Route::get('/contact', fn() => view('contact'))->name('contact');
Route::post('/contact-send', [SoulContactController::class, 'send'])->name('contact.send');

// Juridique
Route::get('/politique-confidentialite', fn() => view('privacy-policy'))->name('privacy-policy');
Route::get('/conditions-utilisation', fn() => view('terms-of-service'))->name('terms-of-service');

// --- Authentification ---
Route::get('/connexion', [LoginController::class, 'showLogin'])->name('login');
Route::post('/connexion', [LoginController::class, 'login'])->name('login.post');
Route::post('/deconnexion', [LoginController::class, 'logout'])->name('logout');

Route::get('/inscription', [RegisterController::class, 'create'])->name('register');
Route::post('/inscription', [RegisterController::class, 'store'])->name('register.post');


// --- Administration (Espace Admin) ---
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    
    // Dashboard Principal
    Route::get('/tableau-de-bord', [DashboardController::class, 'index'])->name('dashboard');
    
    // --- Paramètres (Téléphone, Email, Logo) ---
    Route::get('/parametres', [DashboardController::class, 'settings'])->name('settings');
    // On accepte à la fois POST et PUT pour être sûr que ça marche
    Route::match(['post', 'put'], '/parametres/update', [DashboardController::class, 'updateSettings'])->name('settings.update');

    // --- Menu de Navigation ---
    Route::get('/liens-navigation', [DashboardController::class, 'navLinks'])->name('nav-links');
    Route::post('/liens-navigation/update', [DashboardController::class, 'updateNavLinks'])->name('nav-links.update');

    // --- Réalisations (Achievements - Boîtes sous le logo) ---
    Route::get('/realisations', [DashboardController::class, 'achievements'])->name('achievements');
    Route::post('/realisations/store', [DashboardController::class, 'storeAchievement'])->name('achievements.store');
    Route::delete('/realisations/{id}', [DashboardController::class, 'destroyAchievement'])->name('achievements.destroy');

    // --- Sliders ---
    Route::get('/sliders', [SliderController::class, 'index'])->name('sliders.index');
    Route::put('/sliders/{id}', [SliderController::class, 'update'])->name('sliders.update');

    // --- Section About (Qui sommes-nous) ---
    Route::get('/about', [AboutController::class, 'index'])->name('about.index');
    Route::put('/about/update', [AboutController::class, 'update'])->name('about.update');

    // --- Section Vidéo ---
    Route::get('/video', [VideoSectionController::class, 'index'])->name('video.index');
    Route::put('/video/update', [VideoSectionController::class, 'update'])->name('video.update');

    // --- Services ---
    Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
    Route::post('/services/store', [ServiceController::class, 'store'])->name('services.store');
    Route::delete('/services/delete/{id}', [ServiceController::class, 'destroy'])->name('services.destroy');
    // Modifier (Afficher le formulaire)
    Route::get('/services/{id}/edit', [ServiceController::class, 'edit'])->name('services.edit');
    // Mettre à jour (Enregistrer les changements)
    Route::post('/services/update/{id}', [ServiceController::class, 'update'])->name('services.update');

    // --- Valeurs Fondamentales (Core Values) ---
    Route::get('/core-values', [CoreValueController::class, 'index'])->name('core_values.index');
    Route::put('/core-values/settings', [CoreValueController::class, 'updateSettings'])->name('core_values.update_settings');
    Route::post('/core-values/item', [CoreValueController::class, 'storeItem'])->name('core_values.store_item');
    Route::delete('/core-values/item/{id}', [CoreValueController::class, 'destroyItem'])->name('core_values.destroy_item');

    // --- Témoignages ---
    Route::get('/testimonials', [TestimonialController::class, 'index'])->name('testimonials.index');
    Route::put('/testimonials/settings', [TestimonialController::class, 'updateSettings'])->name('testimonials.update_settings');
    Route::post('/testimonials/item', [TestimonialController::class, 'storeItem'])->name('testimonials.store_item');
    Route::delete('/testimonials/item/{id}', [TestimonialController::class, 'destroyItem'])->name('testimonials.destroy_item');

    // --- Offres ---
    Route::get('/offer', [OfferController::class, 'index'])->name('offer.index');
    Route::put('/offer/update', [OfferController::class, 'update'])->name('offer.update');

    // --- Partenaires ---
    Route::get('/partners', [PartnerController::class, 'index'])->name('partners.index');
    Route::post('/partners/store', [PartnerController::class, 'store'])->name('partners.store');
    Route::delete('/partners/{id}', [PartnerController::class, 'destroy'])->name('partners.destroy');
});
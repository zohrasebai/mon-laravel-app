@extends('layouts.app')

@section('title', 'Qualipro - Home')

@section('content')

    {{-- Espace pour le header fixe --}}
 
    
    @include('partials.header', [
        'global_settings' => $global_settings, 
        'achievements' => $achievements,
        'home_link' => $home_link,
        'footerSocial' => $footerData['socials'] // Besoin pour le header si tu utilises les mêmes réseaux
    ])

    <main id="main-wrapper">
        
        {{-- SLIDER --}}
        @include('partials.slider', ['activeSliders' => $activeSliders, 'video' => $video]) 

        {{-- ABOUT --}}
        {{-- On passe simplement $about, la vue gère le fallback --}}
        @include('partials.about', ['about' => $about]) 

        {{-- CORE VALUES --}}
        @include('partials.core', ['coreSettings' => $coreSettings, 'coreItems' => $coreItems]) 

        {{-- TEAM --}}
        @include('partials.team') 
        
        {{-- CAUSES (Services) --}}
        {{-- IMPORTANT: On passe les services ET les causes (textes) --}}
        @include('partials.causes', ['services' => $services, 'causes' => $causes])
        
        {{-- PARTNERS --}}
        @include('partials.partners', ['partners' => $partners])

    </main>

    {{-- FOOTER --}}
    @include('partials.footer', ['footerData' => $footerData])

@endsection
<div>
    {{-- يمكنك تضمين الأجزاء الثابتة إن أردت --}}
    @include('partials.navbar')
    @include('partials.Breadcrumb')

    {{-- الجزء التفاعلي --}}
    <div class="text-center my-5">
        <button wire:click="increment" class="btn btn-primary">+</button>
        <h1>{{ $count }}</h1>
    </div>

    @include('partials.footer')
</div>

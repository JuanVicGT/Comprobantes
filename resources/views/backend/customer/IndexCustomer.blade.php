<x-layouts.app>

    @section('nav-title')
        @if ($setting = \App\Models\Setting::first())
            <div class="flex items-center">
                <img src="{{ asset('storage/' . $setting->img_icono) }}" alt="{{ $setting->nombre_compania }}" width="50"
                    height="50">
                <h1 class="ml-4 text-3xl">{{ $setting->nombre_compania }}</h1>
            </div>
        @else
            {{ __('Default Name') }}
        @endif
    @endsection

    <livewire:customer-index />
</x-layouts.app>

<x-layouts.app>

    @section('nav-title')
        @if ($setting = \App\Models\Setting::first())
            <div class="flex items-center">
                <img src="{{ asset('storage/' . $setting->img_icono) }}" alt="{{ $setting->nombre_compania }}" width="60"
                    class="-my-4 -py-4">
                <h1 class="ml-4 text-xl">{{ $setting->nombre_compania }}</h1>
            </div>
        @else
            {{ __('Default Name') }}
        @endif
    @endsection

    <livewire:customer-index />
</x-layouts.app>

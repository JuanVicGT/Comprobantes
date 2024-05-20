<x-layouts.app>

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/heart.css') }}">

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

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                {{ __('Developed with love, by a student learning a new technology') }} ♥!
            </div>
        </div>
    </div>

    <div class="flex justify-center w-full pt-16 items-center">
        <div class="heart"></div>
    </div>

</x-layouts.app>

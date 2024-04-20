<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">

    {{-- The navbar with `sticky` and `full-width` --}}
    <x-mary-nav sticky full-width>

        <x-slot:brand>
            {{-- Drawer toggle for "main-drawer" --}}
            <label for="main-drawer" class="lg:hidden mr-3">
                <x-mary-icon name="o-bars-3" class="cursor-pointer" />
            </label>

            {{-- Brand --}}
            <div>App</div>
        </x-slot:brand>

        @if ($user = auth()->user())
            {{-- Right side actions --}}
            <x-slot:actions>
                <x-mary-dropdown label="{{ $user->name }}" class="btn-outline">
                    {{-- Use `@click.STOP` to stop event propagation --}}
                    <x-mary-menu-item title="{{ __('Profile') }}" link="{{ route('profile.edit') }}" />

                    {{-- Or `wire:click.stop`  --}}
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <ul>
                            <li><button type="submit">{{ __('logout') }}</button></li>
                        </ul>
                    </form>

                    <x-mary-menu-separator />

                    <x-mary-menu-item @click.stop="">
                        <x-mary-toggle label="{{ __('dark-mode') }}" right />
                    </x-mary-menu-item>
                </x-mary-dropdown>
            </x-slot:actions>
        @endif
    </x-mary-nav>

    {{-- The main content with `full-width` --}}
    <x-mary-main with-nav full-width>

        {{-- This is a sidebar that works also as a drawer on small screens --}}
        {{-- Notice the `main-drawer` reference here --}}
        <x-slot:sidebar drawer="main-drawer" collapsible class="bg-base-200">

            {{-- Activates the menu item when a route matches the `link` property --}}
            <x-mary-menu activate-by-route active-bg-color="bg-sky-500/20">
                <x-mary-menu-item title="Home" icon="o-home" link="###" />
                <x-mary-menu-item title="Messages" icon="o-envelope" link="###" />
                <x-mary-menu-sub title="Settings" icon="o-cog-6-tooth">
                    <x-mary-menu-item title="Wifi" icon="o-wifi" link="####" />
                    <x-mary-menu-item title="Archives" icon="o-archive-box" link="{{ route('dashboard') }}" />
                </x-mary-menu-sub>
            </x-mary-menu>
        </x-slot:sidebar>

        {{-- The `$slot` goes here --}}
        <x-slot:content>
            {{ $slot }}
        </x-slot:content>
    </x-mary-main>

    {{--  TOAST area --}}
    <x-mary-toast />
</body>

</html>

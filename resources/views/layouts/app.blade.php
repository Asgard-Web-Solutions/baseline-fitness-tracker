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
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400..600&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
        @fluxStyles
    </head>
    <body class="min-h-screen antialiased bg-slate-200 dark:bg-zinc-800 text-slate-800">
        <flux:header container class="border-b bg-zinc-50 dark:bg-zinc-900 border-zinc-200 dark:border-zinc-700">
            <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left" />

            <flux:brand href="/" logo="https://fluxui.dev/img/demo/logo.png" name="Baseline Physical Aptitude Tracker" class="max-lg:hidden dark:hidden" />
            <flux:brand href="/" logo="https://fluxui.dev/img/demo/dark-mode-logo.png" name="Baseline Physical Aptitude Tracker" class="max-lg:!hidden hidden dark:flex" />

            <flux:navbar class="max-lg:hidden">
                <flux:navbar.item icon="bolt" href="/dashboard">Fitness Dashboard</flux:navbar.item>
                @can('acp-view')
                    <flux:navbar.item icon="shield-check" href="/acp">ACP</flux:navbar.item>
                @endcan

                <flux:separator vertical variant="subtle" class="my-2"/>

                <flux:navbar.item icon="inbox-arrow-down" href="https://suggest.gg/bpatracker/ideas" target="_blank">Suggest Ideas</flux:navbar.item>
            </flux:navbar>

            <flux:spacer />


            @auth
                <flux:dropdown position="bottom" align="end">
                    <flux:profile avatar="{{ auth()->user()->gravatarUrl() }}" />

                    <flux:navmenu>
                        <flux:navmenu.item href="{{ route('profile.show') }}" icon="user-circle">Profile</flux:navmenu.itme>
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <flux:navmenu.item type="submit" icon="power">Logout</flux:navmenu.item>
                        </form>
                    </flux:navmenu>
                </flux:dropdown>
            @endauth

            @guest
                <div class="flex">
                    <flux:navmenu.item href="{{ route('login') }}" align="end">Login</flux:navmenu.item>
                    <flux:navmenu.item href="{{ route('register') }}" align="end" class="ml-4">Register</flux:navmenu.item>
                </div>
            @endguest
        </flux:header>

        <flux:sidebar stashable sticky class="border-r lg:hidden bg-zinc-50 dark:bg-zinc-900 border-zinc-200 dark:border-zinc-700">
            <flux:sidebar.toggle class="lg:hidden" icon="x-mark" />

            <flux:brand href="/" logo="https://fluxui.dev/img/demo/logo.png" name="BPA Tracker." class="px-2 dark:hidden" />
            <flux:brand href="/" logo="https://fluxui.dev/img/demo/dark-mode-logo.png" name="BPA Tracker." class="hidden px-2 dark:flex" />

            <flux:navlist variant="outline">
                <flux:navlist.item icon="bolt" href="/dashboard">Fitness Dashboard</flux:navlist.item>
                @can('acp-view')
                    <flux:navlist.item icon="inbox" href="/acp">ACP</flux:navlist.item>
                @endcan

                <flux:navlist.item icon="inbox-arrow-down" href="https://suggest.gg/bpatracker/ideas" target="_blank">Suggest Ideas</flux:navbar.item>
            </flux:navlist>

        </flux:sidebar>

        <flux:main container>
            @if (isset($header))
                <flux:heading size="xl" level="1">{{ $header }}</flux:heading>
            @endif

            @if (isset($subHeader))
                <flux:subheading size="lg" class="mb-6">{{ $subHeader }}</flux:subheading>
            @endif

            <flux:separator variant="subtle" />

            {{ $slot }}
        </flux:main>
        @stack('modals')

        @livewireScripts
        <flux:toast />
        @fluxScripts
    </body>
</html>

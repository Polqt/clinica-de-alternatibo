<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Medicare' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- @fluxAppearance -->
</head>

<body class="min-h-screen bg-white dark:bg-zinc-800">
    <flux:sidebar sticky stashable class="bg-zinc-50 dark:bg-zinc-900 border-r rtl:border-r-0 rtl:border-l border-zinc-200 dark:border-zinc-700 space-y-4">
        <flux:sidebar.toggle class="lg:hidden" icon="x-mark" />
        <flux:brand href="/user/dashboard" logo="https://fluxui.dev/img/demo/logo.png" name="Acme Inc." class="px-2 dark:hidden" />
        <flux:brand href="/user/dashboard" logo="https://fluxui.dev/img/demo/dark-mode-logo.png" name="Acme Inc." class="px-2 hidden dark:flex" />

        <flux:navlist variant="outline">
            <flux:navlist.item icon="home" href="/user/dashboard">Dashboard</flux:navlist.item>
            <flux:navlist.item icon="calendar" href="/user/schedule">Schedule</flux:navlist.item>
            <flux:navlist.item icon="history" href="/user/history">Medical History</flux:navlist.item>
            <flux:navlist.item icon="calendar-clock" href="/user/appointments">Appointments</flux:navlist.item>
            <flux:navlist.group expandable heading="Favorites" class="hidden lg:grid">
                <flux:navlist.item href="#">Marketing site</flux:navlist.item>
                <flux:navlist.item href="#">Android app</flux:navlist.item>
                <flux:navlist.item href="#">Brand guidelines</flux:navlist.item>
            </flux:navlist.group>
        </flux:navlist>
        <flux:spacer />
        <flux:navlist variant="outline">
            <flux:navlist.item icon="cog-6-tooth" href="/user/settings">Settings</flux:navlist.item>
            <flux:navlist.item icon="information-circle" href="/user/help">Help</flux:navlist.item>
        </flux:navlist>
        <flux:dropdown position="top" align="start" class="max-lg:hidden">
            <flux:profile circle avatar="{{ $profile_picture }}" name="{{ $first_name }}" />
            <flux:menu>
                <flux:menu.radio.group>
                    <!-- / -->
                </flux:menu.radio.group>
                <flux:menu.separator />
                <flux:menu.item>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit">Logout</button>
                    </form>
                </flux:menu.item>
            </flux:menu>
        </flux:dropdown>
    </flux:sidebar>

    <!-- Mobile Responsiveness -->
    <flux:header class="block! bg-white lg:bg-zinc-50 dark:bg-zinc-900 border-b border-zinc-200 dark:border-zinc-700">
        <flux:navbar class="lg:hidden w-full">
            <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left" />
            <flux:spacer />
            <flux:dropdown position="top" align="start">
                <flux:menu>
                    <flux:menu.radio.group>
                        <flux:menu.radio checked></flux:menu.radio>
                        <flux:menu.radio>Truly Delta</flux:menu.radio>
                    </flux:menu.radio.group>
                    <flux:menu.separator />
                    <flux:navlist.item>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit">Logout</button>
                        </form>
                    </flux:navlist.item>
                </flux:menu>
            </flux:dropdown>
        </flux:navbar>
        <flux:navbar scrollable>
            <flux:input as="button" variant="filled" placeholder="Search..." icon="magnifying-glass" />
            <flux:avatar circle tooltip name="{{ $first_name }} {{ $last_name }}" src="{{ $profile_picture }}" />
        </flux:navbar>
    </flux:header>
    <flux:main>
        @yield('content')
    </flux:main>
    @fluxScripts
</body>

</html>
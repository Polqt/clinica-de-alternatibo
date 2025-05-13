<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Medicare' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @fluxAppearance
</head>

<body class="min-h-screen bg-white dark:bg-zinc-800">
    <flux:sidebar sticky stashable class="bg-zinc-50 dark:bg-zinc-900 border-r rtl:border-r-0 rtl:border-l border-zinc-200 dark:border-zinc-700">
        <flux:sidebar.toggle class="lg:hidden" icon="x-mark" />
        <flux:brand href="/user/dashboard" logo="https://fluxui.dev/img/demo/logo.png" name="Medicare Inc." class="px-2 dark:hidden" />
        <flux:brand href="/user/dashboard" logo="https://fluxui.dev/img/demo/dark-mode-logo.png" name="Medicare Inc." class="px-2 hidden dark:flex" />

        <flux:navlist variant="outline" class="space-y-40">
            <flux:navlist.item icon="layout-dashboard" href="/dashboard">Dashboard</flux:navlist.item>
            <flux:navlist.item icon="calendar-clock" href="/appointments">Appointments</flux:navlist.item>
            <flux:navlist.item icon="stethoscope" href="/doctors">Doctors</flux:navlist.item>
            <flux:navlist.item icon="users" href="/patients">Patients</flux:navlist.item>
        </flux:navlist>
        <flux:spacer />
        <flux:navlist variant="outline">
            <flux:navlist.item icon="information-circle" href="/help">Help</flux:navlist.item>
        </flux:navlist>
        <flux:dropdown position="top" align="start" class="max-lg:hidden">
            <flux:profile circle avatar="{{ $profile_picture }}" name="{{ $first_name }} {{ $last_name }}" />
            <flux:menu>
                <flux:menu.item icon="user-circle" href="/profile">Profile</flux:menu.item>

                <flux:menu.separator />
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <flux:menu.item
                        icon="arrow-right-start-on-rectangle"
                        as="button"
                        type="submit">
                        Logout
                    </flux:menu.item>
                </form>
            </flux:menu>
        </flux:dropdown>
    </flux:sidebar>

    <!-- Mobile  -->
    <flux:header class="block! bg-white lg:bg-zinc-50 dark:bg-zinc-900 border-b border-zinc-200 dark:border-zinc-700">
        <flux:navbar class="lg:hidden w-full">
            <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left" />
            <flux:spacer />
            <flux:dropdown position="top" align="start">
                <flux:profile circle avatar="{{ $profile_picture }}" />
                <flux:menu>
                    <flux:menu.item icon="user-circle">Profile</flux:menu.item>
                    <flux:menu.separator />
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <flux:menu.item
                            icon="arrow-right-start-on-rectangle"
                            as="button"
                            type="submit">
                            Logout
                        </flux:menu.item>
                    </form>
                </flux:menu>
            </flux:dropdown>
        </flux:navbar>
        <flux:navbar scrollable>
            <flux:input as="button" variant="filled" placeholder="Search..." icon="magnifying-glass" size="sm" />
            <flux:button x-data x-on:click="$flux.dark = ! $flux.dark" icon="moon" variant="subtle" aria-label="Toggle dark mode" />
        </flux:navbar>
    </flux:header>
    <flux:main>
        @yield('content')
    </flux:main>
    @fluxScripts
</body>

</html>
<header class="shadow py-3">
    <div class="container mx-auto py-4">
        <div class="flex justify-between items-center">
            <a href="{{ route('home') }}" class="text-3xl font-bold text-teal-900">
                Medi<span class="text-teal-500">Care</span>
            </a>
            <nav>
                <ul class="flex space-x-12 text-lg">
                    <li><a href="{{ route('login') }}" class="text-gray-600">Login</a></li>
                    <li><a href="{{ route('services') }}" class="text-gray-600">Services</a></li>
                    <li><a href="{{ route('about') }}" class="text-gray-600">About</a></li>
                    <li><a href="{{ route('contact') }}" class="text-gray-600">Contact</a></li>
                </ul>
            </nav>
        </div>
    </div>
</header>
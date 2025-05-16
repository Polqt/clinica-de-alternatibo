<header class="bg-white border-b border-slate-100 sticky top-0 z-50">
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center h-20">
            <a href="{{ route('home') }}" class="flex items-center gap-2">
                <div class="w-10 h-10 rounded-lg bg-gradient-to-br from-teal-500 to-cyan-600 flex items-center justify-center text-white font-bold text-lg">M</div>
                <span class="text-2xl font-bold text-slate-800">Medi<span class="text-teal-600">Care</span></span>
            </a>
            <nav class="hidden md:block">
                <ul class="flex space-x-8">
                    <li>
                        <a href="{{ route('home') }}" class="flex items-center text-slate-700 hover:text-teal-600 font-medium py-2 border-b-2 border-transparent hover:border-teal-600 transition-all">
                            <flux:icon.home class="w-4 h-4 mr-1" />
                            Home
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('services') }}" class="flex items-center text-slate-700 hover:text-teal-600 font-medium py-2 border-b-2 border-transparent hover:border-teal-600 transition-all">
                            <flux:icon.clipboard-document-list class="w-4 h-4 mr-1" />
                            Services
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('about') }}" class="flex items-center text-slate-700 hover:text-teal-600 font-medium py-2 border-b-2 border-transparent hover:border-teal-600 transition-all">
                            <flux:icon.information-circle class="w-4 h-4 mr-1" />
                            About
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('contact') }}" class="flex items-center text-slate-700 hover:text-teal-600 font-medium py-2 border-b-2 border-transparent hover:border-teal-600 transition-all">
                            <flux:icon.chat-bubble-left-right class="w-4 h-4 mr-1" />
                            Contact
                        </a>
                    </li>
                </ul>
            </nav>

            <div class="flex items-center gap-3">
                <a href="{{ route('login') }}" class="hidden md:inline-flex items-center px-4 py-2 text-sm font-medium text-teal-600 bg-teal-50 hover:bg-teal-100 rounded-lg transition-colors">
                    <flux:icon.user class="w-4 h-4 mr-1" />
                    Login
                </a>
                <a href="{{ route('signup') }}" class="hidden md:inline-flex items-center px-4 py-2 text-sm font-medium text-teal-600 bg-teal-50 hover:bg-teal-700 rounded-lg transition-colors">
                    <flux:icon.user-plus class="w-4 h-4 mr-1" />
                    Register
                </a>

                <button class="md:hidden flex items-center justify-center w-10 h-10 rounded-lg bg-slate-100 hover:bg-slate-200 transition-colors">
                    <flux:icon.menu class="w-6 h-6 text-slate-700" />
                </button>
            </div>
        </div>
    </div>

    <div class="hidden md:hidden px-4 pb-4">
        <nav class="bg-white rounded-lg shadow-lg border border-slate-100">
            <ul class="py-2">
                <li>
                    <a href="{{ route('home') }}" class="flex items-center px-4 py-3 text-slate-700 hover:bg-slate-50">
                        <flux:icon.home class="w-5 h-5 mr-3 text-teal-600" />
                        Home
                    </a>
                </li>
                <li>
                    <a href="{{ route('services') }}" class="flex items-center px-4 py-3 text-slate-700 hover:bg-slate-50">
                        <flux:icon.clipboard-document-list class="w-5 h-5 mr-3 text-teal-600" />
                        Services
                    </a>
                </li>
                <li>
                    <a href="{{ route('about') }}" class="flex items-center px-4 py-3 text-slate-700 hover:bg-slate-50">
                        <flux:icon.information-circle class="w-5 h-5 mr-3 text-teal-600" />
                        About
                    </a>
                </li>
                <li>
                    <a href="{{ route('contact') }}" class="flex items-center px-4 py-3 text-slate-700 hover:bg-slate-50">
                        <flux:icon.chat-bubble-left-right class="w-5 h-5 mr-3 text-teal-600" />
                        Contact
                    </a>
                </li>
                <li class="border-t border-slate-100 mt-2 pt-2">
                    <a href="{{ route('login') }}" class="flex items-center px-4 py-3 text-slate-700 hover:bg-slate-50">
                        <flux:icon.user class="w-5 h-5 mr-3 text-teal-600" />
                        Login
                    </a>
                </li>
                <li>
                    <a href="{{ route('signup') }}" class="flex items-center px-4 py-3 text-slate-700 hover:bg-slate-50">
                        <flux:icon.user-plus class="w-5 h-5 mr-3 text-teal-600" />
                        Register
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</header>
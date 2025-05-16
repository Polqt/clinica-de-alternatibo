<footer class="bg-slate-900 text-white">
    <div class="container mx-auto px-4 pt-16 pb-8">
        <!-- Top Section -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-12">
            <!-- Column 1: About -->
            <div>
                <a href="{{ route('home') }}" class="flex items-center mb-4">
                    <div class="w-10 h-10 rounded-full bg-teal-500 flex items-center justify-center mr-2">
                        <flux:icon.heart-pulse class="w-6 h-6 text-white" />
                    </div>
                    <span class="text-2xl font-bold text-white">Medi<span class="text-teal-400">Care</span></span>
                </a>
                <p class="text-slate-300 text-sm mb-6">
                    Providing exceptional healthcare services with a focus on patient comfort and convenience.
                </p>
                <div class="flex space-x-3">
                    <a href="#" class="w-9 h-9 rounded-full bg-slate-800 flex items-center justify-center hover:bg-teal-600 transition-colors">
                        <flux:icon.facebook class="w-4 h-4 text-white" />
                    </a>
                    <a href="#" class="w-9 h-9 rounded-full bg-slate-800 flex items-center justify-center hover:bg-teal-600 transition-colors">
                        <flux:icon.twitter class="w-4 h-4 text-white" />
                    </a>
                    <a href="#" class="w-9 h-9 rounded-full bg-slate-800 flex items-center justify-center hover:bg-teal-600 transition-colors">
                        <flux:icon.instagram class="w-4 h-4 text-white" />
                    </a>
                    <a href="#" class="w-9 h-9 rounded-full bg-slate-800 flex items-center justify-center hover:bg-teal-600 transition-colors">
                        <flux:icon.linkedin class="w-4 h-4 text-white" />
                    </a>
                </div>
            </div>

            <!-- Column 2: Quick Links -->
            <div class="lg:ml-8">
                <h3 class="text-lg font-semibold mb-5 text-white relative pl-3 border-l-4 border-teal-500">Quick Links</h3>
                <ul class="space-y-3 text-slate-300">
                    <li class="flex items-center">
                        <flux:icon.chevron-right class="w-4 h-4 text-teal-400 mr-2" />
                        <a href="{{ route('home') }}" class="hover:text-teal-400 transition-colors">Home</a>
                    </li>
                    <li class="flex items-center">
                        <flux:icon.chevron-right class="w-4 h-4 text-teal-400 mr-2" />
                        <a href="{{ route('about') }}" class="hover:text-teal-400 transition-colors">About Us</a>
                    </li>
                    <li class="flex items-center">
                        <flux:icon.chevron-right class="w-4 h-4 text-teal-400 mr-2" />
                        <a href="{{ route('services') }}" class="hover:text-teal-400 transition-colors">Services</a>
                    </li>
                    <li class="flex items-center">
                        <flux:icon.chevron-right class="w-4 h-4 text-teal-400 mr-2" />
                        <a href="{{ route('contact') }}" class="hover:text-teal-400 transition-colors">Contact Us</a>
                    </li>
                </ul>
            </div>

            <!-- Column 3: Services -->
            <div>
                <h3 class="text-lg font-semibold mb-5 text-white relative pl-3 border-l-4 border-teal-500">Services</h3>
                <ul class="space-y-3 text-slate-300">
                    <li class="flex items-center">
                        <flux:icon.activity class="w-4 h-4 text-teal-400 mr-2" />
                        <a href="#" class="hover:text-teal-400 transition-colors">Primary Care</a>
                    </li>
                    <li class="flex items-center">
                        <flux:icon.user-plus class="w-4 h-4 text-teal-400 mr-2" />
                        <a href="#" class="hover:text-teal-400 transition-colors">Specialty Consultations</a>
                    </li>
                    <li class="flex items-center">
                        <flux:icon.stethoscope class="w-4 h-4 text-teal-400 mr-2" />
                        <a href="#" class="hover:text-teal-400 transition-colors">Diagnostic Services</a>
                    </li>
                    <li class="flex items-center">
                        <flux:icon.shield class="w-4 h-4 text-teal-400 mr-2" />
                        <a href="#" class="hover:text-teal-400 transition-colors">Preventive Care</a>
                    </li>
                    <li class="flex items-center">
                        <flux:icon.video class="w-4 h-4 text-teal-400 mr-2" />
                        <a href="#" class="hover:text-teal-400 transition-colors">Telehealth</a>
                    </li>
                </ul>
            </div>

            <!-- Column 4: Working Hours -->
            <div>
                <h3 class="text-lg font-semibold mb-5 text-white relative pl-3 border-l-4 border-teal-500">Working Hours</h3>
                <ul class="space-y-4 text-slate-300">
                    <li class="flex justify-between items-center">
                        <div class="flex items-center">
                            <flux:icon.calendar class="w-4 h-4 text-teal-400 mr-2" />
                            <span>Monday - Friday:</span>
                        </div>
                        <span class="bg-slate-800 px-3 py-1 rounded-full text-sm">8:00 AM - 6:00 PM</span>
                    </li>
                    <li class="flex justify-between items-center">
                        <div class="flex items-center">
                            <flux:icon.calendar class="w-4 h-4 text-teal-400 mr-2" />
                            <span>Saturday:</span>
                        </div>
                        <span class="bg-slate-800 px-3 py-1 rounded-full text-sm">9:00 AM - 5:00 PM</span>
                    </li>
                    <li class="flex justify-between items-center">
                        <div class="flex items-center">
                            <flux:icon.calendar class="w-4 h-4 text-teal-400 mr-2" />
                            <span>Sunday:</span>
                        </div>
                        <span class="bg-slate-800 px-3 py-1 rounded-full text-sm">10:00 AM - 2:00 PM</span>
                    </li>
                    <li class="flex justify-between items-center pt-2">
                        <div class="flex items-center">
                            <flux:icon.circle-alert class="w-4 h-4 text-red-400 mr-2" />
                            <span>Emergency:</span>
                        </div>
                        <span class="bg-teal-600 text-white px-3 py-1 rounded-full text-sm font-medium">24/7</span>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Bottom Section -->
        <div class="border-t border-slate-800 pt-6">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <p class="text-slate-300 text-sm mb-4 md:mb-0">
                    &copy; {{ date('Y') }} MediCare. All rights reserved.
                </p>
                <div class="flex flex-wrap justify-center gap-x-6 text-sm text-slate-300">
                    <a href="#" class="hover:text-teal-400 transition-colors">Privacy Policy</a>
                    <a href="#" class="hover:text-teal-400 transition-colors">Terms of Service</a>
                    <a href="#" class="hover:text-teal-400 transition-colors">Cookie Policy</a>
                </div>
            </div>
        </div>
    </div>
</footer>

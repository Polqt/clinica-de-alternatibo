<footer class="bg-teal-900 text-white">
    <div class="container mx-auto px-4 pt-12 pb-8">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-12">
            <div>
                <a href="{{ route('home') }}" class="text-2xl font-bold mb-4 inline-block">
                    Medi<span class="text-teal-400">Care</span>
                </a>
                <p class="text-teal-100 text-sm mb-6">
                    Providing exceptional healthcare services with a focus on patient comfort and convenience.
                </p>
                <div class="flex space-x-4">
                    <a href="#" class="w-8 h-8 rounded-full bg-teal-800 flex items-center justify-center hover:bg-teal-700 transition-colors">
                        <flux:icon.facebook class="w-4 h-4 text-white" />
                    </a>
                    <a href="#" class="w-8 h-8 rounded-full bg-teal-800 flex items-center justify-center hover:bg-teal-700 transition-colors">
                        <flux:icon.twitter class="w-4 h-4 text-white" />
                    </a>
                    <a href="#" class="w-8 h-8 rounded-full bg-teal-800 flex items-center justify-center hover:bg-teal-700 transition-colors">
                        <flux:icon.instagram class="w-4 h-4 text-white" />
                    </a>
                    <a href="#" class="w-8 h-8 rounded-full bg-teal-800 flex items-center justify-center hover:bg-teal-700 transition-colors">
                        <flux:icon.linkedin class="w-4 h-4 text-white" />
                    </a>
                </div>
            </div>

            <div>
                <h3 class="text-lg font-semibold mb-4">Quick Links</h3>
                <ul class="space-y-3 text-teal-100">
                    <li><a href="{{ route('home') }}" class="hover:text-white transition-colors">Home</a></li>
                    <li><a href="{{ route('about') }}" class="hover:text-white transition-colors">About Us</a></li>
                    <li><a href="{{ route('services') }}" class="hover:text-white transition-colors">Services</a></li>
                    <li><a href="{{ route('contact') }}" class="hover:text-white transition-colors">Contact Us</a></li>
                </ul>
            </div>

            <div>
                <h3 class="text-lg font-semibold mb-4">Services</h3>
                <ul class="space-y-3 text-teal-100">
                    <li><a href="#" class="hover:text-white transition-colors">Primary Care</a></li>
                    <li><a href="#" class="hover:text-white transition-colors">Specialty Consultations</a></li>
                    <li><a href="#" class="hover:text-white transition-colors">Diagnostic Services</a></li>
                    <li><a href="#" class="hover:text-white transition-colors">Preventive Care</a></li>
                    <li><a href="#" class="hover:text-white transition-colors">Telehealth</a></li>
                </ul>
            </div>

            <div>
                <h3 class="text-lg font-semibold mb-4">Working Hours</h3>
                <ul class="space-y-3 text-teal-100">
                    <li class="flex justify-between">
                        <span>Monday - Friday:</span>
                        <span>8:00 AM - 6:00 PM</span>
                    </li>
                    <li class="flex justify-between">
                        <span>Saturday:</span>
                        <span>9:00 AM - 5:00 PM</span>
                    </li>
                    <li class="flex justify-between">
                        <span>Sunday:</span>
                        <span>10:00 AM - 2:00 PM</span>
                    </li>
                    <li class="flex justify-between pt-2">
                        <span>Emergency:</span>
                        <span class="text-teal-300">24/7</span>
                    </li>
                </ul>
            </div>
        </div>

        <div class="border-t border-teal-800 pt-6">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <p class="text-teal-100 text-sm mb-4 md:mb-0">
                    &copy; {{ date('Y') }} MediCare. All rights reserved.
                </p>
                <div class="flex flex-wrap justify-center gap-4 text-sm text-teal-200">
                    <a href="#" class="hover:text-white transition-colors">Privacy Policy</a>
                    <span class="hidden md:inline text-teal-700">|</span>
                    <a href="#" class="hover:text-white transition-colors">Terms of Service</a>
                    <span class="hidden md:inline text-teal-700">|</span>
                    <a href="#" class="hover:text-white transition-colors">Cookie Policy</a>
                </div>
            </div>
        </div>
    </div>
</footer>
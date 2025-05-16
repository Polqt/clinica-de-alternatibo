@props([
'title' => 'Contact | MediCare'
])

@extends('layouts.app')

@section('content')
<section class="relative overflow-hidden bg-gradient-to-r from-teal-50 to-cyan-50">
    <div class="container mx-auto px-4 py-16 md:py-20 relative">
        <div class="text-center max-w-3xl mx-auto mb-12">
            <span class="inline-block px-3 py-1 text-sm font-medium bg-teal-100 text-teal-800 rounded-full mb-4">
                Get in Touch
            </span>
            <h1 class="text-4xl md:text-5xl font-bold text-slate-900 mb-6 leading-tight">
                We're Here to <span class="text-teal-600">Help You</span>
            </h1>
            <p class="text-lg text-slate-600">
                Have questions or need assistance? Our dedicated support team is ready to provide the information and guidance you need.
            </p>
        </div>
    </div>
</section>

<section class="bg-white py-12 md:py-20 -mt-6">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Contact Information Column -->
            <div class="lg:col-span-1">
                <div class="bg-slate-50 rounded-xl p-8 border border-slate-100 h-full">
                    <h2 class="text-2xl font-bold text-slate-900 mb-6">Contact Information</h2>

                    <div class="space-y-8">
                        <div class="flex items-start">
                            <div class="w-12 h-12 rounded-full bg-teal-100 flex items-center justify-center mr-4 flex-shrink-0">
                                <flux:icon.map-pin class="w-6 h-6 text-teal-600" />
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-slate-900 mb-1">Main Office</h3>
                                <p class="text-slate-600">123 Healthcare Avenue, Medical District</p>
                                <p class="text-slate-600">New York, NY 10001</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="w-12 h-12 rounded-full bg-teal-100 flex items-center justify-center mr-4 flex-shrink-0">
                                <flux:icon.phone class="w-6 h-6 text-teal-600" />
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-slate-900 mb-1">Phone</h3>
                                <p class="text-slate-600">Main: +1 (123) 456-7890</p>
                                <p class="text-slate-600">Support: +1 (123) 456-7891</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="w-12 h-12 rounded-full bg-teal-100 flex items-center justify-center mr-4 flex-shrink-0">
                                <flux:icon.envelope class="w-6 h-6 text-teal-600" />
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-slate-900 mb-1">Email</h3>
                                <p class="text-slate-600">General: info@medicare.com</p>
                                <p class="text-slate-600">Support: support@medicare.com</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="w-12 h-12 rounded-full bg-teal-100 flex items-center justify-center mr-4 flex-shrink-0">
                                <flux:icon.clock class="w-6 h-6 text-teal-600" />
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-slate-900 mb-1">Hours</h3>
                                <p class="text-slate-600">Monday - Friday: 8:00 AM - 8:00 PM</p>
                                <p class="text-slate-600">Saturday: 9:00 AM - 5:00 PM</p>
                                <p class="text-slate-600">Sunday: Closed</p>
                            </div>
                        </div>
                    </div>

                    <div class="mt-8">
                        <h3 class="text-lg font-semibold text-slate-900 mb-3">Connect With Us</h3>
                        <div class="flex space-x-4">
                            <a href="#" class="w-10 h-10 rounded-full bg-teal-100 hover:bg-teal-200 flex items-center justify-center transition-colors">
                                <flux:icon.facebook class="w-5 h-5 text-teal-600" />
                            </a>
                            <a href="#" class="w-10 h-10 rounded-full bg-teal-100 hover:bg-teal-200 flex items-center justify-center transition-colors">
                                <flux:icon.twitter class="w-5 h-5 text-teal-600" />
                            </a>
                            <a href="#" class="w-10 h-10 rounded-full bg-teal-100 hover:bg-teal-200 flex items-center justify-center transition-colors">
                                <flux:icon.instagram class="w-5 h-5 text-teal-600" />
                            </a>
                            <a href="#" class="w-10 h-10 rounded-full bg-teal-100 hover:bg-teal-200 flex items-center justify-center transition-colors">
                                <flux:icon.linkedin class="w-5 h-5 text-teal-600" />
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contact Form Column -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-xl shadow-sm border border-slate-100 p-8">
                    <h2 class="text-2xl font-bold text-slate-900 mb-6">Send Us a Message</h2>

                    <form action="#" method="POST">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <div>
                                <label for="first_name" class="block text-sm font-medium text-slate-700 mb-2">First Name</label>
                                <input type="text" name="first_name" id="first_name" class="w-full px-4 py-3 rounded-lg border border-slate-300 focus:border-teal-500 focus:ring focus:ring-teal-200 focus:ring-opacity-50 transition-all" placeholder="John">
                            </div>

                            <div>
                                <label for="last_name" class="block text-sm font-medium text-slate-700 mb-2">Last Name</label>
                                <input type="text" name="last_name" id="last_name" class="w-full px-4 py-3 rounded-lg border border-slate-300 focus:border-teal-500 focus:ring focus:ring-teal-200 focus:ring-opacity-50 transition-all" placeholder="Doe">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <div>
                                <label for="email" class="block text-sm font-medium text-slate-700 mb-2">Email Address</label>
                                <input type="email" name="email" id="email" class="w-full px-4 py-3 rounded-lg border border-slate-300 focus:border-teal-500 focus:ring focus:ring-teal-200 focus:ring-opacity-50 transition-all" placeholder="john.doe@example.com">
                            </div>

                            <div>
                                <label for="phone" class="block text-sm font-medium text-slate-700 mb-2">Phone Number</label>
                                <input type="tel" name="phone" id="phone" class="w-full px-4 py-3 rounded-lg border border-slate-300 focus:border-teal-500 focus:ring focus:ring-teal-200 focus:ring-opacity-50 transition-all" placeholder="(123) 456-7890">
                            </div>
                        </div>

                        <div class="mb-6">
                            <label for="subject" class="block text-sm font-medium text-slate-700 mb-2">Subject</label>
                            <input type="text" name="subject" id="subject" class="w-full px-4 py-3 rounded-lg border border-slate-300 focus:border-teal-500 focus:ring focus:ring-teal-200 focus:ring-opacity-50 transition-all" placeholder="How can we help you?">
                        </div>

                        <div class="mb-6">
                            <label for="message" class="block text-sm font-medium text-slate-700 mb-2">Message</label>
                            <textarea name="message" id="message" rows="5" class="w-full px-4 py-3 rounded-lg border border-slate-300 focus:border-teal-500 focus:ring focus:ring-teal-200 focus:ring-opacity-50 transition-all" placeholder="Please describe your inquiry..."></textarea>
                        </div>

                        <div class="mb-6">
                            <label class="flex items-center">
                                <input type="checkbox" name="terms" class="rounded border-slate-300 text-teal-600 focus:ring-teal-500">
                                <span class="ml-2 text-sm text-slate-600">I agree to the <a href="#" class="text-teal-600 hover:underline">Privacy Policy</a> and <a href="#" class="text-teal-600 hover:underline">Terms of Service</a></span>
                            </label>
                        </div>

                        <div>
                            <button type="submit" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-teal-500 to-cyan-500 text-white font-medium rounded-lg shadow-sm hover:from-teal-600 hover:to-cyan-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500 transition-all">
                                <flux:icon.paper-airplane class="w-5 h-5 mr-2" />
                                Send Message
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="bg-slate-50 py-16">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-slate-900 mb-4">Our Locations</h2>
            <p class="text-lg text-slate-600 max-w-2xl mx-auto">
                Visit one of our conveniently located medical facilities
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white rounded-xl shadow-sm p-6 border border-slate-100">
                <div class="w-14 h-14 rounded-full bg-teal-100 flex items-center justify-center mb-5">
                    <flux:icon.building-office class="w-7 h-7 text-teal-600" />
                </div>
                <h3 class="text-xl font-semibold text-slate-900 mb-2">Main Hospital</h3>
                <p class="text-slate-600 mb-1">123 Healthcare Avenue</p>
                <p class="text-slate-600 mb-3">New York, NY 10001</p>
                <p class="text-slate-700 font-medium mb-4">+1 (123) 456-7890</p>
                <a href="#" class="inline-flex items-center text-teal-600 hover:text-teal-700 font-medium">
                    Get Directions
                    <flux:icon.arrow-right class="w-4 h-4 ml-1" />
                </a>
            </div>

            <div class="bg-white rounded-xl shadow-sm p-6 border border-slate-100">
                <div class="w-14 h-14 rounded-full bg-blue-100 flex items-center justify-center mb-5">
                    <flux:icon.building-storefront class="w-7 h-7 text-blue-600" />
                </div>
                <h3 class="text-xl font-semibold text-slate-900 mb-2">Downtown Clinic</h3>
                <p class="text-slate-600 mb-1">456 Medical Plaza</p>
                <p class="text-slate-600 mb-3">New York, NY 10002</p>
                <p class="text-slate-700 font-medium mb-4">+1 (123) 456-7891</p>
                <a href="#" class="inline-flex items-center text-teal-600 hover:text-teal-700 font-medium">
                    Get Directions
                    <flux:icon.arrow-right class="w-4 h-4 ml-1" />
                </a>
            </div>

            <div class="bg-white rounded-xl shadow-sm p-6 border border-slate-100">
                <div class="w-14 h-14 rounded-full bg-amber-100 flex items-center justify-center mb-5">
                    <flux:icon.building class="w-7 h-7 text-amber-600" />
                </div>
                <h3 class="text-xl font-semibold text-slate-900 mb-2">Uptown Medical Center</h3>
                <p class="text-slate-600 mb-1">789 Health Boulevard</p>
                <p class="text-slate-600 mb-3">New York, NY 10003</p>
                <p class="text-slate-700 font-medium mb-4">+1 (123) 456-7892</p>
                <a href="#" class="inline-flex items-center text-teal-600 hover:text-teal-700 font-medium">
                    Get Directions
                    <flux:icon.arrow-right class="w-4 h-4 ml-1" />
                </a>
            </div>
        </div>
    </div>
</section>


<section class="bg-slate-50 py-16">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-slate-900 mb-4">Frequently Asked Questions</h2>
            <p class="text-lg text-slate-600 max-w-2xl mx-auto">
                Find answers to common questions about our services and contact process
            </p>
        </div>

        <div class="max-w-3xl mx-auto">
            <div class="space-y-4">
                <div class="bg-white rounded-lg p-5 border border-slate-100 shadow-sm">
                    <h3 class="text-lg font-semibold text-slate-900 mb-2">What should I do if I can't find the department I need to contact?</h3>
                    <p class="text-slate-600">
                        If you're not sure which department to contact, please use our general contact form or call our main office number. Our staff will direct your inquiry to the appropriate department.
                    </p>
                </div>

                <div class="bg-white rounded-lg p-5 border border-slate-100 shadow-sm">
                    <h3 class="text-lg font-semibold text-slate-900 mb-2">How quickly will I receive a response to my inquiry?</h3>
                    <p class="text-slate-600">
                        We aim to respond to all inquiries within 24-48 business hours. For urgent matters, please call our dedicated support line for immediate assistance.
                    </p>
                </div>

                <div class="bg-white rounded-lg p-5 border border-slate-100 shadow-sm">
                    <h3 class="text-lg font-semibold text-slate-900 mb-2">Can I schedule an appointment through the contact form?</h3>
                    <p class="text-slate-600">
                        While you can inquire about appointments through the contact form, we recommend using our dedicated appointment booking system on our website or mobile app for faster service.
                    </p>
                </div>

                <div class="bg-white rounded-lg p-5 border border-slate-100 shadow-sm">
                    <h3 class="text-lg font-semibold text-slate-900 mb-2">How do I submit feedback about my experience?</h3>
                    <p class="text-slate-600">
                        We value your feedback! You can submit comments or suggestions through our contact form by selecting "Feedback" as the subject, or speak directly with our patient relations team.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
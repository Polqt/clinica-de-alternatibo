@props([
'title' => 'Services | MediCare'
])

@extends('layouts.app')
@section('content')
<section class="relative overflow-hidden bg-gradient-to-r from-teal-50 to-cyan-50 py-16 lg:py-20">
    <div class="absolute right-0 top-0 -mt-16 opacity-10">
        <svg width="600" height="600" viewBox="0 0 600 600" fill="none" xmlns="http://www.w3.org/2000/svg">
            <circle cx="300" cy="300" r="300" fill="url(#paint0_linear)" />
            <defs>
                <linearGradient id="paint0_linear" x1="0" y1="0" x2="600" y2="600" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#0D9488" />
                    <stop offset="1" stop-color="#0891B2" />
                </linearGradient>
            </defs>
        </svg>
    </div>
    <div class="container mx-auto px-4 relative">
        <div class="max-w-3xl mx-auto text-center">
            <span class="inline-block px-3 py-1 text-sm font-medium bg-teal-100 text-teal-800 rounded-full mb-4">
                Comprehensive Healthcare
            </span>
            <h1 class="text-4xl md:text-5xl font-bold text-slate-900 mb-6 leading-tight">
                Our Medical <span class="text-teal-600">Services</span>
            </h1>
            <p class="text-lg text-slate-600 mb-8">
                Discover our wide range of medical services designed to provide you with the highest quality care from experienced healthcare professionals.
            </p>
        </div>
    </div>
</section>

<!-- Services Categories Section -->
<section class="bg-white py-16">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-slate-900 mb-4">Service Categories</h2>
            <p class="text-lg text-slate-600 max-w-2xl mx-auto">
                Browse through our specialized departments to find the care you need
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
            <div class="bg-slate-50 rounded-xl p-8 transition-all hover:shadow-md border border-slate-100 text-center group hover:bg-gradient-to-br hover:from-teal-50 hover:to-cyan-50">
                <div class="w-16 h-16 rounded-full bg-teal-100 flex items-center justify-center mx-auto mb-5 group-hover:bg-teal-200 transition-all">
                    <flux:icon.stethoscope class="w-8 h-8 text-teal-600" />
                </div>
                <h3 class="text-xl font-semibold text-slate-900 mb-3">Primary Care</h3>
                <p class="text-slate-600 mb-4">
                    Routine check-ups, preventive care, and treatment for common illnesses and injuries.
                </p>
                <flux:button icon="arrow-right">
                    Learn More
                </flux:button>
            </div>

            <div class="bg-slate-50 rounded-xl p-8 transition-all hover:shadow-md border border-slate-100 text-center group hover:bg-gradient-to-br hover:from-teal-50 hover:to-cyan-50">
                <div class="w-16 h-16 rounded-full bg-blue-100 flex items-center justify-center mx-auto mb-5 group-hover:bg-blue-200 transition-all">
                    <flux:icon.heart class="w-8 h-8 text-blue-600" />
                </div>
                <h3 class="text-xl font-semibold text-slate-900 mb-3">Specialty Care</h3>
                <p class="text-slate-600 mb-4">
                    Focused treatment in cardiology, orthopedics, neurology, and other specialized areas.
                </p>
                <flux:button icon="arrow-right">
                    Learn More
                </flux:button>
            </div>

            <div class="bg-slate-50 rounded-xl p-8 transition-all hover:shadow-md border border-slate-100 text-center group hover:bg-gradient-to-br hover:from-teal-50 hover:to-cyan-50">
                <div class="w-16 h-16 rounded-full bg-amber-100 flex items-center justify-center mx-auto mb-5 group-hover:bg-amber-200 transition-all">
                    <flux:icon.video class="w-8 h-8 text-amber-600" />
                </div>
                <h3 class="text-xl font-semibold text-slate-900 mb-3">Telehealth</h3>
                <p class="text-slate-600 mb-4">
                    Virtual consultations and follow-ups from the comfort of your home.
                </p>
                <flux:button icon="arrow-right">
                    Learn More
                </flux:button>
            </div>
        </div>
    </div>
</section>

<!-- Featured Services Section -->
<section class="bg-gradient-to-r from-teal-500 to-cyan-500 py-16">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-slate-900 mb-4">Featured Services</h2>
            <p class="text-lg text-slate-600 text-opacity-90 max-w-2xl mx-auto">
                Our most popular and specialized medical services
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="bg-white bg-opacity-10 backdrop-blur-sm rounded-xl overflow-hidden border border-white border-opacity-20 transition-all hover:bg-opacity-20 group">
                <div class="h-48 bg-white bg-opacity-80 flex items-center justify-center relative overflow-hidden">
                    <div class="absolute inset-0 bg-gradient-to-r from-teal-200 to-cyan-200 opacity-20"></div>
                    <div class="w-20 h-20 rounded-full bg-white flex items-center justify-center z-10">
                        <flux:icon.heart-pulse class="w-10 h-10 text-teal-600" />
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-semibold text-slate-900 mb-2">Cardiac Care</h3>
                    <p class="text-slate-600 text-opacity-80 mb-4">
                        Comprehensive heart health services including ECG, stress tests, and cardiac consultations.
                    </p>
                    <ul class="space-y-2 mb-6">
                        <li class="flex items-center text-slate-700 text-opacity-90">
                            <flux:icon.check-circle class="w-5 h-5 mr-2 text-teal-200" />
                            <span>Heart health assessments</span>
                        </li>
                        <li csla="flex items-center text-slate-700 text-opacity-90">
                            <flux:icon.check-circle class="w-5 h-5 mr-2 text-teal-200" />
                            <span>Cholesterol management</span>
                        </li>
                        <li class="flex items-center text-slate-700 text-opacity-90">
                            <flux:icon.check-circle class="w-5 h-5 mr-2 text-teal-200" />
                            <span>Cardiovascular screenings</span>
                        </li>
                    </ul>
                    <flux:button class="w-full justify-center bg-white text-teal-600 hover:bg-opacity-90">
                        Book Appointment
                    </flux:button>
                </div>
            </div>
            <div class="bg-white bg-opacity-10 backdrop-blur-sm rounded-xl overflow-hidden border border-white border-opacity-20 transition-all hover:bg-opacity-20 group">
                <div class="h-48 bg-white bg-opacity-80 flex items-center justify-center relative overflow-hidden">
                    <div class="absolute inset-0 bg-gradient-to-r from-teal-200 to-cyan-200 opacity-20"></div>
                    <div class="w-20 h-20 rounded-full bg-white flex items-center justify-center z-10">
                        <flux:icon.brain class="w-10 h-10 text-blue-600" />
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-semibold text-slate-900 mb-2">Neurological Care</h3>
                    <p class="text-slate-600 text-opacity-80 mb-4">
                        Specialized diagnostics and treatment for disorders of the brain, spine, and nervous system.
                    </p>
                    <ul class="space-y-2 mb-6">
                        <li class="flex items-center text-slate-700 text-opacity-90">
                            <flux:icon.check-circle class="w-5 h-5 mr-2 text-teal-200" />
                            <span>Cognitive assessments</span>
                        </li>
                        <li class="flex items-center text-slate-700 text-opacity-90">
                            <flux:icon.check-circle class="w-5 h-5 mr-2 text-teal-200" />
                            <span>Headache treatment</span>
                        </li>
                        <li class="flex items-center text-slate-700 text-opacity-90">
                            <flux:icon.check-circle class="w-5 h-5 mr-2 text-teal-200" />
                            <span>Movement disorder therapy</span>
                        </li>
                    </ul>
                    <flux:button class="w-full justify-center bg-white text-teal-600 hover:bg-opacity-90">
                        Book Appointment
                    </flux:button>
                </div>
            </div>
            <div class="bg-white bg-opacity-10 backdrop-blur-sm rounded-xl overflow-hidden border border-white border-opacity-20 transition-all hover:bg-opacity-20 group">
                <div class="h-48 bg-white bg-opacity-80 flex items-center justify-center relative overflow-hidden">
                    <div class="absolute inset-0 bg-gradient-to-r from-teal-200 to-cyan-200 opacity-20"></div>
                    <div class="w-20 h-20 rounded-full bg-white flex items-center justify-center z-10">
                        <flux:icon.bone class="w-10 h-10 text-amber-600" />
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-semibold text-slate-900 mb-2">Orthopedic Care</h3>
                    <p class="text-slate-600 text-opacity-80 mb-4">
                        Specialized care for bones, joints, ligaments, tendons, muscles, and nerves.
                    </p>
                    <ul class="space-y-2 mb-6">
                        <li class="flex items-center text-slate-700 text-opacity-90">
                            <flux:icon.check-circle class="w-5 h-5 mr-2 text-teal-200" />
                            <span>Joint pain management</span>
                        </li>
                        <li class="flex items-center text-slate-700 text-opacity-90">
                            <flux:icon.check-circle class="w-5 h-5 mr-2 text-teal-200" />
                            <span>Sports injury treatment</span>
                        </li>
                        <li class="flex items-center text-slate-700 text-opacity-90">
                            <flux:icon.check-circle class="w-5 h-5 mr-2 text-teal-200" />
                            <span>Fracture care</span>
                        </li>
                    </ul>
                    <flux:button class="w-full justify-center bg-white text-teal-600 hover:bg-opacity-90">
                        Book Appointment
                    </flux:button>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Comprehensive Services List -->
<section class="bg-white py-16">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-slate-900 mb-4">All Medical Services</h2>
            <p class="text-lg text-slate-600 max-w-2xl mx-auto">
                Explore our complete range of healthcare services
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Left Column -->
            <div class="space-y-6">
                <!-- Service Item 1 -->
                <div class="bg-slate-50 rounded-lg p-6 border border-slate-100 transition-all hover:shadow-md">
                    <div class="flex items-start">
                        <div class="w-12 h-12 rounded-full bg-teal-100 flex items-center justify-center mr-4 shrink-0">
                            <flux:icon.user-circle class="w-6 h-6 text-teal-600" />
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-slate-900 mb-2">Family Medicine</h3>
                            <p class="text-slate-600">
                                Comprehensive healthcare for patients of all ages, focusing on preventive care and management of chronic conditions.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Service Item 2 -->
                <div class="bg-slate-50 rounded-lg p-6 border border-slate-100 transition-all hover:shadow-md">
                    <div class="flex items-start">
                        <div class="w-12 h-12 rounded-full bg-teal-100 flex items-center justify-center mr-4 shrink-0">
                            <flux:icon.baby class="w-6 h-6 text-teal-600" />
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-slate-900 mb-2">Pediatric Care</h3>
                            <p class="text-slate-600">
                                Specialized healthcare services for infants, children, and adolescents, including well-child visits and immunizations.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Service Item 3 -->
                <div class="bg-slate-50 rounded-lg p-6 border border-slate-100 transition-all hover:shadow-md">
                    <div class="flex items-start">
                        <div class="w-12 h-12 rounded-full bg-teal-100 flex items-center justify-center mr-4 shrink-0">
                            <flux:icon.flask-conical class="w-6 h-6 text-teal-600" />
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-slate-900 mb-2">Laboratory Services</h3>
                            <p class="text-slate-600">
                                Comprehensive diagnostic testing including blood work, urinalysis, and other laboratory tests with quick results.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Service Item 4 -->
                <div class="bg-slate-50 rounded-lg p-6 border border-slate-100 transition-all hover:shadow-md">
                    <div class="flex items-start">
                        <div class="w-12 h-12 rounded-full bg-teal-100 flex items-center justify-center mr-4 shrink-0">
                            <flux:icon.pill class="w-6 h-6 text-teal-600" />
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-slate-900 mb-2">Pharmacy Services</h3>
                            <p class="text-slate-600">
                                On-site pharmacy with prescription medications, over-the-counter products, and medication counseling.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Service Item 5 -->
                <div class="bg-slate-50 rounded-lg p-6 border border-slate-100 transition-all hover:shadow-md">
                    <div class="flex items-start">
                        <div class="w-12 h-12 rounded-full bg-teal-100 flex items-center justify-center mr-4 shrink-0">
                            <flux:icon.microscope class="w-6 h-6 text-teal-600" />
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-slate-900 mb-2">Pathology Services</h3>
                            <p class="text-slate-600">
                                Advanced diagnostic testing and analysis of tissues, cells, and bodily fluids to identify disease.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column -->
            <div class="space-y-6">
                <!-- Service Item 6 -->
                <div class="bg-slate-50 rounded-lg p-6 border border-slate-100 transition-all hover:shadow-md">
                    <div class="flex items-start">
                        <div class="w-12 h-12 rounded-full bg-blue-100 flex items-center justify-center mr-4 shrink-0">
                            <flux:icon.eye class="w-6 h-6 text-blue-600" />
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-slate-900 mb-2">Vision Care</h3>
                            <p class="text-slate-600">
                                Complete eye examinations, vision correction, and treatment for eye conditions and diseases.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Service Item 7 -->
                <div class="bg-slate-50 rounded-lg p-6 border border-slate-100 transition-all hover:shadow-md">
                    <div class="flex items-start">
                        <div class="w-12 h-12 rounded-full bg-blue-100 flex items-center justify-center mr-4 shrink-0">
                            <flux:icon.ear class="w-6 h-6 text-blue-600" />
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-slate-900 mb-2">Audiology Services</h3>
                            <p class="text-slate-600">
                                Hearing assessments, hearing aid fittings, and treatment for ear-related conditions.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Service Item 8 -->
                <div class="bg-slate-50 rounded-lg p-6 border border-slate-100 transition-all hover:shadow-md">
                    <div class="flex items-start">
                        <div class="w-12 h-12 rounded-full bg-blue-100 flex items-center justify-center mr-4 shrink-0">
                            <flux:icon.activity class="w-6 h-6 text-blue-600" />
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-slate-900 mb-2">Physical Therapy</h3>
                            <p class="text-slate-600">
                                Rehabilitation services to help patients regain movement and function after injury or surgery.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Service Item 9 -->
                <div class="bg-slate-50 rounded-lg p-6 border border-slate-100 transition-all hover:shadow-md">
                    <div class="flex items-start">
                        <div class="w-12 h-12 rounded-full bg-blue-100 flex items-center justify-center mr-4 shrink-0">
                            <flux:icon.brain class="w-6 h-6 text-blue-600" />
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-slate-900 mb-2">Mental Health Services</h3>
                            <p class="text-slate-600">
                                Counseling, therapy, and psychiatric care for mental health conditions and emotional wellness.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Service Item 10 -->
                <div class="bg-slate-50 rounded-lg p-6 border border-slate-100 transition-all hover:shadow-md">
                    <div class="flex items-start">
                        <div class="w-12 h-12 rounded-full bg-blue-100 flex items-center justify-center mr-4 shrink-0">
                            <flux:icon.syringe class="w-6 h-6 text-blue-600" />
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-slate-900 mb-2">Vaccination Services</h3>
                            <p class="text-slate-600">
                                Routine and travel vaccinations for children and adults to prevent infectious diseases.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="bg-gradient-to-r from-teal-500 to-cyan-500 py-16">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-white mb-4">Our Service Process</h2>
            <p class="text-lg text-white text-opacity-90 max-w-2xl mx-auto">
                Simple steps to access our healthcare services
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Step 1 -->
            <div class="bg-white bg-opacity-10 backdrop-blur-sm rounded-xl p-6 border border-white border-opacity-20 relative">
                <div class="absolute -top-4 -left-4 w-12 h-12 rounded-full bg-white text-teal-600 flex items-center justify-center text-xl font-bold">
                    1
                </div>
                <div class="text-center pt-6">
                    <div class="w-16 h-16 rounded-full bg-white flex items-center justify-center mx-auto mb-4">
                        <flux:icon.calendar class="w-8 h-8 text-teal-600" />
                    </div>
                    <h3 class="text-xl font-semibold text-slate-900 mb-3">Schedule</h3>
                    <p class="text-slate-600 text-opacity-80">
                        Book your appointment online or via phone with your preferred specialist.
                    </p>
                </div>
            </div>

            <!-- Step 2 -->
            <div class="bg-white bg-opacity-10 backdrop-blur-sm rounded-xl p-6 border border-white border-opacity-20 relative">
                <div class="absolute -top-4 -left-4 w-12 h-12 rounded-full bg-white text-teal-600 flex items-center justify-center text-xl font-bold">
                    2
                </div>
                <div class="text-center pt-6">
                    <div class="w-16 h-16 rounded-full bg-white flex items-center justify-center mx-auto mb-4">
                        <flux:icon.clipboard class="w-8 h-8 text-teal-600" />
                    </div>
                    <h3 class="text-xl font-semibold text-slate-900 mb-3">Consultation</h3>
                    <p class="text-slate-600 text-opacity-80">
                        Meet with our healthcare professional for assessment and diagnosis.
                    </p>
                </div>
            </div>

            <!-- Step 3 -->
            <div class="bg-white bg-opacity-10 backdrop-blur-sm rounded-xl p-6 border border-white border-opacity-20 relative">
                <div class="absolute -top-4 -left-4 w-12 h-12 rounded-full bg-white text-teal-600 flex items-center justify-center text-xl font-bold">
                    3
                </div>
                <div class="text-center pt-6">
                    <div class="w-16 h-16 rounded-full bg-white flex items-center justify-center mx-auto mb-4">
                        <flux:icon.file-text class="w-8 h-8 text-teal-600" />
                    </div>
                    <h3 class="text-xl font-semibold text-slate-900 mb-3">Treatment Plan</h3>
                    <p class="text-slate-600 text-opacity-80">
                        Receive a personalized treatment plan tailored to your specific needs.
                    </p>
                </div>
            </div>

            <!-- Step 4 -->
            <div class="bg-white bg-opacity-10 backdrop-blur-sm rounded-xl p-6 border border-white border-opacity-20 relative">
                <div class="absolute -top-4 -left-4 w-12 h-12 rounded-full bg-white text-teal-600 flex items-center justify-center text-xl font-bold">
                    4
                </div>
                <div class="text-center pt-6">
                    <div class="w-16 h-16 rounded-full bg-white flex items-center justify-center mx-auto mb-4">
                        <flux:icon.activity class="w-8 h-8 text-teal-600" />
                    </div>
                    <h3 class="text-xl font-semibold text-slate-900 mb-3">Follow-up Care</h3>
                    <p class="text-slate-600 text-opacity-80">
                        Regular check-ins and follow-up appointments to monitor your progress.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="bg-white py-16">
    <div class="container mx-auto px-4">
        <div class="max-w-5xl mx-auto bg-gradient-to-r from-teal-50 to-cyan-50 rounded-2xl p-8 md:p-12 border border-slate-100 relative overflow-hidden">
            <div class="absolute right-0 bottom-0 opacity-10">
                <svg width="400" height="400" viewBox="0 0 600 600" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="300" cy="300" r="300" fill="url(#paint0_linear)" />
                    <defs>
                        <linearGradient id="paint0_linear" x1="0" y1="0" x2="600" y2="600" gradientUnits="userSpaceOnUse">
                            <stop stop-color="#0D9488" />
                            <stop offset="1" stop-color="#0891B2" />
                        </linearGradient>
                    </defs>
                </svg>
            </div>

            <div class="relative z-10 flex flex-col md:flex-row items-center">
                <div class="w-full md:w-2/3 md:pr-12 mb-8 md:mb-0">
                    <h2 class="text-3xl md:text-4xl font-bold text-slate-900 mb-4">Ready to Experience Better Healthcare?</h2>
                    <p class="text-lg text-slate-700 mb-6">
                        Book an appointment today and discover how our comprehensive services can help you achieve optimal health and wellness.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4">
                        <flux:button icon="calendar">
                            Book an Appointment
                        </flux:button>
                        <flux:button variant="outline" icon="phone">
                            Contact Us
                        </flux:button>
                    </div>
                </div>

                <div class="w-full md:w-1/3">
                    <div class="bg-white rounded-xl shadow-md p-6 border border-slate-100">
                        <div class="flex items-center mb-4">
                            <div class="w-10 h-10 rounded-full bg-teal-100 flex items-center justify-center mr-4">
                                <flux:icon.clock class="w-5 h-5 text-teal-600" />
                            </div>
                            <div>
                                <h3 class="font-semibold text-slate-900">Opening Hours</h3>
                            </div>
                        </div>

                        <div class="space-y-2 mb-4">
                            <div class="flex justify-between text-slate-700">
                                <span>Monday - Friday</span>
                                <span>8:00 AM - 8:00 PM</span>
                            </div>
                            <div class="flex justify-between text-slate-700">
                                <span>Saturday</span>
                                <span>9:00 AM - 5:00 PM</span>
                            </div>
                            <div class="flex justify-between text-slate-700">
                                <span>Sunday</span>
                                <span>10:00 AM - 2:00 PM</span>
                            </div>
                        </div>

                        <div class="pt-4 border-t border-slate-100">
                            <div class="flex items-center text-slate-700">
                                <flux:icon.phone class="w-4 h-4 mr-2 text-teal-600" />
                                <span>Emergency: +1 (123) 456-7890</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="bg-slate-50 py-16">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-slate-900 mb-4">Frequently Asked Questions</h2>
            <p class="text-lg text-slate-600 max-w-2xl mx-auto">
                Find answers to common questions about our services
            </p>
        </div>

        <div class="max-w-4xl mx-auto space-y-4">
            <!-- FAQ Item 1 -->
            <div class="bg-white rounded-lg shadow-sm border border-slate-100 overflow-hidden">
                <div class="p-5">
                    <div class="flex items-center justify-between">
                        <h3 class="text-lg font-semibold text-slate-900">What services are covered by insurance?</h3>
                        <flux:icon.plus-circle class="w-6 h-6 text-teal-600" />
                    </div>
                    <div class="mt-4 text-slate-600">
                        Coverage varies depending on your insurance plan. Most preventive services, consultations, and treatments are covered at least partially. Our billing department can help verify your benefits before your appointment.
                    </div>
                </div>
            </div>

            <!-- FAQ Item 2 -->
            <div class="bg-white rounded-lg shadow-sm border border-slate-100 overflow-hidden">
                <div class="p-5">
                    <div class="flex items-center justify-between">
                        <h3 class="text-lg font-semibold text-slate-900">Do I need a referral to see a specialist?</h3>
                        <flux:icon.plus-circle class="w-6 h-6 text-teal-600" />
                    </div>
                    <div class="mt-4 text-slate-600">
                        Some insurance plans require referrals for specialist visits, while others don't. We recommend checking with your insurance provider. If you need assistance, our staff can help guide you through the process.
                    </div>
                </div>
            </div>

            <!-- FAQ Item 3 -->
            <div class="bg-white rounded-lg shadow-sm border border-slate-100 overflow-hidden">
                <div class="p-5">
                    <div class="flex items-center justify-between">
                        <h3 class="text-lg font-semibold text-slate-900">How do I prepare for my appointment?</h3>
                        <flux:icon.plus-circle class="w-6 h-6 text-teal-600" />
                    </div>
                    <div class="mt-4 text-slate-600">
                        Bring your insurance card, ID, and a list of current medications. Arrive 15 minutes early to complete paperwork if you're a new patient. For specific tests or procedures, your doctor may provide additional preparation instructions.
                    </div>
                </div>
            </div>

            <!-- FAQ Item 4 -->
            <div class="bg-white rounded-lg shadow-sm border border-slate-100 overflow-hidden">
                <div class="p-5">
                    <div class="flex items-center justify-between">
                        <h3 class="text-lg font-semibold text-slate-900">Can I request a specific doctor?</h3>
                        <flux:icon.plus-circle class="w-6 h-6 text-teal-600" />
                    </div>
                    <div class="mt-4 text-slate-600">
                        Yes, you can request appointments with specific healthcare providers. We do our best to accommodate these requests based on availability. You can view our doctors' profiles on our website to find the best match for your needs.
                    </div>
                </div>
            </div>

            <!-- FAQ Item 5 -->
            <div class="bg-white rounded-lg shadow-sm border border-slate-100 overflow-hidden">
                <div class="p-5">
                    <div class="flex items-center justify-between">
                        <h3 class="text-lg font-semibold text-slate-900">Do you offer virtual consultations?</h3>
                        <flux:icon.plus-circle class="w-6 h-6 text-teal-600" />
                    </div>
                    <div class="mt-4 text-slate-600">
                        Yes, we offer telehealth services for many types of appointments. Virtual consultations are convenient for follow-ups, medication management, and certain initial consultations. Not all services can be provided virtually, so please check with our staff.
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
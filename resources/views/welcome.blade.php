@props([
'title' => 'Home | MediCare'
])

@extends('layouts.app')
@section('content')
<section class="relative overflow-hidden bg-gradient-to-r from-teal-50 to-cyan-50">
    <div class="absolute right-0 top-0 -mt-16 opacity-10">
    </div>
    <div class="container mx-auto px-4 py-16 md:py-24 relative">
        <div class="flex flex-col md:flex-row items-center">
            <div class="w-full md:w-1/2 md:pr-12 mb-10 md:mb-0">
                <span class="inline-block px-3 py-1 text-sm font-medium bg-teal-100 text-teal-800 rounded-full mb-4">
                    Your Health, Our Priority
                </span>
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-slate-900 mb-6 leading-tight">
                    Modern Healthcare at Your <span class="text-teal-600">Fingertips</span>
                </h1>
                <p class="text-lg text-slate-600 mb-8">
                    Experience hassle-free scheduling, quick consultations, and personalized care with our network of trusted healthcare professionals.
                </p>
                <div class="flex flex-col sm:flex-row gap-4">
                    <flux:button icon="calendar">
                        Book an Appointment
                    </flux:button>
                    <flux:button variant="outline" icon="user-circle">
                        Find a Doctor
                    </flux:button>
                </div>
                <div class="mt-10 flex items-center">
                    <div class="flex -space-x-2">
                        <div class="w-8 h-8 rounded-full bg-white shadow-sm border border-slate-200 flex items-center justify-center">
                            <flux:icon.user class="w-4 h-4 text-teal-600" />
                        </div>
                        <div class="w-8 h-8 rounded-full bg-white shadow-sm border border-slate-200 flex items-center justify-center">
                            <flux:icon.user class="w-4 h-4 text-teal-600" />
                        </div>
                        <div class="w-8 h-8 rounded-full bg-white shadow-sm border border-slate-200 flex items-center justify-center">
                            <flux:icon.user class="w-4 h-4 text-teal-600" />
                        </div>
                    </div>
                    <p class="ml-4 text-sm text-slate-600">
                        <span class="font-semibold">10,000+</span> patients trust us
                    </p>
                </div>
            </div>
            <div class="w-full md:w-1/2 relative">
                <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-slate-100">
                    <img src="/api/placeholder/720/480" alt="MediCare App" class="w-full h-auto" />
                </div>
                <div class="absolute -bottom-6 -left-6 bg-white rounded-lg shadow-lg p-4 border border-slate-100">
                    <div class="flex items-center">
                        <div class="w-10 h-10 rounded-full bg-green-100 flex items-center justify-center mr-3">
                            <flux:icon.check-circle class="w-6 h-6 text-green-600" />
                        </div>
                        <div>
                            <p class="text-xs text-slate-500">Verified Professionals</p>
                            <p class="text-sm font-semibold text-slate-900">100% Certified Doctors</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="bg-white py-16">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-slate-900 mb-4">Why Choose MediCare?</h2>
            <p class="text-lg text-slate-600 max-w-2xl mx-auto">
                We provide comprehensive healthcare solutions with a focus on patient comfort and convenience.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-slate-50 rounded-xl p-6 transition-all hover:shadow-md border border-slate-100">
                <div class="w-14 h-14 rounded-full bg-teal-100 flex items-center justify-center mb-5">
                    <flux:icon.calendar class="w-7 h-7 text-teal-600" />
                </div>
                <h3 class="text-xl font-semibold text-slate-900 mb-3">Easy Scheduling</h3>
                <p class="text-slate-600">
                    Book appointments with our qualified doctors online, anytime and anywhere.
                </p>
            </div>

            <div class="bg-slate-50 rounded-xl p-6 transition-all hover:shadow-md border border-slate-100">
                <div class="w-14 h-14 rounded-full bg-blue-100 flex items-center justify-center mb-5">
                    <flux:icon.user-group class="w-7 h-7 text-blue-600" />
                </div>
                <h3 class="text-xl font-semibold text-slate-900 mb-3">Expert Specialists</h3>
                <p class="text-slate-600">
                    Access our network of experienced healthcare professionals across multiple specializations.
                </p>
            </div>

            <div class="bg-slate-50 rounded-xl p-6 transition-all hover:shadow-md border border-slate-100">
                <div class="w-14 h-14 rounded-full bg-amber-100 flex items-center justify-center mb-5">
                    <flux:icon.clipboard-document-check class="w-7 h-7 text-amber-600" />
                </div>
                <h3 class="text-xl font-semibold text-slate-900 mb-3">Medical Records</h3>
                <p class="text-slate-600">
                    Keep track of your complete medical history and appointment records in one secure place.
                </p>
            </div>
        </div>
    </div>
</section>

<section class="bg-gradient-to-r from-teal-500 to-cyan-500 py-16">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">Our Medical Specialties</h2>
            <p class="text-lg text-white text-opacity-90 max-w-2xl mx-auto">
                Comprehensive care across a wide range of medical specializations
            </p>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            <div class="bg-white bg-opacity-10 backdrop-blur-sm rounded-xl p-6 text-center border border-white border-opacity-20 transition-all hover:bg-opacity-20">
                <div class="w-16 h-16 rounded-full bg-white flex items-center justify-center mx-auto mb-4">
                    <flux:icon.heart class="w-8 h-8 text-teal-600" />
                </div>
                <h3 class="text-xl font-semibold text-slate-900 mb-2">Cardiology</h3>
                <p class="text-slate-600 text-opacity-80 text-sm">
                    Expert care for heart conditions
                </p>
            </div>

            <div class="bg-white bg-opacity-10 backdrop-blur-sm rounded-xl p-6 text-center border border-white border-opacity-20 transition-all hover:bg-opacity-20">
                <div class="w-16 h-16 rounded-full bg-white flex items-center justify-center mx-auto mb-4">
                    <flux:icon.eye class="w-8 h-8 text-teal-600" />
                </div>
                <h3 class="text-xl font-semibold text-slate-900 mb-2">Ophthalmology</h3>
                <p class="text-slate-600 text-opacity-80 text-sm">
                    Complete eye care services
                </p>
            </div>

            <div class="bg-white bg-opacity-10 backdrop-blur-sm rounded-xl p-6 text-center border border-white border-opacity-20 transition-all hover:bg-opacity-20">
                <div class="w-16 h-16 rounded-full bg-white flex items-center justify-center mx-auto mb-4">
                    <flux:icon.brain class="w-8 h-8 text-teal-600" />
                </div>
                <h3 class="text-xl font-semibold text-slate-900 mb-2">Neurology</h3>
                <p class="text-slate-600 text-opacity-80 text-sm">
                    Specialized brain and nerve care
                </p>
            </div>

            <div class="bg-white bg-opacity-10 backdrop-blur-sm rounded-xl p-6 text-center border border-white border-opacity-20 transition-all hover:bg-opacity-20">
                <div class="w-16 h-16 rounded-full bg-white flex items-center justify-center mx-auto mb-4">
                    <flux:icon.variable class="w-8 h-8 text-teal-600" />
                </div>
                <h3 class="text-xl font-semibold text-slate-900 mb-2">Orthopedics</h3>
                <p class="text-slate-600 text-opacity-80 text-sm">
                    Bone and joint specialists
                </p>
            </div>
        </div>
    </div>
</section>

<section class="bg-white py-16">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-slate-900 mb-4">How It Works</h2>
            <p class="text-lg text-slate-600 max-w-2xl mx-auto">
                Get the care you need in three simple steps
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="text-center">
                <div class="relative">
                    <div class="w-24 h-24 rounded-full bg-teal-100 flex items-center justify-center mx-auto mb-6">
                        <flux:icon.user-circle class="w-12 h-12 text-teal-600" />
                    </div>
                    <div class="absolute top-0 right-0 md:-right-6 w-10 h-10 rounded-full bg-white border border-slate-200 flex items-center justify-center text-xl font-bold text-teal-600">
                        1
                    </div>
                </div>
                <h3 class="text-xl font-semibold text-slate-900 mb-3">Find a Doctor</h3>
                <p class="text-slate-600">
                    Browse our extensive network of qualified healthcare professionals by specialty, location, or availability.
                </p>
            </div>

            <div class="text-center">
                <div class="relative">
                    <div class="w-24 h-24 rounded-full bg-blue-100 flex items-center justify-center mx-auto mb-6">
                        <flux:icon.calendar class="w-12 h-12 text-blue-600" />
                    </div>
                    <div class="absolute top-0 right-0 md:-right-6 w-10 h-10 rounded-full bg-white border border-slate-200 flex items-center justify-center text-xl font-bold text-blue-600">
                        2
                    </div>
                </div>
                <h3 class="text-xl font-semibold text-slate-900 mb-3">Book Appointment</h3>
                <p class="text-slate-600">
                    Select your preferred date and time slot that fits your schedule with our easy booking system.
                </p>
            </div>

            <div class="text-center">
                <div class="relative">
                    <div class="w-24 h-24 rounded-full bg-green-100 flex items-center justify-center mx-auto mb-6">
                        <flux:icon.check-circle class="w-12 h-12 text-green-600" />
                    </div>
                    <div class="absolute top-0 right-0 w-10 h-10 rounded-full bg-white border border-slate-200 flex items-center justify-center text-xl font-bold text-green-600">
                        3
                    </div>
                </div>
                <h3 class="text-xl font-semibold text-slate-900 mb-3">Get Care</h3>
                <p class="text-slate-600">
                    Visit our clinic for your appointment or choose a virtual consultation for added convenience.
                </p>
            </div>
        </div>
    </div>
</section>

<section class="bg-slate-50 py-16">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-slate-900 mb-4">What Our Patients Say</h2>
            <p class="text-lg text-slate-600 max-w-2xl mx-auto">
                Don't just take our word for it, hear from our satisfied patients
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white rounded-xl p-6 shadow-sm border border-slate-100">
                <div class="flex items-center mb-4">
                    <flux:icon.star class="w-5 h-5 text-amber-400" />
                    <flux:icon.star class="w-5 h-5 text-amber-400" />
                    <flux:icon.star class="w-5 h-5 text-amber-400" />
                    <flux:icon.star class="w-5 h-5 text-amber-400" />
                    <flux:icon.star class="w-5 h-5 text-amber-400" />
                </div>
                <p class="text-slate-700 mb-6">
                    "The MediCare app made scheduling appointments so easy. I found a specialist quickly and the entire process was seamless."
                </p>
                <div class="flex items-center">
                    <div class="w-12 h-12 rounded-full bg-slate-100 flex items-center justify-center mr-3">
                        <flux:icon.user class="w-6 h-6 text-slate-400" />
                    </div>
                    <div>
                        <h4 class="font-semibold text-slate-900">Sarah Johnson</h4>
                        <p class="text-sm text-slate-500">Patient since 2023</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl p-6 shadow-sm border border-slate-100">
                <div class="flex items-center mb-4">
                    <flux:icon.star class="w-5 h-5 text-amber-400" />
                    <flux:icon.star class="w-5 h-5 text-amber-400" />
                    <flux:icon.star class="w-5 h-5 text-amber-400" />
                    <flux:icon.star class="w-5 h-5 text-amber-400" />
                    <flux:icon.star class="w-5 h-5 text-amber-400" />
                </div>
                <p class="text-slate-700 mb-6">
                    "I love having all my medical records in one place. The doctors are excellent and the staff is always friendly and helpful."
                </p>
                <div class="flex items-center">
                    <div class="w-12 h-12 rounded-full bg-slate-100 flex items-center justify-center mr-3">
                        <flux:icon.user class="w-6 h-6 text-slate-400" />
                    </div>
                    <div>
                        <h4 class="font-semibold text-slate-900">Michael Thompson</h4>
                        <p class="text-sm text-slate-500">Patient since 2022</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl p-6 shadow-sm border border-slate-100">
                <div class="flex items-center mb-4">
                    <flux:icon.star class="w-5 h-5 text-amber-400" />
                    <flux:icon.star class="w-5 h-5 text-amber-400" />
                    <flux:icon.star class="w-5 h-5 text-amber-400" />
                    <flux:icon.star class="w-5 h-5 text-amber-400" />
                    <flux:icon.star class="w-5 h-5 text-amber-400" />
                </div>
                <p class="text-slate-700 mb-6">
                    "The virtual consultations saved me so much time. The doctors are knowledgeable and take time to listen to all my concerns."
                </p>
                <div class="flex items-center">
                    <div class="w-12 h-12 rounded-full bg-slate-100 flex items-center justify-center mr-3">
                        <flux:icon.user class="w-6 h-6 text-slate-400" />
                    </div>
                    <div>
                        <h4 class="font-semibold text-slate-900">Emily Rodriguez</h4>
                        <p class="text-sm text-slate-500">Patient since 2024</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="bg-white py-16">
    <div class="container mx-auto px-4">
        <div class="flex flex-col md:flex-row gap-12">
            <div class="w-full md:w-1/2">
                <h2 class="text-3xl font-bold text-slate-900 mb-6">Get in Touch</h2>
                <p class="text-slate-600 mb-8">
                    Have questions or need assistance? Our support team is here to help.
                </p>

                <div class="space-y-6">
                    <div class="flex items-start">
                        <div class="w-12 h-12 rounded-full bg-teal-100 flex items-center justify-center mr-4">
                            <flux:icon.map-pin class="w-6 h-6 text-teal-600" />
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-slate-900 mb-1">Our Location</h3>
                            <p class="text-slate-600">123 Healthcare Avenue, Medical District, City, 12345</p>
                        </div>
                    </div>

                    <div class="flex items-start">
                        <div class="w-12 h-12 rounded-full bg-teal-100 flex items-center justify-center mr-4">
                            <flux:icon.phone class="w-6 h-6 text-teal-600" />
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-slate-900 mb-1">Phone Number</h3>
                            <p class="text-slate-600">+1 (123) 456-7890</p>
                        </div>
                    </div>

                    <div class="flex items-start">
                        <div class="w-12 h-12 rounded-full bg-teal-100 flex items-center justify-center mr-4">
                            <flux:icon.envelope class="w-6 h-6 text-teal-600" />
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-slate-900 mb-1">Email Address</h3>
                            <p class="text-slate-600">contact@medicare.com</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="w-full md:w-1/2">
                <h2 class="text-3xl font-bold text-slate-900 mb-6">Frequently Asked Questions</h2>
                <div class="space-y-4">
                    <div class="bg-slate-50 rounded-lg p-5 border border-slate-100">
                        <h3 class="text-lg font-semibold text-slate-900 mb-2">How do I schedule an appointment?</h3>
                        <p class="text-slate-600">
                            You can easily book appointments through our website or mobile app. Select your preferred doctor, choose an available time slot, and confirm your booking.
                        </p>
                    </div>

                    <div class="bg-slate-50 rounded-lg p-5 border border-slate-100">
                        <h3 class="text-lg font-semibold text-slate-900 mb-2">Do you accept insurance?</h3>
                        <p class="text-slate-600">
                            Yes, we accept most major insurance providers. You can verify your coverage during the booking process or contact our support team for assistance.
                        </p>
                    </div>

                    <div class="bg-slate-50 rounded-lg p-5 border border-slate-100">
                        <h3 class="text-lg font-semibold text-slate-900 mb-2">Can I access my medical records online?</h3>
                        <p class="text-slate-600">
                            Yes, all registered patients can securely access their complete medical history, appointments, and lab results through our patient portal.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
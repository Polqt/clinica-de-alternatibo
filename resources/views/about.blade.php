@props([
'title' => 'About | MediCare'
])

@extends('layouts.app')
@section('content')
<!-- Hero Section -->
<section class="relative overflow-hidden bg-gradient-to-r from-teal-50 to-cyan-50">
    <div class="container mx-auto px-4 py-16 md:py-24 relative">
        <div class="flex flex-col md:flex-row items-center">
            <div class="w-full md:w-1/2 md:pr-12 mb-10 md:mb-0">
                <span class="inline-block px-3 py-1 text-sm font-medium bg-teal-100 text-teal-800 rounded-full mb-4">
                    Our Story
                </span>
                <h1 class="text-4xl md:text-5xl font-bold text-slate-900 mb-6 leading-tight">
                    Dedicated to <span class="text-teal-600">Better</span> Healthcare for All
                </h1>
                <p class="text-lg text-slate-600 mb-8">
                    Founded in 2025, MediCare has been committed to providing accessible, high-quality healthcare services with a patient-centered approach.
                </p>
                <div class="flex items-center gap-4">
                    <div class="h-1 w-16 bg-teal-500 rounded-full"></div>
                    <p class="text-sm font-medium text-slate-700">Since 2025</p>
                </div>
            </div>
            <div class="w-full md:w-1/2 relative">
                <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-slate-100 relative">
                    <div class="absolute inset-0 bg-gradient-to-br from-teal-500/20 to-cyan-500/20 mix-blend-overlay"></div>
                    <img src="" alt="MediCare Team" class="w-full h-auto" />
                </div>
                <div class="absolute -bottom-6 -left-6 bg-white rounded-lg shadow-lg p-4 border border-slate-100">
                    <div class="flex items-center">
                        <div class="w-10 h-10 rounded-full bg-teal-100 flex items-center justify-center mr-3">
                            <flux:icon.heart class="w-6 h-6 text-teal-600" />
                        </div>
                        <div>
                            <p class="text-xs text-slate-500">Trusted by</p>
                            <p class="text-sm font-semibold text-slate-900">10,000+ Patients</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Mission & Vision Section -->
<section class="bg-white py-16">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
            <div class="bg-slate-50 rounded-xl p-8 border border-slate-100 relative overflow-hidden">
                <div class="absolute top-0 right-0 w-32 h-32 bg-teal-100 rounded-full -mr-16 -mt-16 opacity-50"></div>
                <div class="relative">
                    <div class="w-14 h-14 rounded-full bg-teal-100 flex items-center justify-center mb-6">
                        <flux:icon.target class="w-7 h-7 text-teal-600" />
                    </div>
                    <h2 class="text-2xl font-bold text-slate-900 mb-4">Our Mission</h2>
                    <p class="text-slate-600 mb-6">
                        To provide exceptional healthcare services that improve the quality of life for our patients through innovative medical practices, compassionate care, and a commitment to excellence.
                    </p>
                    <div class="flex items-center">
                        <div class="h-1 w-12 bg-teal-500 rounded-full"></div>
                    </div>
                </div>
            </div>

            <div class="bg-slate-50 rounded-xl p-8 border border-slate-100 relative overflow-hidden">
                <div class="absolute top-0 right-0 w-32 h-32 bg-cyan-100 rounded-full -mr-16 -mt-16 opacity-50"></div>
                <div class="relative">
                    <div class="w-14 h-14 rounded-full bg-cyan-100 flex items-center justify-center mb-6">
                        <flux:icon.eye class="w-7 h-7 text-cyan-600" />
                    </div>
                    <h2 class="text-2xl font-bold text-slate-900 mb-4">Our Vision</h2>
                    <p class="text-slate-600 mb-6">
                        To be the leading healthcare provider known for transforming healthcare delivery through technology, accessibility, and personalized care that addresses the unique needs of each patient.
                    </p>
                    <div class="flex items-center">
                        <div class="h-1 w-12 bg-cyan-500 rounded-full"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Values Section -->
<section class="bg-gradient-to-r from-teal-500 to-cyan-500 py-16">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">Our Core Values</h2>
            <p class="text-lg text-white text-opacity-90 max-w-2xl mx-auto">
                The principles that guide our approach to healthcare
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white bg-opacity-10 backdrop-blur-sm rounded-xl p-6 border border-white border-opacity-20 transition-all hover:bg-opacity-20">
                <div class="w-16 h-16 rounded-full bg-white flex items-center justify-center mx-auto mb-4">
                    <flux:icon.heart class="w-8 h-8 text-teal-600" />
                </div>
                <h3 class="text-xl font-semibold text-slate-900 mb-3 text-center">Compassion</h3>
                <p class="text-slate-600 text-opacity-80 text-center">
                    We approach every patient with empathy and understanding, treating them with the dignity and respect they deserve.
                </p>
            </div>

            <div class="bg-white bg-opacity-10 backdrop-blur-sm rounded-xl p-6 border border-white border-opacity-20 transition-all hover:bg-opacity-20">
                <div class="w-16 h-16 rounded-full bg-white flex items-center justify-center mx-auto mb-4">
                    <flux:icon.shield-check class="w-8 h-8 text-teal-600" />
                </div>
                <h3 class="text-xl font-semibold text-slate-900 mb-3 text-center">Integrity</h3>
                <p class="text-slate-600 text-opacity-80 text-center">
                    We uphold the highest ethical standards in all our practices, ensuring trust and transparency in every interaction.
                </p>
            </div>

            <div class="bg-white bg-opacity-10 backdrop-blur-sm rounded-xl p-6 border border-white border-opacity-20 transition-all hover:bg-opacity-20">
                <div class="w-16 h-16 rounded-full bg-white flex items-center justify-center mx-auto mb-4">
                    <flux:icon.sparkles class="w-8 h-8 text-teal-600" />
                </div>
                <h3 class="text-xl font-semibold text-slate-900 mb-3 text-center">Innovation</h3>
                <p class="text-slate-600 text-opacity-80 text-center">
                    We continuously seek new and better ways to deliver healthcare services, embracing technology and medical advancements.
                </p>
            </div>
        </div>
    </div>
</section>

<section class="bg-white py-16">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-slate-900 mb-4">Our Journey</h2>
            <p class="text-lg text-slate-600 max-w-2xl mx-auto">
                The milestones that shaped our growth and success
            </p>
        </div>

        <div class="relative">
            <div class="absolute left-1/2 transform -translate-x-1/2 h-full w-1 bg-teal-100"></div>
            <div class="grid grid-cols-1 gap-12">
                <div class="relative">
                    <div class="flex flex-col md:flex-row items-center">
                        <div class="w-full md:w-1/2 md:pr-12 mb-6 md:mb-0 md:text-right">
                            <span class="block text-xl font-bold text-teal-600 mb-2">2015</span>
                            <h3 class="text-xl font-semibold text-slate-900 mb-2">MediCare Founded</h3>
                            <p class="text-slate-600">
                                Started with a small clinic and a dedicated team of 5 healthcare professionals.
                            </p>
                        </div>
                        <div class="absolute left-1/2 transform -translate-x-1/2 flex items-center justify-center">
                            <div class="w-10 h-10 bg-white rounded-full border-4 border-teal-500 z-10"></div>
                        </div>
                        <div class="w-full md:w-1/2 md:pl-12"></div>
                    </div>
                </div>

                <!-- Item 2 -->
                <div class="relative">
                    <div class="flex flex-col md:flex-row items-center">
                        <div class="w-full md:w-1/2 md:pr-12 mb-6 md:mb-0 hidden md:block"></div>
                        <div class="absolute left-1/2 transform -translate-x-1/2 flex items-center justify-center">
                            <div class="w-10 h-10 bg-white rounded-full border-4 border-cyan-500 z-10"></div>
                        </div>
                        <div class="w-full md:w-1/2 md:pl-12">
                            <span class="block text-xl font-bold text-cyan-600 mb-2">2018</span>
                            <h3 class="text-xl font-semibold text-slate-900 mb-2">Expanded Services</h3>
                            <p class="text-slate-600">
                                Added 10 new medical specialties and opened two additional clinic locations.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Item 3 -->
                <div class="relative">
                    <div class="flex flex-col md:flex-row items-center">
                        <div class="w-full md:w-1/2 md:pr-12 mb-6 md:mb-0 md:text-right">
                            <span class="block text-xl font-bold text-teal-600 mb-2">2020</span>
                            <h3 class="text-xl font-semibold text-slate-900 mb-2">Digital Transformation</h3>
                            <p class="text-slate-600">
                                Launched our online appointment booking platform and telemedicine services.
                            </p>
                        </div>
                        <div class="absolute left-1/2 transform -translate-x-1/2 flex items-center justify-center">
                            <div class="w-10 h-10 bg-white rounded-full border-4 border-teal-500 z-10"></div>
                        </div>
                        <div class="w-full md:w-1/2 md:pl-12"></div>
                    </div>
                </div>

                <!-- Item 4 -->
                <div class="relative">
                    <div class="flex flex-col md:flex-row items-center">
                        <div class="w-full md:w-1/2 md:pr-12 mb-6 md:mb-0 hidden md:block"></div>
                        <div class="absolute left-1/2 transform -translate-x-1/2 flex items-center justify-center">
                            <div class="w-10 h-10 bg-white rounded-full border-4 border-cyan-500 z-10"></div>
                        </div>
                        <div class="w-full md:w-1/2 md:pl-12">
                            <span class="block text-xl font-bold text-cyan-600 mb-2">2023</span>
                            <h3 class="text-xl font-semibold text-slate-900 mb-2">Patient Milestone</h3>
                            <p class="text-slate-600">
                                Proudly served our 10,000th patient and received healthcare excellence award.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Item 5 -->
                <div class="relative">
                    <div class="flex flex-col md:flex-row items-center">
                        <div class="w-full md:w-1/2 md:pr-12 mb-6 md:mb-0 md:text-right">
                            <span class="block text-xl font-bold text-teal-600 mb-2">2025</span>
                            <h3 class="text-xl font-semibold text-slate-900 mb-2">Future Vision</h3>
                            <p class="text-slate-600">
                                Expanding our network nationwide with innovative healthcare technologies.
                            </p>
                        </div>
                        <div class="absolute left-1/2 transform -translate-x-1/2 flex items-center justify-center">
                            <div class="w-10 h-10 bg-white rounded-full border-4 border-teal-500 z-10"></div>
                        </div>
                        <div class="w-full md:w-1/2 md:pl-12"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Team Section -->
<section class="bg-slate-50 py-16">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-slate-900 mb-4">Meet the Development Team</h2>
            <p class="text-lg text-slate-600 max-w-2xl mx-auto">
                This project was brought to life by a dedicated team of students.
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Nathania Santia -->
            <div class="bg-white rounded-xl overflow-hidden shadow-sm border border-slate-100 transition-all hover:shadow-md">
                <div class="relative">
                    <div class="aspect-w-3 aspect-h-4 bg-slate-100">
                        <img src="/api/placeholder/400/450" alt="Nathania Santia" class="w-full h-full object-cover" />
                    </div>
                    <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-slate-900 to-transparent p-4">
                        <div class="flex justify-end space-x-2">
                            <a href="#" class="w-8 h-8 bg-white bg-opacity-20 rounded-full flex items-center justify-center hover:bg-opacity-30">
                                <flux:icon.linkedin class="w-4 h-4 text-white" />
                            </a>
                            <a href="#" class="w-8 h-8 bg-white bg-opacity-20 rounded-full flex items-center justify-center hover:bg-opacity-30">
                                <flux:icon.globe-alt class="w-4 h-4 text-white" /> 
                            </a>
                        </div>
                    </div>
                </div>
                <div class="p-6 text-center md:text-left">
                    <h3 class="text-xl font-semibold text-slate-900 mb-1">Nathania Santia</h3>
                    <p class="text-teal-600 font-medium mb-3">Project Management</p>
                    <p class="text-slate-600 text-sm">
                        Spearheaded project planning and coordination to ensure successful delivery and teamwork.
                    </p>
                </div>
            </div>

            <!-- Heidine Mahandog -->
            <div class="bg-white rounded-xl overflow-hidden shadow-sm border border-slate-100 transition-all hover:shadow-md">
                <div class="relative">
                    <div class="aspect-w-3 aspect-h-4 bg-slate-100">
                        <img src="/api/placeholder/400/450" alt="Heidine Mahandog" class="w-full h-full object-cover" />
                    </div>
                    <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-slate-900 to-transparent p-4">
                        <div class="flex justify-end space-x-2">
                            <a href="#" class="w-8 h-8 bg-white bg-opacity-20 rounded-full flex items-center justify-center hover:bg-opacity-30">
                                <flux:icon.linkedin class="w-4 h-4 text-white" />
                            </a>
                            <a href="#" class="w-8 h-8 bg-white bg-opacity-20 rounded-full flex items-center justify-center hover:bg-opacity-30">
                                <flux:icon.code-bracket class="w-4 h-4 text-white" />
                            </a>
                        </div>
                    </div>
                </div>
                <div class="p-6 text-center md:text-left">
                    <h3 class="text-xl font-semibold text-slate-900 mb-1">Heidine Mahandog</h3>
                    <p class="text-cyan-600 font-medium mb-3">Developer</p>
                    <p class="text-slate-600 text-sm">
                        Focused on core development, bringing the application's features and functionalities to life.
                    </p>
                </div>
            </div>

            <!-- Janpol Hidalgo -->
            <div class="bg-white rounded-xl overflow-hidden shadow-sm border border-slate-100 transition-all hover:shadow-md">
                <div class="relative">
                    <div class="aspect-w-3 aspect-h-4 bg-slate-100">
                        <img src="/api/placeholder/400/450" alt="Janpol Hidalgo" class="w-full h-full object-cover" />
                    </div>
                    <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-slate-900 to-transparent p-4">
                        <div class="flex justify-end space-x-2">
                            <a href="#" class="w-8 h-8 bg-white bg-opacity-20 rounded-full flex items-center justify-center hover:bg-opacity-30">
                                <flux:icon.linkedin class="w-4 h-4 text-white" />
                            </a>
                            <a href="#" class="w-8 h-8 bg-white bg-opacity-20 rounded-full flex items-center justify-center hover:bg-opacity-30">
                                <flux:icon.code-bracket class="w-4 h-4 text-white" />
                            </a>
                        </div>
                    </div>
                </div>
                <div class="p-6 text-center md:text-left">
                    <h3 class="text-xl font-semibold text-slate-900 mb-1">Janpol Hidalgo</h3>
                    <p class="text-cyan-600 font-medium mb-3">Developer</p>
                    <p class="text-slate-600 text-sm">
                        Contributed to the robust development and technical implementation of the platform.
                    </p>
                </div>
            </div>

            <!-- April Faith Gamboa -->
            <div class="bg-white rounded-xl overflow-hidden shadow-sm border border-slate-100 transition-all hover:shadow-md">
                <div class="relative">
                    <div class="aspect-w-3 aspect-h-4 bg-slate-100">
                        <img src="/api/placeholder/400/450" alt="April Faith Gamboa" class="w-full h-full object-cover" />
                    </div>
                    <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-slate-900 to-transparent p-4">
                        <div class="flex justify-end space-x-2">
                            <a href="#" class="w-8 h-8 bg-white bg-opacity-20 rounded-full flex items-center justify-center hover:bg-opacity-30">
                                <flux:icon.linkedin class="w-4 h-4 text-white" />
                            </a>
                            <a href="#" class="w-8 h-8 bg-white bg-opacity-20 rounded-full flex items-center justify-center hover:bg-opacity-30">
                                <flux:icon.paint-brush class="w-4 h-4 text-white" /> 
                            </a>
                        </div>
                    </div>
                </div>
                <div class="p-6 text-center md:text-left">
                    <h3 class="text-xl font-semibold text-slate-900 mb-1">April Faith Gamboa</h3>
                    <p class="text-amber-600 font-medium mb-3">UI/UX Design</p>
                    <p class="text-slate-600 text-sm">
                        Crafted the user interface and experience, ensuring an intuitive and visually engaging design.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="bg-white py-16 border-t border-slate-100">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            <div class="text-center p-6">
                <div class="w-16 h-16 rounded-full bg-teal-100 flex items-center justify-center mx-auto mb-4">
                    <flux:icon.users class="w-8 h-8 text-teal-600" />
                </div>
                <h3 class="text-3xl font-bold text-slate-900 mb-2">10,000+</h3>
                <p class="text-slate-600">Patients Served</p>
            </div>

            <div class="text-center p-6">
                <div class="w-16 h-16 rounded-full bg-cyan-100 flex items-center justify-center mx-auto mb-4">
                    <flux:icon.building class="w-8 h-8 text-cyan-600" />
                </div>
                <h3 class="text-3xl font-bold text-slate-900 mb-2">5</h3>
                <p class="text-slate-600">Clinic Locations</p>
            </div>

            <div class="text-center p-6">
                <div class="w-16 h-16 rounded-full bg-teal-100 flex items-center justify-center mx-auto mb-4">
                    <flux:icon.stethoscope class="w-8 h-8 text-teal-600" />
                </div>
                <h3 class="text-3xl font-bold text-slate-900 mb-2">50+</h3>
                <p class="text-slate-600">Skilled Doctors</p>
            </div>

            <div class="text-center p-6">
                <div class="w-16 h-16 rounded-full bg-cyan-100 flex items-center justify-center mx-auto mb-4">
                    <flux:icon.award class="w-8 h-8 text-cyan-600" />
                </div>
                <h3 class="text-3xl font-bold text-slate-900 mb-2">12</h3>
                <p class="text-slate-600">Industry Awards</p>
            </div>
        </div>
    </div>
</section>

@endsection
@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4">
        <div class="relative" id="carouselExample">
            <!-- Carousel Container -->
            <div class="overflow-hidden relative">
                <!-- Slides -->
                <div class="flex transition-transform duration-500" id="carouselInner">
                    <div class="flex-shrink-0 w-full">
                        <img src="{{ asset('/img/Crescent_Rose_V9OP.png') }}" class="w-full h-96 object-cover" alt="Slide 1">
                    </div>
                    <div class="flex-shrink-0 w-full">
                        <img src="{{ asset('/img/CRGunNew.png') }}" class="w-full h-96 object-cover" alt="Slide 2">
                    </div>
                    <div class="flex-shrink-0 w-full">
                        <img src="{{ asset('/img/With_Friends_Like_These_Harbinger.png') }}"
                            class="w-full h-96 object-cover" alt="Slide 3">
                    </div>
                </div>
            </div>

            <!-- Controls -->
            <!-- Previous Button -->
            <button
                class="absolute top-1/2 left-4 transform -translate-y-1/2 bg-white rounded-full p-2 shadow-lg hover:bg-gray-200"
                id="carouselPrev">
                <span class="sr-only">Previous</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-700" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                </svg>
            </button>

            <!-- Next Button -->
            <button
                class="absolute top-1/2 right-4 transform -translate-y-1/2 bg-white rounded-full p-2 shadow-lg hover:bg-gray-200"
                id="carouselNext">
                <span class="sr-only">Next</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-700" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                </svg>
            </button>

        </div>

        <script>
            const carouselInner = document.getElementById('carouselInner');
            const prevButton = document.getElementById('carouselPrev');
            const nextButton = document.getElementById('carouselNext');
            let currentIndex = 0;

            // Get all slides
            const slides = carouselInner.children;
            const totalSlides = slides.length;

            // Update carousel position
            function updateCarousel() {
                const offset = -currentIndex * 100;
                carouselInner.style.transform = `translateX(${offset}%)`;
            }

            // Previous slide
            prevButton.addEventListener('click', () => {
                currentIndex = (currentIndex === 0) ? totalSlides - 1 : currentIndex - 1;
                updateCarousel();
            });

            // Next slide
            nextButton.addEventListener('click', () => {
                currentIndex = (currentIndex === totalSlides - 1) ? 0 : currentIndex + 1;
                updateCarousel();
            });
        </script>


        <!-- Services -->
        <div class="my-12">
            <h1 class="text-center text-3xl font-bold mb-8">Services</h1>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Service 1 -->
                <div class="bg-white shadow-md rounded-md p-6">
                    <h2 class="text-xl font-semibold mb-4">Subheading 1</h2>
                    <p class="text-gray-600 mb-4">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas aliquid, omnis molestias
                        nostrum saepe at iure, porro dolorem explicabo ducimus nihil exercitationem aspernatur
                        doloremque.
                    </p>
                    <a href="#" class="text-blue-500 hover:underline">Learn More</a>
                </div>
                <!-- Service 2 -->
                <div class="bg-white shadow-md rounded-md p-6">
                    <h2 class="text-xl font-semibold mb-4">Subheading 2</h2>
                    <p class="text-gray-600 mb-4">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae totam laborum fuga soluta
                        corporis similique impedit, aperiam doloremque voluptate.
                    </p>
                    <a href="#" class="text-blue-500 hover:underline">Learn More</a>
                </div>
                <!-- Service 3 -->
                <div class="bg-white shadow-md rounded-md p-6">
                    <h2 class="text-xl font-semibold mb-4">Subheading 3</h2>
                    <p class="text-gray-600 mb-4">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam, recusandae ad molestiae
                        quaerat similique tempore tempora id facere temporibus quos.
                    </p>
                    <a href="#" class="text-blue-500 hover:underline">Learn More</a>
                </div>
                <!-- Service 4 -->
                <div class="bg-white shadow-md rounded-md p-6">
                    <h2 class="text-xl font-semibold mb-4">Subheading 4</h2>
                    <p class="text-gray-600 mb-4">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla laborum quam nobis, atque nam
                        consequuntur eius quae facilis suscipit.
                    </p>
                    <a href="#" class="text-blue-500 hover:underline">Learn More</a>
                </div>
            </div>
        </div>

        <!-- About Us -->
        <div class="my-12">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 items-center">
                <!-- Image Column -->
                <div class="text-center">
                    <img src="{{ asset('img/Crescent_Rose_V9OP.png') }}" class="rounded-lg shadow-lg" alt="About Us Image">
                </div>
                <!-- Text Column -->
                <div>
                    <h2 class="text-2xl font-bold mb-4">About Us</h2>
                    <p class="text-gray-600">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam accumsan ligula nec tortor auctor,
                        at
                        consequat odio pharetra.
                    </p>
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 items-center my-12">
                <!-- Text Column -->
                <div class="order-last md:order-first text-right">
                    <h2 class="text-2xl font-bold mb-4">Visi</h2>
                    <p class="text-gray-600">
                        Here is some additional text describing your content. Use this space to highlight features, provide
                        details,
                        or engage your audience with an inspiring message.
                    </p>
                </div>
                <!-- Image Column -->
                <div class="text-center">
                    <img src="{{ asset('img/CRGunNew.png') }}" class="rounded-lg shadow-lg" alt="Additional Image">
                </div>
            </div>
        </div>
    </div>
@endsection

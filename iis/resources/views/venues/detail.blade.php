<x-layout>
    <section class="flex items-center xl:h-screen font-poppins">
        <div class="justify-center flex-1 max-w-6xl py-4 mx-auto lg:py-6 md:px-6">
            <div class="flex flex-wrap ">
                <div class="w-full px-4 mb-10 lg:w-1/2 lg:mb-0">
                    <img src="{{ $venue->logo ? asset($venue->logo) : asset('images/logotickify.png') }}" alt=""
                         class="relative z-40 object-cover w-full h-96 rounded-3xl">
                </div>
                <div class="w-full px-4 mb-10 lg:w-1/2 lg:mb-0 ">
                    <h2 class="mb-4 text-4xl font-semibold text-purple-500 dark:text-gray-300">
                        {{$venue->name}}
                    </h2>
                    <p class="mb-10 text-base leading-7 text-gray-500 dark:text-gray-400">
                        {{$venue->description}}
                    </p>
                    <p class="mb-10 text-base leading-7 text-gray-500 dark:text-gray-400">
                        {{$venue->street . ' ' . $venue->street_number . ' ' .  $venue->zip_code . ' ' . $venue->province . ' ' . $venue->country}}
                    </p>
                </div>
            </div>

            @if(count($images) > 0)
            <div id="gallery" class="relative w-full" data-carousel="slide">
                <!-- Carousel wrapper -->
                <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
                    @foreach($images as $image)
                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <img src="{{ asset($image->path) }}" class="absolute block max-w-full h-auto -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="">
                        </div>
                    @endforeach
                </div>
                <!-- Slider controls -->
                <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                    <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                        <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                        </svg>
                        <span class="sr-only">Previous</span>
                    </span>
                </button>
                <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                    <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                        <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                        </svg>
                        <span class="sr-only">Next</span>
                    </span>
                </button>
            </div>
            @endif
        </div>
    </section>
</x-layout>

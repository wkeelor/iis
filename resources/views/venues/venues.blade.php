<x-layout>
    <div class="grid grid-cols-3 gap-4 mx-1 pt-1 p-4">

        <!-- Button to create a new venue -->
        <div class="col-span-3 flex justify-end mb-2 pt-2">
            <a data-tooltip-target="tooltip-create" href="{{ route('add_venue_show') }}" class=" text-white bg-purple-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:focus:ring-blue-800">
                <div id="tooltip-create" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                    Pridať miesto
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>
                <i class="fa-solid fa-location-dot fa-2xl hover:text-blue-700 dark:hover:text-blue-500"></i>
            </a>
        </div>

        @unless(count($venues) == 0)
            @foreach($venues as $venue)
                <x-venue_card :venue="$venue" />
            @endforeach
        @else
            <p>No venues found.</p>
        @endunless
    </div>
</x-layout>

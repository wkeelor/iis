<div class="cursor-pointer bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700" onclick="window.location.href='{{ route('venue_detail', ['venue' => $venue]) }}'">
    <img class="p-8 rounded-t-lg" src="{{ $venue->logo ? asset($venue->logo) : asset('images/logotickify.png') }}" alt="product image"/>
    <div class="flex flex-col justify-between p-4 leading-normal w-full">
        <div class="flex justify-between items-center w-full">
            <h6 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $venue->name }}</h6>
            @if(Auth::user() && Auth::user()->role_id >= 2)
            <a data-tooltip-target="tooltip-edit" href="{{ route('edit_venues_show', ['venue' => $venue]) }}"
               class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">
                <div id="tooltip-edit" role="tooltip"
                     class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                    Upravit
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>
                <i class="fa-solid fa-pen-to-square hover:text-blue-700 dark:hover:text-blue-500"></i>
            </a>
            @endif
        </div>
        <div class="grid grid-cols-1 gap-2">
            <div>
                <i class="fa-solid fa-map-location-dot hover:text-blue-700 dark:hover:text-blue-500" style="color:white; padding-right: 0.5rem;"></i>
            </div>
            <div>
                <span class="text-sm text-gray-700 dark:text-white">{{ $venue->street . ' ' . $venue->street_number . ' ' . $venue->zip_code }} </span>
            </div>
            <div>
                <span class="text-sm text-gray-700 dark:text-white">{{ $venue->province . ' ' . $venue->country }} </span>
            </div>
        </div>
    </div>
</div>

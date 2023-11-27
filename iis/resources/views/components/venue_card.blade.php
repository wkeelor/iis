<a href="{{ route('venue_detail', ['venue' => $venue]) }}" class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
    <img class="p-8 rounded-t-lg" src="{{ $venue->logo ? asset($venue->logo) : asset('images/logotickify.png') }}" alt="product image"/>
    <div class="flex flex-col justify-between p-4 leading-normal">
        <h6 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $venue->name }}</h6>
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
</a>

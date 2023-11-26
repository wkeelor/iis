@php($user = Auth::user())
<div class="bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
    @if(str_contains(Request::url(), "event") === false)
        <a href=" {{route('event_detail', ['event' => $event])}}">
            <img class="p-8 rounded-t-lg" src="{{ $event->logo ? asset($event->logo) : asset('images/logotickify.png') }}" alt="product image" />
        </a>
    @else
        <img class="p-8 rounded-t-lg" src="{{ $event->logo ? asset($event->logo) : asset('images/logotickify.png') }}" alt="product image" />
    @endif
    <div class="px-5 pb-5 pt-5">
        <div class="flex items-center justify-between">
            <div>
                <a href="#">
                    <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white">{{$event->name}}</h5>
                </a>
                <div class="flex items-center">
                    <svg class="w-4 h-4 text-yellow-300 mr-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                        <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                    </svg>
                    <svg class="w-4 h-4 text-yellow-300 mr-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                        <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                    </svg>
                    <svg class="w-4 h-4 text-yellow-300 mr-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                        <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                    </svg>
                    <svg class="w-4 h-4 text-yellow-300 mr-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                        <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                    </svg>
                    <svg class="w-4 h-4 text-gray-200 dark:text-gray-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                        <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                    </svg>
                    <span class="bg-blue-100 text-blue-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800 ml-3">5.0</span>
                </div>
            </div>

            <div class="flex flex-col items-end">
                @if($user && $event->host_id == $user->id)
                    <div class="flex items-center space-x-2">
                        <a data-tooltip-target="tooltip-edit" href="{{ route('edit_event_show', ['event' => $event]) }}" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">
                            <div id="tooltip-edit" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                Upravit
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                            <i class="fa-solid fa-pen-to-square hover:text-blue-700 dark:hover:text-blue-500"></i>
                        </a>

                        @if(!$event->requested_approval)
                            <a data-tooltip-target="tooltip-request" href="{{ route('event_request', ['event' => $event]) }}" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">
                                <div id="tooltip-request" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                    Požádat o schválení
                                    <div class="tooltip-arrow" data-popper-arrow></div>
                                </div>
                                <i class="fa-solid fa-paper-plane hover:text-blue-700 dark:hover:text-blue-500"></i>
                            </a>
                        @endif
                    </div>
                @endif
            </div>
        </div>
        <div class="grid grid-cols-2 gap-4">

            <div>
                <i class="fa-solid fa-calendar-days hover:text-blue-700 dark:hover:text-blue-500" style="color:white; padding-right: 0.5rem;"></i>
                <span class="text-sm text-gray-700 dark:text-white" style="padding-right: 0.5rem;">{{$event->start_time}}</span>
            </div>
            <div>

                <span class="text-sm text-gray-700 dark:text-white">{{$event->end_time}}</span>
            </div>
            <div>
                <i class="fa-solid fa-location-dot hover:text-blue-700 dark:hover:text-blue-500" style="color:white; padding-right: 0.5rem;"></i>
                <span class="text-sm text-gray-700 dark:text-white">{{$event->venue->name}}</span>
            </div>
            <div>
                <i class="fa-solid fa-globe hover:text-blue-700 dark:hover:text-blue-500" style="color:white; padding-right: 0.5rem;"></i>
                @php($parsedUrl = parse_url($event->website))
                @php($shortenedWebsite = isset($parsedUrl['host']) ? $parsedUrl['host'] : $event->website)
                <a href="{{ $event->website }}" class="text-sm text-gray-700 dark:text-white" target="_blank" rel="noopener noreferrer">{{$shortenedWebsite}}</a>
            </div>
        </div>
    </div>
</div>

<script>
    function redirectToEventDetail(url) {
        window.location.href = url;
    }
</script>

@php($user = Auth::user())
@props(['event', 'averageRating'])
<div class="bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
    @if(str_contains(Request::url(), "event") === false)
        <a href=" {{route('event_detail', ['event' => $event])}}">
            <img class="p-8 rounded-t-lg"
                 src="{{ $event->logo ? asset($event->logo) : asset('images/logotickify.png') }}" alt="product image"/>
        </a>
    @else
        <img class="p-8 rounded-t-lg" src="{{ $event->logo ? asset($event->logo) : asset('images/logotickify.png') }}"
             alt="product image"/>
    @endif
    <div class="px-5 pb-5 pt-5">
        <div class="flex items-center justify-between">
            <div>
                <a href="#">
                    <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white">{{$event->name}}</h5>
                </a>
                <div class="flex items-center">
                    @php($averageRating = $event->averageRating)
                    @include('reviews.average_rating')
                    <span
                        class="bg-blue-100 text-blue-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800 ml-3">{{ number_format($event->averageRating,2) }}</span>
                </div>
            </div>

            <div class="flex flex-col items-end">
                @if($user && $event->host_id == $user->id)
                    <div class="flex items-center space-x-2">
                        <a data-tooltip-target="tooltip-edit" href="{{ route('edit_event_show', ['event' => $event]) }}"
                           class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">
                            <div id="tooltip-edit" role="tooltip"
                                 class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                Upravit
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                            <i class="fa-solid fa-pen-to-square hover:text-blue-700 dark:hover:text-blue-500"></i>
                        </a>

                        @if(!$event->requested_approval)
                            <a data-tooltip-target="tooltip-request"
                               href="{{ route('event_request', ['event' => $event]) }}"
                               class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">
                                <div id="tooltip-request" role="tooltip"
                                     class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
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
                <i class="fa-solid fa-calendar-days hover:text-blue-700 dark:hover:text-blue-500"
                   style="color:white; padding-right: 0.5rem;"></i>
                <span class="text-sm text-gray-700 dark:text-white whitespace-nowrap"
                      style="padding-right: 0.5rem;">{{$event->start_time}}</span>
            </div>
            <div>

                <span class="text-sm text-gray-700 dark:text-white whitespace-nowrap">{{$event->end_time}}</span>
            </div>
            <div>
                <i class="fa-solid fa-location-dot hover:text-blue-700 dark:hover:text-blue-500"
                   style="color:white; padding-right: 0.5rem;"></i>
                <span class="text-sm text-gray-700 dark:text-white">{{$event->venue->name}}</span>
            </div>
            <div>
                <i class="fa-solid fa-globe hover:text-blue-700 dark:hover:text-blue-500"
                   style="color:white; padding-right: 0.5rem;"></i>
                @php($parsedUrl = parse_url($event->website))
                @php($shortenedWebsite = isset($parsedUrl['host']) ? $parsedUrl['host'] : $event->website)
                <a href="{{ $event->website }}" class="text-sm text-gray-700 dark:text-white" target="_blank"
                   rel="noopener noreferrer">{{$shortenedWebsite}}</a>
            </div>
        </div>
        <div class="flex items-center">

        </div>
    </div>
</div>


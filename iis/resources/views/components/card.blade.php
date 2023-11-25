<div class="bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
    <a href="#">
        <img class="p-8 rounded-t-lg" src="{{ $event->logo ? $event->logo : '/images/logo.png' }}" alt="product image" onclick="redirectToEventDetail('{{ route('event_detail', ['event' => $event]) }}');"/>
    </a>
    <div class="px-5 pb-5 pt-5">
        <a href="#">
            <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white" onclick="redirectToEventDetail('{{ route('event_detail', ['event' => $event]) }}');">{{$event->name}}</h5>
        </a>
        <!-- REPLACE WITH NON STATIC RATING
        <div class="flex items-center mt-2.5 mb-5">
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
    -->
        <!-- REVIEWS -->

    <!--
        <div class="flex items-center mt-2.5 mb-5">
            <div class="row">
            
                    <h3>Add review</h3>
                    <form method="POST" action={{ url('/rating') }} name="ratingForm" id="ratingForm">@csrf
                        <input type="hidden" name="event_id" value="{{ $event['id'] }}">
                    
                    
                        <div class="rate">
                            <input type="radio" id="star5" name="rate" value="5" />
                            <label for="star5" title="text">5 stars</label>
                            <input type="radio" id="star4" name="rate" value="4" />
                            <label for="star4" title="text">4 stars</label>
                            <input type="radio" id="star3" name="rate" value="3" />
                            <label for="star3" title="text">3 stars</label>
                            <input type="radio" id="star2" name="rate" value="2" />
                            <label for="star2" title="text">2 stars</label>
                            <input type="radio" id="star1" name="rate" value="1" />
                            <label for="star1" title="text">1 star</label>
                          </div>
                          <div class="form-group">
                            <label>Your review</label>
                            <textarea name="review" style="width:250px; height: 50px;"></textarea>
                          </div>
                          <div>&nbsp;</div>
                          <div class="form-group">
                            <input type="submit" name="Submit">
                    <h3>User reviews</h3>
            </div>
        </div>

    -->


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
        </div>

        <div>
            <i class="fa-solid fa-globe hover:text-blue-700 dark:hover:text-blue-500" style="color:white; padding-right: 0.5rem; padding-bottom: 1rem;"></i>
            @php
                $parsedUrl = parse_url($event->website);
                $shortenedWebsite = isset($parsedUrl['host']) ? $parsedUrl['host'] : $event->website;
            @endphp
            <a href="{{ $event->website }}" class="text-sm text-gray-700 dark:text-white" target="_blank" rel="noopener noreferrer">{{$shortenedWebsite}}</a>
            
        </div>

        <div>
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Add to basket
            </button>
        </div>
        <div>
            @if(isset($averageRating))
            <span class="text-sm text-gray-700 dark:text-white"> {{ $averageRating }} </span>
            <p>Average Rating: {{ number_format($averageRating, 2)}}</p>
            @else
            <p class="text-sm text-gray-700 dark:text-white">No ratings yet.</p>
            @endif
        @include('components.ratings') <!-- Rating button for popup from and stars -->
        </div>
    </div>
</div>


<script>
    function redirectToEventDetail(url) {
        window.location.href = url;
    }
</script>

<!-- Item Container -->
<div class="flex flex-col gap-4 bg-gray-700 p-4 rounded">
    <!-- Profile and Rating -->
    <div class="flex items-center">
        <div class="bg-gray-800 rounded px-3 py-1 mr-4">
            <span class="text-gray-300">{{$review->user->name}}</span>
        </div>

        <div class="flex items-center">
            @php($averageRating = $review->rating)
            @include('reviews.average_rating')
            <span class="bg-blue-100 text-blue-800 p-2 text-xs font-semibold ml-2 px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800">{{ number_format($event->averageRating, 2) }}</span>
        </div>
    </div>

    <div class="text-gray-300">
        <!-- Your Review Content -->
        {{$review->message}}
    </div>

    <div class="flex justify-between mt-2">
        <span class="text-gray-300">{{ \Carbon\Carbon::parse($review->created_at)->format('d/m/Y H:i') }}</span>
        <button class="p-1 px-2 bg-gray-900 hover:bg-gray-950 border border-gray-950 bg-opacity-60">
            <ion-icon name="share-outline"></ion-icon>
            Share
        </button>
    </div>
</div>


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
        {{$review->message}}
    </div>

    <div class="flex items-center justify-between mt-2">
        <span class="text-gray-300">{{ \Carbon\Carbon::parse($review->created_at)->format('d/m/Y H:i') }}</span>
        @if(Auth::user() && (Auth::user()->role_id >= 2 || Auth::user()->id == $review->user_id))
        <div class="flex space-x-2">
            <a href="{{ route('edit_rating_show', ['rating' => $review]) }}" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-200 dark:hover:text-white relative">
                <div id="tooltip-edit" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                    Upraviť hodnotenie
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>
                <i class="fa-solid fa-pen-to-square hover:text-blue-700 dark:hover:text-blue-500"></i>
            </a>
            <form action="{{ route('delete_rating', ['rating' => $review]) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-200 dark:hover:text-white">
                    <i class="fa-solid fa-trash hover:text-blue-700 dark:hover:text-blue-500"></i>
                </button>
            </form>
        </div>
        @endif
    </div>

</div>
<!-- Script for showing and hiding the rating input form -->
<script>
    document.getElementById('openFormBtn').addEventListener('click', function() {
        var formId = 'rating-{{ $review->id }}';
        document.getElementById(formId).style.display = 'block';
    });

    document.querySelectorAll('[id^="closerating-"]').forEach(button => {
        button.addEventListener('click', function() {
            var reviewId = this.id.split('-')[1];
            document.getElementById('rating-' + reviewId).style.display = 'none';
        });
    });
</script>


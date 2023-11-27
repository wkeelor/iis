<div class="flex flex-col">
    @if(Auth::user())
        <button data-tooltip-target="tooltip-create" id="openFormBtn" class="button bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
            <div id="tooltip-create" role="tooltip"
                 class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                Pridať hodnotenie
                <div class="tooltip-arrow" data-popper-arrow></div>
            </div>
            <i class="fa-solid fa-pen-to-square hover:text-blue-700 dark:hover:text-blue-500"></i>
        </button>
    @endif

    @include('reviews.create')

    <div class="grid grid-cols-1 gap-4 mx-1 pt-1 p-4">
        @unless(count($ratings) == 0)
            <div class="grid grid-cols-1 gap-4">
                @foreach($ratings as $rating)
                    <x-review_card :review="$rating" :event="$event"/>
                @endforeach
            </div>
        @else
            <p>No reviews yet.</p>
        @endunless
    </div>
</div>

<!-- Script for showing and hiding the rating input form -->
<script>
    document.getElementById('openFormBtn').addEventListener('click', function() {
        var formId = 'popupForm-{{ $event->id }}';
        document.getElementById(formId).style.display = 'block';
    });

    document.querySelectorAll('[id^="closePopupBtn-"]').forEach(button => {
        button.addEventListener('click', function() {
            var eventId = this.id.split('-')[1];
            document.getElementById('popupForm-' + eventId).style.display = 'none';
        });
    });
</script>

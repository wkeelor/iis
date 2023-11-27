<div class="flex flex-col">
    @if(Auth::user())
        <button data-tooltip-target="tooltip-create" id="openFormBtn" class="inline-flex items-center justify-center rounded-md border-2 border-transparent bg-gray-900 bg-none px-12 py-3 text-center text-xs font-bold text-white transition-all duration-200 ease-in-out focus:shadow hover:bg-gray-800 w-1/12">
            <div id="tooltip-create" role="tooltip"
                 class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                Pridať hodnotenie
                <div class="tooltip-arrow" data-popper-arrow></div>
            </div>
        <!--    <i class="fa-solid fa-pen-to-square hover:text-blue-700 dark:hover:text-blue-500"></i> -->
        +
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

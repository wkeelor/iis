
<x-layout>
    <a href="/" class="inline-block text-black ml-4 mb-4"><i class="fa-solid fa-arrow-left"></i> Back</a>

    <div class="flex">
        <div class="mx-4 w-1/3 flex-shrink-0">
            <x-card :event="$event"/>
        </div>
        <div class="flex-1 ml-4 mr-4">
            <div class="bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 flex flex-col h-full" onclick="redirectToEventDetail('{{ route('event_detail', ['event' => $event]) }}');">
                <p class="text-sm text-gray-700 dark:text-white mx-4 my-2 flex-grow">{{ $event->description }}</p>
            </div>
        </div>
    </div>
</x-layout>

<x-layout>
    <div class="flex">
        <x-sidebar>
        </x-sidebar>
        <div class="grid grid-cols-3 gap-4 mx-1 pt-1 p-4">
            @unless(count($events) == 0)
                @foreach($events as $event)
                        <x-card :event="$event"/>
                @endforeach
            @else
                <p>No events found.</p>
            @endunless
        </div>
    </div>
</x-layout>

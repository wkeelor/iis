<x-layout>
    <div class="grid grid-cols-2 gap-4 mx-1 pt-1 p-4">
        @unless(count($venues) == 0)
            @foreach($venues as $venue)
                <x-venue_card :venue="$venue" />
            @endforeach
        @else
            <p>No venues found.</p>
        @endunless
    </div>
</x-layout>

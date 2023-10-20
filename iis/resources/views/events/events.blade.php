<x-layout>
    @include('partials._search')
    <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">
    @unless(count($events) == 0)
        @foreach($events as $event)
                <x-listing-card :event="$event" />
        @endforeach
    @else
        <p>No events found.</p>
    @endunless
</x-layout>

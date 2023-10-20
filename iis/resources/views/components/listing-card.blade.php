@props(['event'])

<x-card>
    <div class="flex">
        <img class="hidden w-48 mr-6 md:block"
             src="{{$event->logo ? asset('storage/' . $event->logo) : asset('/images/no-image.png')}}" alt="" />
        <div>
            <h3 class="text-2xl">
                <a href="/listings/{{$event->id}}">{{$event->name}}</a>
            </h3>
            <i class="fa-solid fa-envelope" style="color: #cda0da;"></i>{{$event->host->email}}
            <div class="text-lg mt-4">
                <i class="fa-solid fa-location-dot"></i> {{$event->website}}
            </div>
        </div>
    </div>
</x-card>

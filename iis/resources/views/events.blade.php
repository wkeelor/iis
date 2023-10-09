<h1>{{$heading}}</h1>

@unless(count($events) == 0)
    @foreach($events as $event)
        <h2><a href = "/events/{{$event['id']}}">{{$event['title']}}</a></h2>
        <p>{{$event['description']}}</p>
    @endforeach
@else
    <p>No events found.</p>
@endunless

<style>
    * {
        margin: 0;
        padding: 0;
    }

    .rate {
        float: left;
        height: 46px;
        padding: 0 10px;
    }

    .rate:not(:checked)>input {
        position: absolute;
        top: -9999px;
    }

    .rate:not(:checked)>label {
        float: right;
        width: 1em;
        overflow: hidden;
        white-space: nowrap;
        cursor: pointer;
        font-size: 30px;
        color: #ccc;
    }

    .rate:not(:checked)>label:before {
        content: '★ ';
    }

    .rate>input:checked~label {
        color: #ffc700;
    }

    .rate:not(:checked)>label:hover,
    .rate:not(:checked)>label:hover~label {
        color: #deb217;
    }

    .rate>input:checked+label:hover,
    .rate>input:checked+label:hover~label,
    .rate>input:checked~label:hover,
    .rate>input:checked~label:hover~label,
    .rate>label:hover~input:checked~label {
        color: #c59b08;
    }

    h3 {
        color: grey;
    }

    h1 {
        color: lightpink;
    }

    .button {
        width: 105px;
        background-color: lightskyblue;
        height: 20px;
        line-height: 20px;
        padding-bottom: 2px;
        vertical-align: middle;
        font-family: "Lucida Grande", Geneva, Verdana, Arial, Helvetica, sans-serif;
        font-size: 13px;
        text-transform: none;
        border: 1px solid transparent;
        border-radius: 5px;
    }

    .button:hover {
        color: aqua;
    }

    /* Additional styles for dark theme and rounded inputs */
    #popupForm-{{ $event->id }} {
        background-color: rgba(200, 200, 200, 0.5);
        border-radius: 10px;
        padding: 15px;
    }

    .rate,
    input[type="text"],
    button {
        border-radius: 5px;
        margin-bottom: 10px;
        padding: 10px;
    }

    .rate {
        margin-bottom: 20px;
    }

    /* Set text color for 'Rate event' and position 'X' button */
    #popupForm-{{ $event->id }} h2 {
        color: lightgray; /* Adjust the color as needed */
    }

    #closePopupBtn-{{ $event->id }} {
        position: absolute;
        top: 10px;
        right: 10px;
    }

</style>

<div id="popupForm-{{ $event->id }}" class="fixed inset-0 overflow-y-auto h-full w-full" style="display:none;">
    <div class="container mx-auto h-full flex justify-center items-center">
        <div class="bg-gray-700 p-5 rounded shadow-lg w-1/3 relative">
            <h2 class="text-lg mb-4">Rate event {{ $event->name }}</h2>
            <form action="{{ route('ratings.store') }}" method="POST">
                @csrf

                <!-- Form fields -->
                <input type="hidden" name="event_id" value="{{ $event->id }}">

                <div class="rate">
                    @for ($i = 5; $i >= 1; $i--)
                        <input type="radio" id="star{{ $i }}-{{ $event->id }}" name="rating" value="{{ $i }}" />
                        <label for="star{{ $i }}-{{ $event->id }}" title="text">{{ $i }} stars</label>
                    @endfor
                </div>

                <div>
                    <input type="text" placeholder="Enter review" name="review" class="w-full mb-3 px-4 py-2 border border-gray-300 rounded text-black" required>
                </div>

                <!-- send and close -->
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Rate</button>
                <button type="button" id="closePopupBtn-{{ $event->id }}" class="bg-gray-700 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded">X</button>
            </form>
        </div>
    </div>
</div>

<!-- script for showing and hiding the rating input form-->
<script>
    document.querySelectorAll('[id^="openPopupBtn-"]').forEach(button => {
        button.addEventListener('click', function () {
            var eventId = this.id.split('-')[1];
            document.getElementById('popupForm-' + eventId).style.display = 'block';
        });
    });

    document.querySelectorAll('[id^="closePopupBtn-"]').forEach(button => {
        button.addEventListener('click', function () {
            var eventId = this.id.split('-')[1];
            document.getElementById('popupForm-' + eventId).style.display = 'none';
        });
    });
</script>

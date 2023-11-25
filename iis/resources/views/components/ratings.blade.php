<style>
    *{
    margin: 0;
    padding: 0;
}
.rate {
    float: left;
    height: 46px;
    padding: 0 10px;
}
.rate:not(:checked) > input {
    position:absolute;
    top:-9999px;
}
.rate:not(:checked) > label {
    float:right;
    width:1em;
    overflow:hidden;
    white-space:nowrap;
    cursor:pointer;
    font-size:30px;
    color:#ccc;
}
.rate:not(:checked) > label:before {
    content: '★ ';
}
.rate > input:checked ~ label {
    color: #ffc700;    
}
.rate:not(:checked) > label:hover,
.rate:not(:checked) > label:hover ~ label {
    color: #deb217;  
}
.rate > input:checked + label:hover,
.rate > input:checked + label:hover ~ label,
.rate > input:checked ~ label:hover,
.rate > input:checked ~ label:hover ~ label,
.rate > label:hover ~ input:checked ~ label {
    color: #c59b08;
}
h3 {
    color: white;
}
h1 {
    color: lightcyan;
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
  <!--font-weight: bold;
  -->text-transform: none;
  border: 1px solid transparent;
  border-radius: 5px;
}

.button:hover {
    color:aqua
}
/* Modified from: https://github.com/mukulkant/Star-rating-using-pure-css */
</style>


<div class="flex items-center mt-2.5 mb-5">
    <div class="row">
        <!-- <form method="POST" action={{ url('/rating') }} name="ratingForm" id="ratingForm">-->
        <form method="POST" action={{ route('ratings.store') }} name="ratingForm" id="ratingForm">
            @csrf
                <input type="hidden" name="event_id" value="{{ $event['id'] }}">
                    <!--
                    <div class="rate">
                        <input type="radio" id="star5" name="rate" value="5" />
                        <label for="star5" title="text">5 stars</label>
                        <input type="radio" id="star4" name="rate" value="4" />
                        <label for="star4" title="text">4 stars</label>
                        <input type="radio" id="star3" name="rate" value="3" />
                        <label for="star3" title="text">3 stars</label>
                        <input type="radio" id="star2" name="rate" value="2" />
                        <label for="star2" title="text">2 stars</label>
                        <input type="radio" id="star1" name="rate" value="1" />
                        <label for="star1" title="text">1 star</label>
                    </div>
                    -->
         
                    <button id="openPopupBtn-{{ $event->id }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        +
                    </button>
                   

                    <!-- review form -->
                    <div id="popupForm-{{ $event->id }}" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full" style="display:none;">
                        <div class="container mx-auto h-full flex justify-center items-center">
                            <div class="bg-white p-5 rounded shadow-lg w-1/3">
                                    <h2 class="text-lg mb-4">Rate event {{$event->name}}</h2>
                                    <form action="{{ route('ratings.store') }}" method="POST">
                                        @csrf

                                        <!-- Form fields -->
                                        <input type="hidden" name="event_id" value="{{ $event->id }}">

                                        <div class="rate">
                                            <input type="radio" id="star5" name="rating" value="5" />
                                            <label for="star5" title="text">5 stars</label>
                                            <input type="radio" id="star4" name="rating" value="4" />
                                            <label for="star4" title="text">4 stars</label>
                                            <input type="radio" id="star3" name="rating" value="3" />
                                            <label for="star3" title="text">3 stars</label>
                                            <input type="radio" id="star2" name="rating" value="2" />
                                            <label for="star2" title="text">2 stars</label>
                                            <input type="radio" id="star1" name="rating" value="1" />
                                            <label for="star1" title="text">1 star</label>
                                        </div>

                                        <div>
                                            <input type="text" placeholder="Enter review" name="review" class="w-full mb-3 px-4 py-2 border rounded" required>
                                        </div>

                                    <!-- <input type="email" placeholder="Enter Email" name="email" class="w-full mb-3 px-4 py-2 border rounded" required> -->
                                    
                                    <!-- send and close -->
                                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Rate</button>
                                    <button type="button" id="closePopupBtn-{{ $event->id }}" class="bg-gray-700 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded">Cancel</button>
                                </form>
                            </div>
                        </div>
                    </div>

                    
                    <!-- script for showing and hiding the rating input form-->
                    <script>
                        document.querySelectorAll('[id^="openPopupBtn-"]').forEach(button => {
                            button.addEventListener('click', function() {
                                var eventId = this.id.split('-')[1];
                                document.getElementById('popupForm-' + eventId).style.display = 'block';
                            });
                        });
                    
                        document.querySelectorAll('[id^="closePopupBtn-"]').forEach(button => {
                            button.addEventListener('click', function() {
                                var eventId = this.id.split('-')[1];
                                document.getElementById('popupForm-' + eventId).style.display = 'none';
                            });
                        });
                    </script>

    </div>
</div>
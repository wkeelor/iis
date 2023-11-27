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


</style>
<x-layout>
    <!-- Main modal -->
    <div class="relative w-full max-w-md max-h-full p-4 mx-auto"> <!-- Centered and added mx-auto for horizontal centering -->
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700 p-8"> <!-- Added padding -->

            <div>
                <div class="px-6 py-6 lg:px-8">
                    <form action="{{route('edit_rating')}}" method="POST">
                        @csrf
                        <div class="mb-6">
                            <input type="hidden" id="id" name="id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{$rating->id}}" required>
                        </div>
                        <div class="mb-6">
                            <label for="rating" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"/>
                            <!-- Add the rating stars here -->
                            <div class="rate">
                                @for ($i = 5; $i >= 1; $i--)
                                    <input type="radio" id="star{{ $i }}" name="rating" value="{{ $i }}" @if($i == $rating->rating) checked @endif />
                                    <label for="star{{ $i }}" title="{{ $i }} stars">{{ $i }} stars</label>
                                @endfor
                            </div>
                        </div>
                        <div class="mb-6">
                            <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"/>
                            <input type="text" id="message" name="message" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{$rating->message}}" required>
                        </div>
                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Odoslať</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>

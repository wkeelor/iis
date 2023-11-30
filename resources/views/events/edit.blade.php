


<script>
    function validateForm() {
        var startTime = new Date(document.forms["eventForm"]["start_time"].value);
        var endTime = new Date(document.forms["eventForm"]["end_time"].value);
        if (startTime >= endTime) {
            alert("Začiatočný čas musí byť menší ako koncový čas");
            return false;
        }
    }
</script>

<x-layout>
    <div class="relative w-full max-w-md max-h-full p-4 mx-auto"> <!-- Centered and added mx-auto for horizontal centering -->
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700 p-8"> <!-- Added padding -->
            <div>
                <form name="eventForm" action="{{route('edit_event')}}" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
                    @csrf
                    <div class="mb-6">
                        <input type="hidden" id="id" name="id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{$event->id }}" required>
                    </div>
                    <div class="mb-6">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Názov podujatia</label>
                        <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="name" value="{{ $event->name }}" required/>
                    </div>

                    <div class="mb-6">
                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Popis podujatia</label>
                        <textarea class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="description" value="{{ $event->description }}" rows="5"></textarea>
                    </div>

                    <div class="mb-6">
                        <label for="website" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Stránka</label>
                        <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="website" value="{{ $event->website }}"/>
                    </div>

                    <div class="mb-6">
                        <label for="start_time" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Začiatok podujatia</label>
                        <input type="datetime-local" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="start_time" value="{{ $event->start_time }}" required/>
                    </div>

                    <div class="mb-6">
                        <label for="end_time" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Koniec podujatia</label>
                        <input type="datetime-local" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="end_time" value="{{ $event->end_time }}"/>
                    </div>
                    <div class="mb-6">
                        <label for="capacity" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kapacita</label>
                        <input type="number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="capacity" min="1" step="1" value="{{ $event->capacity}}"/>
                    </div>
                    <div class="mb-6">
                        <label for="price_category_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cenová ketogória</label>
                        <select id="price_category_id" x-model="selectedOption" name="price_category_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="" x-model="selectedOption">Zvolte moňosť</option>
                            <option value="1">Zpoplatnená</option>
                            <option value="2">Dobrovolné vstupné</option>
                            <option value="3">Zdarma</option>
                        </select>
                    </div>
                    <div class="mb-8"> <!-- Increased margin-bottom for more space -->
                        <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kategorie</label>
                        <select id="category" name="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="" selected >Not selected</option>
                            @foreach ($shared_categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-8"> <!-- Increased margin-bottom for more space -->
                        <label for="venue_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kategorie</label>
                        <select id="venue_id" name="venue_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="" selected >Not selected</option>
                            @foreach ($shared_venues as $venue)
                                <option value="{{ $venue->id }}">{{ $venue->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-6">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="logo">Logo</label>
                        <input name="logo" class="block w-full mb-5 text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="logo" type="file" value="{{ $event->logo }}">
                    </div>
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Odoslať</button>
                </form>
            </div>
        </div>
    </div>
</x-layout>


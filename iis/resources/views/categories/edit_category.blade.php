<x-layout>
    <!-- Main modal -->
    <div class="relative w-full max-w-md max-h-full p-4 mx-auto"> <!-- Centered and added mx-auto for horizontal centering -->
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700 p-8"> <!-- Added padding -->
            <div>
                <form action="{{route('edit_category')}}" method="POST">
                    @csrf
                    <div class="mb-8"> <!-- Increased margin-bottom for more space -->
                        <input type="hidden" id="id" name="id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{$categ->id }}" required>
                    </div>
                    <div class="mb-8"> <!-- Increased margin-bottom for more space -->
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Název</label>
                        <input type="text" id="name" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value=" {{$categ->name}} " required>
                    </div>
                    <div class="mb-8"> <!-- Increased margin-bottom for more space -->
                        <label for="parent" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Rodičovská kategorie</label>
                        <select id="parent" name="parent" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{$categ->parent_id }}">
                            <option value="" @if($categ->parent_id === null) selected @endif>Not selected</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" @if($categ->parent_id == $category->id) selected @endif>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Odoslať</button>
                </form>
            </div>
        </div>
    </div>
</x-layout>

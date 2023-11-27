<x-layout>
    <!-- Main modal -->
    <div class="relative w-full max-w-md max-h-full p-4 mx-auto">
    <div class="relative w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">

            <div x-data="{ event: null }" x-init="$watch('event', value => value && openModal())">
                <div class="px-6 py-6 lg:px-8">
                    <form name="eventForm" action="{{route('edit_venues')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-6">
                            <input type="hidden" id="id" name="id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{$venue->id }}" required>
                        </div>
                        <div class="mb-6">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Názov podujatia</label>
                            <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="name" value="{{ $venue->name }}" required/>
                        </div>

                        <div class="mb-6">
                            <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Popis podujatia</label>
                            <textarea rows="5"
                            class="resize-none min-h-10 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            name="description">{{ $venue->description }}</textarea>
                        </div>

                        <div class="mb-6">
                            <label for="street" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ulica</label>
                            <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="street" value="{{ $venue->street }}"/>
                        </div>

                        <div class="mb-6">
                            <label for="street_number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Popisné číslo</label>
                            <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="street_number" value="{{ $venue->street_number }}"/>
                        </div>
                        <div class="mb-6">
                            <label for="zip_code" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">PSČ</label>
                            <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="zip_code" value="{{ $venue->zip_code }}"/>
                        </div>
                        <div class="mb-6">
                            <label for="province" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Dištrikt</label>
                            <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="province" value="{{ $venue->province }}"/>
                        </div>
                        <div class="mb-6">
                            <label for="country" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Krajina</label>
                            <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="country" value="{{ $venue->country }}"/>
                        </div>
                        <div class="mb-6">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="logo">Logo</label>
                            <input name="logo" class="block w-full mb-5 text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="logo" type="file"  value="{{ $venue->logo }}">
                        </div>
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Odoslať</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</x-layout>

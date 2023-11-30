
    @php($curr_user = Auth::user())
        <div class="relative overflow-x-auto sm:rounded-lg p-4 rounded-lg">
            <div class="relative overflow-x-auto sm:rounded-lg p-4 rounded-lg">
                <div class="rounded-lg overflow-hidden">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Meno
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <div class="flex items-center">
                                    Cena
                                    <a href="#"><svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"/>
                                        </svg></a>
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <button data-tooltip-target="tooltip-new" data-modal-target="price-modal" data-modal-toggle="price-modal" type="button" class="text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
                                    <div id="tooltip-new" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                        Nový typ ceny
                                        <div class="tooltip-arrow" data-popper-arrow></div>
                                    </div>
                                    <i class="fa-solid fa-plus fa-xl hover:text-blue-700 dark:hover:text-blue-500"></i>
                                </button>
                            </th>
                            @include('events.price_type_create')
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($types as $type)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th class="px-6 py-4">
                                    {{$type->name}}
                                </th>
                                <td class="px-6 py-4">
                                    {{$type->price}}€
                                </td>
                                <td class="px-6 py-4">
                                    <form action="{{ route('delete_price_type', ['type' => $type->id]) }}" method="post">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="flex items-center justify-center hover:bg-gray-100 md:hover:bg-transparent md:p-0 dark:hover:bg-gray-700 md:dark:hover:bg-transparent dark:border-gray-700 p-2" style="color: white;">
                                            <i class="fa-solid fa-trash fa-xl hover:text-blue-700 dark:hover:text-blue-500 flex items-center justify-center"></i>
                                        </button>
                                    </form>
                                </td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


<x-layout>
    @php($curr_user = Auth::user())
    @php($titles = ['Schváleny', 'Čekajíci', 'Zamítnuty'])
    @for($i = 0; $i < 3; $i++)
        <div class="relative overflow-x-auto sm:rounded-lg p-4 rounded-lg">

            <!-- Title -->
            <div class="text-2xl font-bold mt-4">
                <h1 class="mx-8 text-sm w-1/6 px-10 text-center justify-center text-gray-300 shadow bg-gray-800 rounded-tr-lg rounded-tl-lg px-6 py-2 font-bold transition-all duration-200 ease-in-out">    {{$titles[$i]}}</h1>
            </div>
    <div class="relative overflow-x-auto sm:rounded-lg px-4 rounded-lg">
        <div class="rounded-lg overflow-hidden">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Jméno
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <div class="flex items-center">
                            Rodičovská kategorie
                            <a href="#"><svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"/>
                                </svg></a>
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <div class="flex items-center">
                            Schváleno
                            <a href="#"><svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"/>
                                </svg></a>
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <a href="{{ route('show_create_category') }}" class="text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
                           <i class="fa-solid fa-plus fa-xl hover:text-blue-700 dark:hover:text-blue-500"></i>
                        </a>
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($jsons[$i] as $categ)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th class="px-6 py-4">
                            {{$categ->name}}
                        </th>
                        <td class="px-6 py-4">
                            @if($categ->parent)
                                {{$categ->parent->name}}
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            @if($categ->approved)
                                Ano
                            @else
                                Ne
                            @endif
                        </td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex space-x-4">
                                @if($categ && $curr_user && $curr_user->role_id >= 2)
                                    <a href="{{ route('select_categories', ['categ' => $categ]) }}" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-200 dark:hover:text-white">
                                        <i class="fa-solid fa-pen-to-square hover:text-blue-700 dark:hover:text-blue-500" ></i>
                                    </a>
                                    @if(!$categ->approved)
                                        <a href="{{ route('categ_approve', ['categ' => $categ]) }}" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-200 dark:hover:text-white">
                                            <i class="fa-solid fa-square-check text-green-400 hover:text-green-500 dark:hover:text-green-600"></i>
                                        </a>
                                    @endif
                                    @if(is_null($categ->approved) || $categ->approved)
                                        <a href="{{ route('categ_decline', ['categ' => $categ]) }}" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-200 dark:hover:text-white">
                                            <i class="fa-solid fa-square-xmark text-red-400 hover:text-red-500 dark:hover:text-red-600"></i>
                                        </a>
                                    @endif

                                @endif
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
        </div>
        @endfor
</x-layout>

<aside id="separator-sidebar" class=" left-0 h-screen transition-transform sm:translate-x-0" aria-label="Sidebar">
    <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-gray-800">
        @php($start = "start")
        @php($end = "end")
        <form action="{{route('filter_events')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <ul class="space-y-2 font-medium">
                @if($venues)
                <li>
                    <div class="flex flex-col pr-2 pl-2 pb-2">
                        @include('components.checkbox-dropdown',['options' => $venues,'name' => 'Miesto', 'formName' => 'venue'])
                    </div>
                </li>
                @endif
                @if($categories)
                <li>
                    <div class="flex flex-col pr-2 pl-2 pb-2">
                        @include('components.checkbox-dropdown',['options' => $categories,'name' => 'Kategória', 'formName' => 'category'])
                    </div>
                </li>
                @endif
                <li>
                    <div class="flex flex-col pr-2 pl-2 items-center text-gray-900 rounded-lg dark:text-white group">
                        <div class="flex mb-2">
                            <div class="flex flex-col mr-6">
                                <label for="min-range" class="text-sm font-medium text-gray-900 dark:text-white mb-1">Cena od</label>
                                <input id="min-range" type="number" class="p-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="min_range">
                            </div>
                            <div class="flex flex-col">
                                <label for="max-range" class="text-sm font-medium text-gray-900 dark:text-white mb-1">Cena do</label>
                                <input id="max-range" type="number" class="p-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="max_range">
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="flex flex-col pl-2 pb-2 pr-2 text-gray-900 rounded-lg dark:text-white group w-full">
                        <span class="flex-1 whitespace-nowrap text-sm mb-1">Začiatok</span>
                        <x-date_range :name=$start></x-date_range>
                    </div>
                </li>
                <li>
                    <div class="flex flex-col pl-2 pb-2 pr-2 text-gray-900 rounded-lg dark:text-white group w-full">
                        <span class="flex-1  whitespace-nowrap text-sm mb-1">Koniec</span>
                        <x-date_range :name=$end></x-date_range>
                    </div>
                </li>
            </ul>
            <button class=" mt-5 w-full inline-flex items-center px-4 justify-center py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="submit">
               Vyhľadať
            </button>
        </form>
    </div>
</aside>

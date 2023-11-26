<aside id="separator-sidebar" class=" left-0 w-64 h-screen transition-transform sm:translate-x-0" aria-label="Sidebar">
    <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-gray-800">
        <ul class="space-y-2 font-medium">
            <li>
                <div class="flex p-2">
                  <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-r-0 border-gray-300 rounded-l-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                    <i class="fa-solid fa-magnifying-glass"></i>
                  </span>
                    <input type="text" id="name" class="text-xs rounded-none rounded-r-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full border-gray-300 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
            </li>
            <li>
                <div class="flex flex-col pr-2 pl-2 pb-2">
                    @php
                        $options = [
                            ['id' => 1, 'name' => 'Option 1'],
                            ['id' => 2, 'name' => 'Option 2'],
                            ['id' => 3, 'name' => 'Option 3'],
                            ['id' => 4, 'name' => 'Option 4'],
                            ['id' => 5, 'name' => 'Option 5'],
                            ['id' => 6, 'name' => 'Option 6'],
                            ['id' => 7, 'name' => 'Option 7'],
                            ['id' => 8, 'name' => 'Option 8'],
                            ['id' => 9, 'name' => 'Option 9'],
                            ['id' => 10, 'name' => 'Option 10'],
                        ]; // Define the constant data here
                    @endphp
                    @include('components.checkbox-dropdown',['options' => $options,'name' => 'Miesto'])
                </div>
            </li>
            <li>
                <div class="flex flex-col pr-2 pl-2 pb-2">
                    @include('components.checkbox-dropdown',['options' => $options,'name' => 'Kategória'])
                </div>
            </li>
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
                    <x-date_range></x-date_range>
                </div>
            </li>
            <li>
                <div class="flex flex-col pl-2 pb-2 pr-2 text-gray-900 rounded-lg dark:text-white group w-full">
                    <span class="flex-1  whitespace-nowrap text-sm mb-1">Koniec</span>
                    <x-date_range></x-date_range>
                </div>
            </li>
        </ul>
    </div>
</aside>

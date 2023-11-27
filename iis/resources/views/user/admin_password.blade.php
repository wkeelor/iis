<x-layout>
    <!-- Main modal -->
    <div class="relative w-full max-w-md max-h-full p-4 mx-auto"> <!-- Centered and added mx-auto for horizontal centering -->
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700 p-8"> <!-- Added padding -->

            <div>
            <div class="px-6 py-6 lg:px-8">
                <form action="{{route('edit_password_admin')}}" method="POST">
                    @csrf
                    <div class="mb-6">
                        <input type="hidden" id="id" name="id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{$user->id}}" required>
                    </div>
                    <div class="mb-6">
                        <label for="new_password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nové heslo</label>
                        <input type="password" id="new_password" name="new_password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="•••••••••" required>
                    </div>
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Odoslať</button>
                </form>
            </div>
            </div>
        </div>
    </div>
</x-layout>

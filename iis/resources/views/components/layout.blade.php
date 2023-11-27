@include('components.flash-message')
@include('components.flash-error')
    <!DOCTYPE html>
<html lang="sk">
@php($curr_user = Auth::user())
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="icon" href="images/favicon.ico"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
          integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.css" rel="stylesheet" />
    <script>import Datepicker from 'flowbite-datepicker/Datepicker';
        import DateRangePicker from 'flowbite-datepicker/DateRangePicker';</script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        laravel: '#ef3b2d',
                    },
                },
            },
        }
    </script>
    <script>document.documentElement.classList.add('dark')</script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.js" defer></script>
</head>
<body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/datepicker.min.js"></script>
<nav class="bg-white border-gray-200 dark:bg-gray-900">
    <div class="max-w-screen flex flex-wrap items-center justify-between  p-4">
        <a href="/" class="flex items-center">
            <img src="https://flowbite.com/docs/images/logo.svg" class="h-8 mr-3" alt="Flowbite Logo" />
            <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Akcie a udalosti</span>
        </a>
        <div class="flex items-center md:order-2 pr-3">
            @if($curr_user)
                <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                    @if($curr_user->role_id == 3)
                        <li class="flex items-center">
                            <a data-tooltip-target="tooltip-users" href="{{ route('all_users') }}" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">
                                <div id="tooltip-users" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                    Uživatele
                                    <div class="tooltip-arrow" data-popper-arrow></div>
                                </div>
                                <i class="fa-solid fa-users fa-xl hover:text-blue-700 dark:hover:text-blue-500"></i>
                            </a>
                        </li>
                    @endif

                        <li class="flex items-center">
                            <a data-tooltip-target="tooltip-categories" href="{{ route('all_categories') }}" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">
                                <div id="tooltip-categories" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                    Kategorie
                                    <div class="tooltip-arrow" data-popper-arrow></div>
                                </div>
                                <i class="fa-solid fa-list-ul fa-xl hover:text-blue-700 dark:hover:text-blue-500"></i>
                            </a>
                        </li>

                    <li class="flex items-center">
                        <button data-tooltip-target="tooltip-venues" type="button" id="venues-menu-button" aria-expanded="false" data-dropdown-toggle="venues-dropdown" data-dropdown-placement="bottom" style="color: white;">
                            <div id="tooltip-venues" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                Miesta
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                            <span class="sr-only">Open venue menu</span>
                            <i class="fa-solid fa-location-dot fa-xl hover:text-blue-700 dark:hover:text-blue-500"></i>
                        </button>
                        <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600" id="venues-dropdown">
                            <ul class="py-4" aria-labelledby="venues-menu-button">
                                <li>
                                    <a href="{{ route('all_venues') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                        <i class="fa-solid fa-ticket hover:text-blue-700 dark:hover:text-blue-500"></i>
                                        <span>Všechny miesta</span>
                                    </a>
                                </li>
                                @if($curr_user->role_id >= 2)
                                    <li>
                                        <a href="{{ route('venues_moderate') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                            <i class="fa-solid fa-ticket hover:text-blue-700 dark:hover:text-blue-500"></i>
                                            <span>Moderování miest</span>
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </li>

                    <li class="flex items-center">
                        <button data-tooltip-target="tooltip-events" type="button" id="events-menu-button" aria-expanded="false" data-dropdown-toggle="events-dropdown" data-dropdown-placement="bottom" style="color: white;">
                            <span class="sr-only">Open event menu</span>
                            <div id="tooltip-events" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                Akce
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                            <i class="fa-solid fa-calendar-days fa-xl hover:text-blue-700 dark:hover:text-blue-500"></i>
                        </button>
                        <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600" id="events-dropdown">
                            <ul class="py-4" aria-labelledby="events-menu-button">
                                <li>
                                    <a href="{{ route('all_events') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                        <i class="fa-solid fa-ticket hover:text-blue-700 dark:hover:text-blue-500"></i>
                                        <span>Všechny akce</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('all_my_events') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                        <i class="fa-solid fa-ticket hover:text-blue-700 dark:hover:text-blue-500"></i>
                                        <span>Moje akce</span>
                                    </a>
                                </li>
                                @if($curr_user->role_id >= 2)
                                <li>
                                    <a href="{{ route('event_moderate') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                        <i class="fa-solid fa-ticket hover:text-blue-700 dark:hover:text-blue-500"></i>
                                        <span>Moderování akcií</span>
                                    </a>
                                </li>
                                @endif
                            </ul>
                        </div>
                    </li>

                    <li class="flex items-center">
                        <button data-tooltip-target="tooltip-profile" type="button" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom" style="color: white;">
                            <span class="sr-only">Open user menu</span>
                            <div id="tooltip-profile" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                Profil
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                            <i class="fa-solid fa-user fa-xl hover:text-blue-700 dark:hover:text-blue-500"></i>
                        </button>
                        <!-- Dropdown menu -->
                        <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600" id="user-dropdown">
                            <div class="px-4 py-3">
                                <span class="block text-sm text-gray-900 dark:text-white">{{$curr_user->name}}</span>
                                <span class="block text-sm  text-gray-500 truncate dark:text-gray-400">{{$curr_user->email}}</span>
                            </div>
                            <ul class="py-4" aria-labelledby="user-menu-button">
                                <li>
                                    <button data-modal-target="edit-modal" data-modal-toggle="edit-modal"  data-modal-params='{"user": @json($curr_user)}' class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                        <i class="fa-solid fa-user-pen hover:text-blue-700 dark:hover:text-blue-500"></i>
                                        <span>Upraviť osobné údaje</span>
                                    </button>
                                    <script>
                                        function openEditModal(event) {
                                            const user = @json($curr_user);
                                            const customEvent = new CustomEvent('open-edit-modal', { detail: { user } });
                                            document.dispatchEvent(customEvent);
                                        }
                                    </script>
                                </li>
                                <li>
                                    <button data-modal-target="password-modal" data-modal-toggle="password-modal" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                        <i class="fa-solid fa-key hover:text-blue-700 dark:hover:text-blue-500"></i>
                                        <span>Zmeniť heslo</span>
                                    </button>
                                </li>
                                <li>
                                    <a href="{{ route('show_orders') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                        <i class="fa-solid fa-ticket hover:text-blue-700 dark:hover:text-blue-500"></i>
                                        <span>Vstupenky</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('logout') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                        <i class="fa-solid fa-right-from-bracket hover:text-blue-700 dark:hover:text-blue-500"></i>
                                        <span>Odhlásiť</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <button data-collapse-toggle="navbar-user" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-user" aria-expanded="false">
                            <span class="sr-only">Open main menu</span>
                            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
                            </svg>
                        </button>
                    </li>
                    <li>
                        <button data-tooltip-target="tooltip-new" data-modal-target="create-modal" data-modal-toggle="create-modal" type="button" class="text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
                            <div id="tooltip-new" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                Nová akce
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                            <i class="fa-solid fa-plus fa-xl hover:text-blue-700 dark:hover:text-blue-500"></i>
                        </button>
                    </li>
                    @include('user.password')
                    @include('user.edit')
                    @include('events.create')
                </ul>
            @else
                <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                    <li>
                        <button data-tooltip-target="tooltip-login" data-modal-target="authentication-modal" data-modal-toggle="authentication-modal" class="flex items-center justify-center hover:bg-gray-100 md:hover:bg-transparent md:p-0 dark:hover:bg-gray-700 md:dark:hover:bg-transparent dark:border-gray-700 p-2" style="color: white;">
                            <div id="tooltip-login" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                Prihlásiť
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                            <i class="fa-solid fa-right-to-bracket hover:text-blue-700 dark:hover:text-blue-500"></i>
                        </button>
                        @include('user.login')
                    </li>
                    <li>
                        <button data-tooltip-target="tooltip-registration" data-modal-target="registration-modal" data-modal-toggle="registration-modal" class="flex items-center justify-center hover:bg-gray-100 md:hover:bg-transparent md:p-0 dark:hover:bg-gray-700 md:dark:hover:bg-transparent dark:border-gray-700 p-2" style="color: white;">
                            <div id="tooltip-registration" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                Registrace
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                            <i class="fa-solid fa-user-plus hover:text-blue-700 dark:hover:text-blue-500"></i>
                        </button>
                        @include('user.registration')
                    </li>
                </ul>
            @endif
        </div>
    </div>

</nav>
<main class="bg-gradient-to-br from-purple-700 via-indigo-600 to-sky-500">
    {{$slot}}
</main>
</body>

</html>

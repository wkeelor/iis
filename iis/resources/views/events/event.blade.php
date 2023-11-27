
<x-layout>
    <section class="py-12 sm:py-16" x-data="get_items()">
        <div class="container mx-auto px-4">

            <div class="lg:col-gap-12 xl:col-gap-16 mt-8 grid grid-cols-1 gap-12 lg:mt-12 lg:grid-cols-5 lg:gap-16">
                <div class="lg:col-span-3 lg:row-end-1">
                    <div class="lg:flex lg:items-start">
                        <div class="lg:order-2 lg:ml-5">
                            <div class="max-w-xl overflow-hidden rounded-lg">
                                <img class="h-full w-full max-w-full object-cover" src="{{ $event->logo ? asset($event->logo) : asset('images/logotickify.png') }}" alt="" />
                            </div>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-2 lg:row-span-2 lg:row-end-2">
                    <h1 class="sm: text-2xl font-bold text-gray-900 sm:text-3xl">{{$event->name}}</h1>

                    <div class="mt-5 flex items-center">
                        <div class="flex items-center">
                            @php($averageRating = $event->averageRating)
                            @include('reviews.average_rating')
                            <span
                                class="bg-blue-100 text-blue-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800 ml-3">{{ number_format($event->averageRating,2) }}</span>
                        </div>
                        <p class="ml-2 text-sm font-medium text-gray-500">{{$countRating.' Reviews'}}</p>
                    </div>
                    <form action="{{route('basket_add')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <h2 class="mt-8 text-base text-gray-900 pb-3">Kategória</h2>
                        <h2 class="mt-3 flex select-none flex-wrap items-center gap-1 text-gray-900 font-bold">{{$event->category_id ? $event->category->name :"Nezadané"}}</h2>
                        @if($event->price_category_id == 3)
                            <h2 class="mt-8 text-base text-gray-900">Podujatie je zdarma</h2>
                        @else
                            <h2 class="mt-8 text-base text-gray-900">Zvolte cenovú kategóriu</h2>
                            <div class="mt-3 flex select-none flex-wrap items-center gap-1 ">
                                @foreach($priceTypes as $priceType)
                                    <label @if($priceType->default) x-init="$nextTick(() => { priceType={{$priceType->price}} })" @endif>
                                        <input type="radio" name="priceType" value="{{$priceType->id}}" x-on:change="editAmountPrice({{$priceType->price}})" class="peer sr-only" {{$priceType->default ? "checked" : ""}} />
                                        <p class="peer-checked:bg-gray-900 peer-checked:text-white hover:bg-gray-800 hover:text-white rounded-lg border border-black px-6 py-2 font-bold">{{$priceType->name}}</p>
                                        @if($priceType->price)
                                            <span class="mt-1 block text-center text-xs">{{$priceType->price}} €</span>
                                        @endif
                                    </label>
                                @endforeach
                            </div>
                        @endif
                        <h2 class="mt-8 text-base text-gray-900 pb-3">Zvoľte množstvo</h2>
                        <div class="mt-2 flex select-none flex-wrap items-center gap-1">
                            <input type="number" name="amount" id="number-input" aria-describedby="helper-text-explanation" class="text-xl font-bold rounded-lg border-3 border-gray-800 px-6 py-2 font-bold" min="1"  :value="amount" x-model="amount" x-on:change="editAmount()" required>
                        </div>
                        <div class="mt-8 flex flex-col items-center justify-between space-y-4 border-t border-b py-4 sm:flex-row sm:space-y-0">
                            @if($event->price_category_id < 3)
                                <input x-init="$nextTick(() => {editAmount()})" type="number" name="sum" x-model="sum"class="text-3xl font-bold border-0" {{$event->price_category_id == 2 ? "" : "disabled"}}>
                            @endif


                            <button type="submit" class="inline-flex items-center justify-center rounded-md border-2 border-transparent bg-gray-900 bg-none px-12 py-3 text-center text-base font-bold text-white transition-all duration-200 ease-in-out focus:shadow hover:bg-gray-800">
                                <svg xmlns="http://www.w3.org/2000/svg" class="shrink-0 mr-3 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                </svg>
                                Pridať do košíku
                            </button>
                        </div>
                    </form>
                    <ul class="mt-8 space-y-2">
                        <li class="flex items-center text-left text-sm font-medium text-gray-600">
                            <i class="fa-solid fa-calendar-days mr-2 block h-5 w-5 align-middle text-gray-500"></i>
                            {{$event->start_time}} - {{$event->end_time}}
                        </li>
                        <li class="flex items-center text-left text-sm font-medium text-gray-600">
                            <i class="fa-solid fa-location-dot mr-2 block h-5 w-5 align-middle text-gray-500"></i>
                            {{$event->venue->name}}
                        </li>
                        <li class="flex items-center text-left text-sm font-medium text-gray-600">
                            <i class="fa-solid fa-globe mr-2 block h-5 w-5 align-middle text-gray-500"></i>
                            @php($parsedUrl = parse_url($event->website))
                            @php($shortenedWebsite = isset($parsedUrl['host']) ? $parsedUrl['host'] : $event->website)
                            <a href="{{ $event->website }}">{{$shortenedWebsite}}</a>
                        </li>
                    </ul>
                </div>

                <div class="lg:col-span-3">
                    <div class="border-b border-gray-300">
                        <nav class="flex gap-4">
                            <a href="#" title="" class="tab-link border-b-2  py-4 text-sm font-medium text-gray-900 hover:border-gray-400 hover:text-gray-800" data-tab="description">Description</a>

                            <a href="#" title="" class="tab-link inline-flex items-center border-b-2 border-transparent py-4 text-sm font-medium text-gray-600" data-tab="reviews">
                                Reviews
                                <span class="ml-2 block rounded-full bg-gray-500 px-2 py-px text-xs font-bold text-gray-100">{{$countRating}} </span>
                            </a>
                        </nav>
                    </div>

                    <div id="descriptionTab" class="tab-content mt-8 flow-root sm:mt-12">
                        {{$event->description}}
                    </div>
                    <div id="reviewsTab" class="tab-content mt-8 flow-root sm:mt-12" style="display: none;">
                        <x-reviews :ratings="$ratings" :event="$event"/>
                    </div>
                </div>

                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        // Add click event listeners to tab links
                        const tabLinks = document.querySelectorAll('.tab-link');
                        tabLinks.forEach(link => {
                            link.addEventListener('click', function (event) {
                                event.preventDefault();
                                const tabName = this.getAttribute('data-tab');
                                showTab(tabName);
                                setActiveTab(link);
                            });
                        });

                        // Function to show/hide tabs
                        function showTab(tabName) {
                            document.getElementById('descriptionTab').style.display = tabName === 'description' ? 'block' : 'none';
                            document.getElementById('reviewsTab').style.display = tabName === 'reviews' ? 'block' : 'none';
                        }

                        // Function to set active tab
                        function setActiveTab(activeLink) {
                            tabLinks.forEach(link => link.classList.remove('active'));
                            activeLink.classList.add('active');
                        }

                        // Set "Description" tab as active by default
                        const defaultTab = 'description';
                        showTab(defaultTab);

                        // Find and set the active class for the default tab link
                        const defaultTabLink = document.querySelector(`[data-tab="${defaultTab}"]`);
                        setActiveTab(defaultTabLink);
                    });
                </script>

                <style>
                    /* Add this style to your CSS to apply the underline effect */
                    .tab-link.active {
                        border-bottom: 2px solid #000; /* Change the color as needed */
                    }
                </style>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('get_items', () => ({
                priceType: null,
                amount: 1,
                sum: null,
                editAmount(){
                    this.sum = this.amount * this.priceType
                },
                editAmountPrice(price){
                    this.priceType = price
                    this.sum = this.amount * this.priceType
                },
            }))
        })
    </script>

</x-layout>

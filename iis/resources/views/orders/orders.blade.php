<x-layout>
    <section>
        <div class="relative overflow-x-auto sm:rounded-lg p-4 rounded-lg">
            @if(count($ordersWaiting))
                <div class="text-2xl font-bold mb-4">
                    Čakajúce
                </div>
                <div class="relative overflow-x-auto sm:rounded-lg p-4 rounded-lg">
                    <div class="relative overflow-x-auto flex justify-center items-center sm:rounded-lg mt-5">
                        <table class="text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 w-9/12 " >
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Názov udalosti
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Začiatok udalosti
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Koniec udalosti
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Kategória
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Miesto
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Počet vstupeniek
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Cena
                                </th>
                                <th scope="col" class="px-6 py-3">
                                </th>
                                <th scope="col" class="px-6 py-3">
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($ordersWaiting as $order)
                                    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{$order->event_name}}
                                        </th>
                                        <td class="px-6 py-4">
                                            {{$order->start_time}}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{$order->end_time}}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{$order->category_name}}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{$order->venue_name}}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{$order->amount}}
                                        </td>
                                        @if($order->price_category_id == 3)
                                            <td class="px-6 py-4">
                                                <p class="font-medium text-green-600 dark:text-green-500">Zdarma</p>
                                            </td>
                                        @else
                                            <td class="px-6 py-4">
                                                {{$order->price}} €
                                            </td>
                                        @endif
                                        @if($order->paid)
                                            <td class="px-6 py-4">
                                                <p class="font-medium text-green-600 dark:text-green-500 hover:underline"><i class="fa-solid fa-check"></i></p>
                                            </td>
                                        @else
                                            <td class="px-6 py-4">
                                                <a href="{{route('order_pay', ['order_id' => $order->id])}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline"><i class="fa-solid fa-money-bill"></i></a>
                                            </td>
                                        @endif
                                        @if(!$order->paid || $order->price_category_id == 3)
                                            <td class="px-6 py-4">
                                                <a href="{{route('order_delete', ['order_id' => $order->id])}}" class="font-medium text-red-600 dark:text-red-500 hover:underline"><i class="fa-solid fa-xmark"></i></a>
                                            </td>
                                        @else
                                            <td class="px-6 py-4">
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
            @if(count($ordersEnded))
                <div class="text-2xl font-bold mb-4">
                    Skončené
                </div>
                <div class="relative overflow-x-auto sm:rounded-lg p-4 rounded-lg">
                    <div class="relative overflow-x-auto flex justify-center items-center sm:rounded-lg mt-5">
                        <table class="text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 w-9/12">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Názov udalosti
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Začiatok udalosti
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Koniec udalosti
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Kategória
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Miesto
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Počet vstupeniek
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Cena
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($ordersEnded as $order)
                                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{$order->event_name}}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{$order->start_time}}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{$order->end_time}}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{$order->category_name}}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{$order->venue_name}}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{$order->amount}}
                                    </td>
                                    @if($order->price_category_id == 3)
                                        <td class="px-6 py-4">
                                            <p class="font-medium text-green-600 dark:text-green-500">Zdarma</p>
                                        </td>
                                    @else
                                        <td class="px-6 py-4">
                                            {{$order->price}} €
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
            @if(!count($ordersEnded) && !count($ordersWaiting))
            <h1 class="text-2xl font-bold mb-4 text-center ">Nemáte žiadne registrované udalosti</h1>
            @endif
        </div>
    </section>
</x-layout>

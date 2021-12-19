<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    Welcome {{ Auth::user()->name }} Customer!
                </div>
            </div>
        </div>
    </div>

    <div class="py-2 mb-4 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

            <!-- Flash-Message -->
            <x-flash-message/>
        </div>
    </div>

    <div class="py-1">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <!-- Tickets -->
                <div class="flex flex-col">
                    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block py-2 min-w-full sm:px-6 lg:px-8">
                            <div class="overflow-hidden shadow-md sm:rounded-lg">
                                <table class="min-w-full">
                                    <thead class="bg-gray-50 dark:bg-gray-700">
                                    <tr>
                                        <th scope="col"
                                            class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                            Customer Name
                                        </th>
                                        <th scope="col"
                                            class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                            Service name
                                        </th>
                                        <th scope="col"
                                            class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                            Ticket Number
                                        </th>
                                        {{--                                            <th scope="col"--}}
                                        {{--                                                class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">--}}
                                        {{--                                                Status--}}
                                        {{--                                            </th>--}}
                                        <th scope="col" class="relative py-3 px-6">
                                            <span class="sr-only">Edit</span>
                                        </th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    <!-- Ticket -->
{{--                                    @dd($tickets)--}}
                                    @foreach($tickets as $ticket)
                                        @php($counter++)


                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                            <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ $ticket->getRelation('ticket')->getRelation('user')->name }}
{{--                                                @dd($ticket->getRelation('ticket')->getRelation('user')->name)--}}
                                            </td>
                                            <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                {{ $ticket->getRelation('ticket')->getRelation('service')->name }}
                                            </td>
                                            <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                {{ $ticket->getRelation('ticket')->number }}
                                            </td>
                                            <td class="hover:bg-grey-lighter">
                                                <form class="py-4 px-6 text-sm font-medium text-right whitespace-nowrap font-bold py-1 px-3 rounded text-xs bg-green hover:bg-green-dark"
                                                      action="{{ route('employee.tickets', ['ticket' => $ticket->getRelation('ticket')->id]) }}"
                                                      method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    {{ csrf_field() }}
                                                    <i class="fas fa-trash-alt">
                                                    </i>
                                                    <input name="delete" type="submit" class="text-grey-lighter font-bold py-1 px-3 rounded text-xs bg-green hover:bg-green-dark"
                                                           value="Delete"
                                                           data-toggle="tooltip" data-placement="top"
                                                           title="Delete User {{ $counter-1 }}">
                                                </form>
{{--                                                <a href="#"--}}
{{--                                                   class="text-blue-600 hover:text-blue-900 dark:text-blue-500 dark:hover:underline">--}}
{{--                                                    Complete--}}
{{--                                                </a>--}}
                                            </td>
                                        </tr>
                                    @endforeach
{{--                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            Apple MacBook Pro 17"
                                        </td>
                                        <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                            Sliver
                                        </td>
                                        <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                            Laptop
                                        </td>
                                        --}}{{--<td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">--}}{{--
                                        --}}{{--    $2999--}}{{--
                                        --}}{{--</td>--}}{{--
                                    </tr>--}}
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</x-app-layout>

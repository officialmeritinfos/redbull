@extends('layouts.dashboard')

@section('title', $pageName ?? 'Apply for Card')

@section('content')
    <div class="max-w-2xl mx-auto px-4 py-6 space-y-6">

        <!-- Form Card -->
        <div class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-xl p-6 shadow-sm">
            <div class="flex items-center space-x-3 mb-4">
                <i class="fas fa-id-card text-primary text-lg"></i>
                <h2 class="text-lg font-semibold text-gray-800 dark:text-white">{{ $pageName }}</h2>
            </div>

            <form
                x-data="{ submitting: false }"
                @submit.prevent="submitting = true; $el.submit()"
                method="POST"
                action="{{ route('card.apply') }}"
                class="space-y-5"
            >
                @csrf
                @include('templates.notification')

                <div>
                    <label class="block text-base font-medium text-gray-700 dark:text-gray-300 mb-1">Delivery Address</label>
                    <textarea name="address"
                              rows="3"
                              placeholder="Enter delivery address"
                              class="w-full rounded-lg border border-gray-300 dark:border-gray-700 bg-gray-50 dark:bg-gray-800 text-base text-gray-800 dark:text-white px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 transition"></textarea>
                </div>

                <div>
                    <label class="block text-base font-medium text-gray-700 dark:text-gray-300 mb-1">Name on Card</label>
                    <input type="text" name="name"
                           placeholder="Enter name on card"
                           class="w-full rounded-lg border border-gray-300 dark:border-gray-700 bg-gray-50 dark:bg-gray-800 text-base text-gray-800 dark:text-white px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 transition"/>
                </div>

                <div x-data="{ cardType: '' }">
                    <label class="block text-base font-medium text-gray-700 dark:text-gray-300 mb-2">Card Type</label>

                    <div class="grid sm:grid-cols-3 gap-4">
                        @foreach(['Mastercard', 'Visa', 'Discover'] as $type)
                            <label
                                :class="{
                    'border-blue-600 ring-2 ring-blue-500': cardType === '{{ $type }}',
                    'border-gray-300 dark:border-gray-700': cardType !== '{{ $type }}'
                }"
                                class="flex items-center justify-center border rounded-lg px-4 py-3 cursor-pointer bg-gray-50 dark:bg-gray-800 text-gray-700 dark:text-gray-200 hover:border-blue-400 transition">
                                <input type="radio"
                                       name="cardType"
                                       value="{{ $type }}"
                                       x-model="cardType"
                                       class="hidden">
                                <span class="font-semibold">{{ $type }}</span>
                            </label>
                        @endforeach
                    </div>

                    <p class="mt-2 text-sm text-gray-500 dark:text-gray-400" x-show="cardType === ''">
                        Please select a card type.
                    </p>
                </div>



                <div class="pt-4 text-center">
                    <button type="submit"
                            class="inline-flex items-center justify-center px-6 py-2 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-lg transition"
                            x-bind:disabled="submitting">
                        <svg x-show="submitting" class="animate-spin -ml-1 mr-3 h-4 w-4 text-white" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="3"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z"></path>
                        </svg>
                        <span x-text="submitting ? 'Submitting...' : 'Apply'"></span>
                    </button>
                </div>
            </form>
        </div>

        <!-- List Table -->
        <div class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-xl p-6 shadow-sm">
            <h3 class="text-base font-semibold text-gray-800 dark:text-white mb-4">Card Applications</h3>

            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700 text-sm text-left">
                    <thead class="bg-gray-50 dark:bg-gray-800 text-gray-700 dark:text-gray-300">
                    <tr>
                        <th class="px-4 py-2">Reference</th>
                        <th class="px-4 py-2">Address</th>
                        <th class="px-4 py-2">Name</th>
                        <th class="px-4 py-2">Card Type</th>
                        <th class="px-4 py-2">Date</th>
                        <th class="px-4 py-2">Status</th>
                    </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 dark:divide-gray-800">
                    @foreach($cards as $card)
                        <tr>
                            <td class="px-4 py-3 text-gray-800 dark:text-gray-200">{{ $card->reference }}</td>
                            <td class="px-4 py-3 text-gray-600 dark:text-gray-400">{{ $card->address }}</td>
                            <td class="px-4 py-3 text-gray-600 dark:text-gray-400">{{ $card->name }}</td>
                            <td class="px-4 py-3 text-gray-600 dark:text-gray-400">{{ $card->cardType }}</td>
                            <td class="px-4 py-3 text-gray-600 dark:text-gray-400">{{ $card->created_at->format('Y-m-d') }}</td>
                            <td class="px-4 py-3">
                                @switch($card->status)
                                    @case(1)
                                        <span class="text-green-600 font-semibold">Active</span>
                                        @break
                                    @case(2)
                                        <span class="text-blue-600 font-semibold">Pending</span>
                                        @break
                                    @case(3)
                                        <span class="text-red-600 font-semibold">Cancelled</span>
                                        @break
                                @endswitch
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="pt-4">
                {{ $cards->links() }}
            </div>
        </div>
    </div>
@endsection

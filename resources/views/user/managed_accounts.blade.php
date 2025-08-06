@extends('layouts.dashboard')

@section('title', $pageName ?? 'Account Manager')

@section('content')
    @include('templates.notification')

    {{-- Wrap button and modal in shared Alpine scope --}}
    <div x-data="{ subscribeOpen: false, loading: false }" x-cloak>
        {{-- Alert Section --}}
        <div class="bg-white dark:bg-gray-900 rounded-xl shadow-md p-6 mb-10">
            <h3 class="text-xl font-semibold text-gray-800 dark:text-white">{{ $siteName }} Account Manager</h3>

            <div class="mt-4 bg-blue-50 dark:bg-blue-900/30 border border-blue-200 dark:border-blue-700 rounded-lg p-4">
                <h4 class="text-lg font-semibold text-blue-700 dark:text-blue-300">Heads up!</h4>
                <p class="text-sm text-gray-700 dark:text-gray-300 mt-2">
                    Don’t have time to trade or learn how to trade? Our Account Management Service is the best profitable trading
                    option for you. We can help you manage your account in the financial market with a simple subscription model.
                </p>
                <p class="text-sm text-gray-600 dark:text-gray-400 mt-3">
                    Reach us at <a href="mailto:{{ $web->email }}" class="underline">{{ $web->email }}</a> for more info.
                </p>
            </div>

            <div class="text-center mt-6">
                <button @click="subscribeOpen = true"
                        class="w-full bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-semibold py-2 px-4 rounded-lg transition flex items-center justify-center gap-2 disabled:opacity-50 disabled:cursor-not-allowed">
                    Subscribe Now
                </button>
            </div>
        </div>

        {{-- Table Section --}}
        <div class="bg-white dark:bg-gray-900 rounded-xl shadow p-6">
            <h3 class="text-lg font-semibold text-gray-800 dark:text-white mb-4">Active Subscriptions</h3>

            <div class="overflow-x-auto">
                <table class="min-w-full table-auto text-sm text-left">
                    <thead class="text-gray-500 dark:text-gray-400 border-b dark:border-gray-700">
                    <tr>
                        <th class="px-3 py-2">Account ID</th>
                        <th class="px-3 py-2">Password</th>
                        <th class="px-3 py-2">Type</th>
                        <th class="px-3 py-2">Currency</th>
                        <th class="px-3 py-2">Leverage</th>
                        <th class="px-3 py-2">Server</th>
                        <th class="px-3 py-2">Duration</th>
                        <th class="px-3 py-2">Submitted</th>
                        <th class="px-3 py-2">Expires</th>
                        <th class="px-3 py-2">Started</th>
                        <th class="px-3 py-2">Status</th>
                        <th class="px-3 py-2">Action</th>
                    </tr>
                    </thead>
                    <tbody class="text-gray-800 dark:text-gray-200 divide-y dark:divide-gray-700">
                    @foreach ($accounts as $account)
                        <tr>
                            <td class="px-3 py-2">{{ $account->accountId }}</td>
                            <td class="px-3 py-2">{{ $account->accountPassword }}</td>
                            <td class="px-3 py-2">{{ $account->accountType }}</td>
                            <td class="px-3 py-2">{{ $account->currency }}</td>
                            <td class="px-3 py-2">{{ $account->leverage }}</td>
                            <td class="px-3 py-2">{{ $account->server }}</td>
                            <td class="px-3 py-2">{{ $account->duration }}</td>
                            <td class="px-3 py-2">{{ $account->created_at }}</td>
                            <td class="px-3 py-2">{{ date('d-m-Y', $account->expires_at) }}</td>
                            <td class="px-3 py-2">
                                @switch($account->status)
                                    @case(1)
                                    @case(4)
                                        {{ date('d-m-Y h:i:s', $account->started_at) }}
                                        @break
                                    @case(2)
                                        <span class="badge bg-blue-500 text-white">Pending</span>
                                        @break
                                    @default
                                        <span class="badge bg-red-500 text-white">Cancelled</span>
                                @endswitch
                            </td>
                            <td class="px-3 py-2">
                                @switch($account->status)
                                    @case(1)
                                        <span class="badge bg-green-600 text-white">Completed</span>
                                        @break
                                    @case(2)
                                        <span class="badge bg-blue-600 text-white">Pending</span>
                                        @break
                                    @case(4)
                                        <span class="badge bg-indigo-600 text-white">Ongoing</span>
                                        @break
                                    @default
                                        <span class="badge bg-red-600 text-white">Cancelled</span>
                                @endswitch
                            </td>
                            <td class="px-3 py-2 text-center">
                                <a href="{{ route('subtrade.delete', ['id' => $account->reference]) }}"
                                   class="text-red-600 hover:underline text-xs">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Drawer Modal --}}
        {{-- Drawer Modal (mobile slide-up, desktop slide-right) --}}
        <div
            x-show="subscribeOpen"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            class="fixed inset-0 z-50 bg-black bg-opacity-50 backdrop-blur-sm flex items-end sm:items-start sm:justify-end"
            @click.self="subscribeOpen = false"
        >
            <div
                x-show="subscribeOpen"
                x-transition:enter="transform transition ease-in-out duration-300"
                x-transition:enter-start="translate-y-full sm:translate-x-full"
                x-transition:enter-end="translate-y-0 sm:translate-x-0"
                x-transition:leave="transform transition ease-in-out duration-300"
                x-transition:leave-start="translate-y-0 sm:translate-x-0"
                x-transition:leave-end="translate-y-full sm:translate-x-full"
                class="w-full sm:max-w-lg bg-white dark:bg-gray-900 shadow-xl rounded-t-2xl sm:rounded-l-2xl sm:rounded-tr-none h-[90vh] sm:h-full overflow-y-auto p-6"
            >
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-lg font-semibold text-gray-800 dark:text-white">Subscribe to Account Management</h2>
                    <button @click="subscribeOpen = false" class="text-gray-500 hover:text-red-600 text-2xl leading-none">&times;</button>
                </div>

                <form method="POST" action="{{ route('subtrade.new') }}"
                      @submit.prevent="loading = true; $el.submit()"
                      x-ref="form"
                      class="space-y-5">
                    @csrf

                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Subscription Duration</label>
                        <select name="subDuration"
                                x-on:change="document.querySelector('input[name=amount]').value = $event.target.selectedOptions[0].dataset.amount"
                                class="block w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 text-sm text-gray-800 dark:text-gray-100 focus:ring-2 focus:ring-indigo-500">
                            <option value="">Select Duration</option>
                            @foreach($durations as $duration)
                                <option value="{{ $duration->id }}" data-amount="{{ $duration->amount }}">
                                    {{ $duration->title }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Amount to Pay ($)</label>
                        <input type="text" name="amount" readonly
                               class="block w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-700 bg-gray-100 dark:bg-gray-800 text-sm text-gray-800 dark:text-gray-100">
                    </div>

                    <div class="grid sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Account ID</label>
                            <input type="text" name="accountId"
                                   class="block w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 text-sm text-gray-800 dark:text-gray-100">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Account Password</label>
                            <input type="text" name="accountPassword"
                                   class="block w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 text-sm text-gray-800 dark:text-gray-100">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Account Type</label>
                            <input type="text" name="accountType" placeholder="E.g. Standard"
                                   class="block w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 text-sm text-gray-800 dark:text-gray-100">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Currency</label>
                            <input type="text" name="currency" placeholder="E.g. USD"
                                   class="block w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 text-sm text-gray-800 dark:text-gray-100">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Leverage</label>
                            <input type="text" name="leverage" placeholder="E.g. 1:500"
                                   class="block w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 text-sm text-gray-800 dark:text-gray-100">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Server</label>
                            <input type="text" name="server" placeholder="E.g. HantecGlobal-live"
                                   class="block w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 text-sm text-gray-800 dark:text-gray-100">
                            <small class="text-xs text-gray-500 dark:text-gray-400 mt-1 block">
                                Amount will be deducted from your account balance.
                            </small>
                        </div>
                    </div>

                    <div class="text-center">
                        <button type="submit"
                                class="w-full bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-semibold py-2 px-4 rounded-lg transition flex items-center justify-center gap-2 disabled:opacity-50 disabled:cursor-not-allowed"
                                :disabled="loading">
                            <svg x-show="loading" class="animate-spin h-4 w-4" fill="none" viewBox="0 0 24 24"
                                 xmlns="http://www.w3.org/2000/svg">
                                <circle class="opacity-25" cx="12" cy="12" r="10"
                                        stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor"
                                      d="M4 12a8 8 0 018-8v4l3-3-3-3v4a8 8 0 00-8 8z"></path>
                            </svg>
                            <span x-show="!loading">Subscribe</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection

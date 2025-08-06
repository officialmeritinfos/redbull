@extends('layouts.dashboard')

@section('title', $pageName ?? 'Transfer Funds')

@section('content')
    <div class="max-w-3xl mx-auto px-4 py-8 space-y-6">

        {{-- Balance Card --}}
        <div class="bg-white dark:bg-gray-900 rounded-xl border border-gray-200 dark:border-gray-700 shadow-sm p-6 flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-500 dark:text-gray-400">Account Balance</p>
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white">${{ number_format($user->balance, 2) }}</h2>
            </div>
            <div class="w-10 h-10 flex items-center justify-center bg-blue-100 text-blue-600 rounded-full dark:bg-blue-900 dark:text-blue-300">
                <i class="fas fa-wallet text-lg"></i>
            </div>
        </div>

        {{-- Notifications --}}
        @include('templates.notification')

        {{-- Transfer Form --}}
        <div class="bg-white dark:bg-gray-900 rounded-xl border border-blue-500/40 dark:border-blue-400/30 shadow-sm p-6">
            <h2 class="text-lg font-semibold text-blue-700 dark:text-blue-400 mb-4">{{ $pageName }}</h2>
            <form method="POST" action="{{ route('transfer.new') }}" class="space-y-4">
                @csrf

                {{-- Recipient Username --}}
                <div>
                    <label for="username" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Recipient Username</label>
                    <input type="text" name="username" id="username" placeholder="e.g. john_doe"
                           class="block w-full px-4 py-2 rounded-lg bg-gray-50 dark:bg-gray-800 border border-gray-300 dark:border-gray-700 text-sm text-gray-800 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-400" />
                </div>

                {{-- Amount --}}
                <div>
                    <label for="amount" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Amount ($)</label>
                    <input type="number" name="amount" id="amount" placeholder="e.g. 100"
                           class="block w-full px-4 py-2 rounded-lg bg-gray-50 dark:bg-gray-800 border border-gray-300 dark:border-gray-700 text-sm text-gray-800 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-400" />
                </div>

                {{-- Password --}}
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Account Password</label>
                    <input type="password" name="password" id="password" placeholder="Confirm with your password"
                           class="block w-full px-4 py-2 rounded-lg bg-gray-50 dark:bg-gray-800 border border-gray-300 dark:border-gray-700 text-sm text-gray-800 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-400" />
                </div>

                {{-- Charges --}}
                <p class="text-xs text-gray-500 dark:text-gray-400">Transfer Charges: <strong>{{ $web->transferCharge }}%</strong></p>

                {{-- Submit --}}
                @if ($user->canLoan == 1)
                    <button type="submit"
                            class="w-full inline-flex items-center justify-center px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-semibold rounded-lg transition dark:bg-blue-500 dark:hover:bg-blue-600">
                        <i class="fas fa-paper-plane mr-2"></i> Proceed
                    </button>
                @else
                    <div class="text-center text-red-600 dark:text-red-400 text-sm mt-2">
                        Transfer is disabled. Please contact support for more information.
                    </div>
                @endif
            </form>
        </div>

        {{-- Transfer History --}}
        <div class="bg-white dark:bg-gray-900 border border-dashed border-gray-300 dark:border-gray-700 rounded-xl shadow-sm">
            <div class="p-4 border-b border-gray-100 dark:border-gray-800">
                <h2 class="text-sm font-medium text-gray-700 dark:text-gray-300">Transfer History</h2>
            </div>

            @if ($transfers->count())
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-100 dark:divide-gray-800 text-sm">
                        <thead class="bg-gray-50 dark:bg-gray-800">
                        <tr>
                            <th class="px-4 py-3 text-left font-semibold text-gray-700 dark:text-gray-300">Recipient</th>
                            <th class="px-4 py-3 text-left font-semibold text-gray-700 dark:text-gray-300">Sender</th>
                            <th class="px-4 py-3 text-left font-semibold text-gray-700 dark:text-gray-300">Amount</th>
                            <th class="px-4 py-3 text-left font-semibold text-gray-700 dark:text-gray-300">Sent At</th>
                            <th class="px-4 py-3 text-left font-semibold text-gray-700 dark:text-gray-300">Status</th>
                        </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-900 divide-y divide-gray-100 dark:divide-gray-800">
                        @foreach($transfers as $account)
                            <tr>
                                <td class="px-4 py-2">{{ $account->recipientHolder }}</td>
                                <td class="px-4 py-2">{{ $injected->getInvestorUsername($account->sender) }}</td>
                                <td class="px-4 py-2">${{ number_format($account->amount, 2) }}</td>
                                <td class="px-4 py-2">{{ $account->created_at->format('M d, Y') }}</td>
                                <td class="px-4 py-2">
                                    @switch($account->status)
                                        @case(1)
                                            <span class="text-xs font-medium bg-green-100 text-green-700 px-2 py-1 rounded dark:bg-green-800 dark:text-green-300">Completed</span>
                                            @break
                                        @case(2)
                                            <span class="text-xs font-medium bg-blue-100 text-blue-700 px-2 py-1 rounded dark:bg-blue-800 dark:text-blue-300">Pending</span>
                                            @break
                                        @case(4)
                                            <span class="text-xs font-medium bg-indigo-100 text-indigo-700 px-2 py-1 rounded dark:bg-indigo-800 dark:text-indigo-300">Ongoing</span>
                                            @break
                                        @default
                                            <span class="text-xs font-medium bg-red-100 text-red-700 px-2 py-1 rounded dark:bg-red-800 dark:text-red-300">Cancelled</span>
                                            @break
                                    @endswitch
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                {{-- Empty State --}}
                <div class="text-center py-10">
                    <div class="text-5xl text-gray-300 dark:text-gray-700 mb-4">
                        <i class="fas fa-exchange-alt"></i>
                    </div>
                    <h2 class="text-lg font-semibold text-gray-800 dark:text-white">No transfers yet</h2>
                    <p class="text-sm text-gray-500 dark:text-gray-400 mt-2">You haven’t sent any funds yet.</p>
                </div>
            @endif
        </div>
    </div>
@endsection

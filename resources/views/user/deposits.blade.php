@extends('layouts.dashboard')

@section('title', 'Deposit History')

@section('content')
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8 space-y-6">
        <div class="flex justify-between items-center">
            <h2 class="text-lg font-semibold text-gray-800 dark:text-white">Deposit History</h2>

            <a href="{{ route('new_deposit') }}"
               class="inline-flex items-center px-4 py-2 rounded-lg bg-blue-600 text-white text-sm font-medium shadow hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600 transition">
                <i class="fa fa-plus mr-2"></i> New Deposit
            </a>
        </div>

        @forelse ($deposits as $deposit)
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow p-4 space-y-2">
                <div class="flex justify-between items-center">
                    <div>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Ref</p>
                        <h4 class="text-sm font-semibold text-gray-800 dark:text-white">{{ $deposit->reference }}</h4>
                    </div>
                    <div>
                        @switch($deposit->status)
                            @case(1)
                                <span class="px-3 py-1 text-xs font-medium rounded-full bg-green-100 text-green-700 dark:bg-green-700/20 dark:text-green-300">Completed</span>
                                @break
                            @case(2)
                                <span class="px-3 py-1 text-xs font-medium rounded-full bg-blue-100 text-blue-700 dark:bg-blue-700/20 dark:text-blue-300">Pending</span>
                                @break
                            @case(3)
                                <span class="px-3 py-1 text-xs font-medium rounded-full bg-red-100 text-red-700 dark:bg-red-700/20 dark:text-red-300">Cancelled</span>
                                @break
                            @default
                                <span class="px-3 py-1 text-xs font-medium rounded-full bg-gray-100 text-gray-700 dark:bg-gray-700/20 dark:text-gray-300">Partial</span>
                        @endswitch
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4 text-sm text-gray-700 dark:text-gray-200 mt-2">
                    <div>
                        <p class="text-xs text-gray-500 dark:text-gray-400">Amount</p>
                        <p>${{ number_format($deposit->amount, 2) }}</p>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500 dark:text-gray-400">Asset</p>
                        <p>{{ $deposit->asset }}</p>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500 dark:text-gray-400">Deposit Ref</p>
                        <p>{{ $deposit->paymentRef }}</p>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500 dark:text-gray-400">Date</p>
                        <p>{{ $deposit->created_at->format('Y-m-d H:i') }}</p>
                    </div>
                </div>

                <div class="pt-4">
                    <a href="{{ route('deposit_detail', ['id' => $deposit->id]) }}"
                       class="inline-flex items-center text-sm text-blue-600 hover:underline dark:text-blue-400">
                        <i class="fa fa-eye mr-1"></i> View Details
                    </a>
                </div>
            </div>
        @empty
            <div class="flex flex-col items-center justify-center text-center py-10 px-4 bg-white dark:bg-gray-900 border border-dashed border-gray-200 dark:border-gray-700 rounded-xl shadow-sm">
                {{-- Icon --}}
                <div class="mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-400 dark:text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2a4 4 0 018 0v2m-4-4v-2m0 6v2m-4-2v2m-4-6a4 4 0 00-4 4v2a2 2 0 002 2h12a2 2 0 002-2v-2a4 4 0 00-4-4H7z" />
                    </svg>
                </div>

                {{-- Title --}}
                <h3 class="text-lg font-semibold text-gray-800 dark:text-white">No Deposits Yet</h3>

                {{-- Message --}}
                <p class="mt-2 text-sm text-gray-500 dark:text-gray-400 max-w-md">
                    You haven’t made any deposits yet. When you do, they’ll show up here for easy tracking.
                </p>

                {{-- Call to Action --}}
                <a href="{{ route('new_deposit') }}"
                   class="mt-6 inline-flex items-center px-5 py-2.5 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-lg transition dark:bg-blue-500 dark:hover:bg-blue-600">
                    <i class="fa fa-plus mr-2"></i> Make Your First Deposit
                </a>
            </div>

        @endforelse

        {{-- Pagination --}}
        <div class="pt-6">
            {{ $deposits->links() }}
        </div>
    </div>
@endsection

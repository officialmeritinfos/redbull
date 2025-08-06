@extends('layouts.dashboard')

@section('title', 'My Investments')

@section('content')
    <div class="max-w-3xl mx-auto px-4 py-8 space-y-6">
        {{-- Notification --}}
        @include('templates.notification')

        {{-- Page Heading --}}
        <div class="text-center">
            <h1 class="text-xl font-bold text-gray-900 dark:text-white">My Investments</h1>
            <p class="text-sm text-gray-500 dark:text-gray-400">All your current and past investments are listed below.</p>

            <a href="{{ route('new_investment') }}"
               class="inline-flex items-center mt-4 px-4 py-2 rounded-lg bg-blue-600 text-white text-sm font-medium shadow hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600 transition">
                <i class="fa fa-plus mr-2"></i> New Investment
            </a>
        </div>

        {{-- Investment Cards --}}
        @forelse($investments as $investment)
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm p-6 space-y-4">
                <div class="flex justify-between items-center">
                    <h2 class="text-sm font-medium text-gray-600 dark:text-gray-300">Reference</h2>
                    <span class="text-sm font-semibold text-blue-600 dark:text-blue-400">#{{ $investment->reference }}</span>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-sm">
                    <div>
                        <p class="text-gray-500 dark:text-gray-400">Amount</p>
                        <p class="text-gray-800 dark:text-white font-medium">${{ number_format($investment->amount, 2) }}</p>
                    </div>
                    <div>
                        <p class="text-gray-500 dark:text-gray-400">Service</p>
                        <p class="text-gray-800 dark:text-white font-medium">{{ $investment->service ?? 'N/A' }}</p>
                    </div>
                    <div>
                        <p class="text-gray-500 dark:text-gray-400">ROI</p>
                        <p class="text-gray-800 dark:text-white font-medium">{{ $investment->roi }}%</p>
                    </div>
                    <div>
                        <p class="text-gray-500 dark:text-gray-400">Current Profit</p>
                        <p class="text-gray-800 dark:text-white font-medium">${{ $investment->currentProfit }}</p>
                    </div>
                    <div>
                        <p class="text-gray-500 dark:text-gray-400">Date Initiated</p>
                        <p class="text-gray-800 dark:text-white font-medium">{{ $investment->created_at->format('Y-m-d') }}</p>
                    </div>
                    <div>
                        <p class="text-gray-500 dark:text-gray-400">Status</p>
                        @switch($investment->status)
                            @case(1)
                                <span class="inline-block px-2 py-1 text-xs font-medium bg-green-100 text-green-700 dark:bg-green-700/20 dark:text-green-300 rounded-full">Completed</span>
                                @break
                            @case(2)
                                <span class="inline-block px-2 py-1 text-xs font-medium bg-blue-100 text-blue-700 dark:bg-blue-700/20 dark:text-blue-300 rounded-full">Pending Payment</span>
                                @break
                            @case(3)
                                <span class="inline-block px-2 py-1 text-xs font-medium bg-red-100 text-red-700 dark:bg-red-700/20 dark:text-red-300 rounded-full">Cancelled</span>
                                @break
                            @default
                                <span class="inline-block px-2 py-1 text-xs font-medium bg-yellow-100 text-yellow-700 dark:bg-yellow-700/20 dark:text-yellow-300 rounded-full">Ongoing</span>
                                @break
                        @endswitch
                    </div>
                </div>

                {{-- Action --}}
                <div class="pt-4 text-right">
                    <a href="{{ route('invest_detail', ['id' => $investment->id]) }}"
                       class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 rounded-lg transition">
                        <i class="fas fa-eye mr-2"></i> View Details
                    </a>
                </div>
            </div>
        @empty
            <div class="flex flex-col items-center justify-center text-center py-10 px-4 bg-white dark:bg-gray-800 border border-dashed border-gray-200 dark:border-gray-700 rounded-xl shadow-sm">
                {{-- Icon --}}
                <div class="mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-400 dark:text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2a4 4 0 018 0v2m-4-4v-2m0 6v2m-4-2v2m-4-6a4 4 0 00-4 4v2a2 2 0 002 2h12a2 2 0 002-2v-2a4 4 0 00-4-4H7z" />
                    </svg>
                </div>

                {{-- Title --}}
                <h3 class="text-lg font-semibold text-gray-800 dark:text-white">No Investments Yet</h3>

                {{-- Message --}}
                <p class="mt-2 text-sm text-gray-500 dark:text-gray-400 max-w-md">
                    You haven’t made any investment yet. When you do, they’ll show up here for easy tracking.
                </p>

                {{-- Call to Action --}}
                <a href="{{ route('new_investment') }}"
                   class="mt-6 inline-flex items-center px-5 py-2.5 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-lg transition dark:bg-blue-500 dark:hover:bg-blue-600">
                    <i class="fa fa-plus mr-2"></i> Make Your First Investment
                </a>
            </div>
        @endforelse

        {{-- Pagination --}}
        <div class="pt-6">
            {{ $investments->links() }}
        </div>
    </div>
@endsection

@extends('layouts.dashboard')

@section('title', $pageName ?? 'Withdrawals')

@section('content')
    <div class="max-w-3xl mx-auto px-4 py-8 space-y-6">

        {{-- Page Header --}}
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-xl font-bold text-gray-900 dark:text-white">{{ $pageName ?? 'Withdrawals' }}</h1>
                <p class="text-sm text-gray-500 dark:text-gray-400">Track your withdrawal requests and their statuses.</p>
            </div>

            {{-- New Withdrawal Button --}}
            <a href="{{ route('new_withdrawal') }}"
               class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold rounded-lg transition dark:bg-blue-500 dark:hover:bg-blue-600">
                <i class="fas fa-plus mr-1"></i> New
            </a>
        </div>

        {{-- Notifications --}}
        @include('templates.notification')

        {{-- Withdrawals List --}}
        @if ($withdrawals->count())
            <div class="space-y-4">
                @foreach ($withdrawals as $withdrawal)
                    <div x-data="{ open: false }" class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-xl shadow-sm overflow-hidden">
                        {{-- Header --}}
                        <button @click="open = !open" class="w-full px-4 py-4 flex items-center justify-between text-left">
                            <div class="flex-1">
                                <h3 class="text-sm font-semibold text-gray-800 dark:text-white">Ref: {{ $withdrawal->reference }}</h3>
                                <p class="text-sm text-gray-500 dark:text-gray-400">
                                    Amount: ${{ number_format($withdrawal->amount, 2) }}
                                </p>
                            </div>
                            <div class="ml-4">
                                @switch($withdrawal->status)
                                    @case(1)
                                        <span class="text-xs font-semibold bg-green-100 text-green-700 px-2 py-1 rounded dark:bg-green-800 dark:text-green-300">Completed</span>
                                        @break
                                    @case(2)
                                        <span class="text-xs font-semibold bg-blue-100 text-blue-700 px-2 py-1 rounded dark:bg-blue-800 dark:text-blue-300">Pending</span>
                                        @break
                                    @case(3)
                                        <span class="text-xs font-semibold bg-red-100 text-red-700 px-2 py-1 rounded dark:bg-red-800 dark:text-red-300">Cancelled</span>
                                        @break
                                    @default
                                        <span class="text-xs font-semibold bg-yellow-100 text-yellow-700 px-2 py-1 rounded dark:bg-yellow-700 dark:text-yellow-100">Processing</span>
                                        @break
                                @endswitch
                            </div>
                        </button>

                        {{-- Body --}}
                        <div x-show="open" x-transition
                             class="px-4 pb-4 text-sm text-gray-600 dark:text-gray-300 space-y-2"
                             x-cloak>
                            <div class="border-t border-dashed border-gray-200 dark:border-gray-700 pt-4">
                                <p><strong>Wallet Address:</strong> {{ $withdrawal->details }}</p>
                                <p><strong>Asset:</strong> {{ $withdrawal->asset }}</p>
                                <p><strong>Source:</strong> {{ $withdrawal->source ?? 'N/A' }}</p>
                                <p><strong>Date:</strong> {{ $withdrawal->created_at->format('M d, Y') }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Pagination --}}
            <div class="pt-6">
                {{ $withdrawals->links() }}
            </div>
        @else
            {{-- Empty State --}}
            <div class="text-center py-20 bg-white dark:bg-gray-900 border border-dashed border-gray-200 dark:border-gray-700 rounded-xl">
                <div class="text-5xl text-gray-300 dark:text-gray-700 mb-4">
                    <i class="fas fa-money-check-alt"></i>
                </div>
                <h2 class="text-lg font-semibold text-gray-800 dark:text-white">No withdrawals yet</h2>
                <p class="text-sm text-gray-500 dark:text-gray-400 mt-2">
                    You haven’t made any withdrawal requests. Start by requesting one.
                </p>
                <a href="{{ route('new_withdrawal') }}"
                   class="inline-flex mt-6 items-center px-5 py-2.5 bg-primary-600 hover:bg-primary-700 text-white text-sm font-medium rounded-lg transition dark:bg-primary-500 dark:hover:bg-primary-600">
                    <i class="fas fa-plus mr-2"></i> Request Withdrawal
                </a>
            </div>
        @endif
    </div>
@endsection

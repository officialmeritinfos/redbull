@extends('layouts.dashboard')

@section('title', 'Investment Details')

@section('content')
    <div class="max-w-3xl mx-auto px-4 py-10 space-y-6">
        @include('templates.notification')

        {{-- Header --}}
        <div class="text-center space-y-1">
            <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Investment Summary</h1>
            <p class="text-sm text-gray-500 dark:text-gray-400">Ref: <span class="font-medium">#{{ $investment->reference }}</span></p>
        </div>

        {{-- Investment Details --}}
        <div class="rounded-xl bg-white dark:bg-gray-900 shadow border border-gray-200 dark:border-gray-800 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-100 dark:border-gray-800">
                <p class="text-sm text-gray-500 dark:text-gray-400">Started on:</p>
                <p class="text-base font-semibold text-gray-900 dark:text-white">{{ $investment->created_at->format('d M Y') }}</p>
            </div>
            <div class="px-6 py-4 space-y-3">
                <div class="flex justify-between items-center">
                    <span class="text-sm font-medium text-gray-600 dark:text-gray-300">Status</span>
                    @switch($investment->status)
                        @case(1)
                            <span class="inline-flex items-center px-3 py-1 rounded-full bg-green-100 text-green-700 text-xs font-semibold">Completed</span>
                            @break
                        @case(2)
                            <span class="inline-flex items-center px-3 py-1 rounded-full bg-blue-100 text-blue-700 text-xs font-semibold">Pending</span>
                            @break
                        @case(3)
                            <span class="inline-flex items-center px-3 py-1 rounded-full bg-red-100 text-red-700 text-xs font-semibold">Cancelled</span>
                            @break
                        @default
                            <span class="inline-flex items-center px-3 py-1 rounded-full bg-yellow-100 text-yellow-700 text-xs font-semibold">Ongoing</span>
                    @endswitch
                </div>

                <div class="flex justify-between items-center">
                    <span class="text-sm font-medium text-gray-600 dark:text-gray-300">Service</span>
                    <span class="text-sm text-gray-800 dark:text-white">{{ $investment->service ?? 'N/A' }}</span>
                </div>

                <div class="flex justify-between items-center">
                    <span class="text-sm font-medium text-gray-600 dark:text-gray-300">Asset</span>
                    <span class="text-sm text-gray-800 dark:text-white">{{ $investment->asset }}</span>
                </div>
            </div>
        </div>

        {{-- Amounts --}}
        <div class="rounded-xl bg-white dark:bg-gray-900 shadow border border-gray-200 dark:border-gray-800 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-100 dark:border-gray-800 font-semibold text-gray-900 dark:text-white">
                Financial Overview
            </div>
            <div class="px-6 py-4 divide-y divide-gray-100 dark:divide-gray-800 text-sm text-gray-600 dark:text-gray-300 space-y-3">
                <div class="flex justify-between pt-1">
                    <span>Amount Invested</span>
                    <span class="font-medium text-gray-800 dark:text-white">${{ number_format($investment->amount, 2) }}</span>
                </div>
                <div class="flex justify-between pt-3">
                    <span>Current Profit</span>
                    <span class="font-medium text-gray-800 dark:text-white">${{ number_format($investment->currentProfit, 2) }}</span>
                </div>
                <div class="flex justify-between pt-3">
                    <span>ROI</span>
                    <span class="font-medium text-gray-800 dark:text-white">{{ $investment->roi }}%</span>
                </div>
                <div class="flex justify-between pt-3">
                    <span>Expected Total Profit</span>
                    <span class="font-medium text-gray-800 dark:text-white">
                        ${{ number_format($investment->profitPerReturn * $investment->numberOfReturns, 2) }}
                    </span>
                </div>
            </div>
        </div>

        {{-- Return Timeline --}}
        <div class="rounded-xl bg-white dark:bg-gray-900 shadow border border-gray-200 dark:border-gray-800 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-100 dark:border-gray-800 font-semibold text-gray-900 dark:text-white">
                Return Timeline
            </div>
            <div class="px-6 py-4 divide-y divide-gray-100 dark:divide-gray-800 text-sm text-gray-600 dark:text-gray-300 space-y-3">
                <div class="flex justify-between pt-1">
                    <span>Duration</span>
                    <span class="font-medium text-gray-800 dark:text-white">{{ $investment->duration }}</span>
                </div>
                <div class="flex justify-between pt-3">
                    <span>Returns Completed</span>
                    <span class="font-medium text-gray-800 dark:text-white">{{ $investment->currentReturn }}</span>
                </div>
                <div class="flex justify-between pt-3">
                    <span>Total Returns</span>
                    <span class="font-medium text-gray-800 dark:text-white">{{ $investment->numberOfReturns }}</span>
                </div>
                <div class="flex justify-between pt-3">
                    <span>Next Return Date</span>
                    <span class="font-medium text-gray-800 dark:text-white">{{ date('d M Y h:i:s a', $investment->nextReturn) }}</span>
                </div>
                <div class="flex justify-between pt-3">
                    <span>Profit Per Return</span>
                    <span class="font-medium text-gray-800 dark:text-white">${{ number_format($investment->profitPerReturn, 2) }}</span>
                </div>
            </div>
        </div>

        {{-- Optional: QR Payment Instructions
        @if($investment->source === 'balance')
            <div class="bg-white dark:bg-gray-900 shadow rounded-xl p-6 border border-gray-200 dark:border-gray-800 space-y-4 text-center">
                <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data={{ $investment->wallet }}" alt="QR Code" class="mx-auto">
                <p class="text-sm text-gray-500 dark:text-gray-400">Send <strong>{{ number_format($investment->amount, 2) }} {{ $investment->asset }}</strong> to the address below:</p>
                <p id="address" class="text-base font-medium text-gray-900 dark:text-white break-words">{{ $investment->wallet }}</p>
                <button data-clipboard-target="#address"
                        class="inline-flex items-center gap-2 px-4 py-2 text-sm font-semibold text-white bg-blue-600 hover:bg-blue-700 rounded-lg transition">
                    <i class="fas fa-copy"></i> Copy Wallet Address
                </button>
                <p class="text-xs text-gray-500 dark:text-gray-400 mt-2">Contact support after payment for instant crediting.</p>
            </div>
        @endif --}}
    </div>
@endsection

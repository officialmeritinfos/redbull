@extends('layouts.dashboard')

@section('title', 'Deposit Invoice')

@section('content')
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-10 space-y-6">
        @include('templates.notification')

        {{-- Invoice Header --}}
        <div class="bg-white dark:bg-gray-800 shadow-sm rounded-xl p-6">
            <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center">
                <div>
                    <h2 class="text-lg font-semibold text-gray-800 dark:text-white">Invoice</h2>
                    <p class="text-sm text-gray-500 dark:text-gray-400">
                        ID: <span class="font-medium text-blue-600 dark:text-blue-400">#{{ $deposit->reference }}</span>
                    </p>
                </div>
                <div class="mt-4 sm:mt-0">
                    @switch($deposit->status)
                        @case(1)
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-700 dark:bg-green-700/20 dark:text-green-300">Completed</span>
                            @break
                        @case(2)
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-700 dark:bg-blue-700/20 dark:text-blue-300">Pending</span>
                            @break
                        @case(3)
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-red-100 text-red-700 dark:bg-red-700/20 dark:text-red-300">Cancelled</span>
                            @break
                        @default
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-gray-100 text-gray-700 dark:bg-gray-700/20 dark:text-gray-300">Partial</span>
                    @endswitch
                </div>
            </div>
        </div>

        {{-- Details Section --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            {{-- User Info --}}
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm p-6 space-y-2">
                <h3 class="text-sm font-semibold text-gray-700 dark:text-gray-300">Billed To</h3>
                <p class="text-sm text-gray-800 dark:text-white">{{ $user->name }}</p>
                <p class="text-sm text-gray-500 dark:text-gray-400">{{ $web->address }}</p>
                <p class="text-sm text-gray-500 dark:text-gray-400"><i class="fas fa-phone mr-1"></i>{{ $web->phone }}</p>
            </div>

            {{-- Invoice Meta --}}
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm p-6 space-y-2">
                <h3 class="text-sm font-semibold text-gray-700 dark:text-gray-300">Invoice Details</h3>
                <p class="text-sm text-gray-500 dark:text-gray-400">ID: <span class="text-gray-800 dark:text-white">#{{ $deposit->reference }}</span></p>
                <p class="text-sm text-gray-500 dark:text-gray-400">Created: <span class="text-gray-800 dark:text-white">{{ $deposit->created_at->format('Y-m-d H:i') }}</span></p>
            </div>
        </div>

        {{-- Table --}}
        <div class="overflow-x-auto rounded-xl shadow-sm">
            <table class="min-w-full text-sm bg-white dark:bg-gray-800 text-left">
                <thead class="bg-blue-600 text-white">
                <tr>
                    <th class="px-4 py-3">#</th>
                    <th class="px-4 py-3">Description</th>
                    <th class="px-4 py-3">Amount</th>
                    <th class="px-4 py-3">Asset</th>
                    <th class="px-4 py-3">Address</th>
                </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                <tr>
                    <td class="px-4 py-4">1</td>
                    <td class="px-4 py-4">Account Funding</td>
                    <td class="px-4 py-4">${{ number_format($deposit->amount, 2) }}</td>
                    <td class="px-4 py-4">{{ $deposit->asset }}</td>
                    <td class="px-4 py-4">{{ $deposit->details }}</td>
                </tr>
                </tbody>
            </table>
        </div>

        {{-- Payment Instructions --}}
        <div class="bg-blue-50 dark:bg-blue-900/10 text-blue-800 dark:text-blue-300 rounded-xl p-6 shadow space-y-4">
            @if($deposit->paymentMethod == 1)
                <p>
                    Please send <strong>{{ number_format($deposit->cryptoAmount, 5) }} {{ $deposit->asset }}</strong> to the address below.
                    Your account will be credited once payment is confirmed. Do not send less than the exact amount.
                </p>
            @else
                <p>
                    Please send <strong>${{ number_format($deposit->amount, 2) }} worth of {{ $deposit->asset }}</strong> to the address below.
                    After payment, contact support for instant confirmation.
                </p>
            @endif

            <div
                x-data="{ copy() { navigator.clipboard.writeText('{{ $deposit->details }}').then(() => toastr.success('Address copied to clipboard')) } }"
                class="flex flex-wrap items-center gap-3"
            >
                <div
                    id="address"
                    class="bg-gray-100 dark:bg-gray-800 px-4 py-2 rounded text-sm break-all font-mono"
                >
                    {{ $deposit->details }}
                </div>

                <button
                    @click="copy"
                    type="button"
                    class="px-4 py-2 rounded bg-blue-600 hover:bg-blue-700 text-white text-sm transition"
                >
                    Copy Address
                </button>
            </div>
        </div>


        {{-- Cancel Button --}}
        @if($deposit->status == 2)
            <div class="text-center pt-6">
                <a href="{{ route('deposit.cancel', ['id' => $deposit->id]) }}"
                   class="inline-flex items-center justify-center px-6 py-2.5 bg-red-600 hover:bg-red-700 text-white text-sm font-medium rounded-lg transition focus:outline-none">
                    <i class="fas fa-ban mr-2"></i> Cancel Deposit
                </a>
            </div>
        @endif
    </div>
@endsection

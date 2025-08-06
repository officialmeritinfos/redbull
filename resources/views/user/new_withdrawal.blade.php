@extends('layouts.dashboard')

@section('title', $pageName ?? 'New Withdrawal')

@section('content')
    <div x-data="{ submitting: false }" class="max-w-xl mx-auto px-4 py-10 space-y-6">
        {{-- Page Header --}}
        <div class="text-center">
            <h1 class="text-2xl font-bold text-gray-900 dark:text-white">{{ $pageName ?? 'New Withdrawal' }}</h1>
            <p class="text-sm text-gray-500 dark:text-gray-400">Fill in the form to request a withdrawal.</p>
        </div>

        {{-- Form Card --}}
        <div class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-800 shadow-xl rounded-2xl overflow-hidden">
            {{-- Card Header --}}
            <div class="px-6 py-4 border-b border-gray-100 dark:border-gray-800 bg-gray-50 dark:bg-gray-800/40">
                <h2 class="text-sm font-semibold text-gray-700 dark:text-gray-300 uppercase tracking-wide">
                    Withdraw Funds
                </h2>
            </div>

            {{-- Card Body --}}
            <div class="px-6 py-6">
                @include('templates.notification')

                <form method="POST" action="{{ route('withdraw.new') }}" @submit="submitting = true" class="space-y-6">
                    @csrf

                    {{-- Amount --}}
                    <div>
                        <label for="amount" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                            Amount ($)
                        </label>
                        <input
                            type="number"
                            name="amount"
                            id="amount"
                            step="any"
                            min="0"
                            required
                            placeholder="Enter amount"
                            class="block w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 text-gray-800 dark:text-white focus:ring-primary-500 focus:border-primary-500 transition"
                        >
                    </div>

                    {{-- Asset --}}
                    <div>
                        <label for="asset" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                            Asset
                        </label>
                        <select
                            name="asset"
                            id="asset"
                            required
                            class="block w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 text-gray-800 dark:text-white focus:ring-primary-500 focus:border-primary-500 transition"
                        >
                            <option value="">Select an Asset</option>
                            @foreach($coins as $coin)
                                <option value="{{ $coin->asset }}">{{ $coin->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Wallet Address --}}
                    <div>
                        <label for="wallet" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                            Wallet Address
                        </label>
                        <input
                            type="text"
                            name="wallet"
                            id="wallet"
                            required
                            placeholder="Enter address"
                            class="block w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 text-gray-800 dark:text-white focus:ring-primary-500 focus:border-primary-500 transition"
                        >
                    </div>

                    {{-- Account Type --}}
                    <div>
                        <label for="account" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                            Account
                        </label>
                        <select
                            name="account"
                            id="account"
                            required
                            class="block w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 text-gray-800 dark:text-white focus:ring-primary-500 focus:border-primary-500 transition"
                        >
                            <option value="">Select Account</option>
                            <option value="1">Profit Balance</option>
                            <option value="2">Referral Balance</option>
                            <option value="3">Bonus Balance</option>
                        </select>
                    </div>

                    {{-- Submit --}}
                    <div class="pt-4 text-center">
                        <button type="submit"
                                :disabled="submitting"
                                class="inline-flex items-center justify-center px-6 py-2.5 w-full bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded-lg transition focus:outline-none dark:bg-blue-500 dark:hover:bg-blue-600 disabled:opacity-70">
                            <template x-if="!submitting">
                                <span><i class="fas fa-paper-plane mr-2"></i> Withdraw Now</span>
                            </template>
                            <template x-if="submitting">
                                <div class="flex items-center justify-center gap-2">
                                    <svg class="animate-spin h-4 w-4 text-white" viewBox="0 0 24 24" fill="none">
                                        <circle class="opacity-25" cx="12" cy="12" r="10"
                                                stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor"
                                              d="M4 12a8 8 0 018-8v8H4z"></path>
                                    </svg>
                                    <span>Processing...</span>
                                </div>
                            </template>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

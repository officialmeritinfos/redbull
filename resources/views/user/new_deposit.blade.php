@extends('layouts.dashboard')

@section('title', $pageName ?? 'New Deposit')

@section('content')
    <div x-data="{ submitting: false, selectedAsset: '' }" class="max-w-xl mx-auto px-4 py-10 space-y-6">
        {{-- Page Title --}}
        <div class="text-center">
            <h1 class="text-2xl font-bold text-gray-900 dark:text-white">{{ $pageName ?? 'New Deposit' }}</h1>
            <p class="text-sm text-gray-500 dark:text-gray-400">Securely fund your wallet with any available asset.</p>
        </div>

        {{-- Card Wrapper --}}
        <div class="bg-white dark:bg-gray-900 border border-gray-100 dark:border-gray-800 shadow-xl rounded-2xl overflow-hidden">
            {{-- Header --}}
            <div class="px-6 py-4 border-b border-gray-100 dark:border-gray-800 bg-gray-50 dark:bg-gray-800/50">
                <h2 class="text-sm font-semibold text-gray-700 dark:text-gray-300 uppercase tracking-wider">Deposit Form</h2>
            </div>

            {{-- Form Body --}}
            <div class="px-6 py-6">
                @include('templates.notification')

                <form method="POST" action="{{ route('deposit.new') }}" @submit="submitting = true" class="space-y-6">
                    @csrf

                    {{-- Amount --}}
                    <div class="space-y-1">
                        <label for="amount" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Amount ($)</label>
                        <input
                            type="number"
                            name="amount"
                            id="amount"
                            step="any"
                            min="0"
                            placeholder="Enter amount to deposit"
                            required
                            class="block w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 text-gray-800 dark:text-white focus:ring-primary-500 focus:border-primary-500 transition">
                    </div>

                    {{-- Asset Selector --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Choose Asset</label>
                        <div class="grid grid-cols-2 sm:grid-cols-3 gap-4">
                            @foreach($coins as $coin)
                                <label
                                    class="relative group cursor-pointer p-4 rounded-xl border bg-white dark:bg-gray-800 text-center shadow-sm transition
                                           border-gray-200 dark:border-gray-700 hover:border-blue-500 dark:hover:border-blue-400"
                                    :class="{ 'ring-2 ring-blue-500 dark:ring-blue-400': selectedAsset === '{{ $coin->asset }}' }"
                                >
                                    <input
                                        type="radio"
                                        name="asset"
                                        value="{{ $coin->asset }}"
                                        class="hidden"
                                        @click="selectedAsset = '{{ $coin->asset }}'"
                                        required
                                    >
                                    <span class="text-sm font-semibold text-gray-800 dark:text-white">{{ $coin->name }}</span>
                                    <div class="text-xs text-gray-500 dark:text-gray-400">{{ $coin->asset }}</div>
                                    <div
                                        x-show="selectedAsset === '{{ $coin->asset }}'"
                                        class="absolute top-2 right-2 h-4 w-4 rounded-full bg-blue-600 dark:bg-blue-500"
                                    ></div>
                                </label>
                            @endforeach
                        </div>
                    </div>

                    {{-- Submit --}}
                    <div class="pt-2 text-center">
                        <button type="submit"
                                :disabled="submitting"
                                class="inline-flex items-center justify-center px-6 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded-lg transition focus:outline-none dark:bg-blue-500 dark:hover:bg-blue-600 disabled:opacity-70 w-full">
                            <template x-if="!submitting">
                                <span><i class="fas fa-wallet mr-2"></i> Deposit Now</span>
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

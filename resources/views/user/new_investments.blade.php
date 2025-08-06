@extends('layouts.dashboard')

@section('title', $pageName)

@section('content')
    <div class="max-w-xl mx-auto px-4 py-10 space-y-8" x-data="{ loading: false }" @submit.window="loading = true">

        @include('templates.notification')

        {{-- Page Header --}}
        <div class="text-center">
            <h1 class="text-2xl font-bold text-gray-900 dark:text-white">{{ $pageName }}</h1>
            <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Invest securely and choose the best package for you.</p>
        </div>

        {{-- Investment Form --}}
        <form method="POST" action="{{ route('investment.new') }}" @submit="loading = true" class="space-y-6">
            @csrf

            {{-- Amount --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Amount ($)</label>
                <input type="number" name="amount" placeholder="Enter Amount to Invest"
                       class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 text-sm text-gray-800 dark:text-white focus:outline-none focus:ring-2 focus:ring-primary-500 transition" />
            </div>

            {{-- Package --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Package</label>
                <div class="space-y-3">
                    @foreach($packages as $package)
                        <label class="flex items-center gap-3 p-4 border rounded-lg cursor-pointer bg-white dark:bg-gray-800 border-gray-300 dark:border-gray-700 hover:border-blue-500 transition">
                            <input type="radio" name="package" value="{{ $package->id }}"
                                   class="form-radio text-blue-600 dark:text-blue-500 focus:ring-blue-500" />
                            <div class="text-sm text-gray-700 dark:text-gray-300">
                                <div class="font-medium">{{ $package->name }}</div>
                                <div class="text-xs text-gray-500">
                                    ${{ number_format($package->minAmount, 2) }} -
                                    @if($package->isUnlimited==1)
                                        Unlimited
                                    @else
                                        ${{ number_format($package->maxAmount, 2) }}
                                    @endif
                                    • {{ $package->roi }}% ROI • {{ $package->Duration }}
                                </div>
                            </div>
                        </label>
                    @endforeach
                </div>
            </div>

            {{-- Asset --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Asset</label>
                <div class="space-y-3">
                    @foreach($coins as $coin)
                        <label class="flex items-center gap-3 p-4 border rounded-lg cursor-pointer bg-white dark:bg-gray-800 border-gray-300 dark:border-gray-700 hover:border-blue-500 transition">
                            <input type="radio" name="asset" value="{{ $coin->asset }}"
                                   class="form-radio text-blue-600 dark:text-blue-500 focus:ring-blue-500" />
                            <span class="text-sm text-gray-700 dark:text-gray-300">{{ $coin->name }}</span>
                        </label>
                    @endforeach
                </div>
            </div>

            {{-- Account --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Account</label>
                <div class="space-y-3">
                    <label class="flex items-center gap-3 p-4 border rounded-lg cursor-pointer bg-white dark:bg-gray-800 border-gray-300 dark:border-gray-700 hover:border-blue-500 transition">
                        <input type="radio" name="account" value="1"
                               class="form-radio text-blue-600 dark:text-blue-500 focus:ring-blue-500" />
                        <span class="text-sm text-gray-700 dark:text-gray-300">From Account Balance</span>
                    </label>

                    @if($user->canCompound==1)
                        <label class="flex items-center gap-3 p-4 border rounded-lg cursor-pointer bg-white dark:bg-gray-800 border-gray-300 dark:border-gray-700 hover:border-blue-500 transition">
                            <input type="radio" name="account" value="2"
                                   class="form-radio text-blue-600 dark:text-blue-500 focus:ring-blue-500" />
                            <span class="text-sm text-gray-700 dark:text-gray-300">Reinvest from Profit Balance</span>
                        </label>
                    @endif
                </div>
            </div>

            {{-- Service --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Service</label>
                <div class="space-y-3">
                    @foreach($services as $service)
                        <label class="flex items-center gap-3 p-4 border rounded-lg cursor-pointer bg-white dark:bg-gray-800 border-gray-300 dark:border-gray-700 hover:border-blue-500 transition">
                            <input type="radio" name="service" value="{{ $service->title }}"
                                   class="form-radio text-blue-600 dark:text-blue-500 focus:ring-blue-500" />
                            <span class="text-sm text-gray-700 dark:text-gray-300">{{ $service->title }}</span>
                        </label>
                    @endforeach
                </div>
            </div>

            {{-- Submit --}}
            <div class="text-center">
                <button type="submit"
                        class="w-full inline-flex justify-center items-center gap-2 px-6 py-3 bg-indigo-600 text-white font-semibold text-sm rounded-lg hover:bg-indigo-700 transition focus:outline-none disabled:opacity-70"
                        :disabled="loading">
                    <svg x-show="loading" class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                         viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor"
                              d="M4 12a8 8 0 018-8v8z"></path>
                    </svg>
                    <span x-text="loading ? 'Processing...' : 'Invest Now'"></span>
                </button>
            </div>
        </form>
    </div>
@endsection

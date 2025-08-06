@extends('layouts.dashboard')

@section('title', $pageName ?? 'Loan Application')

@section('content')
    <div class="max-w-3xl mx-auto px-4 py-6 space-y-8">

        {{-- Page Title --}}
        <div class="text-center space-y-1">
            <h1 class="text-xl font-bold text-gray-900 dark:text-white">{{ $pageName ?? 'Apply for a Loan' }}</h1>
            <p class="text-sm text-gray-500 dark:text-gray-400">Fill in the form below to request a loan.</p>
        </div>

        {{-- Loan Form --}}
        <div class="bg-white dark:bg-gray-900 rounded-xl shadow p-6 space-y-5">
            <form method="POST" action="{{ route('loans.new') }}" class="space-y-5"
                  x-data="{ loading: false }"
                  @submit.prevent="loading = true; $el.submit();">
                @csrf
                @include('templates.notification')

                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Amount</label>
                    <input type="number" step="0.01" name="amount" placeholder="Enter loan amount"
                           class="w-full rounded-lg border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 text-gray-900 dark:text-white px-4 py-2 text-sm focus:outline-none focus:ring focus:ring-primary-500" />
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Loan Type</label>
                    <select name="loanType"
                            class="w-full rounded-lg border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 text-gray-900 dark:text-white px-4 py-2 text-sm focus:outline-none focus:ring focus:ring-primary-500">
                        <option value="">Select loan type</option>
                        <option>Short Term</option>
                        <option>Mid-Term</option>
                        <option>Long Term</option>
                    </select>
                </div>

                <div class="pt-2">
                    <button type="submit"
                            class="w-full bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-semibold py-2 px-4 rounded-lg transition flex items-center justify-center gap-2 disabled:opacity-50 disabled:cursor-not-allowed"
                            :disabled="loading">
                        <template x-if="loading">
                            <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                                 viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10"
                                        stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor"
                                      d="M4 12a8 8 0 018-8v8H4z"></path>
                            </svg>
                        </template>
                        <span x-text="loading ? 'Submitting...' : 'Submit Application'"></span>
                    </button>
                </div>
            </form>
        </div>

        {{-- Loan List --}}
        <div class="space-y-4">
            <h2 class="text-lg font-semibold text-gray-800 dark:text-white">Your Loan Applications</h2>

            <div class="overflow-x-auto rounded-xl shadow bg-white dark:bg-gray-900">
                <table class="min-w-full text-sm text-left text-gray-700 dark:text-gray-300">
                    <thead class="bg-gray-50 dark:bg-gray-800 border-b dark:border-gray-700">
                    <tr>
                        <th class="px-4 py-3 font-semibold">Reference</th>
                        <th class="px-4 py-3 font-semibold">Amount</th>
                        <th class="px-4 py-3 font-semibold">Loan Type</th>
                        <th class="px-4 py-3 font-semibold">Date</th>
                        <th class="px-4 py-3 font-semibold">Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($loans as $loan)
                        <tr class="border-t dark:border-gray-800">
                            <td class="px-4 py-3">{{ $loan->reference }}</td>
                            <td class="px-4 py-3">{{ number_format($loan->amount, 2) }}</td>
                            <td class="px-4 py-3">{{ $loan->loanType }}</td>
                            <td class="px-4 py-3">{{ \Carbon\Carbon::parse($loan->created_at)->format('d M Y') }}</td>
                            <td class="px-4 py-3">
                                @switch($loan->status)
                                    @case(1)
                                        <span class="inline-block px-2 py-1 text-xs bg-green-100 text-green-700 rounded-full">Active</span>
                                        @break
                                    @case(2)
                                        <span class="inline-block px-2 py-1 text-xs bg-blue-100 text-blue-700 rounded-full">Pending</span>
                                        @break
                                    @case(3)
                                        <span class="inline-block px-2 py-1 text-xs bg-red-100 text-red-700 rounded-full">Cancelled</span>
                                        @break
                                    @default
                                        <span class="inline-block px-2 py-1 text-xs bg-gray-100 text-gray-700 rounded-full">Unknown</span>
                                @endswitch
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-6 text-gray-500 dark:text-gray-400">
                                No loan applications found.
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>

                <div class="p-4">
                    {{ $loans->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection

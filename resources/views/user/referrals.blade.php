@extends('layouts.dashboard')

@section('title', $pageName ?? 'Referrals')

@section('content')
    <div class="px-4 py-6 space-y-6 max-w-3xl mx-auto">

        {{-- Balance Card --}}
        <div class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-xl p-5 shadow-sm flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-500 dark:text-gray-400">Referral Balance</p>
                <h2 class="text-2xl font-bold text-gray-800 dark:text-white">${{ number_format($user->refBal, 2) }}</h2>
            </div>
            <div>
                <i class="fas fa-calendar text-gray-300 text-3xl"></i>
            </div>
        </div>

        {{-- Referral Link --}}
        <div class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-xl p-5 shadow-sm space-y-4" x-data="{ copied: false }">
            <h3 class="text-sm font-medium text-gray-700 dark:text-gray-300">Your Referral Link</h3>
            <div class="relative">
                <input id="refLink"
                       readonly
                       value="{{ route('register', ['referral' => $user->username]) }}"
                       class="w-full bg-gray-100 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-md px-4 py-2 text-sm text-gray-700 dark:text-gray-200 focus:outline-none" />
                <button
                    @click="navigator.clipboard.writeText(document.getElementById('refLink').value).then(() => copied = true)"
                    class="absolute top-1/2 right-2 transform -translate-y-1/2 text-sm font-medium bg-blue-600 hover:bg-blue-700 text-white px-4 py-1.5 rounded-md transition">
                    Copy
                </button>
            </div>
            <p x-show="copied" x-transition class="text-green-600 text-sm mt-2">Copied to clipboard!</p>
        </div>

        {{-- Referrals Table --}}
        <div class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-xl p-5 shadow-sm">
            <h3 class="text-base font-semibold text-gray-800 dark:text-white mb-4">{{ $pageName }}</h3>

            @include('templates.notification')

            <div class="overflow-x-auto">
                <table class="min-w-full text-sm text-left text-gray-600 dark:text-gray-300">
                    <thead>
                    <tr class="bg-gray-100 dark:bg-gray-800 text-gray-600 dark:text-gray-300 text-xs uppercase tracking-wider">
                        <th class="px-4 py-2">Reference</th>
                        <th class="px-4 py-2">Name</th>
                        <th class="px-4 py-2">Email</th>
                        <th class="px-4 py-2">Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse ($referrals as $referral)
                        <tr class="border-t border-gray-100 dark:border-gray-700">
                            <td class="px-4 py-2">{{ $referral->userRef }}</td>
                            <td class="px-4 py-2">{{ $referral->name }}</td>
                            <td class="px-4 py-2">{{ $referral->email }}</td>
                            <td class="px-4 py-2">
                                @switch($referral->status)
                                    @case(1)
                                        <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200">
                                    Active
                                </span>
                                        @break
                                    @default
                                        <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200">
                                    Inactive
                                </span>
                                @endswitch
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-gray-500 dark:text-gray-400 py-6">
                                No referrals yet.
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection

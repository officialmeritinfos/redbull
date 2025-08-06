@extends('layouts.dashboard')

@section('title', 'Membership Application')

@section('content')
    <div class="max-w-2xl mx-auto px-4 py-6 space-y-8">

        {{-- Page Header --}}
        <div class="text-center space-y-1">
            <h1 class="text-xl font-bold text-gray-900 dark:text-white">Membership Application</h1>
            <p class="text-sm text-gray-500 dark:text-gray-400">Fill in your details to become a registered member.</p>
        </div>

        {{-- Form Section --}}
        <div class="bg-white dark:bg-gray-900 shadow rounded-xl p-6 space-y-5">
            <form method="POST" action="{{ route('membership.new') }}" enctype="multipart/form-data" class="space-y-4"
                  x-data="{ loading: false }"
                  @submit.prevent="loading = true; $el.submit();">
                @csrf
                @include('templates.notification')

                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Full Name</label>
                    <input type="text" name="name" placeholder="e.g., Michael Erastus"
                           class="w-full rounded-lg border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 text-gray-800 dark:text-white px-4 py-2 text-sm focus:outline-none focus:ring focus:ring-primary-500" />
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Phone</label>
                    <input type="text" name="phone" placeholder="e.g., +2348123456789"
                           class="w-full rounded-lg border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 text-gray-800 dark:text-white px-4 py-2 text-sm focus:outline-none focus:ring focus:ring-primary-500" />
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Passport Photograph</label>
                    <input type="file" name="selfie"
                           class="w-full rounded-lg border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 text-gray-800 dark:text-white file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-primary-600 file:text-white hover:file:bg-primary-700" />
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Country</label>
                    <input type="text" name="country" placeholder="e.g., Nigeria"
                           class="w-full rounded-lg border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 text-gray-800 dark:text-white px-4 py-2 text-sm focus:outline-none focus:ring focus:ring-primary-500" />
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">State/Region</label>
                    <input type="text" name="state" placeholder="e.g., Lagos"
                           class="w-full rounded-lg border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 text-gray-800 dark:text-white px-4 py-2 text-sm focus:outline-none focus:ring focus:ring-primary-500" />
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Address</label>
                    <textarea name="address" rows="3" placeholder="Enter your full address"
                              class="w-full rounded-lg border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 text-gray-800 dark:text-white px-4 py-2 text-sm focus:outline-none focus:ring focus:ring-primary-500"></textarea>
                </div>

                <div class="pt-2">
                    <button type="submit"
                            class="w-full bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium py-2 px-4 rounded-lg transition flex justify-center items-center gap-2 disabled:opacity-50 disabled:cursor-not-allowed"
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

        {{-- Membership List --}}
        <div class="space-y-4">
            <h2 class="text-lg font-semibold text-gray-800 dark:text-white">Your Membership Applications</h2>

            @forelse ($members as $member)
                <div class="bg-white dark:bg-gray-900 shadow rounded-xl p-4 flex items-start gap-4">
                    <img src="{{ asset('dashboard/user/images/' . $member->selfie) }}"
                         alt="Selfie" class="w-14 h-14 rounded-full object-cover border dark:border-gray-700" />
                    <div class="flex-1 text-sm text-gray-800 dark:text-gray-200 space-y-1">
                        <div class="font-semibold text-primary-600 dark:text-primary-400">{{ $member->name }}</div>
                        <div class="text-xs text-gray-500 dark:text-gray-400">{{ $member->phone }}</div>
                        <div><strong>Country:</strong> {{ $member->country }}</div>
                        <div><strong>State:</strong> {{ $member->state }}</div>
                        <div><strong>Address:</strong> {{ $member->address }}</div>
                        <div class="text-xs text-gray-400">{{ $member->created_at->format('d M Y') }}</div>
                    </div>
                    <div>
                        @switch($member->status)
                            @case(1)
                                <span class="px-2 py-1 text-xs bg-green-100 text-green-700 rounded-full">Active</span>
                                @break
                            @case(2)
                                <span class="px-2 py-1 text-xs bg-blue-100 text-blue-700 rounded-full">Pending</span>
                                @break
                            @case(3)
                                <span class="px-2 py-1 text-xs bg-red-100 text-red-700 rounded-full">Cancelled</span>
                                @break
                        @endswitch
                    </div>
                </div>
            @empty
                <div class="text-center text-sm text-gray-500 dark:text-gray-400 py-4">
                    No membership applications found yet.
                </div>
            @endforelse

            {{-- Pagination --}}
            <div class="pt-2">
                {{ $members->links() }}
            </div>
        </div>
    </div>
@endsection

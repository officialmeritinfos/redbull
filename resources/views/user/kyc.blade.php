@extends('layouts.dashboard')

@section('title', $pageName ?? 'KYC Verification')

@section('content')
    <div class="max-w-2xl mx-auto px-4 py-6 space-y-6">

        @if ($user->isVerified == 2 || $user->isVerified == 3)
            <div class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-xl p-6 shadow-sm space-y-6">
                <h2 class="text-lg font-semibold text-gray-800 dark:text-white">KYC Verification</h2>

                <form x-data="{ submitting: false }"
                      @submit.prevent="submitting = true; $el.submit()"
                      method="POST"
                      action="{{ route('kyc.update') }}"
                      enctype="multipart/form-data"
                      class="space-y-5">
                    @csrf
                    @include('templates.notification')

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-base font-medium text-gray-700 dark:text-gray-300 mb-1">Date of Birth</label>
                            <input type="date" name="dob" value="{{ $user->dateOfBirth }}"
                                   class="w-full rounded-lg border border-gray-300 dark:border-gray-700 bg-gray-50 dark:bg-gray-800 text-base text-gray-800 dark:text-white px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 transition">
                        </div>

                        <div>
                            <label class="block text-base font-medium text-gray-700 dark:text-gray-300 mb-1">Country</label>
                            <input type="text" name="country" value="{{ $user->country }}"
                                   class="w-full rounded-lg border border-gray-300 dark:border-gray-700 bg-gray-50 dark:bg-gray-800 text-base text-gray-800 dark:text-white px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 transition">
                        </div>

                        <div>
                            <label class="block text-base font-medium text-gray-700 dark:text-gray-300 mb-1">ID Type</label>
                            <select name="idType"
                                    class="w-full rounded-lg border border-gray-300 dark:border-gray-700 bg-gray-50 dark:bg-gray-800 text-base text-gray-800 dark:text-white px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 transition">
                                <option value="">Select an option</option>
                                <option>Drivers License</option>
                                <option>National ID Card</option>
                                <option>International Passport</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-base font-medium text-gray-700 dark:text-gray-300 mb-1">ID Number</label>
                            <input type="text" name="idNumber" placeholder="Enter ID Number"
                                   class="w-full rounded-lg border border-gray-300 dark:border-gray-700 bg-gray-50 dark:bg-gray-800 text-base text-gray-800 dark:text-white px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 transition">
                        </div>

                        <div>
                            <label class="block text-base font-medium text-gray-700 dark:text-gray-300 mb-1">ID Image (Front)</label>
                            <div class="relative flex items-center justify-between w-full border border-gray-300 dark:border-gray-700 rounded-lg bg-gray-50 dark:bg-gray-800 px-4 py-3 cursor-pointer transition hover:border-blue-500">
                                <input type="file"
                                       name="frontImage"
                                       accept="image/*"
                                       class="absolute inset-0 opacity-0 cursor-pointer w-full h-full z-10" />
                                <span class="text-sm text-gray-500 dark:text-gray-300">Upload front of ID</span>
                                <i class="fas fa-upload text-gray-400 dark:text-gray-500 text-base"></i>
                            </div>
                        </div>

                        <div>
                            <label class="block text-base font-medium text-gray-700 dark:text-gray-300 mb-1">ID Image (Back) <sup class="text-xs">(optional)</sup></label>
                            <div class="relative flex items-center justify-between w-full border border-gray-300 dark:border-gray-700 rounded-lg bg-gray-50 dark:bg-gray-800 px-4 py-3 cursor-pointer transition hover:border-blue-500">
                                <input type="file"
                                       name="backImage"
                                       accept="image/*"
                                       class="absolute inset-0 opacity-0 cursor-pointer w-full h-full z-10" />
                                <span class="text-sm text-gray-500 dark:text-gray-300">Upload back of ID</span>
                                <i class="fas fa-upload text-gray-400 dark:text-gray-500 text-base"></i>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-4">
                        <div>
                            <label class="block text-base font-medium text-gray-700 dark:text-gray-300 mb-1">Selfie <span class="text-xs text-gray-400">(Your face clearly visible)</span></label>
                            <div class="relative flex items-center justify-between w-full border border-gray-300 dark:border-gray-700 rounded-lg bg-gray-50 dark:bg-gray-800 px-4 py-3 cursor-pointer transition hover:border-blue-500">
                                <input type="file"
                                       name="selfie"
                                       accept="image/*"
                                       class="absolute inset-0 opacity-0 cursor-pointer w-full h-full z-10" />
                                <span class="text-sm text-gray-500 dark:text-gray-300">Upload a selfie</span>
                                <i class="fas fa-camera text-gray-400 dark:text-gray-500 text-base"></i>
                            </div>
                        </div>

                        <div>
                            <label class="block text-base font-medium text-gray-700 dark:text-gray-300 mb-1">Membership ID <span class="text-xs text-gray-400">(Issued by {{ $siteName }})</span></label>
                            <div class="relative flex items-center justify-between w-full border border-gray-300 dark:border-gray-700 rounded-lg bg-gray-50 dark:bg-gray-800 px-4 py-3 cursor-pointer transition hover:border-blue-500">
                                <input type="file"
                                       name="membership"
                                       accept="image/*"
                                       class="absolute inset-0 opacity-0 cursor-pointer w-full h-full z-10" />
                                <span class="text-sm text-gray-500 dark:text-gray-300">Upload membership card</span>
                                <i class="fas fa-id-card text-gray-400 dark:text-gray-500 text-base"></i>
                            </div>
                        </div>
                    </div>

                    <div class="pt-4 text-center">
                        <button type="submit"
                                class="inline-flex items-center justify-center px-6 py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-lg transition"
                                x-bind:disabled="submitting">
                            <svg x-show="submitting" class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z"></path>
                            </svg>
                            <span x-text="submitting ? 'Submitting...' : 'Submit KYC'"></span>
                        </button>
                    </div>
                </form>
            </div>

        @elseif ($user->isVerified == 4)
            <div class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-xl p-6 shadow-sm">
                <h2 class="text-lg font-semibold text-gray-800 dark:text-white mb-2">KYC Under Review</h2>
                <div class="bg-blue-50 dark:bg-blue-900 text-blue-700 dark:text-blue-100 px-4 py-3 rounded-md">
                    <strong>We are currently reviewing your KYC submission.</strong> Please check back later.
                </div>
            </div>

        @else
            <div class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-xl p-6 shadow-sm">
                <h2 class="text-lg font-semibold text-gray-800 dark:text-white mb-2">KYC Verified</h2>
                <div class="bg-green-50 dark:bg-green-900 text-green-700 dark:text-green-100 px-4 py-3 rounded-md">
                    <strong>Your KYC submission has been successfully verified.</strong> Thank you!
                </div>
            </div>
        @endif

    </div>
@endsection

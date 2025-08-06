@extends('layouts.dashboard')

@section('title', $pageName ?? 'Settings')

@section('content')
    <div class="max-w-3xl mx-auto px-4 py-8 space-y-8">

        {{-- Notifications --}}
        @include('templates.notification')

        {{-- Profile Settings --}}
        <div class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-xl shadow-sm p-6 space-y-6">
            <h2 class="text-lg font-semibold text-gray-800 dark:text-white">Profile Settings</h2>

            <form method="POST" action="{{ route('settings.update') }}" class="space-y-4" x-data="{ loading: false, twoWay: '{{ $user->twoWay }}' }" @submit.prevent="loading = true; $el.submit()">
                @csrf

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="text-sm text-gray-700 dark:text-gray-300">Name</label>
                        <input type="text" name="name" value="{{ $user->name }}"
                               class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 text-sm text-gray-800 dark:text-white focus:outline-none focus:ring-2 focus:ring-primary-500 transition">
                    </div>
                    <div>
                        <label class="text-sm text-gray-700 dark:text-gray-300">Email</label>
                        <input type="email" value="{{ $user->email }}" disabled
                               class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 text-sm text-gray-800 dark:text-white focus:outline-none focus:ring-2 focus:ring-primary-500 transition">
                    </div>
                    <div>
                        <label class="text-sm text-gray-700 dark:text-gray-300">Username</label>
                        <input type="text" value="{{ $user->username }}" disabled
                               class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 text-sm text-gray-800 dark:text-white focus:outline-none focus:ring-2 focus:ring-primary-500 transition">
                    </div>
                    <div>
                        <label class="text-sm text-gray-700 dark:text-gray-300">Reference</label>
                        <input type="text" value="{{ $user->userRef }}" disabled
                               class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 text-sm text-gray-800 dark:text-white focus:outline-none focus:ring-2 focus:ring-primary-500 transition">
                    </div>
                    <div>
                        <label class="text-sm text-gray-700 dark:text-gray-300">Phone</label>
                        <input type="text" name="phone" value="{{ $user->phone }}"
                               class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 text-sm text-gray-800 dark:text-white focus:outline-none focus:ring-2 focus:ring-primary-500 transition">
                    </div>
                    <div>
                        <label class="text-sm text-gray-700 dark:text-gray-300">Date of Birth</label>
                        <input type="date" name="dob" value="{{ $user->dateOfBirth }}"
                               class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 text-sm text-gray-800 dark:text-white focus:outline-none focus:ring-2 focus:ring-primary-500 transition">
                    </div>
                    <div>
                        <label class="text-sm text-gray-700 dark:text-gray-300">Country</label>
                        <input type="text" name="country" value="{{ $user->country }}"
                               class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 text-sm text-gray-800 dark:text-white focus:outline-none focus:ring-2 focus:ring-primary-500 transition">
                    </div>
                    {{-- 2FA Radio Cards --}}
                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Two-Factor Authentication</label>
                        <div class="flex space-x-4">
                            <label :class="{ 'ring-2 ring-blue-500 border-blue-500': twoWay == '1' }"
                                   class="flex-1 cursor-pointer rounded-lg border border-gray-300 dark:border-gray-600 px-4 py-3 text-center text-sm font-medium text-gray-800 dark:text-white bg-white dark:bg-gray-800 transition duration-200 hover:border-blue-500"
                                   @click="twoWay = '1'">
                                <input type="radio" name="twoWay" value="1" class="hidden" x-model="twoWay">
                                ON
                            </label>

                            <label :class="{ 'ring-2 ring-blue-500 border-blue-500': twoWay == '2' }"
                                   class="flex-1 cursor-pointer rounded-lg border border-gray-300 dark:border-gray-600 px-4 py-3 text-center text-sm font-medium text-gray-800 dark:text-white bg-white dark:bg-gray-800 transition duration-200 hover:border-blue-500"
                                   @click="twoWay = '2'">
                                <input type="radio" name="twoWay" value="2" class="hidden" x-model="twoWay">
                                OFF
                            </label>
                        </div>
                    </div>
                </div>

                <div class="pt-4">
                    <button type="submit"
                            class="w-full sm:w-auto bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium px-6 py-2 rounded-md transition flex items-center justify-center"
                            x-bind:disabled="loading">
                        <svg x-show="loading" class="animate-spin h-4 w-4 mr-2 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                             viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10"
                                    stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor"
                                  d="M4 12a8 8 0 018-8v8H4z"></path>
                        </svg>
                        <span x-text="loading ? 'Updating...' : 'Update Profile'"></span>
                    </button>
                </div>
            </form>
        </div>

        {{-- Profile Photo --}}
        <div class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-xl shadow-sm p-6 space-y-6">
            <h2 class="text-lg font-semibold text-gray-800 dark:text-white">Profile Photo</h2>

            <form method="POST" action="{{ route('photo.update') }}" enctype="multipart/form-data" class="space-y-4" x-data="{ loading: false }" @submit.prevent="loading = true; $el.submit()">
                @csrf

                <div class="flex items-center space-x-4">
                    <img src="{{ empty($user->photo)
                        ? 'https://ui-avatars.com/api/?name=' . urlencode($user->name)
                        : asset('dashboard/user/images/' . $user->photo) }}"
                         alt="Profile Photo" class="w-16 h-16 rounded-full object-cover border border-gray-300 dark:border-gray-600">

                    <input type="file" name="photo"
                           class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 text-sm text-gray-800 dark:text-white focus:outline-none focus:ring-2 focus:ring-primary-500 transition">
                </div>

                <div class="pt-2">
                    <button type="submit"
                            class="w-full sm:w-auto bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium px-6 py-2 rounded-md transition flex items-center justify-center"
                            x-bind:disabled="loading">
                        <svg x-show="loading" class="animate-spin h-4 w-4 mr-2 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                             viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10"
                                    stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor"
                                  d="M4 12a8 8 0 018-8v8H4z"></path>
                        </svg>
                        <span x-text="loading ? 'Uploading...' : 'Update Photo'"></span>
                    </button>
                </div>
            </form>
        </div>

        {{-- Change Password --}}
        <div class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-xl shadow-sm p-6 space-y-6">
            <h2 class="text-lg font-semibold text-gray-800 dark:text-white">Change Password</h2>

            <form method="POST" action="{{ route('password.update') }}" class="space-y-4" x-data="{ loading: false }" @submit.prevent="loading = true; $el.submit()">
                @csrf

                <div>
                    <label class="text-sm text-gray-700 dark:text-gray-300">Old Password</label>
                    <input type="password" name="old_password"
                           class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 text-sm text-gray-800 dark:text-white focus:outline-none focus:ring-2 focus:ring-primary-500 transition">
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="text-sm text-gray-700 dark:text-gray-300">New Password</label>
                        <input type="password" name="new_password"
                               class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 text-sm text-gray-800 dark:text-white focus:outline-none focus:ring-2 focus:ring-primary-500 transition">
                    </div>
                    <div>
                        <label class="text-sm text-gray-700 dark:text-gray-300">Repeat New Password</label>
                        <input type="password" name="new_password_confirmation"
                               class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 text-sm text-gray-800 dark:text-white focus:outline-none focus:ring-2 focus:ring-primary-500 transition">
                    </div>
                </div>

                <div class="pt-2">
                    <button type="submit"
                            class="w-full sm:w-auto bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium px-6 py-2 rounded-md transition flex items-center justify-center"
                            x-bind:disabled="loading">
                        <svg x-show="loading" class="animate-spin h-4 w-4 mr-2 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                             viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10"
                                    stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor"
                                  d="M4 12a8 8 0 018-8v8H4z"></path>
                        </svg>
                        <span x-text="loading ? 'Updating...' : 'Update Password'"></span>
                    </button>
                </div>
            </form>
        </div>

    </div>
@endsection

@extends('layouts.guest')

@section('title', 'Create an Account')

@section('content')
    <!-- Start User Area -->
    <section class="min-h-screen flex items-center justify-center bg-gradient-to-br from-gray-50 to-gray-100 dark:from-gray-900 dark:to-gray-950 py-12 px-4">
        <div class="w-full max-w-md bg-white/80 dark:bg-gray-800/80 backdrop-blur-lg rounded-2xl shadow-2xl p-8"
             x-data="{ loading: false, showPassword: false, showPasswordConfirm: false }">

            <!-- Heading -->
            <h3 class="text-2xl font-bold text-center text-gray-800 dark:text-white">Register</h3>
            <p class="text-sm text-gray-500 dark:text-gray-400 text-center mb-6">
                Register to continue to {{ $siteName }}.
            </p>

            <!-- Notifications -->
            @include('templates.notification')

            <!-- Form -->
            <form method="POST" action="{{ route('auth.register') }}" class="space-y-5"
                  @submit="loading = true">
                @csrf

                <!-- Name -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Name</label>
                    <input type="text" name="name" value="{{ old('name') }}" placeholder="Enter your name"
                           class="mt-1 w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600
                              bg-white/50 dark:bg-gray-900/50 focus:outline-none focus:ring-2 focus:ring-purple-500">
                </div>

                <!-- Username -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Username</label>
                    <input type="text" name="username" value="{{ old('username') }}" placeholder="Enter your username"
                           class="mt-1 w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600
                              bg-white/50 dark:bg-gray-900/50 focus:outline-none focus:ring-2 focus:ring-purple-500">
                </div>

                <!-- Email -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" placeholder="Enter your email"
                           class="mt-1 w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600
                              bg-white/50 dark:bg-gray-900/50 focus:outline-none focus:ring-2 focus:ring-purple-500">
                </div>

                <!-- Phone -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Phone</label>
                    <input type="text" name="phone" value="{{ old('phone') }}" placeholder="Enter your phone"
                           class="mt-1 w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600
                              bg-white/50 dark:bg-gray-900/50 focus:outline-none focus:ring-2 focus:ring-purple-500">
                </div>

                <!-- Password -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Password</label>
                    <div class="relative">
                        <input :type="showPassword ? 'text' : 'password'" name="password" placeholder="Enter your password"
                               class="mt-1 w-full px-4 py-2 pr-10 rounded-lg border border-gray-300 dark:border-gray-600
                                  bg-white/50 dark:bg-gray-900/50 focus:outline-none focus:ring-2 focus:ring-purple-500">
                        <button type="button"
                                class="absolute inset-y-0 right-3 flex items-center text-gray-500 dark:text-gray-400"
                                @click="showPassword = !showPassword" tabindex="-1">
                            <i :class="showPassword ? 'fas fa-eye-slash' : 'fas fa-eye'"></i>
                        </button>
                    </div>
                </div>

                <!-- Confirm Password -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Repeat Password</label>
                    <div class="relative">
                        <input :type="showPasswordConfirm ? 'text' : 'password'" name="password_confirmation" placeholder="Repeat your password"
                               class="mt-1 w-full px-4 py-2 pr-10 rounded-lg border border-gray-300 dark:border-gray-600
                                  bg-white/50 dark:bg-gray-900/50 focus:outline-none focus:ring-2 focus:ring-purple-500">
                        <button type="button"
                                class="absolute inset-y-0 right-3 flex items-center text-gray-500 dark:text-gray-400"
                                @click="showPasswordConfirm = !showPasswordConfirm" tabindex="-1">
                            <i :class="showPasswordConfirm ? 'fas fa-eye-slash' : 'fas fa-eye'"></i>
                        </button>
                    </div>
                </div>

                <!-- Referral -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Referral</label>
                    <input type="text" name="referral" value="{{ old('referral') }} {{ $referral }}" placeholder="Referral code (optional)"
                           class="mt-1 w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600
                              bg-white/50 dark:bg-gray-900/50 focus:outline-none focus:ring-2 focus:ring-purple-500">
                </div>

                <!-- reCAPTCHA -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">ReCaptcha</label>
                    <div class="mt-2 g-recaptcha" data-sitekey="{{ env('GOOGLE_RECAPTCHA_KEY') }}"></div>
                    @if ($errors->has('g-recaptcha-response'))
                        <span class="text-red-500 text-sm">{{ $errors->first('g-recaptcha-response') }}</span>
                    @endif
                </div>

                <!-- Submit -->
                <div>
                    <button type="submit"
                            :disabled="loading"
                            class="w-full py-3 px-4 flex items-center justify-center bg-purple-600 hover:bg-purple-700 text-white font-semibold rounded-lg shadow-md transition disabled:opacity-50 disabled:cursor-not-allowed">
                        <svg x-show="loading" class="animate-spin h-5 w-5 mr-2 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8z"></path>
                        </svg>
                        <span x-text="loading ? 'Processing...' : 'Sign up'"></span>
                    </button>
                </div>

                <!-- Login Link -->
                <p class="text-center text-sm text-gray-500 dark:text-gray-400">
                    Already have an account?
                    <a href="{{ route('login') }}" class="text-purple-600 hover:underline">Sign in</a>
                </p>
            </form>
        </div>
    </section>
    <!-- End User Area -->
@endsection

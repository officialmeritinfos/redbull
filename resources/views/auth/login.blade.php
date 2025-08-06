@extends('layouts.guest')

@section('title', 'Sign-in your Account')

@section('content')
    <!-- Start User Area -->
    <section class="min-h-screen flex items-center justify-center bg-gradient-to-br from-gray-50 to-gray-100 dark:from-gray-900 dark:to-gray-950 py-12 px-4">
        <div class="w-full max-w-md bg-white/80 dark:bg-gray-800/80 backdrop-blur-lg rounded-2xl shadow-2xl p-8"
             x-data="{ loading: false, showPassword: false }">

            <!-- Heading -->
            <h3 class="text-2xl font-bold text-center text-gray-800 dark:text-white">Login</h3>
            <p class="text-sm text-gray-500 dark:text-gray-400 text-center mb-6">
                Sign In to continue to {{ $siteName }}.
            </p>

            <!-- Notifications -->
            @include('templates.notification')

            <!-- Form -->
            <form method="POST" action="{{ route('auth.login') }}" class="space-y-5" @submit="loading = true">
                @csrf

                <!-- Username -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Username</label>
                    <input type="text" name="email" value="{{ old('email') }}" placeholder="Enter your username"
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

                <!-- Forgot Password -->
                <div class="flex justify-end">
                    <a href="{{ route('forgotPassword') }}"
                       class="text-sm text-purple-600 hover:underline dark:text-purple-400">
                        Forgot your password?
                    </a>
                </div>

                <!-- Submit -->
                <div>
                    <button type="submit"
                            :disabled="loading"
                            class="w-full py-3 px-4 flex items-center justify-center bg-purple-600 hover:bg-purple-700
                               text-white font-semibold rounded-lg shadow-md transition disabled:opacity-50 disabled:cursor-not-allowed">
                        <svg x-show="loading" class="animate-spin h-5 w-5 mr-2 text-white"
                             xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10"
                                    stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor"
                                  d="M4 12a8 8 0 018-8v8z"></path>
                        </svg>
                        <span x-text="loading ? 'Processing...' : 'Login'"></span>
                    </button>
                </div>

                <!-- Sign Up Link -->
                <p class="text-center text-sm text-gray-500 dark:text-gray-400">
                    Don’t have an account?
                    <a href="{{ route('register') }}" class="text-purple-600 hover:underline">Sign up</a>
                </p>
            </form>
        </div>
    </section>
    <!-- End User Area -->
@endsection

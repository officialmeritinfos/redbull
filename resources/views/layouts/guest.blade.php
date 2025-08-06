<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" :class="theme">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', setting('name')) — {{ setting('name') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Favicon --}}
    <link rel="icon" type="image/png" href="{{ asset(setting('favicon')) }}">

    {{-- Fonts & Icons --}}
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- Styles --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tom-select/dist/css/tom-select.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    @livewireStyles

    {{-- reCAPTCHA --}}
    <script src="https://www.google.com/recaptcha/api.js" defer></script>
</head>

<body x-data="themeToggle()" x-init="init()" :class="theme"
      class="font-sans antialiased min-h-screen bg-gradient-to-br from-gray-100 to-gray-200 dark:from-gray-900 dark:to-gray-800 text-gray-800 dark:text-gray-100 transition-colors duration-300 relative">

{{-- Floating Theme Toggle Button --}}
<div class="fixed top-4 right-4 z-50">
    <button @click="toggleTheme"
            class="w-10 h-10 rounded-xl flex items-center justify-center bg-white/70 dark:bg-gray-800/70 backdrop-blur-md border border-gray-300 dark:border-gray-700 shadow-md hover:shadow-lg transition"
            :title="theme === 'dark' ? 'Switch to Light Mode' : 'Switch to Dark Mode'">
        <template x-if="theme === 'dark'">
            <i class="fas fa-sun text-yellow-400 text-lg"></i>
        </template>
        <template x-if="theme === 'light'">
            <i class="fas fa-moon text-gray-700 text-lg"></i>
        </template>
    </button>
</div>

{{-- Main Content Container --}}
@yield('content')

{{-- Scripts --}}
@livewireScripts
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/tom-select/dist/js/tom-select.complete.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        toastr.options = {
            closeButton: true,
            progressBar: true,
            timeOut: 3000,
            positionClass: 'toast-top-right',
            preventDuplicates: true,
            showDuration: 300,
            hideDuration: 1000,
            showMethod: 'fadeIn',
            hideMethod: 'fadeOut'
        };
    });
</script>

{{-- Theme Toggle Script --}}
<script>
    function themeToggle() {
        return {
            theme: localStorage.getItem('theme') || (window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light'),
            init() {
                document.documentElement.classList.add(this.theme);
                document.documentElement.classList.remove(this.theme === 'dark' ? 'light' : 'dark');
            },
            toggleTheme() {
                const newTheme = this.theme === 'dark' ? 'light' : 'dark';
                document.documentElement.classList.remove(this.theme);
                document.documentElement.classList.add(newTheme);
                this.theme = newTheme;
                localStorage.setItem('theme', newTheme);
            }
        };
    }
</script>

@stack('scripts')
</body>
</html>

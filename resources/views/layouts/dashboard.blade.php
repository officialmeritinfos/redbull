{{-- resources/views/layouts/mobile/dashboard.blade.php --}}

    <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" :class="theme">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', setting('name')) — {{ setting('name') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" type="image/png" href="{{ asset(setting('favicon')) }}">

    {{-- Assets --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tom-select/dist/css/tom-select.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>

<body x-data="themeToggle()" x-init="init()"
      class="font-sans antialiased min-h-screen flex flex-col bg-gray-50 dark:bg-gray-900 text-gray-800 dark:text-gray-100 transition-colors duration-300">

{{-- Topbar --}}
<header class="w-full sticky top-0 z-30 backdrop-blur-lg dark:bg-gray-900/30">

    <div class="h-14 px-4 flex items-center justify-center">

        {{-- Theme toggle (Left) --}}
        <button @click="toggleTheme"
                class="w-10 h-10 rounded-full flex items-center justify-center bg-white/40 dark:bg-gray-700/50 border border-white/30 dark:border-gray-600 shadow-sm hover:shadow-md transition"
                :title="theme === 'dark' ? 'Switch to Light Mode' : 'Switch to Dark Mode'">
            <template x-if="theme === 'dark'">
                <i class="fas fa-sun text-yellow-400 text-lg"></i>
            </template>
            <template x-if="theme === 'light'">
                <i class="fas fa-moon text-gray-700 text-lg"></i>
            </template>
        </button>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
</header>

{{-- Main Content --}}
<main class="flex-1 overflow-y-auto no-scrollbar pb-20 px-4 py-6">
    @php $user = auth()->user(); @endphp

    @yield('content')
</main>

{{-- Bottom Navigation --}}
@include('layouts.user-bottom-nav')

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

    function themeToggle() {
        return {
            theme: localStorage.getItem('theme') || (window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light'),
            init() {
                document.documentElement.classList.add(this.theme);
                document.documentElement.classList.remove(this.theme === 'dark' ? 'light' : 'dark');
            },
            toggleTheme() {
                const newTheme = this.theme === 'dark' ? 'light' : 'dark';
                document.documentElement.classList.replace(this.theme, newTheme);
                this.theme = newTheme;
                localStorage.setItem('theme', newTheme);
            }
        };
    }
</script>


@stack('scripts')
<!-- Smartsupp Live Chat script -->
<script type="text/javascript">
    var _smartsupp = _smartsupp || {};
    _smartsupp.key = '3e77a6f180185ac65622e2cdf8fe6f427d790ad2';
    window.smartsupp||(function(d) {
        var s,c,o=smartsupp=function(){ o._.push(arguments)};o._=[];
        s=d.getElementsByTagName('script')[0];c=d.createElement('script');
        c.type='text/javascript';c.charset='utf-8';c.async=true;
        c.src='https://www.smartsuppchat.com/loader.js?';s.parentNode.insertBefore(c,s);
    })(document);
</script>
<noscript> Powered by <a href=“https://www.smartsupp.com” target=“_blank”>Smartsupp</a></noscript>
</body>
</html>

@props(['label', 'value', 'icon'])

<div class="bg-white dark:bg-gray-800 shadow-xl rounded-xl p-4 flex items-center justify-between">
    <div>
        <p class="text-sm text-gray-500 dark:text-white">{{ $label }}</p>
        <h4 class="text-lg font-bold text-gray-800 dark:text-gray-100">${{ number_format($value, 2) }}</h4>
    </div>

    {{-- Dynamic Icon based on "icon" value --}}
    <div class="w-8 h-8 text-blue-600 dark:text-blue-400">
        @switch($icon)
            @case('user')
                <x-heroicon-o-user class="w-8 h-8" />
                @break

            @case('user-2')
                <x-heroicon-o-user-group class="w-8 h-8" />
                @break

            @case('discount')
                <x-heroicon-o-tag class="w-8 h-8" />
                @break

            @case('discount-2')
                <x-heroicon-o-trophy class="w-8 h-8" />
                @break

            @case('curser')
                <x-heroicon-o-cursor-arrow-rays class="w-8 h-8" />
                @break

            @case('items')
                <x-heroicon-o-check-badge class="w-8 h-8" />
                @break

            @case('groop')
                <x-heroicon-o-users class="w-8 h-8" />
                @break

            @default
                <x-heroicon-o-information-circle class="w-8 h-8" />
        @endswitch
    </div>
</div>

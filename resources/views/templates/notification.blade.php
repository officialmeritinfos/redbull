{{-- Validation Errors --}}
@if ($errors->any())
    <div class="mb-4 rounded-lg bg-red-50 dark:bg-red-900/50 border border-red-200 dark:border-red-800 p-4">
        <div class="flex items-start space-x-3">
            <span class="text-red-600 dark:text-red-300">
                <i class="fas fa-times-circle"></i>
            </span>
            <div class="flex-1 text-sm text-red-700 dark:text-red-200">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        </div>
    </div>
@endif

{{-- Success --}}
@if(session('success'))
    <div class="mb-4 rounded-lg bg-green-50 dark:bg-green-900/50 border border-green-200 dark:border-green-800 p-4">
        <div class="flex items-start space-x-3">
            <span class="text-green-600 dark:text-green-300">
                <i class="fas fa-check-circle"></i>
            </span>
            <div class="flex-1 text-sm text-green-700 dark:text-green-200">
                {{ session('success') }}
            </div>
        </div>
    </div>
@endif

{{-- Error --}}
@if(session('error'))
    <div class="mb-4 rounded-lg bg-red-50 dark:bg-red-900/50 border border-red-200 dark:border-red-800 p-4">
        <div class="flex items-start space-x-3">
            <span class="text-red-600 dark:text-red-300">
                <i class="fas fa-exclamation-circle"></i>
            </span>
            <div class="flex-1 text-sm text-red-700 dark:text-red-200">
                {{ session('error') }}
            </div>
        </div>
    </div>
@endif

{{-- Warning --}}
@if(session('warning'))
    <div class="mb-4 rounded-lg bg-yellow-50 dark:bg-yellow-900/50 border border-yellow-200 dark:border-yellow-800 p-4">
        <div class="flex items-start space-x-3">
            <span class="text-yellow-600 dark:text-yellow-300">
                <i class="fas fa-exclamation-triangle"></i>
            </span>
            <div class="flex-1 text-sm text-yellow-700 dark:text-yellow-200">
                {{ session('warning') }}
            </div>
        </div>
    </div>
@endif

{{-- Info --}}
@if(session('info'))
    <div class="mb-4 rounded-lg bg-blue-50 dark:bg-blue-900/50 border border-blue-200 dark:border-blue-800 p-4">
        <div class="flex items-start space-x-3">
            <span class="text-blue-600 dark:text-blue-300">
                <i class="fas fa-info-circle"></i>
            </span>
            <div class="flex-1 text-sm text-blue-700 dark:text-blue-200">
                {{ session('info') }}
            </div>
        </div>
    </div>
@endif

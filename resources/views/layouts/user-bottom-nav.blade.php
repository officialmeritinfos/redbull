<!-- Wrapper -->
<div x-data="{ sidebarOpen: false }">

    <!-- Bottom Navigation -->
    <nav class="fixed bottom-0 inset-x-0 z-50 bg-[#f9fafb]/95 dark:bg-[#111827]/90 backdrop-blur-md border-t border-gray-100 dark:border-gray-800 shadow-[0_-4px_20px_rgba(0,0,0,0.1)]">
        <div class="flex items-center justify-between h-16 px-4 relative text-center">

            {{-- Deposit --}}
            <a href="{{ route('new_deposit') }}"
               class="group flex-1 flex flex-col items-center justify-center gap-0.5 text-gray-700 dark:text-gray-300">
                <i class="fas fa-arrow-down text-[22px] transition-transform duration-200 group-hover:scale-110"></i>
                <span class="text-[11px]">Deposit</span>
            </a>

            {{-- Withdraw --}}
            <a href="{{ route('new_withdrawal') }}"
               class="group flex-1 flex flex-col items-center justify-center gap-0.5 text-gray-700 dark:text-gray-300">
                <i class="fas fa-arrow-up text-[22px] transition-transform duration-200 group-hover:scale-110"></i>
                <span class="text-[11px]">Withdraw</span>
            </a>

            {{-- Spacer --}}
            <div class="w-16"></div>

            {{-- Account --}}
            <a href="{{ route('setting.index') }}"
               class="group flex-1 flex flex-col items-center justify-center gap-0.5 text-gray-700 dark:text-gray-300">
                <i class="fas fa-user text-[22px] transition-transform duration-200 group-hover:scale-110"></i>
                <span class="text-[11px]">Account</span>
            </a>

            {{-- Menu (Triggers Sidebar) --}}
            <button @click="sidebarOpen = true"
                    class="group flex-1 flex flex-col items-center justify-center gap-0.5 text-gray-700 dark:text-gray-300 focus:outline-none">
                <i class="fas fa-bars text-[22px] transition-transform duration-200 group-hover:scale-110"></i>
                <span class="text-[11px]">Menu</span>
            </button>

            {{-- Floating Center (Investment) --}}
            <div class="absolute -top-8 left-1/2 -translate-x-1/2 animate-pulse">
                <a href="{{ route('new_investment') }}"
                   class="bg-indigo-600 hover:bg-indigo-700 text-white w-16 h-16 rounded-full flex items-center justify-center shadow-[0_8px_20px_rgba(0,0,0,0.2)] border-[3px] border-white dark:border-gray-900 transition-all duration-300 ease-out hover:scale-105">
                    <i class="fas fa-chart-line text-2xl"></i>
                </a>
            </div>

        </div>
    </nav>

    <!-- Sidebar -->
    <div
        x-show="sidebarOpen"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="translate-x-full"
        x-transition:enter-end="translate-x-0"
        x-transition:leave="transition ease-in duration-300"
        x-transition:leave-start="translate-x-0"
        x-transition:leave-end="translate-x-full"
        class="fixed top-0 right-0 w-72 h-full bg-white dark:bg-gray-900 z-50 shadow-xl border-l border-gray-200 dark:border-gray-700 transform overflow-y-auto"
        @click.away="sidebarOpen = false"
        @keydown.escape.window="sidebarOpen = false"
        style="display: none;"
    >
        <div class="p-5 space-y-6">

            <!-- Header -->
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-lg font-semibold text-gray-800 dark:text-white">Menu</h2>
                <button @click="sidebarOpen = false" class="text-gray-500 hover:text-red-500">
                    <i class="fas fa-times text-lg"></i>
                </button>
            </div>

            <!-- Menu Items -->
            <div class="space-y-5 text-sm text-gray-800 dark:text-gray-200">

                <!-- Dashboard -->
                <a href="{{ url('account/dashboard') }}" class="flex items-center gap-2 px-2 py-2 rounded hover:bg-gray-100 dark:hover:bg-gray-800">
                    <i class="ri-home-2-fill text-base"></i> Dashboard
                </a>

                <!-- Deposit -->
                <div>
                    <p class="text-xs font-semibold uppercase text-gray-500 dark:text-gray-400 px-2 mb-2">Deposit</p>
                    <a href="{{ url('account/new_deposit') }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-800 rounded">New Deposit</a>
                    <a href="{{ url('account/deposits') }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-800 rounded">Deposit History</a>
                </div>

                <!-- Investment -->
                <div>
                    <p class="text-xs font-semibold uppercase text-gray-500 dark:text-gray-400 px-2 mb-2">Investment</p>
                    <a href="{{ url('account/new_investment') }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-800 rounded">New Investment</a>
                    <a href="{{ url('account/investments') }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-800 rounded">Investment History</a>
                </div>

                <!-- Withdrawal -->
                <div>
                    <p class="text-xs font-semibold uppercase text-gray-500 dark:text-gray-400 px-2 mb-2">Withdrawal</p>
                    <a href="{{ url('account/new_withdrawals') }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-800 rounded">New Withdrawal</a>
                    <a href="{{ url('account/withdrawals') }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-800 rounded">Withdrawal History</a>
                </div>

                <!-- Services -->
                <div>
                    <p class="text-xs font-semibold uppercase text-gray-500 dark:text-gray-400 px-2 mb-2">Services</p>
                    <a href="{{ route('cards.index') }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-800 rounded">Cards</a>
                    <a href="{{ route('loans.index') }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-800 rounded">Loan</a>
                    <a href="{{ route('membership.index') }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-800 rounded">Membership ID</a>
                    <a href="{{ route('setting.kyc') }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-800 rounded">KYC</a>
                </div>

                <!-- Others -->
                <a href="{{ route('wallet.connect.index') }}" class="flex items-center gap-2 px-2 py-2 rounded hover:bg-gray-100 dark:hover:bg-gray-800">
                    <i class="bx bx-send text-base"></i> Wallet Connect
                </a>

                <a href="{{ route('transfer.index') }}" class="flex items-center gap-2 px-2 py-2 rounded hover:bg-gray-100 dark:hover:bg-gray-800">
                    <i class="bx bx-send text-base"></i> Transfer Funds
                </a>

                <a href="{{ route('subtrade.index') }}" class="flex items-center gap-2 px-2 py-2 rounded hover:bg-gray-100 dark:hover:bg-gray-800">
                    <i class="bx bx-user-plus text-base"></i> Managed Accounts
                </a>

                <a href="{{ url('account/referral') }}" class="flex items-center gap-2 px-2 py-2 rounded hover:bg-gray-100 dark:hover:bg-gray-800">
                    <i class="bx bx-user-plus text-base"></i> Referrals
                </a>

                @if($user->is_admin == 1)
                    <a href="{{ route('admin.admin.dashboard') }}" class="flex items-center gap-2 px-2 py-2 rounded hover:bg-gray-100 dark:hover:bg-gray-800">
                        <i class="bx bx-user-check text-base"></i> Admin
                    </a>
                @endif

                <a href="{{ url('account/settings') }}" class="flex items-center gap-2 px-2 py-2 rounded hover:bg-gray-100 dark:hover:bg-gray-800">
                    <i class="bx bx-cog text-base"></i> Settings
                </a>

                <a href="{{ url('account/logout') }}" class="flex items-center gap-2 px-2 py-2 rounded text-red-500 hover:bg-red-100 dark:hover:bg-red-900">
                    <i class="bx bx-log-out text-base"></i> Logout
                </a>

            </div>
        </div>
    </div>

</div>

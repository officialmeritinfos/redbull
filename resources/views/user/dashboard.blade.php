@extends('layouts.dashboard')
@section('title','User Dashboard')
@section('content')
    @inject('injected','App\Defaults\Custom')
    <div class="space-y-6 px-4 py-6">

        {{-- Promo Section --}}
        @foreach($promos as $promo)
            <div class="bg-blue-100 border border-blue-300 rounded-xl p-4 shadow-sm space-y-3">
                <h3 class="text-lg font-semibold text-blue-800">{{ $promo->title }}</h3>
                <div class="prose max-w-none">{!! $promo->content !!}</div>
                <a href="{{ route('user.enrollPromo', ['id' => $promo->id]) }}"
                   class="inline-block bg-blue-600 text-white text-sm px-4 py-2 rounded hover:bg-blue-700 transition">
                    Enroll
                </a>
            </div>
        @endforeach

        {{-- Notifications --}}
        @foreach($notifications as $notification)
            <div class="bg-gray-100 border border-gray-300 rounded-xl p-4 shadow-sm space-y-2">
                <h3 class="text-lg font-semibold text-gray-700 dark:text-white">{{ $notification->title }}</h3>
                <div class="prose max-w-none">{!! $notification->content !!}</div>
            </div>
        @endforeach

        {{-- Quick Actions --}}
        <div class="grid grid-cols-3 gap-4 text-center">
            <a href="{{ route('new_deposit') }}" class="bg-emerald-600 text-white py-3 rounded-xl font-medium hover:bg-emerald-700">Deposit</a>
            <a href="{{ route('new_investment') }}" class="bg-indigo-600 text-white py-3 rounded-xl font-medium hover:bg-indigo-700">Invest</a>
            <a href="{{ route('new_withdrawal') }}" class="bg-rose-600 text-white py-3 rounded-xl font-medium hover:bg-rose-700">Withdraw</a>
        </div>

        {{-- Balance Overview --}}
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
            <x-dashboard.card label="Account Balance" :value="$user->balance" icon="user" />
            <x-dashboard.card label="Profit Balance" :value="$user->profit" icon="user" />
            <x-dashboard.card label="Bonus Balance" :value="$user->bonus" icon="user" />
            <x-dashboard.card label="Ongoing Investments" :value="$ongoingInvestments" icon="user-2" />
            <x-dashboard.card label="Pending Deposits" :value="$pendingDeposit" icon="discount-2" />
            <x-dashboard.card label="Completed Investments" :value="$completedInvestments" icon="curser" />
            <x-dashboard.card label="Pending Withdrawals" :value="$pendingWithdrawal" icon="discount-2" />
            <x-dashboard.card label="Completed Withdrawals" :value="$withdrawals" icon="items" />
        </div>

        {{-- Daily Earnings + Referral --}}
        <div class="grid grid-cols-2 sm:grid-cols-3 gap-4">
            <x-dashboard.card label="Today's Earning" :value="$injected->userDailyEarning($user->id)" icon="discount" />
            <x-dashboard.card label="Referral Balance" :value="$user->refBal" icon="groop" />
            <x-dashboard.card label="Total Withdrawal" :value="$user->withdrawals" icon="discount" />
        </div>


        {{-- Charts --}}
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mt-8 ">
            <div class=" bg-white dark:bg-gray-800 p-6 shadow rounded-xl">
                <div class="flex justify-between items-center mb-3">
                    <h2 class="text-sm font-semibold text-gray-700 dark:text-white">Earning Overview</h2>
                    <div class="text-xs text-right">
                        <p>This Month: <span class="font-bold">${{ number_format($injected->userCurrentMonthEarning($user->id), 2) }}</span></p>
                        <p>Last Month: <span class="font-bold">${{ number_format($injected->userPreviousMonthEarning($user->id), 2) }}</span></p>
                    </div>
                </div>
                <div id="ana_dash_1" class="h-[395px] flex items-center justify-center text-gray-400 text-sm">
                    Loading Earnings Chart...
                </div>

            </div>

            <div class="bg-white dark:bg-gray-800 p-6 shadow rounded-xl">
                <h2 class="text-sm font-semibold text-gray-700 dark:text-white mb-3 ">Investment Overview</h2>
                <div id="stacked-column-chart-2" class="h-[385px] flex items-center justify-center text-gray-400 text-sm">
                    Loading Investment Chart...
                </div>
            </div>
        </div>

        {{-- Latest Transactions Table --}}
        <div class="mt-8 bg-white dark:bg-gray-800 p-6 shadow rounded-xl">
            <h3 class="text-base font-semibold text-gray-800 dark:text-white mb-2">Most Recent Transactions</h3>
            <div class="overflow-x-auto rounded-xl border border-gray-200">
                <table class="min-w-full text-sm">
                    <thead class="bg-gray-50 text-gray-700 font-semibold">
                    <tr>
                        <th class="px-4 py-2 text-left">ID</th>
                        <th class="px-4 py-2 text-left">Amount</th>
                        <th class="px-4 py-2 text-left">Date</th>
                        <th class="px-4 py-2 text-left"></th>
                    </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 bg-white">
                    @foreach($latests as $latest)
                        <tr>
                            <td class="px-4 py-2">#{{ $latest->reference }}</td>
                            <td class="px-4 py-2">${{ number_format($latest->amount, 2) }}</td>
                            <td class="px-4 py-2">{{ strtoupper($latest->created_at->format('d M, Y - h:i a')) }}</td>
                            <td class="px-4 py-2">
                                <a href="{{ route('invest_detail', ['id' => $latest->id]) }}"
                                   class="text-indigo-600 hover:underline">
                                    View Details
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Referral Link --}}
        <div x-data="{ copied: false }" class="mt-8 bg-white dark:bg-gray-800 p-6 shadow rounded-xl">
            <h4 class="font-semibold text-gray-800 dark:text-white mb-4">Referral Link</h4>
            <div class="flex items-center gap-2">
                <input
                    type="text"
                    readonly
                    x-ref="link"
                    value="{{ route('register', ['referral' => $user->username]) }}"
                    class="flex-1 px-4 py-2 border border-gray-300 rounded focus:outline-none text-sm"
                >

                <button
                    @click="navigator.clipboard.writeText($refs.link.value).then(() => copied = true)"
                    @click.away="copied = false"
                    class="inline-flex items-center bg-blue-600 text-white px-4 py-2 text-sm rounded hover:bg-blue-700 transition"
                >
                    <span x-show="!copied">Copy</span>
                    <span x-show="copied" x-transition>Copied!</span>
                </button>
            </div>
        </div>


    </div>

    @push('scripts')
        <script>
            // Assuming you have a route named 'earnings.chart' that returns JSON data
            const earningsUrl = "{{ route('earnings.chart', ['userId' => $user->id]) }}";
            const withdrawalsUrl = "{{ route('withdrawals.chart', ['userId' => $user->id]) }}";

            // Fetch earnings data using AJAX
            Promise.all([fetch(earningsUrl), fetch(withdrawalsUrl)])
                .then(responses => Promise.all(responses.map(response => response.json())))
                .then(data => {
                    const earningsData = data[0];
                    const withdrawalsData = data[1];

                    const chartContainer = document.querySelector("#ana_dash_1");
                    chartContainer.innerHTML = "";

                    // Create ApexCharts instance
                    const chart = new ApexCharts(chartContainer, {
                        chart: {
                            height: 395,
                            type: "area",
                            stacked: !0,
                            toolbar: {
                                show: !1,
                                autoSelected: "zoom"
                            }
                        },
                        colors: [
                            "#7f26c6",
                            "#7f26c6"
                        ],
                        dataLabels: {
                            enabled: !1
                        },
                        stroke: {
                            curve: "smooth",
                            width: [1.5, 1.5],
                            dashArray: [0, 4],
                            lineCap: "round"
                        },
                        grid: {
                            padding: {
                                left: 0,
                                right: 0
                            },
                            strokeDashArray: 3
                        },
                        markers: {
                            size: 0,
                            hover: {
                                size: 0
                            }
                        },
                        series: [
                            {
                                name: "Earnings",
                                data: earningsData,
                            },
                            {
                                name: "Withdrawals",
                                data: withdrawalsData,
                            },
                        ],
                        xaxis: {
                            type: "datetime",
                            axisTicks: {
                                show: !0
                            }
                        },
                        fill: {
                            type: "gradient",
                            gradient: {
                                shadeIntensity: 1,
                                opacityFrom: 0,
                                opacityTo: 0,
                                stops: [0, 90, 100]
                            }
                        },
                        tooltip: {
                            x: {
                                format: "dd/MM/yy HH:mm"
                            }
                        },
                        legend: {
                            position: "bottom",
                            horizontalAlign: "right",
                            show: false
                        },
                    });

                    // Render the chart
                    chart.render();
                });

        </script>

        <script>
            // Assuming you have a route named 'earnings.chart' that returns JSON data
            const investmentUrl = "{{ route('investments.chart', ['userId' => $user->id]) }}";

            // Fetch earnings data using AJAX
            Promise.all([fetch(investmentUrl)])
                .then(responses => Promise.all(responses.map(response => response.json())))
                .then(data => {
                    const earningsData = data[0];
                    const invChartContainer = document.querySelector("#stacked-column-chart-2");
                    invChartContainer.innerHTML = "";
                    // Create ApexCharts instance
                    const chart = new ApexCharts(invChartContainer, {
                        chart: {
                            height: 385,
                            type: "bar",
                            stacked: !0,
                            toolbar: {
                                show: !1
                            },
                            zoom: {
                                enabled: !0
                            }
                        },
                        plotOptions: {
                            bar: {
                                horizontal: !1,
                                columnWidth: "15%",
                                endingShape: "rounded"
                            }
                        },
                        dataLabels: {
                            enabled: !1
                        },
                        series: [
                            {
                                name: "Investments",
                                data: earningsData,
                            },
                        ],
                        xaxis: {
                            type: "datetime",
                            axisTicks: {
                                show: !0
                            }
                        },
                        colors: ["#ff9f43"],
                        legend: { position: "top"},
                        fill: { opacity: 1 },
                    });

                    // Render the chart
                    chart.render();
                });

        </script>

    @endpush
@endsection

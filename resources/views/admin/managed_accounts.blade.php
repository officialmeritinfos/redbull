@extends('admin.base')

@section('content')

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">List</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th scope="col">USER</th>
                        <th scope="col">AMOUNT</th>
                        <th scope="col">ACCOUNT ID</th>
                        <th scope="col">ACCOUNT PASSWORD</th>
                        <th scope="col">ACCOUNT TYPE</th>
                        <th scope="col">CURRENCY</th>
                        <th scope="col">LEVERAGE</th>
                        <th scope="col">SERVER</th>
                        <th scope="col">DURATION</th>
                        <th scope="col">SUBMITTED AT</th>
                        <th scope="col">EXPIRING AT</th>
                        <th scope="col">STARTED AT</th>
                        <th scope="col">STATUS</th>
                        <th scope="col">ACTION</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($deposits as $account)
                        @inject('option','App\Defaults\Custom')
                        <tr>
                            <td>{{$option->getInvestor($account->user)}}</td>
                            <td>${{$account->amount}}</td>
                            <td>{{$account->accountId}}</td>
                            <td>{{$account->accountPassword}}</td>
                            <td>{{$account->accountType}}</td>
                            <td>{{$account->currency}}</td>
                            <td>{{$account->leverage}}</td>
                            <td>{{$account->server}}</td>
                            <td>{{$account->duration}}</td>
                            <td>{{$account->created_at}}</td>
                            <td>{{date('d-m-Y',$account->expires_at)}}</td>
                            <td>
                                @switch($account->status)
                                    @case(1)
                                        {{date('d-m-Y h:i:s',$account->started_at)}}
                                        @break
                                    @case(2)
                                        <span class="badge badge-info">Pending</span>
                                        @break
                                    @case(4)
                                        {{date('d-m-Y h:i:s',$account->started_at)}}
                                        @break
                                    @default
                                        <span class="badge badge-danger">Cancelled</span>
                                        @break
                                @endswitch
                            </td>
                            <td>
                                @switch($account->status)
                                    @case(1)
                                        <span class="badge badge-success">Completed</span>
                                        @break
                                    @case(2)
                                        <span class="badge badge-info">Pending</span>
                                        @break
                                    @case(4)
                                        <span class="badge badge-primary">Ongoing</span>
                                        @break
                                    @default
                                        <span class="badge badge-danger">Cancelled</span>
                                        @break
                                @endswitch
                            </td>
                            <td>
                                <a href="{{route('admin.accounts.activate',['id'=>$account->id])}}" class="btn btn-primary mt-4">
                                    <i class="fa fa-eye"></i> Activate
                                </a>
                                <a href="{{route('admin.accounts.complete',['id'=>$account->id])}}" class="btn btn-success mt-4">
                                    <i class="fa fa-eye"></i> Completed
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th scope="col">USER</th>
                        <th scope="col">AMOUNT</th>
                        <th scope="col">ACCOUNT ID</th>
                        <th scope="col">ACCOUNT PASSWORD</th>
                        <th scope="col">ACCOUNT TYPE</th>
                        <th scope="col">CURRENCY</th>
                        <th scope="col">LEVERAGE</th>
                        <th scope="col">SERVER</th>
                        <th scope="col">DURATION</th>
                        <th scope="col">SUBMITTED AT</th>
                        <th scope="col">EXPIRING AT</th>
                        <th scope="col">STARTED AT</th>
                        <th scope="col">STATUS</th>
                        <th scope="col">ACTION</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

@endsection

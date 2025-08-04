@extends('user.base')

@section('content')

    <div class="row">
        <div class="col-xl-7 mx-auto">
            {{--            <h6 class="mb-0 text-uppercase">{{$pageName}}</h6>--}}
            <hr/>
            <div class="card border-top border-0 border-4 border-primary"
            >
                <div class="card-body p-5">
                    <div class="card-title d-flex align-items-center">
                        <div><i class="bx bxs-user me-1 font-22 text-primary"></i>
                        </div>
                        <h5 class="mb-0 text-primary">{{$pageName}}</h5>
                    </div>
                    <hr>
                    <form class="row g-3" method="post" action="{{route('loans.new')}}">
                        @csrf
                        @include('templates.notification')
                        <div class="form-group col-md-12">
                            <label for="inputAddress2">Amount</label>
                            <input type="number" class="form-control form-control-lg" id="inputAddress2"
                                      placeholder="amount" step="0.01" name="amount">
                        </div>

                        <div class="form-group col-md-12">
                            <label for="inputAddress2">Loan Type</label>
                            <select type="number" class="form-control form-control-lg" id="inputAddress2"
                                    name="loanType">
                                <option value="">Choose Loan Type</option>
                                <option >Short Term</option>
                                <option>Mid-Term</option>
                                <option>Long Term</option>
                            </select>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Apply</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4 mt-5" >
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">List</h6>
        </div>
        <div class="card-body">
            @include('templates.notification')
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Reference</th>
                        <th>Amount</th>
                        <th>Loan Type</th>
                        <th>Date Requested</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($loans as $loan)
                        <tr>
                            <td>{{$loan->reference}}</td>
                            <td>{{$loan->amount}}</td>
                            <td>{{$loan->loanType}}</td>
                            <td>{{$loan->created_at}}</td>
                            <td>
                                @switch($loan->status)
                                    @case(1)
                                        <span class="text-success">Active</span>
                                        @break
                                    @case(2)
                                        <span class="text-info">Pending</span>
                                        @break
                                    @case(3)
                                        <span class="text-danger">Cancelled</span>
                                        @break
                                @endswitch
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Reference</th>
                        <th>Amount</th>
                        <th>Loan Type</th>
                        <th>Date Requested</th>
                        <th>Status</th>
                    </tr>
                    </tfoot>
                </table>
                {{$loans->links()}}
            </div>
        </div>
    </div>

@endsection

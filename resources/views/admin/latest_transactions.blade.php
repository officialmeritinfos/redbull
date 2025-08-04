@extends('admin.base')
@section('content')

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">List</h6>
        </div>
        <div class="card-body">
            @include('templates.notification')
            <div class="table-responsive">
                <div class="text-center">
                    <a href="#newTransaction" data-toggle="modal" class="btn btn-primary">Add New</a>
                </div>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Amount($)</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($transactions as $transaction)
                        @inject('option','App\Defaults\Custom')
                        <tr>
                            <td>{{$transaction->name}}</td>
                            <td>{{ucfirst($transaction->type)}}</td>
                            <td>{{$transaction->amount}}</td>
                            <td>
                                <a href="{{route('admin.latest-transaction.delete',['id'=>$transaction->id])}}"
                                   class="btn btn-danger">
                                    <i class="fa fa-pencil"></i> Delete
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="newTransaction" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">New Transactions</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{route('admin.latest-transaction.new-transaction')}}">
                        @csrf
                        @include('templates.notification')
                        <div class="form-row">

                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Name</label>
                                <input type="text" class="form-control" id="inputEmail4" placeholder="Name"
                                       name="name">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Amount</label>
                                <input type="number" step="0.01" class="form-control" id="inputEmail4" placeholder="Amount"
                                       name="amount">
                            </div>

                            <div class="form-group col-md-12">
                                <label for="inputAddress">Transaction Type</label>
                                <select type="text" class="form-control" id="inputAddress"
                                        name="type">
                                    <option value="">Select Type</option>
                                    <option value="deposit" >Deposit</option>
                                    <option value="withdrawal" >Withdrawal</option>
                                </select>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

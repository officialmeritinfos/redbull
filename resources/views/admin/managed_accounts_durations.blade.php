@extends('admin.base')

@section('content')

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">List</h6>
        </div>
        <div class="card-body">
            @include('templates.notification')
            <div class="text-center">
                <button class="btn btn-primary" data-toggle="modal" data-target="#addNew">Add Duration</button>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th scope="col">TITLE</th>
                        <th scope="col">DURATION</th>
                        <th scope="col">AMOUNT</th>
                        <th scope="col">ACTION</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($deposits as $account)
                        @inject('option','App\Defaults\Custom')
                        <tr>
                            <td>{{$account->title}}</td>
                            <td>{{$account->duration}}</td>
                            <td>${{$account->amount}}</td>
                            <td>
                                <a href="{{route('admin.accounts.duration.edit',['id'=>$account->id])}}" class="btn btn-primary mt-4">
                                    <i class="fa fa-edit"></i> Edit
                                </a>
                                <a href="{{route('admin.accounts.duration.delete',['id'=>$account->id])}}" class="btn btn-danger mt-4">
                                    <i class="fa fa-trash"></i> Delete
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th scope="col">TITLE</th>
                        <th scope="col">DURATION</th>
                        <th scope="col">AMOUNT</th>
                        <th scope="col">ACTION</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>


    <div class="modal fade" id="addNew" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Add New Duration</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="row g-3" action="{{route('admin.accounts.duration.new')}}" method="post">
                        @csrf
                        <div class="col-md-12">
                            <label for="inputPassword4" class="form-label">Title</label>
                            <input type="text" class="form-control" id="inputPassword4" name="title"
                            placeholder="E.g Monthly">
                        </div>
                        <div class="col-md-12">
                            <label for="inputPassword4" class="form-label">Amount To Pay($)</label>
                            <input type="text" class="form-control" id="inputPassword4" name="amount">
                        </div>
                        <div class="col-md-12 col-12">
                            <label for="inputAddress" class="form-label">Duration</label>
                            <input type="text" class="form-control" id="inputAddress" name="duration"
                            placeholder="E.g 1 month">
                        </div>


                        <div class="col-12 text-center mt-3">
                            <button type="submit" class="btn btn-primary rounded-pill">Proceed</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

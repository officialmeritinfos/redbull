@extends('admin.base')
@section('content')

    <!-- DataTales Example -->
    <div class="card">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                {{$pageName}}
            </h6>
        </div>
        <div class="card-body row">
            <div class="col-md-12 mx-auto">
                <form method="post" action="{{route('admin.accounts.duration.update',['id'=>$account->id])}}">
                    @csrf
                    @include('templates.notification')
                    <div class="form-row gap-3">


                        <div class="form-group col-md-12" style="display: none;">
                            <label for="inputEmail4">ID</label>
                            <input type="text" class="form-control" id="inputEmail4" placeholder="ID"
                                   name="id" value="{{$account->id}}">
                        </div>
                        <div class="col-md-12">
                            <label for="inputPassword4" class="form-label">Title</label>
                            <input type="text" class="form-control" id="inputPassword4" name="title"
                                   placeholder="E.g Monthly" value="{{$account->title}}">
                        </div>
                        <div class="col-md-12">
                            <label for="inputPassword4" class="form-label">Amount To Pay($)</label>
                            <input type="text" class="form-control" id="inputPassword4" name="amount" value="{{$account->amount}}">
                        </div>
                        <div class="col-md-12 col-12">
                            <label for="inputAddress" class="form-label">Duration</label>
                            <input type="text" class="form-control" id="inputAddress" name="duration"
                                   placeholder="E.g 1 month" value="{{$account->duration}}">
                        </div>

                    </div>
                    <div class="text-center mt-3">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

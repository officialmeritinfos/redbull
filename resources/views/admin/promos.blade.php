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
                    <a href="{{route('admin.promo.create')}}" class="btn btn-primary">Add New</a>
                </div>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Title</th>
                        <th>Content</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($promos as $promo)
                        <tr>
                            <td>{{$promo->title}}</td>
                            <td>{!! $promo->content !!}</td>
                            <td>
                                @switch($promo->status)
                                    @case(1)
                                        <span class="badge badge-success">Active</span>
                                        @break
                                    @default
                                        <span class="badge badge-danger">Inactive</span>
                                        @break
                                @endswitch
                            </td>
                            <td>
                                <a href="{{route('admin.promo.edit',['id'=>$promo->id])}}"
                                   class="btn btn-primary" style="margin-bottom: 5px;">
                                    <i class=""></i> Edit
                                </a>
                                <a href="{{route('admin.promo.delete',['id'=>$promo->id])}}"
                                   class="btn btn-danger">
                                    <i class=""></i> Delete
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection

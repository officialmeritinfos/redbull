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
                    <form class="row g-3" method="post" action="{{route('membership.new')}}"
                          enctype="multipart/form-data">
                        @csrf
                        @include('templates.notification')
                        <div class="form-group col-md-12">
                            <label for="inputAddress2">Name</label>
                            <input type="text" class="form-control form-control-lg" id="inputAddress2"
                                   placeholder="Name" name="name">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="inputAddress2">Phone</label>
                            <input type="text" class="form-control form-control-lg" id="inputAddress2"
                                   placeholder="Name" name="phone">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="inputAddress2">Passport-sized Photograph</label>
                            <input type="file" class="form-control form-control-lg" id="inputAddress2" name="selfie">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="inputAddress2">Country</label>
                            <input type="text" class="form-control form-control-lg" id="inputAddress2"
                                   placeholder="Name" name="country">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="inputAddress2">State/Region</label>
                            <input type="text" class="form-control form-control-lg" id="inputAddress2"
                                   placeholder="Name" name="state">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="inputAddress2">Address</label>
                            <textarea type="text" class="form-control form-control-lg" id="inputAddress2"
                                      placeholder="Address" name="address"></textarea>
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
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Photograph</th>
                        <th> Country</th>
                        <th> State/Region</th>
                        <th> Address</th>
                        <th>Date Initiated</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($members as $member)
                        <tr>
                            <td>{{$member->name}}</td>
                            <td>{{$member->phone}}</td>
                            <td>
                                <img src="{{ asset('dashboard/user/images/'.$member->selfie) }}" style="width: 150px;">
                            </td>
                            <td>{{$member->country}}</td>
                            <td>{{$member->state}}</td>
                            <td>{{$member->address}}</td>
                            <td>{{$member->created_at}}</td>
                            <td>
                                @switch($member->status)
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
                        <th>Name</th>
                        <th> Country</th>
                        <th> State/Region</th>
                        <th> Address</th>
                        <th>Date Initiated</th>
                        <th>Status</th>
                    </tr>
                    </tfoot>
                </table>
                {{$members->links()}}
            </div>
        </div>
    </div>

@endsection

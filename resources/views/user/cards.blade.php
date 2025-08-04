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
                    <form class="row g-3" method="post" action="{{route('card.apply')}}">
                        @csrf
                        @include('templates.notification')
                        <div class="form-group col-md-12">
                            <label for="inputAddress2">Delivery Address</label>
                            <textarea type="text" class="form-control form-control-lg" id="inputAddress2"
                                      placeholder="Address" name="address"></textarea>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="inputAddress2">Name on Card</label>
                            <input type="text" class="form-control form-control-lg" id="inputAddress2"
                                   placeholder="Name" name="name">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="inputAddress2">Card Type</label>
                            <select type="number" class="form-control form-control-lg" id="inputAddress2"
                                    name="cardType">
                                <option value="">Choose Card Type</option>
                                <option >Mastercard</option>
                                <option>Visa</option>
                                <option>Discover</option>
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
                        <th>Delivery Address</th>
                        <th>Name on Card</th>
                        <th>Card Type</th>
                        <th>Date Initiated</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($cards as $card)
                        <tr>
                            <td>{{$card->reference}}</td>
                            <td>{{$card->address}}</td>
                            <td>{{$card->name}}</td>
                            <td>{{$card->cardType}}</td>
                            <td>{{$card->created_at}}</td>
                            <td>
                                @switch($card->status)
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
                        <th>Delivery Address</th>
                        <th>Name on Card</th>
                        <th>Payment Method</th>
                        <th>Date Initiated</th>
                        <th>Status</th>
                    </tr>
                    </tfoot>
                </table>
                {{$cards->links()}}
            </div>
        </div>
    </div>

@endsection

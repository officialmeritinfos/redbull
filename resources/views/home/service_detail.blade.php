@extends('home.base')
@section('content')
    <!-- Start Page-title Area -->
    <div class="page-title-area bg-black">
        <div class="container">
            <div class="page-title-content">
                <h2>{{$pageName}}</h2>
                <ul>
                    <li><a href="{{url('/')}}">Home</a></li>
                    <li>{{$pageName}}</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- End Page-title Area -->

    <!-- Start Services Details Area -->
    <div class="services-details-area ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="services-details-desc">
                        <h3>{{$service->title}}</h3>
                        <p>{{$service->short}}</p>
                        <img src="{{asset('home/serv/'.$service->photo)}}" alt="image">
                        <p>
                            {!! str_replace('MYSITE',$siteName,$service->content) !!}
                        </p>
                    </div>
                </div>


            </div>
        </div>
    </div>

@endsection

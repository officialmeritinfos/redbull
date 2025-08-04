@extends('home.base')
@section('content')
    @push('css')
        <style>
            small {
                font-size: 14px;
                text-transform: initial;
            }

            .single-price {
                text-align: center;
                background: #262626;
                transition: .7s;
                margin-top: 20px;
            }

            .single-price h3 {
                font-size: 30px;
                color: #000;
                font-weight: 600;
                text-align: center;
                margin: 0;
                margin-top: -80px;
                margin-bottom: 1rem;
                font-family: poppins;
                color: #fff;
            }

            .single-price h4 {
                font-size: 20px;
                font-weight: 500;
                color: #fff;
            }

            .single-price h4 span.sup {
                vertical-align: text-top;
                font-size: 15px;
            }

            .deal-top {
                position: relative;
                background: #0c1023;
                font-size: 16px;
                text-transform: uppercase;
                padding: 136px 24px 0;
            }

            .deal-top::after {
                content: "";
                position: absolute;
                left: 0;
                bottom: -50px;
                width: 0;
                height: 0;
                border-top: 50px solid #0c1023;
                border-left: 175px solid transparent;
                border-right: 183px solid transparent;
            }

            .deal-bottom {
                padding: 56px 16px 0;
            }

            .deal-bottom ul {
                margin: 0;
                padding: 0;
            }

            .deal-bottom ul li {
                font-size: 16px;
                color: #fff;
                font-weight: 300;
                margin-top: 16px;
                border-top: 1px solid #E4E4E4;
                padding-top: 16px;
                list-style: none;
            }

            .btn-area a {
                display: inline-block;
                font-size: 18px;
                color: #fff;
                background: #0c1023;
                padding: 8px 64px;
                margin-top: 32px;
                border-radius: 4px;
                margin-bottom: 40px;
                text-transform: uppercase;
                font-weight: bold;
                text-decoration: none;
            }


            .single-price:hover {
                background: #0c1023;
            }

            .single-price:hover .deal-top {
                background: #262626;
            }

            .single-price:hover .deal-top:after {
                border-top: 50px solid #262626;
            }

            .single-price:hover .btn-area a {
                background: #262626;
            }

            /* ignore the code below */


            .link-area {
                position: fixed;
                bottom: 20px;
                left: 20px;
                padding: 15px;
                border-radius: 40px;
                background: #0c1023;
            }

            .link-area a {
                text-decoration: none;
                color: #fff;
                font-size: 25px;
            }
        </style>
    @endpush
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

    <div class="pricing-area" style="margin-bottom: 5rem;margin-top: 5rem;">
        <div class="container">
            <div class="row justify-content-center">
                @foreach($packages as $package)
                    @inject('option','App\Defaults\Custom')
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="single-price">
                            <div class="deal-top">
                                <h3>{{$package->name}}</h3>
                                <h4> {{$package->roi}}%/ <span
                                        class="sup">{{$option->getReturnType($package->returnType)}}</span> </h4>
                                <small class="text-white">{{$package->note}}</small>
                            </div>
                            <div class="deal-bottom">
                                <ul class="deal-item">
                                    <li>
                                        Price: ${{number_format($package->minAmount,2)}} - @if($package->isUnlimited !=1)
                                            ${{number_format($package->maxAmount,2)}}
                                        @else
                                            Unlimited
                                        @endif
                                    </li>
                                    <li>Profit return: {{$package->roi}}% {{$option->getReturnType($package->returnType)}}</li>
                                    <li>Contract Duration: {{$package->Duration}}</li>
                                    <li>Referral Bonus: {{$package->referral}}% </li>
                                </ul>
                                <div class="btn-area">
                                    <a href="{{route('register')}}">Get Started</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>


@endsection

@extends('home.base')
@section('content')

    <!-- Start Home Area -->
    <div class="home-slides owl-carousel owl-theme">
        <div class="single-banner-item bg1">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-12">
                        <div class="banner-item-content">
                            <span class="sub-title">WELCOME TO {{ $siteName }}</span>
                            <h1>Diversified Investment Solutions for a Wealthier Future</h1>
                            <p>From cryptocurrency and real estate to oil, gold, and medical cannabis — {{ $siteName }} helps you grow and protect your wealth across the world’s most lucrative markets.</p>
                            <div class="btn-box">
                                <a href="{{ route('login') }}" class="default-btn">Login <i class="ri-arrow-right-line"></i></a>
                                <a href="{{ route('register') }}" class="default-btn">Get Started <i class="ri-arrow-right-line"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-12">
                        <div class="banner-item-image">
                            <img src="{{ asset('home/img/banner/banner2.png') }}" alt="image">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="single-banner-item bg2">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-12">
                        <div class="banner-item-content">
                            <span class="sub-title">WHY CHOOSE {{ $siteName }}</span>
                            <h1>Invest Smarter, Live Better</h1>
                            <p>Our team of experts brings deep insight across financial markets to help you plan retirement, hedge with gold, invest in property, or tap into the fast-growing crypto and cannabis economies.</p>
                            <div class="btn-box">
                                <a href="{{ route('login') }}" class="default-btn">Login <i class="ri-arrow-right-line"></i></a>
                                <a href="{{ route('register') }}" class="default-btn">Get Started <i class="ri-arrow-right-line"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-12">
                        <div class="banner-item-image">
                            <img src="{{ asset('home/img/banner/banner3.png') }}" alt="image">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="single-banner-item bg3">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-12">
                        <div class="banner-item-content">
                            <span class="sub-title">YOUR FUTURE STARTS HERE</span>
                            <h1>Build Long-Term Wealth With Confidence</h1>
                            <p>Whether you’re a seasoned investor or just getting started, {{ $siteName }} gives you access to vetted opportunities that align with your risk profile and financial goals.</p>
                            <div class="btn-box">
                                <a href="{{ route('login') }}" class="default-btn">Login <i class="ri-arrow-right-line"></i></a>
                                <a href="{{ route('register') }}" class="default-btn">Get Started <i class="ri-arrow-right-line"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-12">
                        <div class="banner-item-image">
                            <img src="{{ asset('home/img/banner/banner4.png') }}" alt="image">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Home Area -->

    <div style="height:62px; background-color: #1D2330; overflow:hidden; box-sizing: border-box;
border: 1px solid #282E3B; border-radius: 4px; text-align: right; line-height:14px; block-size:62px;
font-size: 12px; font-feature-settings: normal; text-size-adjust: 100%;
box-shadow: inset 0 -20px 0 0 #262B38;padding:1px;padding: 0px; margin: 0px; width: 100%;"><div style="height:40px; padding:0px; margin:0px; width: 100%;"><iframe src="https://widget.coinlib.io/widget?type=horizontal_v2&amp;theme=dark&amp;pref_coin_id=1505&amp;invert_hover=no" width="100%" height="36px" scrolling="auto" marginwidth="0" marginheight="0" frameborder="0" border="0" style="border:0;margin:0;padding:0;"></iframe></div></div>



    <!-- Start Services Area -->
<div class="services-area pt-100">
    <div class="container">
        <div class="section-title">
            <span class="sub-title">SERVICES</span>
            <h2>Our Dedicated Services</h2>
            <p>We offer a wide-range of services which allows our users to earn unlimitedly.</p>
        </div>

        <div class="services-slides owl-carousel owl-theme">
            @foreach($services as $service)
            <div class="single-services-box">
                <div class="image">
                    <a href="{{route('service.details',['id'=>$service->id])}}">
                        <img src="{{asset('home/serv/'.$service->photo)}}" alt="image">
                    </a>
                </div>
                <div class="content">
                    <h3><a href="{{route('service.details',['id'=>$service->id])}}">{{$service->title}}</a></h3>
                    <p>
                        {{$service->short}}
                    </p>
                    <a href="{{route('service.details',['id'=>$service->id])}}" class="default-btn">Read More <i
                            class="ri-arrow-right-line"></i></a>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</div>
<!-- End Services Area -->

<!-- Start About Area -->
<div class="about-area ptb-100">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-12">
                <div class="about-image">
                    <img src="{{asset('home/img/about/about1.png')}}" alt="image">
                </div>
            </div>

            <div class="col-lg-6 col-md-12">
                <div class="about-content">
                    <span class="sub-title">ABOUT {{strtoupper($siteName)}}</span>
                    <h2>Your Pathway to Financial Freedom</h2>
                    <p>
                        Founded in 2012, we are a global investment agency helping individuals build their financial
                        dreams into reality. From a humble beginning, we have grown to become a notable force in the
                        investment industry with over 40K+ users.
                    </p>
                    <p>
                        We are your all-in-one destination for navigating the world of investments. Specializing in
                        Crypto Mining, stocks, retirement planning, gold, medical cannabis, and oil and gas,
                        {{$siteName}} is
                        your gateway to a diverse range of lucrative opportunities.
                    </p>
                    <p>
                        At {{$siteName}}, we're not just an investment platform; we're your financial ally on the path
                        to
                        success. Our mission is to empower investors with the knowledge and tools they need to make
                        informed
                        decisions across various financial landscapes.
                    </p>
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-6">
                            <div class="single-about-box">
                                <div class="icon">
                                    <i class="ri-star-line"></i>
                                </div>
                                <h3>Proficiency</h3>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-6">
                            <div class="single-about-box">
                                <div class="icon">
                                    <i class="ri-settings-2-line"></i>
                                </div>
                                <h3>AI-Integrated</h3>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-6">
                            <div class="single-about-box">
                                <div class="icon">
                                    <i class="ri-line-chart-line"></i>
                                </div>
                                <h3>Result-driven</h3>
                            </div>
                        </div>
                    </div>
                    <a href="{{url('/')}}" class="default-btn">Read More <i class="ri-arrow-right-line"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End About Area -->

<!-- Start Funfacts Area -->
<div class="funfacts-area bg-color">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-3 col-sm-3 col-md-3 col-6">
                <div class="single-funfacts-box">
                    <h3><span class="odometer" data-count="1">00</span><span class="sign">M+</span></h3>
                    <p>Trader Accounts</p>
                </div>
            </div>

            <div class="col-lg-3 col-sm-3 col-md-3 col-6">
                <div class="single-funfacts-box">
                    <h3><span class="odometer" data-count="30">00</span><span class="sign">M+</span></h3>
                    <p>Monthly Transaction</p>
                </div>
            </div>

            <div class="col-lg-3 col-sm-3 col-md-3 col-6">
                <div class="single-funfacts-box">
                    <h3><span class="odometer" data-count="16">00</span><span class="sign">M+</span></h3>
                    <p>Average monthly payouts</p>
                </div>
            </div>

            <div class="col-lg-3 col-sm-3 col-md-3 col-6">
                <div class="single-funfacts-box">
                    <h3><span class="odometer" data-count="211">00</span><span class="sign">M+</span></h3>
                    <p>Monthly trade turnover</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Funfacts Area -->

<!-- Start Projects Area -->
<div class="projects-area pt-100 pb-70">
    <div class="container">
        <div class="section-title">
            <span class="sub-title">Our Industries</span>
            <h2>You can checkout the Industries we trade on</h2>
        </div>

        <div class="row justify-content-center">
            @foreach($sectors as $project)
            <div class="col-lg-4 col-md-6">
                <div class="single-projects-box">
                    <img src="{{asset('home/serv/'.$project->photo)}}" alt="image">
                    <h3>{{$project->title}}</h3>
                    <span>Financial</span>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- End Projects Area -->

<!-- Start Testimonial Area -->
<div class="testimonial-area ptb-100 bg-fafafa">
    <div class="container">
        <div class="section-title">
            <span class="sub-title">TESTIMONIALS</span>
            <h2>Hear what our clients say</h2>
            <p>
                Don't take our words for it, hear from our active clients
            </p>
        </div>

        <div class="testimonial-slides owl-carousel owl-theme">
            <div class="single-testimonial-box">
                <div class="row align-items-center">
                    <div class="col-lg-8 col-md-8">
                        <div class="testimonial-desc">
                            <i class="ri-double-quotes-l"></i>
                            <p>
                                Investing with {{$siteName}} has been a game-changer for my financial world.
                                My first investment of $150 grew to yield over $1000 and that increased my faith in
                                them.
                            </p>
                            <div class="info">
                                <h3>Silver Alex</h3>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-4">
                        <div class="testimonial-image">
                            <img src="https://ui-avatars.com/api/?name=Silver+alex" alt="image">
                        </div>
                    </div>
                </div>
            </div>

            <div class="single-testimonial-box">
                <div class="row align-items-center">
                    <div class="col-lg-8 col-md-8">
                        <div class="testimonial-desc">
                            <i class="ri-double-quotes-l"></i>
                            <p>
                                {{$siteName}} is simply the best. I started out trading cryptocurrencies on Binance but
                                after so many losses, I decided to seek for a real Broker to help me;{{$siteName}} has
                                been
                                that real broker for me for the past 1 year
                            </p>
                            <div class="info">
                                <h3>Sarah T.</h3>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-4">
                        <div class="testimonial-image">
                            <img src="https://ui-avatars.com/api/?name=Sarah+T" alt="image">
                        </div>
                    </div>
                </div>
            </div>

            <div class="single-testimonial-box">
                <div class="row align-items-center">
                    <div class="col-lg-8 col-md-8">
                        <div class="testimonial-desc">
                            <i class="ri-double-quotes-l"></i>
                            <p>
                                Navigating the world of financial freedom has been a hectic journey for me until I met
                                with
                                {{$siteName}}. Since then, I just relax and plan my vacation from my returns on
                                {{$siteName}}.
                            </p>
                            <div class="info">
                                <h3>Edward Anderson</h3>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-4">
                        <div class="testimonial-image">
                            <img src="https://ui-avatars.com/api/?name=Edwards+A" alt="image">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Testimonial Area -->


<!-- Start Free Quote Area -->
<div class="free-quote-area bg-color">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5 col-md-12">
                <div class="free-quote-content">
                    <span class="sub-title">FREE CALCULATOR</span>
                    <h2>Calculate your Earning</h2>
                </div>
            </div>

            <div class="col-lg-7 col-md-12">
                <div class="free-quote-form">
                    <h3>SEE WHAT YOUR EARNING COULD BE</h3>
                    <form action="{{route('calculate.return')}}" method="post">
                        @include('templates.notification')
                        @csrf
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>Your Amount</label>
                                    <input type="text" class="form-control" name="amount">
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>Your Email</label>
                                    <input type="text" class="form-control" name="email">
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>Package</label>
                                    <select class="form-select" name="package">
                                        <option value="">Select a Package</option>
                                        @foreach($packages as $package)
                                        <option value="{{$package->id}}">{{$package->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <button type="submit" class="default-btn">Receive my Earning Calculation<i
                                            class="ri-arrow-right-line"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="shape3"><img src="{{asset('home/img/shape/shape8.png')}}" alt="image"></div>
</div>
<!-- End Free Quote Area -->

<!-- Start Blog Area -->
{{-- <div class="blog-area pt-100 pb-70">
    <div class="container">
        <div class="section-title">
            <span class="sub-title">Latest Transactions</span>
            <h2>Most Recent Transactions</h2>
        </div>

        <div class="row">

            <div class="col-md-6">
                <div class="sec-title_title" style="margin-bottom: 3rem;margin-top: 3rem;">Recent Deposits</div>
                <table class="table align-middle mb-0 bg-white">
                    <thead class="bg-light">
                        <tr>
                            <th>Name</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($deposits as $deposit)
                        @inject('option','App\Defaults\Custom')
                        <tr>
                            <td>{{$option->getInvestor($deposit->user)}}</td>
                            <td>${{number_format($deposit->amount,2)}}</td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>

            </div>

            <div class="col-md-6">
                <div class="sec-title_title" style="margin-bottom: 3rem;margin-top: 3rem;">Latest Withdrawals</div>
                <table class="table align-middle mb-0 bg-white">
                    <thead class="bg-light">
                        <tr>
                            <th>Name</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($withdrawals as $withdrawal)
                        @inject('option','App\Defaults\Custom')
                        <tr>
                            <td>{{$option->getInvestor($withdrawal->user)}}</td>
                            <td>${{number_format($withdrawal->amount,2)}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>

        </div>
    </div>
    </section> --}}
    <!-- End News One -->


    <!-- Start Blog Area -->
    <div class="blog-area pt-100 pb-70">
        <div class="container">
            <div class="section-title">
                <span class="sub-title">OUR BLOGS</span>
                <h2>Latest News in the industry</h2>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-12 col-md-12">
                    <div class="single-blog-post">
                        <rssapp-wall id="38kEBNRCi1vuK60z"></rssapp-wall>
                        <script src="https://widget.rss.app/v1/wall.js" type="text/javascript" async></script>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- End Blog Area -->


    @endsection

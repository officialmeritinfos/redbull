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


    <!-- END SECTION TEAM -->
    <section class="promo-section ptb-100" style="margin-top: 3rem;margin-bottom: 5rem;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading mb-5 text-center">
                        <h2>Frequently Asked Questions</h2>
                    </div>
                </div>
            </div>
            <!--pricing faq start-->
            <div class="row">


                <div class="col-lg-6">

                    <div id="accordion-1" class="accordion accordion-faq">
                        <!-- Accordion card 1 -->
                        <div class="card">
                            <div class="card-header py-4" id="heading-1-1" data-bs-toggle="collapse" role="button"
                                 data-bs-target="#collapse-1-1" aria-expanded="false" aria-controls="collapse-1-1">
                                <h6 class="mb-0"><span class="ti-receipt mr-3"></span> What is {{$siteName}}?</h6>
                            </div>
                            <div id="collapse-1-1" class="collapse" aria-labelledby="heading-1-1"
                                 data-parent="#accordion-1">
                                <div class="card-body">
                                    <p>{{$siteName}} our company provides a full investment service focused on the bitcoin
                                        and cryptocurrency market We are among the best platforms to invest and grow your
                                        bitcoin and other cryptocurrency. </p>
                                </div>
                            </div>
                        </div>
                        <!-- Accordion card 3 -->

                    </div>

                    <div id="accordion-1" class="accordion accordion-faq">
                        <!-- Accordion card 1 -->
                        <div class="card">
                            <div class="card-header py-4" id="heading-1-2" data-bs-toggle="collapse" role="button"
                                 data-bs-target="#collapse-1-2" aria-expanded="false" aria-controls="collapse-1-2">
                                <h6 class="mb-0"><span class="ti-receipt mr-3"></span> How do I create my account?</h6>
                            </div>
                            <div id="collapse-1-2" class="collapse" aria-labelledby="heading-1-2"
                                 data-parent="#accordion-1">
                                <div class="card-body">
                                    <p>Registration process is very easy and will take a few moments to complete Simply click CREATE ACCOUNT button  and fill in all the required fields</p>
                                </div>
                            </div>
                        </div>
                        <!-- Accordion card 3 -->

                    </div>

                    <div id="accordion-1" class="accordion accordion-faq">
                        <!-- Accordion card 1 -->
                        <div class="card">
                            <div class="card-header py-4" id="heading-1-3" data-bs-toggle="collapse" role="button"
                                 data-bs-target="#collapse-1-3" aria-expanded="false" aria-controls="collapse-1-3">
                                <h6 class="mb-0"><span class="ti-receipt mr-3"></span> How do I make a deposit?</h6>
                            </div>
                            <div id="collapse-1-3" class="collapse" aria-labelledby="heading-1-3"
                                 data-parent="#accordion-1">
                                <div class="card-body">
                                    <p>
                                        To deposit funds in your trading account is quick and simple. For your
                                        convenience you may choose one of the several available deposit methods.
                                        To make a successful deposit please follow the steps below:<br>
                                        <ul>
                                            <li>Login to your account Click on the New Investment button in the
                                                DASHBOARD section.<br>
                                            </li>

                                            <li>Choose the deposit option And fill the form including the amount and
                                                the package.
                                            </li>
                                            <li>
                                                You will receive the wallet address to make payment to on the next page.
                                                After payment, contact support.
                                            </li>
                                            <li>
                                                Once your deposit has been confirmed, the status of the investment will change
                                                to <span class="text-primary">Ongoing</span> which means that it has been confirmed
                                                and your investment started.
                                            </li>
                                        </ul>


                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- Accordion card 3 -->

                    </div>

                    <div id="accordion-1" class="accordion accordion-faq">
                        <!-- Accordion card 1 -->
                        <div class="card">
                            <div class="card-header py-4" id="heading-1-4" data-bs-toggle="collapse" role="button"
                                 data-bs-target="#collapse-1-4" aria-expanded="false" aria-controls="collapse-1-4">
                                <h6 class="mb-0"><span class="ti-receipt mr-3"></span> How long does my deposit take before it can reflect on my {{$siteName}} account dashboard?</h6>
                            </div>
                            <div id="collapse-1-4" class="collapse" aria-labelledby="heading-1-4"
                                 data-parent="#accordion-1">
                                <div class="card-body">
                                    <p>Your deposit will be reflected immediately once it is confirmed on the blockchain network</p>
                                </div>
                            </div>
                        </div>
                        <!-- Accordion card 3 -->

                    </div>

                </div>

                <div class="col-lg-6">

                    <div id="accordion-2" class="accordion accordion-faq">
                        <!-- Accordion card 1 -->
                        <div class="card">
                            <div class="card-header py-4" id="heading-1-5" data-bs-toggle="collapse" role="button"
                                 data-bs-target="#collapse-2-5" aria-expanded="false" aria-controls="collapse-2-5">
                                <h6 class="mb-0"><span class="ti-receipt mr-3"></span> How do I make a withdrawal?</h6>
                            </div>
                            <div id="collapse-2-5" class="collapse" aria-labelledby="heading-2-5"
                                 data-parent="#accordion-2">
                                <div class="card-body">
                                    <p>To make a withdrawal request click the WITHDRAW button at the top center of your {{$siteName}} account dashboard and input the required details to withdraw</p>
                                </div>
                            </div>
                        </div>
                        <!-- Accordion card 3 -->

                    </div>

                    <div id="accordion-2" class="accordion accordion-faq">
                        <!-- Accordion card 1 -->
                        <div class="card">
                            <div class="card-header py-4" id="heading-1-6" data-bs-toggle="collapse" role="button"
                                 data-bs-target="#collapse-2-6" aria-expanded="false" aria-controls="collapse-2-6">
                                <h6 class="mb-0"><span class="ti-receipt mr-3"></span> How long does it take to process my withdrawal?</h6>
                            </div>
                            <div id="collapse-2-6" class="collapse" aria-labelledby="heading-2-6"
                                 data-parent="#accordion-2">
                                <div class="card-body">
                                    <p>Once we receive your withdrawal request we process immediately and send to your bitcoin wallet</p>
                                </div>
                            </div>
                        </div>
                        <!-- Accordion card 3 -->

                    </div>

                    <div id="accordion-2" class="accordion accordion-faq">
                        <!-- Accordion card 1 -->
                        <div class="card">
                            <div class="card-header py-4" id="heading-1-7" data-bs-toggle="collapse" role="button"
                                 data-bs-target="#collapse-2-7" aria-expanded="false" aria-controls="collapse-2-7">
                                <h6 class="mb-0"><span class="ti-receipt mr-3"></span> Can I have more than one account?</h6>
                            </div>
                            <div id="collapse-2-7" class="collapse" aria-labelledby="heading-2-7"
                                 data-parent="#accordion-2">
                                <div class="card-body">
                                    <p>No you cannot have more than one account only investors on the vip plan are allowed to do so</p>
                                </div>
                            </div>
                        </div>
                        <!-- Accordion card 3 -->

                    </div>

                    <div id="accordion-2" class="accordion accordion-faq">
                        <!-- Accordion card 1 -->
                        <div class="card">
                            <div class="card-header py-4" id="heading-1-8" data-bs-toggle="collapse" role="button"
                                 data-bs-target="#collapse-2-8" aria-expanded="false" aria-controls="collapse-2-8">
                                <h6 class="mb-0"><span class="ti-receipt mr-3"></span> Is this company properly registered?</h6>
                            </div>
                            <div id="collapse-2-8" class="collapse" aria-labelledby="heading-2-8"
                                 data-parent="#accordion-2">
                                <div class="card-body">
                                    <p>Yes we are officially and properly registered with the address {!! $web->address !!} .
                                        Our company registration number is 11147136  and registered with the name {{$siteName}}</p>
                                </div>
                            </div>
                        </div>
                        <!-- Accordion card 3 -->

                    </div>

                    <div id="accordion-2" class="accordion accordion-faq">
                        <!-- Accordion card 1 -->
                        <div class="card">
                            <div class="card-header py-4" id="heading-1-9" data-bs-toggle="collapse" role="button"
                                 data-bs-target="#collapse-2-9" aria-expanded="false" aria-controls="collapse-2-9">
                                <h6 class="mb-0"><span class="ti-receipt mr-3"></span> Can I have more than two accounts?</h6>
                            </div>
                            <div id="collapse-2-9" class="collapse" aria-labelledby="heading-2-9"
                                 data-parent="#accordion-2">
                                <div class="card-body">
                                    <p>Yes, you can have multiple accounts</p>
                                </div>
                            </div>
                        </div>
                        <!-- Accordion card 3 -->

                    </div>

                    <div id="accordion-2" class="accordion accordion-faq">
                        <!-- Accordion card 1 -->
                        <div class="card">
                            <div class="card-header py-4" id="heading-1-10" data-bs-toggle="collapse" role="button"
                                 data-bs-target="#collapse-2-10" aria-expanded="false" aria-controls="collapse-2-10">
                                <h6 class="mb-0"><span class="ti-receipt mr-3"></span> how many times can i make a deposit?</h6>
                            </div>
                            <div id="collapse-2-10" class="collapse" aria-labelledby="heading-2-10"
                                 data-parent="#accordion-2">
                                <div class="card-body">
                                    <p>You can make as many deposit as you want on any of our investment plans.</p>
                                </div>
                            </div>
                        </div>
                        <!-- Accordion card 3 -->

                    </div>

                </div>

            </div>
            <!--pricing faq end-->
        </div>
    </section><!-- END SECTION FAQ -->

@endsection

@extends('home.base')

@section('content')
    <!-- Hero area starts-->
    <section class="hero-area ">
        <div class="hero-banner">
            <div class="inner-hero">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12">
                            <div class="hero-text">
                                <h2>{{$pageName}}</h2>
                                <span><a href="{{url('/')}}" class="home">Home</a> | <a href="#" class="disabled">{{$pageName}}</a></span>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero area ends -->

    <!-- Team Starts -->
    <div class="home-2-team home-3-team">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title home-2-section-title">
                        <div class="sub-heading">
                            <p></p>
                        </div>
                        <h1>
                            Going to great lengths to protect your information
                        </h1>
                        <p>
                            Our online security procedures and policies have been carefully designed to help protect your
                            financial assets and personal information.
                        </p>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="vertical-list default-component__wrapper" data-dl-aem_component.id="vertical_list">

                        <ul><li><hr class="divider" />
                                <div class="vertical-list-item__wrapper vertical-list-item-default__wrapper"><div class="vertical-list-item-icon__wrapper"><img alt="" src="/content/dam/tda/shared/icons/brand-expression/nobg_gearset.svg"/></div><div class="vertical-list-item-body-inline__wrapper"><div class="vertical-list-item-body-inline-headline__wrapper"><h3 class="heading--secondary"> Security products &amp; services</h3></div><div class="vertical-list-item-body-inline-description__wrapper"><div class="paragraph--main">Safeguard your computer and your identity… at low or no cost. <br />
                                               </div></div></div></div></li><li><hr class="divider" /><div class="vertical-list-item__wrapper vertical-list-item-default__wrapper"><div class="vertical-list-item-icon__wrapper"><img alt="" src="/content/dam/tda/shared/icons/brand-expression/nobg_cost.svg"/></div><div class="vertical-list-item-body-inline__wrapper"><div class="vertical-list-item-body-inline-headline__wrapper"><h3 class="heading--secondary">Asset protection guarantee</h3></div><div class="vertical-list-item-body-inline-description__wrapper"><div class="paragraph--main">You’re protected in case of unauthorized activity. <br />
                                                </div></div></div></div></li><li><hr class="divider" /><div class="vertical-list-item__wrapper vertical-list-item-default__wrapper"><div class="vertical-list-item-icon__wrapper"><img alt="" src="/content/dam/tda/shared/icons/brand-expression/nobg_documentcheck.svg"/></div><div class="vertical-list-item-body-inline__wrapper"><div class="vertical-list-item-body-inline-headline__wrapper"><h3 class="heading--secondary">Leading-edge procedures</h3></div><div class="vertical-list-item-body-inline-description__wrapper"><div class="paragraph--main">Committed to delivering a safe trading environment. <br />
                                                </div></div></div></div></li><li><hr class="divider" /><div class="vertical-list-item__wrapper vertical-list-item-default__wrapper"><div class="vertical-list-item-icon__wrapper"><img alt="" src="/content/dam/tda/shared/icons/brand-expression/nobg_threedevices.svg"/></div><div class="vertical-list-item-body-inline__wrapper"><div class="vertical-list-item-body-inline-headline__wrapper"><h3 class="heading--secondary">Start with the right tools</h3></div><div class="vertical-list-item-body-inline-description__wrapper"><div class="paragraph--main">To help you safeguard your computer and your identity, we've arranged for special pricing on products and services from trusted industry leaders. </div></div></div></div></li></ul>
                        <hr/>
                    </div>
                </div>
                <div class="col-md-12 mt-30">
                    <div class="section-title home-2-section-title">

                        <h1>
                            Additional steps for protecting yourself
                        </h1>
                    </div>
                    <ul style="list-style-type: circle;">
                        <li>Check your site and browser settings - choose settings that can help reduce the chances that hackers could access your computer. </li>
                        <li>Learn about security tools - take a layered approach to online safety with firewalls, antivirus software, and anti-spyware software.</li>
                        <li>Use our electronic document delivery - streamline delivery to reduce the risk of identity theft.</li>
                        <li>Get online safety tips - learn simple ways to check site security, avoid email fraud, and create more security passwords.</li>
                        <li>Know the threats - know what to look for, and you'll be better able to avoid identity theft, phishing, and other dangers. </li>
                    </ul>
                </div>
            </div>



        </div>
    </div>


@endsection

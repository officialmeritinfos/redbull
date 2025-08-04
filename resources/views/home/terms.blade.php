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


    <!--About One Start-->
    <section class="about-one">
        <div class="container">
            <div class="section-title text-center">
                <span class="section-title__tagline"></span>
            </div>
            <div class="row">

                <div class="col-xl-12">
                    <div class="about-one__right">
                        <h4>1. Introduction</h4>
                        <p>{{$siteName}} is an automated investment platform available online and through mobile applications.</p>
                        <p>We offer an automated investment service. As our Client, we will manage your investment on your behalf in a very low cost manner to maximize your returns. By using our website, you enter into a series of legally binding agreements. You also agree to our Privacy Policy which covers how we collect, use, share and store your personal information.</p>

                        <p>When you access our website ("our website" (which includes our blog), "our app" or “{{$siteName}}") as a User and Client, you're agreeing to be bound by the following Terms of Use. Please therefore take the time to read the following binding Terms of Use below. For the purpose of this agreement a User is an individual who uses our website to evaluate our service, or for educational purposes and a Client is an individual who signs up on {{$siteName}} that entitles the Client to have his or her investment portfolio managed by {{$siteName}}. This Agreement, as well as the Privacy Policy applies to both Users and Clients. If you elect to become a Client, you will be subject to these Terms of Use, our Client Agreement, our Privacy Policy and any additional terms to which you agree when you create and fund an investment plan.</p>

                        <h4>2. Obligations</h4>
                        <p>You must be 18 or older to access our website or mobile applications.</p>

                        <p>{{$siteName}} is intended solely for individuals who are 18 or older. Any access to or use of {{$siteName}} by anyone under 18 is unauthorized, unlicensed, and in violation of these Terms of Use. By accessing or using {{$siteName}}, you represent and warrant that you are 18 or older.</p>
                        <p>In order to access certain features of {{$siteName}}, you must register to create an account ("User Account"). When you register, you will be asked to choose a password, which you will be required to use to access your User Account. {{$siteName}} has physical, electronic and procedural safeguards that comply with regulatory standards to guard Users' and Clients' non-public personal information (see Privacy Policy). You are responsible for safeguarding your password and other User Account information. You agree not to disclose your password to any third party and you will notify {{$siteName}} immediately if your password is lost or stolen or if you suspect any unauthorized use of your User Account. As a User you agree that you shall be solely responsible for any activities or actions under your User Account, whether or not you have authorized such activities or actions. You agree that the information you provide to us on account registration through our website or mobile applications will be true, accurate, current, and complete.</p>

                        <h4>3. Disclaimer and Limit of Liability</h4>
                        <p>{{$siteName}} cannot be held responsible for any financial insights or recommendations provided to users.</p>

                        <p>For a User who is not a Client You understand and acknowledge that the investment results you could obtain from investment information and financial insights provided by {{$siteName}} cannot be guaranteed and that {{$siteName}} Finance cannot be held responsible. All investments entail a risk of loss and that you may lose money. Investment management services may be offered to individuals who become clients, at the sole discretion of {{$siteName}}. Your election to engage our investment services are subject to your explicit enrollment and acceptance of this Terms of Use.. You agree and understand that your use of {{$siteName}} is for educational purposes only and is not intended to provide legal, tax or financial planning advice. You agree as a User that you are responsible for your own investment research and investment decisions, that {{$siteName}} is only one of many tools you may use as part of a comprehensive investment education process, that you should not and will not rely on {{$siteName}} as the primary basis of your investment decisions and, except as otherwise provided for herein, {{$siteName}} will not be liable for decisions/actions you take or authorize third parties to take on your behalf based on information you receive as a User of {{$siteName}} or information you otherwise see on our website.</p>

                        <h4>4. Termination</h4>
                        <p>Each of us can end this agreement at any time, subject to the maturity of all plans. We may suspend your access to {{$siteName}}, at any time with prior notice to you if your account is found to be fraudulent.</p>

                        <p>We will fully cooperate with any law enforcement authorities or court order requesting or directing us to disclose the identity of anyone posting, publishing, or otherwise making available any User information, emails, or other materials that are believed to violate these Terms of Use. Any suspension,  or cancellation shall not affect your obligations to {{$siteName}} under these Terms of Use (including but not limited to ownership, indemnification, and limitation of liability), which by their sense and context are intended to survive such suspension, termination, or cancellation.</p>

                        <h4>5. General Terms</h4>
                        <p>In the event that any provision in these Terms of Use is held to be invalid or unenforceable, the remaining provisions will remain in full force and effect. The failure of a party to enforce any right or provision of these Terms of Use will not be deemed a waiver of such right or provision. You may not assign this Agreement (by operation of law or otherwise) without the prior written consent of {{$siteName}}, and any prohibited assignment will be null and void.</p>

                        <p>{{$siteName}} may assign this Terms of Use Agreement or any rights hereunder without your consent. The relationship of the parties under these Terms of Use is that of independent contractors, and these Terms of Use will not be construed to imply that either party is the agent, employee, or joint venture of the other. Note that if you elect to become a Client, the relationship of the parties will be governed by these Terms of Use, our Privacy Policy and any additional terms to which you agree when you create and fund an investment account. We reserve the right to change this Agreement by posting a revised Terms of Use and we agree that changes cannot be retroactive. If you don't agree with these changes, you must stop using {{$siteName}}.</p>

                    </div>
                </div>
                <div class="col-xl-12">
                    <div class="about-one__right">


                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--About One End-->


@endsection

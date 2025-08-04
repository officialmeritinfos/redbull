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
                        <p>Hi! We've created this privacy policy to explain how we collect, use, disclose and protect your information; including any nonpublic personal information.</p>

                        <p>This policy applies to information we collect when you use our website (collectively, "Services") or otherwise interact with us as described below. We may change this privacy policy from time to time. If we make changes, we will notify you by revising the date at the top of this policy, and in some cases, we may provide you with additional notice (such as by adding a statement to the homepages of our website or by sending you an email notification).</p>

                        <p>We encourage you to review the privacy policy whenever you interact with us to stay informed about our information practices and the ways you can help protect your privacy. This privacy policy applies to the Services provided by {{$siteName}} (“we” or “us”).</p>

                        <h4>2. Collection of Information</h4>
                        <p>When you create an {{$siteName}} account, we may collect information, including non-public personal information about you from non-affiliated third party service providers in order to verify your identity and for fraud prevention, including your prior addresses and names.</p>
                        <p>We may collect information you provide to us, such as your name, email address and any other information you choose to provide. For example, we may collect such information if you request an invite to join Quantum Finance or if you enter into any contest or promotion.</p>

                        <h4>3. Cookies</h4>
                        <p>Most web browsers are set to accept cookies by default. If you prefer, you can usually choose to set your browser to remove or reject browser cookies. Please note that if you choose to remove or reject cookies, this could affect the availability and functionality of our Services.</p>

                        <h4>4. Security</h4>
                        <p>{{$siteName}} takes reasonable measures to help protect all information about you from loss, theft, misuse and unauthorized access, disclosure, alteration and destruction. Additionally, Quantum Finance implements policies designed to protect the confidentiality and security of your nonpublic personal information, including a privacy protection policy. Quantum Finance limits access to your nonpublic personal information to employees that have a business reason to know such information, and implement security practices and procedures designed to protect the confidentiality and security of such information and prohibit unlawful disclosure of such information in accordance with its policies.</p>

                        <p>Where you have chosen a password that allows you to access certain parts of the website, you are responsible for keeping this password confidential. We advise you not to share your password with anyone. We have also taken measures to comply with provision of security facilities for the protection of your nonpublic personal information through the set up of firewalls, limited access to specified authorized individuals, encryption and continuous capacity building for relevant personnel. We therefore have digital and physical security measures to limit and eliminate possibilities of data privacy breach incidents.</p>

                        <p>Although we use appropriate security measures once we have received your personal information, the transmission of data over the internet (including by email) is never completely secure. We endeavour to protect personal information, but we cannot guarantee the security of data transmitted to us or by us. We will notify you and any applicable regulator of a breach where we are legally required to do so.</p>

                        <h4>5. Where we store your Data</h4>
                        <p>The data that we collect from you will be transferred to and stored at a destination outside the United States of America. By submitting your personal data, you agree to this transfer, storing or processing. We will take all steps reasonably necessary to ensure that your data is treated securely and in accordance with this privacy policy.All information you provide to us is stored on our secure cloud storage solution.</p>

                        <p>Your personal information will not be retained for longer than is necessary for the purposes for which it was processed.</p>

                        <h4>6. How long we keep your personal information</h4>
                        <p>We will hold your personal information on Quantum Finance’s systems for as long as is necessary to fulfil the purpose for which it was collected or to comply with legal, regulatory or internal policy requirements.</p>

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

@extends('home.innerBase')
@section('content')

    @push('body')

        <body class="envato_tk_templates-template envato_tk_templates-template-elementor_header_footer single single-envato_tk_templates postid-294 elementor-default elementor-template-full-width elementor-kit-6 elementor-page elementor-page-294">
        @endpush
        <div data-elementor-type="wp-post" data-elementor-id="294" class="elementor elementor-294" data-elementor-settings="[]">
            <div class="elementor-section-wrap">
                <style>
                    .fullscreen-bg {
                        position: absolute;
                        top: 0;
                        right: 0;
                        bottom: 0;
                        left: 0;
                        overflow: hidden;
                    }
                    .fullscreen-bg__video {
                        position: absolute;
                        top: 0;
                        right: 0;
                        bottom: 0;
                        left: 0;
                        width: 100%;
                        height: auto;
                    }
                    @media (min-aspect-ratio: 16/9) {
                        .fullscreen-bg__video {
                            width: 100%;
                            height: auto;
                        }
                    }
                    @media (max-width: 767px) {
                        .fullscreen-bg__video {
                            width: auto;
                            height: auto;
                        }
                        .fullscreen-bg{
                            width: 1000px;
                        }
                    }
                    #overlay {
                        position: absolute;
                        display: block;
                        width: 100%;
                        height: 100%;
                        top: 0;
                        left: 0;
                        right: 0;
                        bottom: 0;
                        background-color: rgba(0,0,0,0.3);
                        z-index: 1;
                        cursor: pointer;
                    }
                </style>
                <section class="ob-is-breaking-bad elementor-section elementor-top-section elementor-element elementor-element-f1ac91d elementor-section-height-min-height elementor-section-boxed elementor-section-height-default elementor-section-items-middle" data-id="f1ac91d" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;_ob_bbad_use_it&quot;:&quot;yes&quot;,&quot;_ob_bbad_sssic_use&quot;:&quot;no&quot;,&quot;_ob_glider_is_slider&quot;:&quot;no&quot;}">
                    <div class="elementor-background-overlay">
                    </div>
                    <div id="overlay"></div>
                    <div class="fullscreen-bg">
                        <video autoplay muted loop playsinline class="fullscreen-bg__video">
                            <source src="{{asset('home/static/temp/video/video3.mp4')}}" type="video/mp4">
                            Your browser does not support HTML5 video.
                        </video>
                    </div>
                    <div class="elementor-container elementor-column-gap-default" style="z-index: 2">
                        <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-b36272c elementor-invisible" data-id="b36272c" data-element_type="column" data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;animation&quot;:&quot;fadeInUp&quot;,&quot;_ob_bbad_is_stalker&quot;:&quot;no&quot;,&quot;_ob_teleporter_use&quot;:false,&quot;_ob_column_hoveranimator&quot;:&quot;no&quot;,&quot;_ob_column_has_pseudo&quot;:&quot;no&quot;}">
                            <div class="elementor-widget-wrap elementor-element-populated">
                                <div class="elementor-element elementor-element-467b2a0 ob-harakiri-inherit elementor-widget elementor-widget-heading" data-id="467b2a0" data-element_type="widget" data-settings="{&quot;_ob_harakiri_writing_mode&quot;:&quot;inherit&quot;,&quot;_ob_perspektive_use&quot;:&quot;no&quot;,&quot;_ob_shadough_use&quot;:&quot;no&quot;,&quot;_ob_allow_hoveranimator&quot;:&quot;no&quot;,&quot;_ob_widget_stalker_use&quot;:&quot;no&quot;}" data-widget_type="heading.default">
                                    <div class="elementor-widget-container">
                                        <h1 class="elementor-heading-title elementor-size-default">{{$pageName}}
                                        </h1>
                                    </div>
                                </div>
                                <div class="elementor-element elementor-element-293bf1b ob-harakiri-inherit elementor-widget elementor-widget-heading" data-id="293bf1b" data-element_type="widget" data-settings="{&quot;_ob_harakiri_writing_mode&quot;:&quot;inherit&quot;,&quot;_ob_perspektive_use&quot;:&quot;no&quot;,&quot;_ob_shadough_use&quot;:&quot;no&quot;,&quot;_ob_allow_hoveranimator&quot;:&quot;no&quot;,&quot;_ob_widget_stalker_use&quot;:&quot;no&quot;}" data-widget_type="heading.default">
                                    <div class="elementor-widget-container">
                                        <h5 class="elementor-heading-title elementor-size-default">
                                            Help us build the future by empowering everyday people to generate income and control their wealth
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="ob-is-breaking-bad elementor-section elementor-top-section elementor-element elementor-element-9e55886 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="9e55886" data-element_type="section" data-settings="{&quot;_ob_bbad_use_it&quot;:&quot;yes&quot;,&quot;_ob_bbad_sssic_use&quot;:&quot;no&quot;,&quot;_ob_glider_is_slider&quot;:&quot;no&quot;}">
                    <div class="elementor-container elementor-column-gap-default">
                        <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-3dc3f31 elementor-invisible" data-id="3dc3f31" data-element_type="column" data-settings="{&quot;animation&quot;:&quot;fadeInLeft&quot;,&quot;_ob_bbad_is_stalker&quot;:&quot;no&quot;,&quot;_ob_teleporter_use&quot;:false,&quot;_ob_column_hoveranimator&quot;:&quot;no&quot;,&quot;_ob_column_has_pseudo&quot;:&quot;no&quot;}">
                            <div class="elementor-widget-wrap elementor-element-populated">
                                <div class="elementor-element elementor-element-80935ab ob-harakiri-inherit elementor-widget elementor-widget-heading" data-id="80935ab" data-element_type="widget" data-settings="{&quot;_ob_harakiri_writing_mode&quot;:&quot;inherit&quot;,&quot;_ob_perspektive_use&quot;:&quot;no&quot;,&quot;_ob_shadough_use&quot;:&quot;no&quot;,&quot;_ob_allow_hoveranimator&quot;:&quot;no&quot;,&quot;_ob_widget_stalker_use&quot;:&quot;no&quot;}" data-widget_type="heading.default">
                                    <div class="elementor-widget-container">
                                        <h6 class="elementor-heading-title elementor-size-default">Work With Us
                                        </h6>
                                    </div>
                                </div>
                                <div class="elementor-element elementor-element-9193c26 ob-harakiri-inherit elementor-widget elementor-widget-heading" data-id="9193c26" data-element_type="widget" data-settings="{&quot;_ob_harakiri_writing_mode&quot;:&quot;inherit&quot;,&quot;_ob_perspektive_use&quot;:&quot;no&quot;,&quot;_ob_shadough_use&quot;:&quot;no&quot;,&quot;_ob_allow_hoveranimator&quot;:&quot;no&quot;,&quot;_ob_widget_stalker_use&quot;:&quot;no&quot;}" data-widget_type="heading.default">
                                    <div class="elementor-widget-container">
                                        <h2 class="elementor-heading-title elementor-size-default">Become a {{$siteName}} staff
                                        </h2>
                                    </div>
                                </div>
                                <div class="elementor-element elementor-element-ca77d0c ob-harakiri-inherit elementor-widget elementor-widget-text-editor" data-id="ca77d0c" data-element_type="widget" data-settings="{&quot;_ob_harakiri_writing_mode&quot;:&quot;inherit&quot;,&quot;_ob_perspektive_use&quot;:&quot;no&quot;,&quot;_ob_shadough_use&quot;:&quot;no&quot;,&quot;_ob_allow_hoveranimator&quot;:&quot;no&quot;,&quot;_ob_widget_stalker_use&quot;:&quot;no&quot;}" data-widget_type="text-editor.default">
                                    <div class="elementor-widget-container">
                                        <p>
                                            At {{$siteName}}, each of us is a captain of our spaceship and free to come up with new ideas to improve our journey. We’re empowered to make decisions for ourselves, for our team, and even for our leaders in order to innovate and build trust. Join us in our mission to give our customers greater choice, independence, and opportunity.
                                        </p>
                                        <p>
                                            Submit your application through our site. If your skills appear to be a good match for the role, you’ll hear from us regarding next steps. If you don’t move forward in the process at this time, there are always other opportunities!
                                        </p>
                                    </div>
                                </div>
                                <div class="elementor-element elementor-element-2e76fa3 elementor-widget elementor-widget-button" data-id="2e76fa3" data-element_type="widget" data-settings="{&quot;_ob_butterbutton_use_it&quot;:&quot;no&quot;,&quot;_ob_perspektive_use&quot;:&quot;no&quot;,&quot;_ob_shadough_use&quot;:&quot;no&quot;,&quot;_ob_allow_hoveranimator&quot;:&quot;no&quot;,&quot;_ob_widget_stalker_use&quot;:&quot;no&quot;}" data-widget_type="button.default">
                                    <div class="elementor-widget-container">
                                        <div class="elementor-button-wrapper">
                                            <a href="mailto:{{$web->email}}" class="elementor-button-link elementor-button elementor-size-md elementor-animation-wobble-horizontal" role="button">
                        <span class="elementor-button-content-wrapper">
                          <span class="elementor-button-text">Submit Resume <i class="fa fa-arrow-circle-right"></i>
                          </span>
                        </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-3dc3f31 elementor-invisible" data-id="3dc3f31" data-element_type="column" data-settings="{&quot;animation&quot;:&quot;fadeInLeft&quot;,&quot;_ob_bbad_is_stalker&quot;:&quot;no&quot;,&quot;_ob_teleporter_use&quot;:false,&quot;_ob_column_hoveranimator&quot;:&quot;no&quot;,&quot;_ob_column_has_pseudo&quot;:&quot;no&quot;}">
                            <div class="elementor-widget-wrap elementor-element-populated">
                                <div class="elementor-element elementor-element-80935ab ob-harakiri-inherit elementor-widget elementor-widget-heading" data-id="80935ab" data-element_type="widget" data-settings="{&quot;_ob_harakiri_writing_mode&quot;:&quot;inherit&quot;,&quot;_ob_perspektive_use&quot;:&quot;no&quot;,&quot;_ob_shadough_use&quot;:&quot;no&quot;,&quot;_ob_allow_hoveranimator&quot;:&quot;no&quot;,&quot;_ob_widget_stalker_use&quot;:&quot;no&quot;}" data-widget_type="heading.default">
                                    <div class="elementor-widget-container">
                                        <img width="1600" height="1024" src="{{asset('home/static/temp/wp-content/uploads/sites/56/2021/08/career.jpg')}}" class="attachment-full size-full" alt="" loading="lazy" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>



        @endsection

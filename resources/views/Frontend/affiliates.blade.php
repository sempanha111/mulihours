@extends('Frontend/layout.app')
@section('content')
    @include('Frontend/layout.header')
    <div class="banner_wrap banner_wrap_sub">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="banner_left inside">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <h1>Affiliate Program</h1>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="welcome_wrap">
        <div class="container">
            <div class="row">



                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <h1>Referral<span> commission</span></h1>
                    <p>Join our referral and representative program to unlock exclusive benefits. Refer friends and
                        colleagues to earn rewards and incentives for each successful referral. Become a representative
                        and gain access to specialized training, support, and commissions for promoting our
                        website within your network. Join us today and start earning!</p>
                    <div class="about-buttons">
                        <a href="certificate.pdf" class="cert" target="_blank">30% - 50% Commission</a>
                    </div>

                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="affiliates-righ">
                        <img style="max-width: 400px" src="{{ asset('assets_frontend/images/ref1.png')}}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="profit-container">
        <div class="container">
            <div class="about-block">
                <div class="row">
                    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                        <div class="about-top">
                            <h5>hk registered company:</h5>
                            <h3>MULTIHOURS LTD <span>#1827953</span></h3>
                        </div>

                        <div class="about-bottom">
                            <div class="row">

                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="contact-block">
                                        <img src="styles/images/about-icon1.png" alt="">
                                        <p>34 Tai Yau Street, San Po Kong, Kowloon, Hongkong</p>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="contact-block contact-block2">
                                        <img src="styles/images/about-icon2.png" alt="">
                                        <p>admin@multihours.com</p>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="about-buttons">
                            <a href="certificate.pdf" class="cert" target="_blank">Download cert</a>

                            <a href="?a=rules" class="about-but" target="_blank">Terms and conditions</a>
                        </div>

                    </div>

                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <div class="cert-container">
                            <img src="{{ asset('assets_frontend/images/certificate.png')}}" alt="">
                        </div>
                    </div>

                </div>
            </div>


        </div>
    </div>
    @include('Frontend/layout/footer')

@endsection

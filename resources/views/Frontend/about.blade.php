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
                                <h1>About multihours.com</h1>
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
                    <h1>Welcome to <span>multihours.com!</span></h1>
                    <p>Welcome to the website of multihours.com! If you find yourself here, you are definitely in search of
                        reliable and profitable investment. Yes, you are just at the right place! Our company offers trust
                        assets management of the highest quality on the basis of foreign exchange and profitable trade
                        through Bitcoin exchanges. There is no other worldwide financial market that can guarantee a daily
                        ability to generate constant profit with the large price swings of Bitcoin. Proposed modalities for
                        strengthening cooperation will be accepted by anyone who uses cryptocurrency and knows about its
                        fantastic prospects. Your deposit is working on an ongoing basis, and makes profit every day with
                        the ability to withdraw profit instantly. Join our company today and start making high profits!</p>

                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="about-right">

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

                            <a href="/rules" class="about-but">Terms and conditions</a>
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

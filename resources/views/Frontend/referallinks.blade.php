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
                                <h1>Promotion Tools</h1>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="member_wrap">

        <div class="container">
            <div class="row">


                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                    <div class="membersidebar">

                        @include('Frontend/layout/membersidebar')

                    </div>
                </div>


                <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">

                    <div class="member_inside">
                        <div class="member-container">
                            <div class="member-right">
                                <div class="top">
                                    <p>Affiliate Link:</p>
                                            <h2><a>http://127.0.0.1:8000/signup?rel={{ Auth::user()->fullname }}</a></h2>
                                </div><br /><br /><br />

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
                                            <img style="max-width: 400px" src="http://127.0.0.1:8000/assets_frontend/images/ref1.png" alt="">
                                        </div>
                                    </div>
                                </div>






                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
    @include('Frontend/layout/footer')
@endsection

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

                                <h1>Dashboard</h1>

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


                                <div class="member_left">

                                    <div class="row">
                                        <div class="col-lg-4 col-md4 col-sm-12 col-xs-12">
                                            <div class="left">
                                                <div class="image-container"><img src="{{ asset('assets_frontend/images/acc1.png')}}"
                                                        alt="">
                                                </div>
                                                <h2>{{ Auth::user()->fullname}}</h2>
                                                <div class="option">Username</div>

                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md4 col-sm-12 col-xs-12">
                                            <div class="mid1">
                                                <div class="image-container"><img src="{{ asset('assets_frontend/images/acc2.png')}}"
                                                        alt="">
                                                </div>
                                                <h2>{{ request()->getClientIp() }}</h2>
                                                <div class="option">Current IP</div>

                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md4 col-sm-12 col-xs-12">
                                            <div class="mid2">
                                                <div class="image-container"><img src="{{ asset('assets_frontend/images/acc3.png')}}"
                                                        alt="">
                                                </div>
                                                <h2>{{ Auth::user()->created_at->format('d/m/Y')}}</h2>
                                                <div class="option">Signup Date</div>

                                            </div>
                                        </div>

                                    </div>

                                </div>




                                <div class="row">
                                    <div class="col-lg-12 col-md12 col-sm-12 col-xs-12">
                                        <div class="top">
                                            <p>Affiliate Link:</p>
                                            <h2><a>http://127.0.0.1:8000/signup?rel={{ Auth::user()->fullname }}</a></h2>
                                        </div>
                                    </div>
                                </div>






                                <div class="account_mid">
                                    <div class="mem_mid one">


                                        <div class="mem_mid_right">

                                            <a href="/dashboard/deposit" class="acc_button two"><span>Make Deposit</span></a>
                                            <span class="acc-bal">&nbsp;</span>
                                            <p class="big">$ {{ number_format($account_balance, 2)  }}</p>
                                            <strong>Account Balance</strong>
                                            <div class="mid-bottom">
                                                <p>Total Deposit: <span>$ {{ number_format($total_deposit, 2)}}</span></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mem_mid two">


                                        <div class="mem_mid_right">

                                            <a href="/dashboard/withdraw" class="acc_button one"><span>Withdraw Funds</span></a>
                                            <span class="ear-tot">&nbsp;</span>
                                            <p class="big">${{ number_format($earn_only,2) }}</p>
                                            <strong>Earned Total</strong>
                                            <div class="mid-bottom">
                                                <p>Total Withdrew: <span>$ {{ number_format($total_withdraw_success, 2) }}</span></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mem_mid three">

                                        <div class="mem_mid_right">


                                            <a href="/dashboard/referallinks" class="acc_button one"><span>Get Referallink</span></a>

                                            <span class="acc-dep">&nbsp;</span>

                                            <p class="big">${{ number_format($total_deposit_actives, 2)}}</p>
                                            <strong>Active Deposit</strong>

                                            <div class="mid-bottom">
                                                <p>Last Deposit: <span>${{ number_format($total_last_deposit, 2)}}</span></p>
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
    </div>
    @include('Frontend/layout/footer')
@endsection

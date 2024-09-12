@extends('Frontend/layout.app')

@section('style')
@endsection

@section('content')
<div class="wrapper">
    <div class="wrapper2">

        @include('Frontend/layout.header')


        <div class="banner_wrap">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="banner_left">

                            <div class="header_wrap">
                                <div class="header_top">

                                    <div class="row">

                                        <div class="col-lg-6  col-md-5 col-sm-12 col-xs-12">

                                            <div class="server-time" >
                                                <span class="server-title">
                                                    <img  src="{{ asset('assets_frontend/images/coin4.png') }}"
                                                        alt="" />Server Time:</span> <span>@php
                                                            use Carbon\Carbon;
                                                            $formattedDate = Carbon::now()->format('l, F j g:i A');
                                                        @endphp

                                                        <p style="margin-bottom: 0">{{ $formattedDate }}</p>
                                                        </span>
                                            </div>

                                        </div>


                                    </div>
                                </div>
                            </div>



                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <h1>Cryptocurrency <span>investment</span> & <span>Mining</span> zone</h1>
                                    <p>The easiest way to make extra profit from your cryptocurrency actives.</p>
                                    <a href="{{ route('singup_get')}}"  class="access">Register Now</a>
                                    <div class="bitcoin-price">

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    </div>
    <!--end wrapper-->
</div>
<!--end wrapper2-->

<div class="plans-container">
    <div class="container">
        <div class="row">
            <div class="plan_wrap">

                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">

                    <div class="plan-box">
                        <div class="plan-top">Basic Plan</div>
                        <div class="row">

                        </div>

                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <h1 style="text-align: center">150<span>%</span></h1>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <h2 style="text-align: center">after 72 hours</h2>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <ul>
                                    <li> Minimum Deposit: <span>$1</span></li>
                                    <li> Maximum Deposit: <span>$5</span></li>
                                    <li> Total Return: <span>150%</span></li>

                                </ul>


                            </div>
                        </div>

                    </div>
                    <!--end plan-box-->
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                        <div class="plan-bottom">

                            <div class="left" style="">
                                <label>Enter Amount</label>
                                <input class="form-control" name="amount" id="amount" value="1">
                            </div>
                            <div class="result">
                                <label>Total Profit:</label>
                                <h5 id="profitDaily"></h5>
                            </div>
                        </div>
                    </div>

                </div>






                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">

                    <div class="plan-box">
                        <div class="plan-top plan-top2">Gold Plan</div>
                        <div class="row">

                        </div>

                        <div class="row">
                            <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
                                <h1 style="text-align: center">200<span>%</span></h1>
                            </div>
                            <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                <h2 style="text-align: center">after 72 hours</h2>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <ul>
                                    <li> Minimum Deposit: <span>$5</span></li>
                                    <li> Maximum Deposit: <span>$15</span></li>
                                    <li> Total Return: <span>200%</span></li>

                                </ul>
                            </div>
                        </div>

                    </div>
                    <!--end plan-box-->
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                        <div class="plan-bottom">

                            <div class="left">
                                <label>Enter Amount</label>
                                <input class="form-control" name="amount1" id="amount1" value="5">
                            </div>
                            <div class="result">
                                <label>Total Profit:</label>
                                <h5 id="profitDaily1"></h5>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="plan-box">
                        <div class="plan-top plan-top3">Diamond Plan</div>
                        <div class="row">

                        </div>

                        <div class="row">
                            <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
                                <h1 style="text-align: center">250<span>%</span></h1>
                            </div>
                            <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                <h2 style="text-align: center">after 72 hours</h2>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <ul>
                                    <li> Minimum Deposit: <span>$15</span></li>
                                    <li> Maximum Deposit: <span>$150</span></li>
                                    <li> Total Return: <span>250%</span></li>

                                </ul>
                            </div>
                        </div>

                    </div>
                    <!--end plan-box-->
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                        <div class="plan-bottom">

                            <div class="left">
                                <label>Enter Amount</label>
                                <input class="form-control" name="amount2" id="amount2">
                            </div>
                            <div class="result">
                                <label>Total Profit:</label>
                                <h5 id="profitDaily2"></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end row-->




    </div>



    <div class="welcome_wrap">
        <div class="container">
            <div class="row">



                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <h1>Welcome to <span>multihours.com!</span></h1>
                    <p>Welcome to the website of multihours.com! If you find yourself here, you are definitely in
                        search of reliable and profitable investment. Yes, you are just at the right place! Our
                        company offers trust assets management of the highest quality on the basis of foreign
                        exchange and profitable trade through Bitcoin exchanges. There is no other worldwide
                        financial market that can guarantee a daily ability to generate constant profit with the
                        large price swings of Bitcoin. Proposed modalities for strengthening cooperation will be
                        accepted by anyone who uses cryptocurrency and knows about its fantastic prospects. Your
                        deposit is working on an ongoing basis, and makes profit everyday with the ability to
                        withdraw profit instantly. Join our company today and start making high profits!</p>
                    <p><a href="/about" class="info">Get more info</a></p>
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
                                        <img src="{{ asset('assets_frontend/images/about-icon1.png') }}" alt="">
                                        <p>34 Tai Yau Street, San Po Kong, Kowloon, Hongkong</p>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="contact-block contact-block2">
                                        <img src="{{ asset('assets_frontend/images/about-icon2.png') }}" alt="">
                                        <p>admin@multihours.com</p>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="about-buttons">
                            <a href="certificate.pdf" class="cert" target="_blank">Download cert</a>

                            <a href="/about" class="about-but" target="_blank">About multihours.com</a>
                        </div>

                    </div>

                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <div class="cert-container">
                            <img src="{{ asset('assets_frontend/images/certificate.png') }}" alt="">
                        </div>
                    </div>

                </div>
            </div>


            <div class="features-block">

                <h1>btclab.biz <span>features</span></h1>

                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <div class="feature">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <img src="{{ asset('assets_frontend/images/middle1.png') }}" alt="" />
                                    <h1>Sectigo SSL <br />Certificate</h1>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">

                        <div class="feature">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <img src="{{ asset('assets_frontend/images/middle2.png') }}" alt="" />
                                    <h1>AntiDDoS<br />Protection</h1>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">

                        <div class="feature">


                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <img src="{{ asset('assets_frontend/images/middle3.png') }}" alt="" />
                                    <h1>Dedicated<br />Server</h1>
                                </div>
                            </div>

                        </div>


                    </div>

                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <div class="feature">

                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <img src="{{ asset('assets_frontend/images/middle4.png') }}" alt="" />
                                    <h1>Instant<br />Withdrawals</h1>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>






            <div class="stats-block">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <div class="payout">
                            <div class="payout-right">
                                <div class="last10">Last 10 Deposits <img
                                        src="{{ asset('assets_frontend/images/last_dep.png') }}" /> </div>
                                <ul id="deposit">


                                    @if($deposits_lasts->isNotEmpty())
                                    @php
                                    $img = '';
                                    @endphp
                                    @foreach($deposits_lasts as $key => $deposits_last)
                                    @php
                                    if($deposits_last->money == 'perfect_money'){
                                    $img = '/assets_frontend/images/18.gif';
                                    }
                                    elseif ($deposits_last->money == 'payeer') {
                                    $img = '/assets_frontend/images/43.gif';
                                    }
                                    elseif ($deposits_last->money == 'bitcoin') {
                                    $img = '/assets_frontend/images/48.gif';
                                    }
                                    elseif ($deposits_last->money == 'litecoin') {
                                    $img = '/assets_frontend/images/68.gif';
                                    }
                                    elseif ($deposits_last->money == 'ethereum') {
                                    $img = '/assets_frontend/images/69.gif';
                                    }
                                    elseif ($deposits_last->money == 'bitcoin_cash') {
                                    $img = '/assets_frontend/images/77.gif';
                                    }
                                    @endphp
                                    <li>
                                        <span class="username">{{ $deposits_last->user->fullname }}</span>
                                        <span class="payment">$ {{ number_format($deposits_last->amount, 2)
                                            }}</span>
                                        <img src="{{ asset($img) }}" alt="Payment method image" />
                                    </li>
                                    @endforeach
                                    @else
                                    <div class="text-center">No Deposit Transaction yet</div>
                                    @endif


                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <div class="stat">
                            <div class="image-container"><img src="{{ asset('assets_frontend/images/stat1.png') }}"
                                    alt=""></div>
                            <h3 id="total_member">{{$total_member}}</h3>
                            <p>Total Members</p>
                        </div>
                        <div class="stat">
                            <div class="image-container"><img src="{{ asset('assets_frontend/images/stat2.png') }}"
                                    alt=""></div>
                            <h3 id="total_deposit">$ {{number_format($total_deposit, 2)}}</h3>
                            <p>Total Deposited</p>
                        </div>
                        <div class="stat">
                            <div class="image-container"><img src="{{ asset('assets_frontend/images/stat4.png') }}"
                                    alt=""></div>
                            <h3>{{ $days }}</h3>
                            <p>Days Online</p>
                        </div>
                        <div class="stat">
                            <div class="image-container"><img src="{{ asset('assets_frontend/images/stat3.png') }}"
                                    alt=""></div>
                            <h3 id="total_withdraw">$ {{number_format($total_withdraw, 2)}}</h3>
                            <p>Total Withdrawal</p>
                        </div>


                    </div>


                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <div class="payout">

                            <div class="payout-right">
                                <div class="last10 last10_paym">Last 10 Withdrawals <img   src="{{ asset('assets_frontend/images/last_paym.png') }}" /> </div>


                                <ul id="withdraw">


                                    @if($withdraw_lasts->isNotEmpty())
                                    @php
                                    $img = '';
                                    @endphp
                                    @foreach($withdraw_lasts as $key => $withdraw_last)
                                    @php
                                    if($withdraw_last->money == 'perfect_money'){
                                    $img = '/assets_frontend/images/18.gif';
                                    }
                                    elseif ($withdraw_last->money == 'payeer') {
                                    $img = '/assets_frontend/images/43.gif';
                                    }
                                    elseif ($withdraw_last->money == 'bitcoin') {
                                    $img = '/assets_frontend/images/48.gif';
                                    }
                                    elseif ($withdraw_last->money == 'litecoin') {
                                    $img = '/assets_frontend/images/68.gif';
                                    }
                                    elseif ($withdraw_last->money == 'ethereum') {
                                    $img = '/assets_frontend/images/69.gif';
                                    }
                                    elseif ($withdraw_last->money == 'bitcoin_cash') {
                                    $img = '/assets_frontend/images/77.gif';
                                    }
                                    @endphp
                                    <li>
                                        <span class="username">{{ $withdraw_last->user->fullname }}</span>
                                        <span class="payment">$ {{ number_format($withdraw_last->withdraw_request, 2)
                                            }}</span>
                                        <img src="{{ asset($img) }}" alt="Payment method image" />
                                    </li>
                                    @endforeach
                                    @else
                                    <div class="text-center">No Withdrawal Transaction yet</div>
                                    @endif


                                </ul>


                            </div>
                        </div>

                    </div>
                </div>
                <br><br>
                <div class="reffral"><img src="{{ asset('assets_frontend/images/paymenticons.png') }}" /></div>


            </div>




        </div>
    </div>


    <!-- footer section -->
    @include('Frontend/layout/footer')
    <!-- footer section -->

</div>

<script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>

<script type="text/javascript">


    Pusher.logToConsole = false;

    var pusher = new Pusher('d30362fcd1dea0ff8332', {
        cluster: 'ap1',
    });

    var channel = pusher.subscribe('channel');

    channel.bind('event', function(data) {



        $(document).ready(function() {

            $.ajax({
                type: "GET",
                url: "{{ route('update_index') }}",
                success: function(res) {
                    $('#total_member').text(res.total_member);
                    $('#total_deposit').text('$ ' + parseFloat(res.total_deposit).toFixed(2));
                    $('#total_withdraw').text('$ ' + parseFloat(res.total_withdraw).toFixed(2));

                    $('#deposit').html(res.html_deposits);
                    $('#withdraw').html(res.html_withdraw);


                }

            });



        });

    });
</script>




@endsection

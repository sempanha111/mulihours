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
                                <h1>Deposit Confirmation</h1>
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
                                <div class="top ">
                                    <p>Plan:</p>
                                    <h2 style="color: white">
                                        @if ($plan == 1)
                                            150% after 72 hours ( Basic Plan )
                                        @elseif($plan == 2)
                                            200% after 72 hours ( Gold Plan )
                                        @else
                                            250% after 72 hours ( Diamond Plan )
                                        @endif
                                    </h2>
                                </div>
                                <div class="top white">
                                    <p>Total Return: </p>
                                    <h2 style="color: white">
                                        @if ($plan == 1)
                                            150.00% after 72 hours
                                        @elseif($plan == 2)
                                            200.00% after 72 hours
                                        @else
                                            250.00% after 72 hours
                                        @endif
                                    </h2>
                                </div>
                                <div class="top white">
                                    <p>Principal Return: </p>
                                    <h2 style="color: white">Yes</h2>
                                </div>
                                <div class="top white">
                                    <p>Principal Withdraw: </p>
                                    <h2 style="color: white">Not available</h2>
                                </div>
                                <div class="top white">
                                    <p>Credit Amount:</p>
                                    <h2 style="color: white">$ {{ $amount }}</h2>
                                </div>
                                <div class="top white">
                                    <p>Deposit Fee:</p>
                                    <h2 style="color: white">0.00% + $0.00 (min. $0.00 max. $0.00)</h2>
                                </div>
                                <div class="top white">
                                    <p>Debit Amount:</p>
                                    <h2 style="color: white">$ {{ $amount }}</h2>
                                </div>
                            </div>

                        </div>
                    </div>

                    @php

                        if($type == 'perfect_money'){
                            $holder_transition_id = '345236423';
                            $my_wallet = 'U47746648';
                            $amount_cryptos = null;
                        }
                        elseif($type == 'payeer'){
                            $holder_transition_id = '1197898327';
                            $my_wallet = 'P1121200573';
                            $amount_cryptos = null;
                        }
                        elseif($type == 'bitcoin'){
                            $holder_transition_id = 'batch:';
                            $my_wallet = '3BvX5ipX3uRkvqEnXmMNNVW6DS3XxyEDgb';
                            $amount_cryptos = $amount  / $price_crypto_bitcoin;
                            $amount_crypto = number_format($amount_cryptos, 7) . ' BTC';
                            $qr_crypto = 'assets_frontend/images/btc.png';
                        }
                        elseif($type == 'litecoin'){
                            $holder_transition_id = 'batch';
                            $my_wallet = 'MGHtuaALaURDoX5DwCBTq7hvpM39MpFSHY';
                            $amount_cryptos = $amount  / $price_crypto_litecoin;
                            $amount_crypto = number_format($amount_cryptos, 7) . ' LTC';
                            $qr_crypto = 'assets_frontend/images/ltc.png';
                        }
                        elseif($type == 'ethereum'){
                            $holder_transition_id = 'batch';
                            $my_wallet = '0x310ED57aC2b9daF8337430F593FB9FEC9347fb8a';
                            $amount_cryptos = $amount  / $price_crypto_ethereum;
                            $amount_crypto = number_format($amount_cryptos, 7) . ' ETH';
                            $qr_crypto = 'assets_frontend/images/eth.png';
                        }
                        else{
                            $holder_transition_id = 'batch';
                            $my_wallet = '1M7dwMpJgNSR7P4QHVxHKgMJxdHJjdYcij';
                            $amount_cryptos = $amount  / $price_crypto_bitcoincash;
                            $amount_crypto = number_format($amount_cryptos, 7) . ' BCH';
                            $qr_crypto = 'assets_frontend/images/bch.png';
                        }


                    @endphp

                    @if($type == 'perfect_money' || $type == 'payeer')
                        <div class="alert alert-info">
                            <div>Please Send  to : {{ $my_wallet }} <br> Order status: Waiting for payment</div>
                        </div>
                    @else

                        <div class="alert alert-info" style="text-align: center;">
                            <img src="{{ asset($qr_crypto)}}" alt="" style="max-width: 30%; ">
                            <div>Please Send {{$amount_crypto}}   to : {{ $my_wallet }} <br> Order status: Waiting for payment</div>
                        </div>

                    @endif
                    <div class="member-right">
                        <form action="{{ route('deposit_send') }}" method="POST" class="my_accont">
                            @csrf
                            <table cellspacing="0" cellpadding="2" border="0" width="100%">
                                <tbody>
                                    <input type="hidden" name="amount_crypto" value="{{number_format($amount_cryptos, 7)}}">


                                    <tr>
                                        <td>Your Transaction ID</td>
                                        <td><input type="text" name="transaction_id" placeholder="{{$holder_transition_id}}" class="inpts"
                                                size="30">

                                            @error('transaction_id')
                                                <div>{{ $message }}</div>
                                            @enderror
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>&nbsp;</td>
                                        <td><input type="submit" value="Save" class="sbmt"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
            </div>


        </div>
    </div>
    @include('Frontend/layout/footer')
@endsection

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
                                <h1>Ask for Withdrawal</h1>
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
                                    <p>State:</p>
                                    <h2>Prepared</h2>
                                </div>
                                <div class="top white">
                                    <p>Date: </p>
                                    <h2>{{ \Carbon\Carbon::now() }} </h2>
                                </div>
                                <div class="top white">
                                    <p>Payment System: </p>
                                    <h2 style="color: white">{{ $money }}</h2>
                                </div>
                                <div class="top white">
                                    <p>Amount:</p>
                                    <h2 style="color: white">$ {{ $withdraw_request }}</h2>
                                </div>
                                @if($money != 'Perfect Money' && $money != 'Payeer')
                                <div class="top white">
                                    <p>Amount {{ $money }}:</p>
                                    <h2 style="color: white"> {{ $amount_crypto }}</h2>
                                </div>
                                @endif
                                <div class="top white">
                                    <p>To Account:</p>
                                    <h2 style="color: white"> {{ $account }}</h2>
                                </div>
                                <form action="{{ route('withdraw_send')}}" method="post">
                                    @csrf
                                    <input type="submit" value="Confirm" class="sbmt" style="float:inline-end;">
                                </form>

                            </div>

                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
    @include('Frontend/layout/footer')
@endsection

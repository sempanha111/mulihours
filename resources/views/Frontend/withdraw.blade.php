@extends('Frontend/layout.app')
@section('style')
    <style>

    </style>
@endsection
@section('content')
    @include('Frontend/layout.header')
    <div class="banner_wrap banner_wrap_sub">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="banner_left inside">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                                <h1>Withdraw Funds</h1>

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






                                <form action="{{ route('withdraw_checkout_sent')}}" method=post>
                                    @csrf


                                    <div class="withdraw-container">
                                        <table cellspacing=0 cellpadding=2 border=0>
                                            <tr>
                                                <td>Account Balance:</td>
                                                <td>$<b>{{ number_format($account_balance, 2) }}</b></td>
                                            </tr>
                                            <tr>
                                                <td>Pending Withdrawals: </td>
                                                <td>$<b>{{ number_format($total_panding, 2) }}</b></td>
                                            </tr>
                                        </table>

                                        <table cellspacing=0 cellpadding=2 border=0>
                                            <tr>
                                                <th></th>
                                                <th>Processing</th>
                                                <th>Available</th>
                                                <th>Pending</th>
                                                <th>Account</th>
                                            </tr>
                                            <tr>
                                                <td  width=10><input type=radio name=wallet  value="perfect_money" checked></td>
                                                <td><img src="{{ asset('assets_frontend/images/18.gif') }}" width=44
                                                        height=17 align=absmiddle>
                                                    PerfectMoney</td>
                                                <td><b style="color:green">${{ number_format($perfect_moneys_able, 2) }}</b>
                                                </td>
                                                <td><b
                                                        style="color:red">${{ number_format($withdraw_panding_perfect_money, 2) }}</b>
                                                </td>
                                                <td><a
                                                        href="/dashboard/edit_account"><i>{{ Auth::user()->perfect_money != null ? Auth::user()->perfect_money : 'not set' }}</i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td  width=10><input type=radio name=wallet  value="payeer"></td>
                                                <td><img src="{{ asset('assets_frontend/images/43.gif') }}" width=44
                                                        height=17 align=absmiddle> Payeer
                                                </td>
                                                <td><b style="color:green">${{ number_format($payeer_able, 2) }}</b></td>
                                                <td><b
                                                        style="color:red">${{ number_format($withdraw_panding_payeer, 2) }}</b>
                                                </td>
                                                <td><a
                                                        href="/dashboard/edit_account"><i>{{ Auth::user()->payeer != null ? Auth::user()->payeer : 'not set' }}</i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td  width=10><input type=radio name=wallet
                                                        value="bitcoin"></td>
                                                <td><img src="{{ asset('assets_frontend/images/48.gif') }}" width=44
                                                        height=17 align=absmiddle> Bitcoin
                                                </td>
                                                <td><b style="color:green">${{ number_format($bitcoins_able, 2) }}</b></td>
                                                <td><b
                                                        style="color:red">${{ number_format($withdraw_panding_bitcoins, 2) }}</b>
                                                </td>
                                                <td><a
                                                        href="/dashboard/edit_account"><i>{{ Auth::user()->bitcoin != null ? Auth::user()->bitcoin : 'not set' }}</i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td  width=10><input type=radio name=wallet
                                                        value="litecoin"></td>
                                                <td><img src="{{ asset('assets_frontend/images/68.gif') }}" width=44
                                                        height=17 align=absmiddle>
                                                    Litecoin</td>
                                                <td><b style="color:green">${{ number_format($litecoins_able, 2) }}</b>
                                                </td>
                                                <td><b
                                                        style="color:red">${{ number_format($withdraw_panding_litecoins, 2) }}</b>
                                                </td>
                                                <td><a
                                                        href="/dashboard/edit_account"><i>{{ Auth::user()->litecoin != null ? Auth::user()->litecoin : 'not set' }}</i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td  width=10><input type=radio name=wallet
                                                        value="ethereum"></td>
                                                <td><img src="{{ asset('assets_frontend/images/69.gif') }}" width=44
                                                        height=17 align=absmiddle>
                                                    Ethereum</td>
                                                <td><b style="color:green">${{ number_format($ethereums_able, 2) }}</b>
                                                </td>
                                                <td><b
                                                        style="color:red">${{ number_format($withdraw_panding_ethereums, 2) }}</b>
                                                </td>
                                                <td><a
                                                        href="/dashboard/edit_account"><i>{{ Auth::user()->ethereum != null ? Auth::user()->ethereum : 'not set' }}</i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td  width=10><input type=radio name=wallet
                                                        value="bitcoin_cash"></td>
                                                <td><img src="{{ asset('assets_frontend/images/77.gif') }}" width=44
                                                        height=17 align=absmiddle> Bitcoin
                                                    Cash</td>
                                                <td><b style="color:green">${{ number_format($bitcoin_cashs_able, 2) }}</b>
                                                </td>
                                                <td><b
                                                        style="color:red">${{ number_format($withdraw_panding_bitcoin_cashs, 2) }}</b>
                                                </td>
                                                <td><a
                                                        href="/dashboard/edit_account"><i>{{ Auth::user()->bitcoin_cash != null ? Auth::user()->bitcoin_cash : 'not set' }}</i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                            </tr>
                                        </table>

                                        <br><br>
                                        <input type="submit" value="Withdraw" class="sbmt">
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

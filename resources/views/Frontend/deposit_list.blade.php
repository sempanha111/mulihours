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
                                <h1>Your Deposits</h1>
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


                                <div class="account_header">Total: ${{ number_format($account_balance,2)}}</div>
                                <div class="my_accont">
                                    <table cellspacing=1 cellpadding=2 border=0 width=100% class=line>
                                        <tr>
                                            <td class=item>
                                                <table cellspacing=1 cellpadding=2 border=0 width=100%>
                                                    <tr>
                                                        <td colspan=4 align=center><b>150% After 72 Hours</b></td>
                                                    </tr>
                                                    <tr>
                                                        <td class=inheader width=200>Plan</td>
                                                        <td class=inheader>End</td>
                                                        <td class=inheader width=200>Deposit Amount</td>
                                                        <td class=inheader width=100 nowrap>
                                                            <nobr> Profit (%)</nobr>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class=item><b>Plan 1</b></td>
                                                        <td class=item><b>After 72 Hours</b></td>
                                                        <td class=item align=right><b>$1.00 - $5.00</b></td>
                                                        <td class=item align=right><b>150.00</b></td>
                                                    </tr>
                                                    @if ($plan1s->isNotEmpty())
                                                        @foreach ($plan1s as $plan1)
                                                            @php
                                                                $end_plan = Carbon\Carbon::parse($plan1->end_plan);
                                                                $current_date = Carbon\Carbon::now();
                                                            @endphp
                                                            @if ($current_date->lt($end_plan))
                                                                <tr>
                                                                    <td class="item" style="color: rgb(0, 237, 32)">Active
                                                                        Plan</td>
                                                                    <td class="item">{{ $plan1->end_plan }}</td>
                                                                    <td class="item" width="200" align="right">
                                                                        ${{ $plan1->amount }}</td>
                                                                    <td class="item" width="200" align="right">
                                                                        ${{ $plan1->amount * 1.5 }}</td>
                                                                </tr>
                                                            @endif
                                                        @endforeach
                                                    @else
                                                        <tr>
                                                            <td colspan="4"><b>No deposits for this plan</b></td>
                                                        </tr>
                                                    @endif
                                                </table>

                                            </td>
                                        </tr>
                                    </table>
                                    <br>
                                    <table cellspacing=1 cellpadding=2 border=0 width=100% class=line>
                                        <tr>
                                            <td class=item>
                                                <table cellspacing=1 cellpadding=2 border=0 width=100%>
                                                    <tr>
                                                        <td colspan=4 align=center><b>200% After 72 Hours</b></td>
                                                    </tr>
                                                    <tr>
                                                        <td class=inheader width=200>Plan</td>
                                                        <td class=inheader>End</td>
                                                        <td class=inheader width=200>Deposit Amount</td>
                                                        <td class=inheader width=100 nowrap>
                                                            <nobr> Profit (%)</nobr>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class=item><b>Plan 2</b></td>
                                                        <td class=item><b>After 72 Hours</b></td>
                                                        <td class=item align=right><b>$5.00 - $15.00</b></td>
                                                        <td class=item align=right><b>200.00</b></td>
                                                    </tr>
                                                    @if ($plan1s->isNotEmpty())
                                                        @foreach ($plan2s as $plan2)
                                                            @php
                                                                $end_plan = Carbon\Carbon::parse($plan2->end_plan);
                                                                $current_date = Carbon\Carbon::now();
                                                            @endphp
                                                            @if ($current_date->lt($end_plan))
                                                                <tr>
                                                                    <td class="item" style="color: rgb(0, 237, 32)">Active
                                                                        Plan</td>
                                                                    <td class="item">{{ $plan2->end_plan }}</td>
                                                                    <td class="item" width="200" align="right">
                                                                        ${{ $plan2->amount }}</td>
                                                                    <td class="item" width="200" align="right">
                                                                        ${{ $plan2->amount * 2 }}</td>
                                                                </tr>
                                                            @endif
                                                        @endforeach
                                                    @else
                                                        <tr>
                                                            <td colspan="4"><b>No deposits for this plan</b></td>
                                                        </tr>
                                                    @endif
                                                </table>

                                            </td>
                                        </tr>
                                    </table>
                                    <br>
                                    <table cellspacing=1 cellpadding=2 border=0 width=100% class=line>
                                        <tr>
                                            <td class=item>
                                                <table cellspacing=1 cellpadding=2 border=0 width=100%>
                                                    <tr>
                                                        <td colspan=4 align=center><b>250% After 72 Hours</b></td>
                                                    </tr>
                                                    <tr>
                                                        <td class=inheader width=200>Plan</td>
                                                        <td class=inheader>End</td>
                                                        <td class=inheader width=200>Deposit Amount</td>
                                                        <td class=inheader width=100 nowrap>
                                                            <nobr> Profit (%)</nobr>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class=item><b>Plan 3</b></td>
                                                        <td class=item><b>After 72 Hours</b></td>
                                                        <td class=item align=right><b>$15.00 - $150.00</b></td>
                                                        <td class=item align=right><b>250.00</b></td>
                                                    </tr>
                                                    @if ($plan3s->isNotEmpty())
                                                        @foreach ($plan3s as $plan3)
                                                            @php
                                                                $end_plan = Carbon\Carbon::parse($plan3->end_plan);
                                                                $current_date = Carbon\Carbon::now();
                                                            @endphp
                                                            @if ($current_date->lt($end_plan))
                                                                <tr>
                                                                    <td class="item" style="color: rgb(0, 237, 32)">Active
                                                                        Plan</td>
                                                                    <td class="item">{{ $plan3->end_plan }}</td>
                                                                    <td class="item" width="200" align="right">
                                                                        ${{ $plan3->amount }}</td>
                                                                    <td class="item" width="200" align="right">
                                                                        ${{ $plan3->amount * 2.5 }}</td>
                                                                </tr>
                                                            @endif
                                                        @endforeach
                                                    @else
                                                        <tr>
                                                            <td colspan="4"><b>No deposits for this plan</b></td>
                                                        </tr>
                                                    @endif
                                                </table>

                                            </td>
                                        </tr>
                                    </table>
                                    <br>
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

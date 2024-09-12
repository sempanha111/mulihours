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

                                <h1>Earning History</h1>

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

								<div class="my_accont">


									<table cellspacing=1 cellpadding=2 border=0 width=100%>
										<tr>
											<td class=inheader><b>Type</b></td>
											<td class=inheader><b>From</b></td>
											<td class=inheader width=200><b>Deposit</b></td>
											<td class=inheader width=200><b>Profit</b></td>
											<td class=inheader width=170><b>Date</b></td>
										</tr>
                                    @php

                                        $total = 0;
                                    @endphp

                                    @if($history_earns->isNotEmpty())
                                        @foreach($history_earns as $key => $history_earn)
                                        @php
                                            $total += $history_earn->amount;
                                        @endphp
                                            <tr>
                                                <td class="item">{{$history_earn->type}}</td>
                                                <td class="item">{{$history_earn->from}}</td>
                                                <td class="item">${{$history_earn->deposit}}</td>
                                                <td class="item">${{$history_earn->amount}}</td>
                                                <td class="item">{{$history_earn->created_at}}</td>
                                            </tr>
                                        @endforeach
                                    @else
										<tr>
											<td colspan=5 align=center>No transactions found</td>
										</tr>
                                    @endif

										<tr>
											<td colspan=4>Total:</td>
											<td align=right><b>$ {{ number_format($total, 2)}}</b></td>
										</tr>
									</table>
								</div>
								<ul class="pagination">
									<li class="page-item"><a class="prev page-link disabled">&lt;&lt;</a></li>
									<li class="page-item active"><a class="page-link">1</a></li>
									<li class="page-item"><a class="next page-link disabled">&gt;&gt;</a></li>
								</ul>



							</div>
						</div>
					</div>
				</div>



            </div>
        </div>
    </div>
    @include('Frontend/layout/footer')
@endsection

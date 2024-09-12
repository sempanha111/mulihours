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

                                <h1>Make A Deposit</h1>

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

                                <script language="javascript">
                                    function openCalculator(id) {

                                        w = 225;
                                        h = 400;
                                        t = (screen.height - h - 30) / 2;
                                        l = (screen.width - w - 30) / 2;
                                        window.open('?a=calendar&type=' + id, 'calculator' + id, "top=" + t + ",left=" + l + ",width=" + w +
                                            ",height=" + h + ",resizable=1,scrollbars=0");



                                        for (i = 0; i < document.spendform.h_id.length; i++) {
                                            if (document.spendform.h_id[i].value == id) {
                                                document.spendform.h_id[i].checked = true;
                                            }
                                        }



                                    }

                                    function updateCompound() {
                                        var id = 0;
                                        var tt = document.spendform.h_id.type;
                                        if (tt && tt.toLowerCase() == 'hidden') {
                                            id = document.spendform.h_id.value;
                                        } else {
                                            for (i = 0; i < document.spendform.h_id.length; i++) {
                                                if (document.spendform.h_id[i].checked) {
                                                    id = document.spendform.h_id[i].value;
                                                }
                                            }
                                        }

                                        var cpObj = document.getElementById('compound_percents');
                                        if (cpObj) {
                                            while (cpObj.options.length != 0) {
                                                cpObj.options[0] = null;
                                            }
                                        }

                                        if (cps[id] && cps[id].length > 0) {
                                            document.getElementById('coumpond_block').style.display = '';

                                            for (i in cps[id]) {
                                                cpObj.options[cpObj.options.length] = new Option(cps[id][i]);
                                            }
                                        } else {
                                            document.getElementById('coumpond_block').style.display = 'none';
                                        }
                                    }
                                    var cps = {};
                                </script>

                                <form action="{{ route('deposit.checkout') }}" method="POST" name="spendform">
                                    @csrf
                                    <div class="account_deposit">
                                        <div class="plan_wrap">
                                            <div class="row">
                                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">

                                                    <div class="plan-box">
                                                        <div class="plan-top">Basic Plan</div>
                                                        <div class="row">
                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                <img src="styles/images/plan1.png" alt="" />
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                                <h1>150<span>%</span></h1>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                                <h2>after 72 hours</h2>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                <ul>
                                                                    <li>Min Deposit: <span>1 USD</span></li>
                                                                    <li>Max Deposit: <span>5 USD</span></li>
                                                                </ul>

                                                                <input type="radio" name="h_id" value='1'
                                                                    id="r1" onclick="updateCompound()" checked>
                                                                <label class="radio" for="r1">Select</label>

                                                            </div>
                                                        </div>

                                                    </div> <!--end plan-box-->




                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">

                                                    <div class="plan-box">
                                                        <div class="plan-top plan-top2">Gold Plan</div>
                                                        <div class="row">
                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                <img src="styles/images/plan2.png" alt="" />
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                                <h1>200<span>%</span></h1>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                                <h2>after 72 hours</h2>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                <ul>
                                                                    <li>Min Deposit: <span>5 USD</span></li>
                                                                    <li>Max Deposit: <span>15 USD</span></li>
                                                                </ul>
                                                                <input type="radio" name="h_id" value='2'
                                                                    id="r2" onclick="updateCompound()">
                                                                <label class="radio" for="r2">Select</label>

                                                            </div>
                                                        </div>

                                                    </div> <!--end plan-box-->


                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">

                                                    <div class="plan-box">
                                                        <div class="plan-top plan-top3">Diamond Plan</div>
                                                        <div class="row">
                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                <img src="styles/images/plan3.png" alt="" />
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                                <h1>250<span>%</span></h1>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                                <h2>hourly 72 hours</h2>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                <ul>
                                                                    <li>Min Deposit: <span>15 USD</span></li>
                                                                    <li>Max Deposit: <span>150 USD</span></li>
                                                                </ul>

                                                                <input type="radio" name="h_id" value='3'
                                                                    id="r3" onclick="updateCompound()">
                                                                <label class="radio" for="r3">Select</label>
                                                            </div>
                                                        </div>

                                                    </div> <!--end plan-box-->



                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="my_accont">
                                        <script>
                                            cps[] = ;
                                        </script>

                                        <table cellspacing=0 cellpadding=2 border=0>
                                            <tr>
                                                <td width="30%"><strong>Your account balance ($):</strong></td>
                                                <td width="70%" align=right>$ {{ number_format($account_balance, 2)}}</td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;</td>
                                                <td align=right>
                                                    <small>
                                                    </small>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Amount to Spend ($):</td>
                                                <td align=right><input type=text name=amount value='1.00' class=inpts
                                                        size=15 style="text-align:right;"></td>
                                            </tr>
                                            <tr id="coumpond_block" style="display:none">
                                                <td>Compounding(%):</td>
                                                <td align=right>
                                                    <select name="compound" class=inpts id="compound_percents"></select>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td colspan=2>
                                                    <table cellspacing=0 cellpadding=2 border=0>
                                                        <tr>
                                                            <th>Spend funds from your Account Balance</th>
                                                        </tr>
                                                        <tr>
                                                            <th>Spend funds from Payment Processor</th>
                                                        </tr>
                                                        <tr>
                                                            <td><input type=radio name=type value="perfect_money" checked>
                                                            </td>
                                                            <td>Spend funds from PerfectMoney</td>
                                                        </tr>
                                                        <tr>
                                                            <td><input type=radio name=type value="payeer"></td>
                                                            <td>Spend funds from Payeer</td>
                                                        </tr>
                                                        <tr>
                                                            <td><input type=radio name=type value="bitcoin"></td>
                                                            <td>Spend funds from Bitcoin</td>
                                                        </tr>
                                                        <tr>
                                                            <td><input type=radio name=type value="litecoin"></td>
                                                            <td>Spend funds from Litecoin</td>
                                                        </tr>
                                                        <tr>
                                                            <td><input type=radio name=type value="ethereum"></td>
                                                            <td>Spend funds from Ethereum</td>
                                                        </tr>
                                                        <tr>
                                                            <td><input type=radio name=type value="bitcoin_cash"></td>
                                                            <td>Spend funds from Bitcoin Cash</td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan=2><input type=submit value="Spend" class=sbmt></td>
                                            </tr>
                                        </table>
                                </form>

                                <script language=javascript>
                                    for (i = 0; i < document.spendform.type.length; i++) {
                                        if ((document.spendform.type[i].value.match(/^process_/))) {
                                            document.spendform.type[i].checked = true;
                                            break;
                                        }
                                    }
                                    updateCompound();



                                    $(document).ready(function() {

                                        var minMoney = [1];
                                        var maxMoney = [5];

                                        $('input[name="h_id"]').change(function() {
                                            let value = $(this).val();
                                            if (value == 1) {

                                                minMoney = [1];
                                                maxMoney = [5];

                                                $('.inpts').val(minMoney[0].toFixed(2))


                                            } else if (value == 2) {
                                                minMoney = [5];
                                                maxMoney = [15];

                                                $('.inpts').val(minMoney[0].toFixed(2))
                                            } else {
                                                minMoney = [15];
                                                maxMoney = [150];

                                                $('.inpts').val(minMoney[0].toFixed(2))
                                            }
                                        });

                                        let typingTimer; // Timer identifier
                                        let typingDelay = 700; // Delay in milliseconds (500ms = 0.5 seconds)

                                        $('.inpts').on('input', function() {
                                            clearTimeout(typingTimer); // Clear the previous timer on each key press
                                            let inputField = $(this); // Reference to the input field

                                            typingTimer = setTimeout(function() {
                                                let inputValue = inputField.val();

                                                // Check if the input is a valid number
                                                if (isNaN(inputValue)) {
                                                    alert('Please enter a valid number');
                                                    inputField.val(minMoney[0]);
                                                    return;
                                                }

                                                // Parse the input value as a float
                                                let inputValueFloat = parseFloat(inputValue);

                                                // Apply min/max constraints
                                                if (inputValueFloat > maxMoney[0]) {
                                                    inputField.val(maxMoney[0].toFixed(2));
                                                } else if (inputValueFloat < minMoney[0]) {
                                                    inputField.val(minMoney[0].toFixed(2));
                                                }
                                            }, typingDelay); // Run the logic after the user stops typing for the set delay
                                        });







                                    });
                                </script>


                            </div>
                        </div>
                    </div>
                </div>



            </div>
        </div>
    </div>
    @include('Frontend/layout/footer')
@endsection

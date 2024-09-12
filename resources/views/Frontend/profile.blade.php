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
                                <h1>Edit Account</h1>
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



                                <script language=javascript>
                                    function IsNumeric(sText) {
                                        var ValidChars = "0123456789.";
                                        var IsNumber = true;
                                        var Char;
                                        if (sText == '') return false;
                                        for (i = 0; i < sText.length && IsNumber == true; i++) {
                                            Char = sText.charAt(i);
                                            if (ValidChars.indexOf(Char) == -1) {
                                                IsNumber = false;
                                            }
                                        }
                                        return IsNumber;
                                    }

                                    function checkform() {
                                        if (document.editform.fullname.value == '') {
                                            alert("Please type your full name!");
                                            document.editform.fullname.focus();
                                            return false;
                                        }


                                        if (document.editform.password.value != document.editform.password2.value) {
                                            alert("Please check your password!");
                                            document.editform.fullname.focus();
                                            return false;
                                        }




                                        if (document.editform.email.value == '') {
                                            alert("Please enter your e-mail address!");
                                            document.editform.email.focus();
                                            return false;
                                        }



                                        for (i in document.editform.elements) {
                                            f = document.editform.elements[i];
                                            if (f.name && f.name.match(/^pay_account/)) {
                                                if (f.value == '') continue;
                                                var notice = f.getAttribute('data-validate-notice');
                                                var invalid = 0;
                                                if (f.getAttribute('data-validate') == 'regexp') {
                                                    var re = new RegExp(f.getAttribute('data-validate-regexp'));
                                                    if (!f.value.match(re)) {
                                                        invalid = 1;
                                                    }
                                                } else if (f.getAttribute('data-validate') == 'email') {
                                                    var re = /^[^\@]+\@[^\@]+\.\w{2,4}$/;
                                                    if (!f.value.match(re)) {
                                                        invalid = 1;
                                                    }
                                                }
                                                if (invalid) {
                                                    alert('Invalid account format. Expected ' + notice);
                                                    f.focus();
                                                    return false;
                                                }
                                            }
                                        }

                                        return true;
                                    }
                                </script>


                                <form action="{{ route('edit_account')}}" method=post onsubmit="return checkform()" name=editform  class="my_accont">
                                    @csrf
                                    <table cellspacing=0 cellpadding=2 border=0 width="100%">
                                        <tr>
                                            <td width="50%">Account Name:</td>
                                            <td width="50%">{{ Auth::user()->fullname}}</td>
                                        </tr>
                                        <tr>
                                            <td>Registration date:</td>
                                            <td>{{ Auth::user()->created_at}}</td>
                                        </tr>
                                        <tr>
                                            <td>Your Full Name:</td>
                                            <td><input type=text name=fullname value='{{ Auth::user()->fullname}}' class=inpts size=30>
                                                @error('fullname')
                                                    <div>{{ $message }}</div>
                                                @enderror
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>New Password:</td>
                                            <td><input type=password name=password value="" class=inpts size=30>
                                            @error('password')
                                                <div>{{ $message }}</div>
                                            @enderror
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Retype Password:</td>
                                            <td><input type=password name=password1 value="" class=inpts size=30>
                                                @error('password1')
                                                <div>{{ $message }}</div>
                                            @enderror</td>
                                        </tr>
                                        <tr>
                                            <td>Your PerfectMoney acc no:</td>
                                            <td><input type=text class=inpts size=30 name="perfectmoney" value="{{ Auth::user()->perfect_money }}"
                                                    data-validate="regexp" data-validate-regexp="^U\d{5,}$"
                                                    data-validate-notice="UXXXXXXX"></td>
                                        </tr>
                                        <tr>
                                            <td>Your Payeer acc no:</td>
                                            <td><input type=text class=inpts size=30 name="payeer" value="{{ Auth::user()->payeer }}"
                                                    data-validate="regexp" data-validate-regexp="^P\d{5,}$"
                                                    data-validate-notice="PXXXXXXX"></td>
                                        </tr>
                                        <tr>
                                            <td>Your Bitcoin acc no:</td>
                                            <td><input type=text class=inpts size=30 name="bitcoin" value="{{ Auth::user()->bitcoin }}"
                                                    data-validate="regexp"
                                                    data-validate-regexp="^[13][a-km-zA-HJ-NP-Z1-9]{25,34}$"
                                                    data-validate-notice="Bitcoin Address"></td>
                                        </tr>
                                        <tr>
                                            <td>Your Litecoin acc no:</td>
                                            <td><input type=text class=inpts size=30 name="litecoin" value="{{ Auth::user()->litecoin }}"
                                                    data-validate="regexp"
                                                    data-validate-regexp="^[LM3][a-km-zA-HJ-NP-Z1-9]{25,34}$"
                                                    data-validate-notice="Litecoin Address"></td>
                                        </tr>
                                        <tr>
                                            <td>Your Ethereum acc no:</td>
                                            <td><input type=text class=inpts size=30 name="ethereum" value="{{ Auth::user()->ethereum }}"
                                                    data-validate="regexp" data-validate-regexp="^(0x)?[0-9a-fA-F]{40}$"
                                                    data-validate-notice="Ethereum Address"></td>
                                        </tr>
                                        <tr>
                                            <td>Your Bitcoin Cash acc no:</td>
                                            <td><input type=text class=inpts size=30 name="bitcoin_cash" value="{{ Auth::user()->bitcoin_cash }}"
                                                    data-validate="regexp" data-validate-regexp="^[\w\d]{25,43}$"
                                                    data-validate-notice="Bitcoin Cash Address"></td>
                                        </tr>
                                        <tr>
                                            <td>Your E-mail address:</td>
                                            <td><input type=text name=email value='{{ Auth::user()->email }}' class=inpts size=30>
                                                @error('email')
                                                <div>{{ $message }}</div>
                                            @enderror
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>&nbsp;</td>
                                            <td><input type=submit value="Change Account data" class=sbmt></td>
                                        </tr>
                                    </table>
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

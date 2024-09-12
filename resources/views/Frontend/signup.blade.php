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

                                <h1>Register Account</h1>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="form_wrap">
        <div class="container">
            <div class="row">

                <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2  col-sm-12 col-xs-12">


                    <div class="form-container signuppage">

                        <form action="{{ route('signup_auth') }}" onsubmit="return checkform()" method="POST" name="regform" class="regform">
<input type="hidden" name="">
                            @csrf
                            <table cellspacing=0 cellpadding=2 border=0 width="100%">
                                <tr>
                                    <td width="30%">Your Full Name:</td>
                                    <td><input type=text name=fullname value='' class=inpts size=30>
                                        @error('fullname')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </td>
                                </tr>
                                <tr>
                                    <td>Your Username:</td>
                                    <td><input type=text name=username value='' class=inpts size=30>
                                        @error('username')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </td>
                                </tr>
                                <tr>
                                    <td>Define Password:</td>
                                    <td><input type=password name=password value='' class=inpts size=30>
                                        @error('password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </td>
                                </tr>
                                <tr>
                                    <td>Retype Password:</td>
                                    <td><input type=password name=password1 value='' class=inpts size=30>
                                        @error('password1')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </td>
                                </tr>
                                <tr>
                                    <td>Your PerfectMoney Account:</td>
                                    <td><input type=text class=inpts size=30 name=perfectmoney value=""
                                            data-validate="regexp" data-validate-regexp="^U\d{5,}$"
                                            data-validate-notice="UXXXXXXX" placeholder="U12345678"></td>

                                </tr>
                                <tr>
                                    <td>Your Payeer Account:</td>
                                    <td><input type=text class=inpts size=30 name=payeer value=""
                                            data-validate="regexp" data-validate-regexp="^P\d{5,}$"
                                            data-validate-notice="PXXXXXXX" placeholder="P12345678"></td>
                                </tr>
                                <tr>
                                    <td>Your Bitcoin Account:</td>
                                    <td><input type=text class=inpts size=30 name=bitcoin value=""
                                            data-validate="regexp" data-validate-regexp="^[13][a-km-zA-HJ-NP-Z1-9]{25,34}$"
                                            data-validate-notice="Bitcoin Address"
                                            placeholder="1YourBitcoinAddressmwGAiHnxQWP8J2"></td>
                                </tr>
                                <tr>
                                    <td>Your Litecoin Account:</td>
                                    <td><input type=text class=inpts size=30 name=litecoin value=""
                                            data-validate="regexp" data-validate-regexp="^[LM3][a-km-zA-HJ-NP-Z1-9]{25,34}$"
                                            data-validate-notice="Litecoin Address"
                                            placeholder="LYourLitecoinsAddresstwHAionxQTL2"></td>
                                </tr>
                                <tr>
                                    <td>Your Ethereum Account:</td>
                                    <td><input type=text class=inpts size=30 name=ethereum value=""
                                            data-validate="regexp" data-validate-regexp="^(0x)?[0-9a-fA-F]{40}$"
                                            data-validate-notice="Ethereum Address"
                                            placeholder="0x6c78b0ac68bf953c7fdbec0fd65bd5df933r8473"></td>
                                </tr>
                                <tr>
                                    <td>Your Bitcoin Cash Account:</td>
                                    <td><input type=text class=inpts size=30 name=bitcoin_cash value=""
                                            data-validate="regexp" data-validate-regexp="^[\w\d]{25,43}$"
                                            data-validate-notice="Bitcoin Cash Address"
                                            placeholder="qqsAr4Ui98fsTmUkJv7HMQkJpU8ZKGzgAB"></td>
                                </tr>
                                <tr>
                                    <td>Your E-mail Address:</td>
                                    <td><input type=text name=email value='' class=inpts size=30>
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </td>
                                </tr>
                                <tr>
                                    <td>Retype Your E-mail:</td>
                                    <td><input type=text name=email1 value='' class=inpts size=30>
                                        @error('email1')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </td>
                                </tr>
                                <tr>
                                    <td>Secret question:</td>
                                    <td><input type=text name=sq value='' class=inpts size=30>
                                        @error('sq')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </td>
                                </tr>
                                <tr>
                                    <td>Secret answer:</td>
                                    <td><input type=text name=sa value='' class=inpts size=30>
                                        @error('sa')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </td>

                                </tr>



                                <tr>
                                    <td>&nbsp;</td>
                                    <td colspan=2><input type=checkbox name=agree value=1> I agree with <a
                                            href="?a=rules">Terms and
                                            conditions</a></td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td><input type=submit value="Register" class=sbmt></td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('Frontend/layout/footer')
    <script language=javascript>
        function checkform() {
            if (document.regform.fullname.value == '') {
                alert("Please enter your full name!");
                document.regform.fullname.focus();
                return false;
            }


            if (document.regform.username.value == '') {
                alert("Please enter your username!");
                document.regform.username.focus();
                return false;
            }
            if (!document.regform.username.value.match(/^[A-Za-z0-9_\-]+$/)) {
                alert("For username you should use English letters and digits only!");
                document.regform.username.focus();
                return false;
            }
            if (document.regform.password.value == '') {
                alert("Please enter your password!");
                document.regform.password.focus();
                return false;
            }
            if (document.regform.password.value != document.regform.password2.value) {
                alert("Please check your password!");
                document.regform.password2.focus();
                return false;
            }


            if (document.regform.email.value == '') {
                alert("Please enter your e-mail address!");
                document.regform.email.focus();
                return false;
            }
            if (document.regform.email.value != document.regform.email1.value) {
                alert("Please retupe your e-mail!");
                document.regform.email.focus();
                return false;
            }

            for (i in document.regform.elements) {
                f = document.regform.elements[i];
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

            if (document.regform.agree.checked == false) {
                alert("You have to agree with the Terms and Conditions!");
                return false;
            }

            return true;
        }

        function IsNumeric(sText) {
            var ValidChars = "0123456789";
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
    </script>
@endsection

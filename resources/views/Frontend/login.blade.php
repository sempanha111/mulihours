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
                                <h1>Member Login</h1>
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
                <div class="col-lg-6 col-lg-offset-3 col-md-12 col-sm-12 col-xs-12">

                    <div class="form-container loginpage">
                        <div class="icon-container"><img src="{{ asset('assets_frontend/images/middle1.png') }}"></div>

                        <form action="{{ route('login_auth') }}" method="POST" >
                            @csrf

                            <table cellspacing=0 cellpadding=2 border=0 width="100%">
                                <tr>
                                    <td>
                                        <span class="user">
                                            <input type=text name=username value='' class=inpts size=30
                                                autofocus="autofocus" placeholder="Username"></span>
                                        @error('username')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </td>
                                </tr>
                                <tr>
                                    <td><span class="password">
                                        <input type=password name=password value='' class="inpts" size=30  placeholder="Password"></span>
                                        @error('password')
                                        <div class="invalid-feedback">  {{ $message }}</div>
                                    @enderror
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center"><input type="submit" value="Login" class=sbmt></td>
                                </tr>
                                <tr>
                                    <td height="45" align="center" valign="bottom">
                                        <div class="existing_user"><a href="?a=forgot_password">Forgot your
                                                password?</a></div>
                                    </td>
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
            if (document.mainform.username.value == '') {
                alert("Please type your username!");
                document.mainform.username.focus();
                return false;
            }
            if (document.mainform.password.value == '') {
                alert("Please type your password!");
                document.mainform.password.focus();
                return false;
            }
            return true;
        }
    </script>
@endsection

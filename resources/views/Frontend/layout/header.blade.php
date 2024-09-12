<nav id="mainNav" class="navbar navbar-default">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <div class="logo fadeInDown wow"><a href="/"><img src="{{asset('assets_frontend/images/logo.png')}}"
                            alt="" /></a></div>
            </div>


            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle
                            navigation</span> Menu <i class="fa fa-bars"></i> </button>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav fadeInDown wow">
                        <li><a href="/">Home</a></li>
                        @if(Auth::check())
                            <li><a href="/dashboard" class="proofs"><i class="fa fa-home "></i> Dashboard </a></li>
                            <li>

                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a class="signup" href="javascript:void(0)"  onclick="this.closest('form').submit();" style=" padding: 10px 15px" >
                                        <i class="fa fa-sign-out"></i>Signout
                                    </a>
                                </form>

                            </li>
                        @else

                        <li>
                            <a href="/signup" class="signup"><i class="fa fa-user-plus"></i> register</a>
                        </li>
                        <li><a href="/login" class="proofs"><i class="fa fa-sign-in "></i> login</a></li>
                        @endif

                        <li><a href="/about">About Us</a></li>
                        <li><a href="/faq">faq</a></li>
                        <li><a href="/rules">terms</a></li>
                        <li><a href="/affiliates">Affiliates</a></li>
                        <li><a href="/support">Support</a></li>

{{--
                        <li><a href="https://www.facebook.com/" target="_blank" class="social"><img
                                    src="{{ asset('assets_frontend/images/social1.png')}}" alt="" /></a></li> --}}
                        <li><a href="https://t.me/multihours" target="_blank" class="social"><img
                                    src="{{ asset('assets_frontend/images/social2.png')}}" alt="" /></a></li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>

<ul>
    <li><a href="/dashboard"><span><img src="{{ asset('assets_frontend/images/dashboard.png')}}"
                    alt="" /></span>Account Dashboard</a></li>
    <li><a href="/dashboard/deposit"><span><img src="{{ asset('assets_frontend/images/deposit.png')}}" alt="" /></span>Make
            Deposit</a></li>
    <li><a href="/dashboard/deposit_list"><span><img src="{{ asset('assets_frontend/images/deposit-list.png')}}"
                    alt="" /></span>Your Deposits</a></li>
    <li><a href="/dashboard/deposit_history"><span><img src="{{ asset('assets_frontend/images/history.png')}}"
                    alt="" /></span>
            Deposit History</a></li>
    <li><a href="/dashboard/withdraw"><span><img src="{{ asset('assets_frontend/images/w-history.png')}}" alt="" /></span>
            Withdraw Funds</a></li>
    <li><a href="/dashboard/withdraw_history"><span><img src="{{ asset('assets_frontend/images/history.png')}}"
                    alt="" /></span> Withdrawals History</a></li>
    <li><a href="/dashboard/earnings"><span><img src="{{ asset('assets_frontend/images/money.png')}}" alt="" /></span>
            Earnings
            History</a></li>
    <li><a href="/dashboard/referallinks"><span><img src="{{ asset('assets_frontend/images/banners.png')}}" alt="" /></span>
            Your
            Referrals</a> </li>
    <li><a href="/dashboard/edit_account"><span><img src="{{ asset('assets_frontend/images/settings.png')}}"
                    alt="" /></span>
            Edit Account</a> </li>
    <li>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <a  href="javascript:void(0)"  onclick="this.closest('form').submit();">
                <span><img src="{{ asset('assets_frontend/images/logout.png')}}" alt="" /></span>Logout
            </a>
        </form>
    </li>
</ul>

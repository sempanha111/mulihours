@extends('Backend/layout/app')

@section('content')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        @include('Backend/layout/sidebar')
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="row">
                    <div class="col-12 grid-margin">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">withdraw</h4>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th> User Id </th>
                                                <th> User Name </th>
                                                <th> Amount </th>
                                                <th> Wallet </th>
                                                <th> WalletID </th>
                                                <th> Status </th>
                                                <th> Delete </th>
                                                <th> Created_at </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($withdraws as $key => $withdraw)
                                                <tr>
                                                    <td>{{ $withdraw->user->id }}</td>
                                                    <td>
                                                        <img src="http://127.0.0.1:8000/assets_backend/images/faces/face1.jpg"
                                                            class="me-2" alt="image"> {{ $withdraw->user->name }}
                                                    </td>
                                                    <td> ${{ $withdraw->withdraw_request }} </td>
                                                    <td> {{ $withdraw->money }} </td>
                                                    <td>
                                                        @if($withdraw->money == 'perfect_money')
                                                         {{ $withdraw->user->perfect_money }}
                                                        @elseif($withdraw->money == 'payeer')
                                                        {{ $withdraw->user->payeer }}
                                                        @elseif($withdraw->money == 'bitcoin')
                                                        {{ $withdraw->user->bitcoin }}
                                                        @elseif($withdraw->money == 'litecoin')
                                                        {{ $withdraw->user->litecoin }}
                                                        @elseif($withdraw->money == 'ethereum')
                                                        {{ $withdraw->user->ethereum }}
                                                        @elseif($withdraw->money == 'bitcoin_cash')
                                                        {{ $withdraw->user->bitcoin_cash }}
                                                        @endif

                                                    </td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <button class="btn btn-danger btn-sm dropdown-toggle" type="button" id="dropdownMenuSizeButton3" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true"> {{ $withdraw->status }} </button>
                                                            <div class="dropdown-menu " aria-labelledby="dropdownMenuSizeButton3" data-popper-placement="bottom-start" style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate3d(0px, 33.6px, 0px);">

                                                              <a class="dropdown-item" href="{{ route('approved_withdraw', $withdraw->id) }}">Approved</a>

                                                            </div>
                                                          </div>
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('delete_withdraw', $withdraw->id)}}">
                                                        <button type="button" class="btn btn-inverse-danger btn-icon">
                                                            <i class="mdi mdi-delete"></i>
                                                        </button></a>
                                                    </td>
                                                    <td> {{ $withdraw->created_at }} </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- main-panel ends -->
    </div>
@endsection

<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Withdraw;
use Illuminate\Foundation\Http\Events\MyEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class WithdrawController extends Controller
{
    public function withdraw()
    {

        $Auth_id = Auth::id();
        $users = User::find($Auth_id);




        $earning_perfect_moneys = $users->earning->Where('money', 'perfect_money');
        $earning_payeers = $users->earning->Where('money', 'payeer');
        $earning_bitcoins = $users->earning->Where('money', 'bitcoin');
        $earning_litecoins = $users->earning->Where('money', 'litecoin');
        $earning_ethereums = $users->earning->Where('money', 'ethereum');
        $earning_bitcoin_cashs = $users->earning->Where('money', 'bitcoin_cash');




        $perfect_moneys_able = 0;
        $withdraw_panding_perfect_money = 0;

        $payeer_able = 0;
        $withdraw_panding_payeer = 0;

        $bitcoins_able = 0;
        $withdraw_panding_bitcoins = 0;


        $litecoins_able = 0;
        $withdraw_panding_litecoins = 0;


        $ethereums_able = 0;
        $withdraw_panding_ethereums = 0;

        $bitcoin_cashs_able = 0;
        $withdraw_panding_bitcoin_cashs = 0;




        if ($earning_perfect_moneys->isNotEmpty()) {
            $perfect_money = 0;
            foreach ($earning_perfect_moneys as $earning_perfect_money) {
                $perfect_money += $earning_perfect_money->profit;
            }

            $withdraws = $users->withdraw->Where('money', 'perfect_money');
            $withdraws_panding = $users->withdraw->Where('money', 'perfect_money')->Where('status', 'waiting');


            $withdrawed_perfect_money = 0;
            if ($withdraws->isNotEmpty()) {
                foreach ($withdraws as $withdraw) {
                    $withdrawed_perfect_money += $withdraw->withdraw_request;
                }
            };

            if ($withdraws_panding->isNotEmpty()) {
                foreach ($withdraws_panding as $withdraw_panding) {
                    $withdraw_panding_perfect_money += $withdraw_panding->withdraw_request;
                }
            };

            $perfect_moneys_able = $perfect_money - $withdrawed_perfect_money;
        }
        if ($earning_payeers->isNotEmpty()) {
            $payeer = 0;
            foreach ($earning_payeers as $earning_payeer) {
                $payeer += $earning_payeer->profit;
            }
            $withdraws = $users->withdraw->Where('money', 'payeer');
            $withdraws_panding = $users->withdraw->Where('money', 'payeer')->Where('status', 'waiting');
            $withdrawed_payeer = 0;


            if ($withdraws->isNotEmpty()) {
                foreach ($withdraws as $withdraw) {
                    $withdrawed_payeer += $withdraw->withdraw_request;
                }
            };

            if ($withdraws_panding->isNotEmpty()) {
                foreach ($withdraws_panding as $withdraw_panding) {
                    $withdraw_panding_payeer += $withdraw_panding->withdraw_request;
                }
            };

            $payeer_able = $payeer - $withdrawed_payeer;
        }
        if ($earning_bitcoins->isNotEmpty()) {
            $bitcoins = 0;
            foreach ($earning_bitcoins as $earning_bitcoin) {

                $bitcoins += $earning_bitcoin->profit;
            }
            $withdraws = $users->withdraw->Where('money', 'bitcoin');
            $withdraws_panding = $users->withdraw->Where('money', 'bitcoin')->Where('status', 'waiting');
            $withdrawed_bitcoins = 0;


            if ($withdraws->isNotEmpty()) {
                foreach ($withdraws as $withdraw) {
                    $withdrawed_bitcoins += $withdraw->withdraw_request;
                }
            };

            if ($withdraws_panding->isNotEmpty()) {
                foreach ($withdraws_panding as $withdraw_panding) {
                    $withdraw_panding_bitcoins += $withdraw_panding->withdraw_request;
                }
            };

            $bitcoins_able = $bitcoins - $withdrawed_bitcoins;
        }
        if ($earning_litecoins->isNotEmpty()) {
            $litecoins = 0;
            foreach ($earning_litecoins as $earning_litecoin) {

                $litecoins += $earning_litecoin->profit;
            }
            $withdraws = $users->withdraw->Where('money', 'litecoin');
            $withdraws_panding = $users->withdraw->Where('money', 'litecoin')->Where('status', 'waiting');
            $withdrawed_litecoins = 0;


            if ($withdraws->isNotEmpty()) {
                foreach ($withdraws as $withdraw) {
                    $withdrawed_litecoins += $withdraw->withdraw_request;
                }
            };

            if ($withdraws_panding->isNotEmpty()) {
                foreach ($withdraws_panding as $withdraw_panding) {
                    $withdraw_panding_litecoins += $withdraw_panding->withdraw_request;
                }
            };

            $litecoins_able = $litecoins - $withdrawed_litecoins;
        }
        if ($earning_ethereums->isNotEmpty()) {
            $ethereums = 0;
            foreach ($earning_ethereums as $earning_ethereum) {

                $ethereums += $earning_ethereum->profit;
            }
            $withdraws = $users->withdraw->Where('money', 'ethereum');
            $withdraws_panding = $users->withdraw->Where('money', 'ethereum')->Where('status', 'waiting');
            $withdrawed_ethereums = 0;


            if ($withdraws->isNotEmpty()) {
                foreach ($withdraws as $withdraw) {
                    $withdrawed_ethereums += $withdraw->withdraw_request;
                }
            };

            if ($withdraws_panding->isNotEmpty()) {
                foreach ($withdraws_panding as $withdraw_panding) {
                    $withdraw_panding_ethereums += $withdraw_panding->withdraw_request;
                }
            };

            $ethereums_able = $ethereums - $withdrawed_ethereums;
        }
        if ($earning_bitcoin_cashs->isNotEmpty()) {
            $bitcoin_cashs = 0;
            foreach ($earning_bitcoin_cashs as $earning_bitcoin_cash) {

                $bitcoin_cashs += $earning_bitcoin_cash->profit;
            }
            $withdraws = $users->withdraw->Where('money', 'bitcoin_cash');
            $withdraws_panding = $users->withdraw->Where('money', 'bitcoin_cash')->Where('status', 'waiting');
            $withdrawed_bitcoin_cashs = 0;


            if ($withdraws->isNotEmpty()) {
                foreach ($withdraws as $withdraw) {
                    $withdrawed_bitcoin_cashs += $withdraw->withdraw_request;
                }
            };

            if ($withdraws_panding->isNotEmpty()) {
                foreach ($withdraws_panding as $withdraw_panding) {
                    $withdraw_panding_bitcoin_cashs += $withdraw_panding->withdraw_request;
                }
            };

            $bitcoin_cashs_able = $bitcoin_cashs - $withdrawed_bitcoin_cashs;
        }









        $withdraws = $users->withdraw;
        $earnings = $users->earning;

        //account balance
        $earned_total = 0;
        if ($earnings->isNotEmpty()) {
            foreach ($earnings as $earning) {
                $earned_total += $earning->profit;
            }
        }
        $withdrawed = 0;
        if ($withdraws->isNotEmpty()) {

            foreach ($withdraws as $withdraw) {
                $withdrawed += $withdraw->withdraw_request;
            }
        }
        $account_balance = $earned_total - $withdrawed;


        $total_panding = $withdraw_panding_perfect_money + $withdraw_panding_payeer + $withdraw_panding_bitcoins + $withdraw_panding_litecoins + $withdraw_panding_ethereums + $withdraw_panding_bitcoin_cashs;


        return view('Frontend.withdraw', compact(
            'account_balance',
            'total_panding',
            'perfect_moneys_able',
            'withdraw_panding_perfect_money',
            'payeer_able',
            'withdraw_panding_payeer',
            'bitcoins_able',
            'withdraw_panding_bitcoins',
            'litecoins_able',
            'withdraw_panding_litecoins',
            'ethereums_able',
            'withdraw_panding_ethereums',
            'bitcoin_cashs_able',
            'withdraw_panding_bitcoin_cashs',
        ));
    }

    public function withdraw_send(Request $request)
    {

        $wallet = $request->wallet;
        $Auth_id = Auth::id();
        $users = User::find($Auth_id);

        try {




            if ($request->session()->has('Session_withdraws_confirm')) {
                $Session_withdraws_confirm = session('Session_withdraws_confirm');
                $wallet = $Session_withdraws_confirm['wallet'];
                $withdraw_request = $Session_withdraws_confirm['withdraw_request'];
                $amount_crypto = $Session_withdraws_confirm['amount_crypto'];

                $request->session()->forget('Session_withdraws_confirm');

            }
            else{
                return redirect()->back()->with('error', 'Something went wrong');
            }


            $witdraw = Withdraw::create([
                'user_id' => $Auth_id,
                'money' => $wallet,
                'withdraw_request' => $withdraw_request,
                'amount_crypto' => $amount_crypto,
                'status' => 'waiting'
            ]);
            if ($witdraw) {
                event(new MyEvent('hello'));
                return redirect()->route('withdraw_history')->with('success', 'You has withdraw Successfully We Will Check');
            }
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            // Handling the exception, such as returning an error message or response
            return response()->json(['error' => 'User not found'], 404);
        } catch (\Exception $e) {
            // Handling any other kind of exception
            return response()->json(['error' => 'Something went wrong'], 500);
        }
    }

    public function withdraw_history()
    {
        $Auth_id = Auth::id();
        $users = User::find($Auth_id);

        $withdraws = $users->withdraw;


        return view('Frontend.withdraw_history', compact('withdraws'));
    }






    public function withdraw_checkout_sent(Request $request)
    {
        $wallet = $request->wallet;
        $Auth_id = Auth::id();
        $users = User::find($Auth_id);

        try {

            if ($wallet === 'perfect_money') {
                if ($users->perfect_money == null) {
                    return redirect()->back()->with('error', 'You not have found Wallet to withdraw');
                }
                $earning_perfect_moneys = $users->earning->Where('money', 'perfect_money');
                $perfect_moneys_able = 0;

                if ($earning_perfect_moneys->isNotEmpty()) {
                    $perfect_money = 0;
                    foreach ($earning_perfect_moneys as $earning_perfect_money) {
                        $perfect_money += $earning_perfect_money->profit;
                    }

                    $withdraws = $users->withdraw->Where('money', 'perfect_money');
                    $withdrawed_perfect_money = 0;


                    if ($withdraws->isNotEmpty()) {
                        foreach ($withdraws as $withdraw) {
                            $withdrawed_perfect_money += $withdraw->withdraw_request;
                        }
                    };

                    $perfect_moneys_able = $perfect_money - $withdrawed_perfect_money;
                }

                if ($perfect_moneys_able <= 0.20) {
                    return redirect()->back()->with('error', 'Your request does not meet the minimum withdrawal amount of $0.20.');
                } else {

                    $Session_withdraws = [
                        'wallet' => $wallet,
                        'money' => 'Perfect Money',
                        'withdraw_request' => $perfect_moneys_able,
                        'amount_crypto' => null,
                        'account' => $users->perfect_money
                    ];

                    $request->session()->put('session_withdraws', $Session_withdraws);


                    return redirect()->route('withdraw_confirm');
                }
            }
            if ($wallet === 'payeer') {
                if ($users->payeer == null) {
                    return redirect()->back()->with('error', 'You not have found Wallet to withdraw');
                }
                $earning_payeers = $users->earning->Where('money', 'payeer');
                $payeer_able = 0;
                if ($earning_payeers->isNotEmpty()) {
                    $payeer_money = 0;
                    foreach ($earning_payeers as $earning_payeer) {
                        $payeer_money += $earning_payeer->profit;
                    }
                    $withdraws = $users->withdraw->Where('money', 'payeer');
                    $withdrawed_payeer_money = 0;


                    if ($withdraws->isNotEmpty()) {
                        foreach ($withdraws as $withdraw) {
                            $withdrawed_payeer_money += $withdraw->withdraw_request;
                        }
                    };

                    $payeer_able = $payeer_money - $withdrawed_payeer_money;
                }

                if ($payeer_able <= 0.20) {
                    return redirect()->back()->with('error', 'Your request does not meet the minimum withdrawal amount of $0.20.');
                } else {


                    $Session_withdraws = [
                        'wallet' => $wallet,
                        'money' => 'Payeer',
                        'withdraw_request' => $payeer_able,
                        'amount_crypto' => null,
                        'account' => $users->payeer
                    ];

                    $request->session()->put('session_withdraws', $Session_withdraws);


                    return redirect()->route('withdraw_confirm');
                }
            }
            if ($wallet === 'bitcoin') {
                if ($users->bitcoin == null) {
                    return redirect()->back()->with('error', 'You not have found Wallet to withdraw');
                }
                $earning_bitcoins = $users->earning->Where('money', 'bitcoin');
                $bitcoin_able = 0;
                if ($earning_bitcoins->isNotEmpty()) {
                    $bitcoin_money = 0;
                    foreach ($earning_bitcoins as $earning_bitcoin) {
                        $bitcoin_money += $earning_bitcoin->profit;
                    }
                    $withdraws = $users->withdraw->Where('money', 'bitcoin');
                    $withdrawed_bitcoin_money = 0;


                    if ($withdraws->isNotEmpty()) {
                        foreach ($withdraws as $withdraw) {
                            $withdrawed_bitcoin_money += $withdraw->withdraw_request;
                        }
                    };

                    $bitcoin_able = $bitcoin_money - $withdrawed_bitcoin_money;
                }

                if ($bitcoin_able <= 1) {
                    return redirect()->back()->with('error', 'Your request does not meet the minimum withdrawal amount of $1.00.');
                } else {

                    $response = Http::get('https://min-api.cryptocompare.com/data/pricemultifull?fsyms=BTC&tsyms=USD');
                    if ($response->successful()) {

                        $data = $response->json();
                        $amount_crypto = $bitcoin_able /  $data['RAW']['BTC']['USD']['PRICE'];
                    } else {
                        $amount_crypto = null;
                    }

                    $Session_withdraws = [
                        'wallet' => $wallet,
                        'money' => 'BitCoin',
                        'withdraw_request' => $bitcoin_able,
                        'amount_crypto' => number_format($amount_crypto, 7),
                        'account' => $users->bitcoin
                    ];

                    $request->session()->put('session_withdraws', $Session_withdraws);


                    return redirect()->route('withdraw_confirm');
                }
            }
            if ($wallet === 'litecoin') {

                if ($users->litecoin == null) {
                    return redirect()->back()->with('error', 'You not have found Wallet to withdraw');
                }

                $earning_litecoins = $users->earning->Where('money', 'litecoin');
                $litecoin_able = 0;
                if ($earning_litecoins->isNotEmpty()) {
                    $litecoin_money = 0;
                    foreach ($earning_litecoins as $earning_litecoin) {
                        $litecoin_money += $earning_litecoin->profit;
                    }
                    $withdraws = $users->withdraw->Where('money', 'litecoin');
                    $withdrawed_litecoin_money = 0;


                    if ($withdraws->isNotEmpty()) {
                        foreach ($withdraws as $withdraw) {
                            $withdrawed_litecoin_money += $withdraw->withdraw_request;
                        }
                    };

                    $litecoin_able = $litecoin_money - $withdrawed_litecoin_money;
                }

                if ($litecoin_able <= 1) {
                    return redirect()->back()->with('error', 'Your request does not meet the minimum withdrawal amount of $1.00.');
                } else {
                    $response = Http::get('https://min-api.cryptocompare.com/data/pricemultifull?fsyms=LTC&tsyms=USD');
                    if ($response->successful()) {

                        $data = $response->json();
                        $amount_crypto = $litecoin_able /  $data['RAW']['LTC']['USD']['PRICE'];
                    } else {
                        $amount_crypto = null;
                    }

                    $Session_withdraws = [
                        'wallet' => $wallet,
                        'money' => 'Litecoin',
                        'withdraw_request' => $litecoin_able,
                        'amount_crypto' => number_format($amount_crypto, 7),
                        'account' => $users->litecoin
                    ];

                    $request->session()->put('session_withdraws', $Session_withdraws);


                    return redirect()->route('withdraw_confirm');
                }
            }
            if ($wallet === 'ethereum') {


                if ($users->ethereum == null) {
                    return redirect()->back()->with('error', 'You not have found Wallet to withdraw');
                }


                $earning_ethereums = $users->earning->Where('money', 'ethereum');
                $ethereum_able = 0;
                if ($earning_ethereums->isNotEmpty()) {
                    $ethereum_money = 0;
                    foreach ($earning_ethereums as  $earning_ethereum) {
                        $ethereum_money += $earning_ethereum->profit;
                    }
                    $withdraws = $users->withdraw->Where('money', 'ethereum');
                    $withdrawed_ethereum_money = 0;


                    if ($withdraws->isNotEmpty()) {
                        foreach ($withdraws as $withdraw) {
                            $withdrawed_ethereum_money += $withdraw->withdraw_request;
                        }
                    };

                    $ethereum_able = $ethereum_money - $withdrawed_ethereum_money;
                }

                if ($ethereum_able <= 1) {
                    return redirect()->back()->with('error', 'Your request does not meet the minimum withdrawal amount of $1.00.');
                } else {
                    $response = Http::get('https://min-api.cryptocompare.com/data/pricemultifull?fsyms=ETH&tsyms=USD');
                    if ($response->successful()) {

                        $data = $response->json();
                        $amount_crypto = $ethereum_able /  $data['RAW']['ETH']['USD']['PRICE'];
                    } else {
                        $amount_crypto = null;
                    }

                    $Session_withdraws = [
                        'wallet' => $wallet,
                        'money' => 'Ethereum',
                        'withdraw_request' => $ethereum_able,
                        'amount_crypto' => number_format($amount_crypto, 7),
                        'account' => $users->ethereum
                    ];

                    $request->session()->put('session_withdraws', $Session_withdraws);


                    return redirect()->route('withdraw_confirm');
                }
            }
            if ($wallet === 'bitcoin_cash') {

                if ($users->bitcoin_cash == null) {
                    return redirect()->back()->with('error', 'You not have found Wallet to withdraw');
                }

                $earning_bitcoin_cashs = $users->earning->Where('money', 'bitcoin_cash');
                $bitcoin_cash_able = 0;
                if ($earning_bitcoin_cashs->isNotEmpty()) {
                    $bitcoin_cash_money = 0;
                    foreach ($earning_bitcoin_cashs as $earning_bitcoin_cash) {
                        $bitcoin_cash_money += $earning_bitcoin_cash->profit;
                    }
                    $withdraws = $users->withdraw->Where('money', 'bitcoin_cash');
                    $withdrawed_bitcoin_cash_money = 0;


                    if ($withdraws->isNotEmpty()) {
                        foreach ($withdraws as $withdraw) {
                            $withdrawed_bitcoin_cash_money += $withdraw->withdraw_request;
                        }
                    };

                    $bitcoin_cash_able = $bitcoin_cash_money - $withdrawed_bitcoin_cash_money;
                }

                if ($bitcoin_cash_able <= 1) {
                    return redirect()->back()->with('error', 'Your request does not meet the minimum withdrawal amount of $1.00.');
                } else {
                    $response = Http::get('https://min-api.cryptocompare.com/data/pricemultifull?fsyms=BCH&tsyms=USD');
                    if ($response->successful()) {

                        $data = $response->json();
                        $amount_crypto = $bitcoin_cash_able /  $data['RAW']['BCH']['USD']['PRICE'];
                    } else {
                        $amount_crypto = null;
                    }

                    $Session_withdraws = [
                        'wallet' => $wallet,
                        'money' => 'Bitcoin Cash',
                        'withdraw_request' => $bitcoin_cash_able,
                        'amount_crypto' => number_format($amount_crypto, 7),
                        'account' => $users->bitcoin_cash
                    ];

                    $request->session()->put('session_withdraws', $Session_withdraws);


                    return redirect()->route('withdraw_confirm');
                }
            }

        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            // Handling the exception, such as returning an error message or response
            return response()->json(['error' => 'User not found'], 404);
        } catch (\Exception $e) {
            // Handling any other kind of exception
            return response()->json(['error' => 'Something went wrong'], 500);
        }
    }


    public function withdraw_confirm(Request $request)
    {
        if ($request->session()->has('session_withdraws')) {
            $Session_withdraws = session('session_withdraws');
            $wallet = $Session_withdraws['wallet'];
            $money = $Session_withdraws['money'];
            $withdraw_request = $Session_withdraws['withdraw_request'];
            $account = $Session_withdraws['account'];
            $amount_crypto = $Session_withdraws['amount_crypto'];


            $Session_withdraws_confirm = [
                'wallet' => $wallet,
                'money' => $money,
                'withdraw_request' => $withdraw_request,
                'amount_crypto' => $amount_crypto
            ];

            $request->session()->put('Session_withdraws_confirm', $Session_withdraws_confirm);

            $request->session()->forget('session_withdraws');
        } else {
            return redirect()->back()->with('error', 'Something went wrong');
        }

        return view('Frontend.withdraw_checkout', compact('wallet', 'money', 'withdraw_request', 'account', 'amount_crypto'));
    }
}

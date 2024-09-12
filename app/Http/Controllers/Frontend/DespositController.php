<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Deposit;
use App\Models\Earning;
use App\Models\History;
use App\Models\User;
use App\Models\Withdraw;
use Carbon\Carbon;
use Illuminate\Foundation\Http\Events\MyEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class DespositController extends Controller
{
    public function deposit()
    {

        $Auth_id = Auth::user()->id;
        $users = User::find($Auth_id);

        $earnings = Earning::Where('user_id', $Auth_id)->get();
        $earned_total = 0;
        foreach ($earnings as $earning) {
            $earned_total += $earning->profit;
        }

        $withdraws = $users->withdraw;

        //account balance
        $withdrawed = 0;
        if ($withdraws->isNotEmpty()) {

            foreach ($withdraws as $withdraw) {
                $withdrawed += $withdraw->withdraw_request;
            }
        }
        $account_balance = $earned_total - $withdrawed;
        return view('Frontend.makedeposit', compact('account_balance'));
    }


    public function depositcheckout(Request $request)
    {


        $plan = $request->h_id;
        $amount = $request->amount;
        $type = $request->type;

        $Sessionall = [
            'plan' => $plan,
            'amount' => $amount,
            'type' => $type,
        ];

        $request->session()->put('deposit', $Sessionall);

        return redirect()->route('go_deposit_check');
    }

    public function go_deposit_check(Request $request)
    {



        if ($request->session()->has('deposit')) {
            $Sessionall = session('deposit');
            $plan = $Sessionall['plan'];
            $amount = $Sessionall['amount'];
            $type = $Sessionall['type'];




            // $response = Http::get('https://min-api.cryptocompare.com/data/pricemultifull?fsyms=BTC,LTC,ETH,BCH&tsyms=USD');
            $response = Http::get('https://min-api.cryptocompare.com/data/pricemultifull?fsyms=BTC,ETH,LTC,XRP,DASH,XMR,XEM,BCH&tsyms=USD');

            if ($response->successful()) {

                $data = $response->json();
                $price_crypto_bitcoin = round($data['RAW']['BTC']['USD']['PRICE'], 2);
                $price_crypto_litecoin = round($data['RAW']['LTC']['USD']['PRICE'], 2);
                $price_crypto_ethereum = round($data['RAW']['ETH']['USD']['PRICE'], 2);
                $price_crypto_bitcoincash = round($data['RAW']['BCH']['USD']['PRICE'], 2);
            }else{
                $price_crypto_bitcoin = 0;
                $price_crypto_litecoin = 0;
                $price_crypto_ethereum = 0;
                $price_crypto_bitcoincash = 0;
            }


            return view('Frontend.deposit_checkout', compact('plan', 'amount', 'type', 'price_crypto_bitcoin', 'price_crypto_litecoin',
            'price_crypto_ethereum', 'price_crypto_bitcoincash'));
        } else {
            return redirect()->intended('dashboard/deposit')->with('warning', 'Please Inform your Choose Plans');
        }




    }
    public function deposit_send(Request $request)
    {
        $request->validate([
            'transaction_id' => 'required'
        ]);
        try {




            $Sessionall = session('deposit');
            $plan = $Sessionall['plan'];
            $amount = $Sessionall['amount'];
            $type = $Sessionall['type'];
            $deposits = Deposit::create([
                'user_id' => Auth::user()->id,
                'plan' => $plan,
                'amount' => $amount,
                'money' => $type,
                'transaction_id' => $request->transaction_id,
                'amount_crypto' => $request->amount_crypto > 0 ? $request->amount_crypto : null,
                'status' => 'waiting',
            ]);

            event(new MyEvent('hello'));

            return redirect()->intended('dashboard/deposit_history')->with('success', 'Thank you for your payment. You will be notified once the process is complete.');
        } catch (\Exception $e) {
            // Handle any other kind of exception
            return redirect()->back()->with('error', 'Something went wrong. Please try again later.');
        }
    }

    public function deposit_history(Request $request)
    {





        $deposits = Deposit::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();


        return view('Frontend.deposit_history', compact('deposits'));
    }



    public function  deposit_list()
    {

        $Auth_id = Auth::user()->id;
        $users = User::find($Auth_id);

        $deposits = $users->deposit;

        $plan1s = $deposits->Where('status', 'approved')->Where('plan', 1);
        $plan2s = $deposits->Where('status', 'approved')->Where('plan', 2);
        $plan3s = $deposits->Where('status', 'approved')->Where('plan', 3);



        $earnings = $users->earning;
        $earned_total = 0;
        if ($earnings->isNotEmpty()) {

            foreach ($earnings as $earning) {
                $earned_total += $earning->profit;
            }
        }


        $withdraws = $users->withdraw;
        //account balance
        $withdrawed = 0;
        if ($withdraws->isNotEmpty()) {

            foreach ($withdraws as $withdraw) {
                $withdrawed += $withdraw->withdraw_request;
            }
        }
        $account_balance = $earned_total - $withdrawed;





        return view('Frontend.deposit_list', [
            'plan1s' => $plan1s,
            'plan2s' => $plan2s,
            'plan3s' => $plan3s,
            'account_balance' => $account_balance,
        ]);
    }



}

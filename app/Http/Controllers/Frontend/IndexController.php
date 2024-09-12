<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Deposit;
use App\Models\Earning;
use App\Models\History;
use App\Models\User;
use App\Models\Withdraw;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index()
    {
        $releaseDate = new DateTime('2024-09-08'); // Replace with the release date
        $currentDate = new DateTime(); // Current date
        $interval = $releaseDate->diff($currentDate); // Calculate the difference
        $days = $interval->days; // Get the total number of days


        $total_member = User::Where('role', 'customer')->count();
        $deposits = Deposit::all();
        $withdraws = Withdraw::all();

        $total_deposit = 0;
        $total_withdraw = 0;
        foreach ($deposits as $deposit) {
            $total_deposit += $deposit->amount;
        }

        foreach ($withdraws as $withdraw) {
            $total_withdraw += $withdraw->withdraw_request;
        }

        $deposits_lasts = Deposit::orderBy('id', 'desc')->limit(10)->get();
        $withdraw_lasts = Withdraw::orderBy('id', 'desc')->limit(10)->get();

        return view('Frontend/index', compact('days', 'total_member', 'total_deposit', 'total_withdraw', 'deposits_lasts', 'withdraw_lasts'));
    }

    public function update_index()
    {

        $total_member = User::Where('role', 'customer')->count();
        $deposits = Deposit::all();
        $withdraws = Withdraw::all();

        $total_deposit = 0;
        $total_withdraw = 0;
        foreach ($deposits as $deposit) {
            $total_deposit += $deposit->amount;
        }

        foreach ($withdraws as $withdraw) {
            $total_withdraw += $withdraw->withdraw_request;
        }


        $deposits_lasts = Deposit::orderBy('id', 'desc')->limit(10)->get();
        $html_deposits = '';
        if ($deposits_lasts->isNotEmpty()) {
            foreach ($deposits_lasts as $deposits_last) {
                $img = '';
                if($deposits_last->money == 'perfect_money'){
                    $img = '/assets_frontend/images/18.gif';
                    }
                    elseif ($deposits_last->money == 'payeer') {
                    $img = '/assets_frontend/images/43.gif';
                    }
                    elseif ($deposits_last->money == 'bitcoin') {
                    $img = '/assets_frontend/images/48.gif';
                    }
                    elseif ($deposits_last->money == 'litecoin') {
                    $img = '/assets_frontend/images/68.gif';
                    }
                    elseif ($deposits_last->money == 'ethereum') {
                    $img = '/assets_frontend/images/69.gif';
                    }
                    elseif ($deposits_last->money == 'bitcoin_cash') {
                    $img = '/assets_frontend/images/77.gif';
                }

                $html_deposits .= ' <li>
                                        <span class="username">' . $deposits_last->user->fullname . '</span>
                                        <span class="payment">$ ' . number_format($deposits_last->amount, 2) . '</span>
                                        <img src="' . asset($img) . '" alt="Payment method image" />
                                    </li>';
            }
        }
        else{
            $html_deposits = '<div class="text-center">No Deposit Transaction yet</div>';
        }

        $withdraw_lasts = Withdraw::orderBy('id', 'desc')->limit(10)->get();
        $html_withdraw = '';
        if ($withdraw_lasts->isNotEmpty()) {
            foreach ($withdraw_lasts as $withdraw_last) {
                $img = '';
                if($withdraw_last->money == 'perfect_money'){
                    $img = '/assets_frontend/images/18.gif';
                    }
                    elseif ($withdraw_last->money == 'payeer') {
                    $img = '/assets_frontend/images/43.gif';
                    }
                    elseif ($withdraw_last->money == 'bitcoin') {
                    $img = '/assets_frontend/images/48.gif';
                    }
                    elseif ($withdraw_last->money == 'litecoin') {
                    $img = '/assets_frontend/images/68.gif';
                    }
                    elseif ($withdraw_last->money == 'ethereum') {
                    $img = '/assets_frontend/images/69.gif';
                    }
                    elseif ($withdraw_last->money == 'bitcoin_cash') {
                    $img = '/assets_frontend/images/77.gif';
                }

                $html_withdraw .= ' <li>
                                        <span class="username">' . $withdraw_last->user->fullname . '</span>
                                        <span class="payment">$ ' . number_format($withdraw_last->withdraw_request, 2) . '</span>
                                        <img src="' . asset($img) . '" alt="Payment method image" />
                                    </li>';
            }
        }
        else{
            $html_withdraw = '<div class="text-center">No Withdraw Transaction yet</div>';
        }

        return response()->json([
            'total_member' => $total_member,
            'total_deposit' => $total_deposit,
            'total_withdraw' => $total_withdraw,
            'html_deposits' => $html_deposits,
            'html_withdraw' => $html_withdraw,
        ]);
    }

    public function dashboard(Request $request)
    {

        $Auth_id = Auth::user()->id;
        $users = User::find($Auth_id);

        $deposits = $users->deposit;

        $percent = 0;

        foreach ($deposits as $deposit) {
            if ($deposit->plan == 1) {
                $percent = 150 / 100;
            } elseif ($deposit->plan == 2) {
                $percent = 200 / 100;
            } else {
                $percent = 250 / 100;
            }

            if ($deposit->start_plan != null) {

                $startPlan = Carbon::parse($deposit->start_plan);
                $currentDate = Carbon::now();

                $hoursDifference = $startPlan->diffInHours($currentDate);

                $investmentAmount = $deposit->amount;

                $profitRatePerHour = $percent / 72;


                if ($hoursDifference < 72) {

                    $earn = $users->earning->Where('deposit_id', $deposit->id)->first();

                    if ($earn) {
                        $update = Carbon::parse($earn->updated_at);
                    } else {
                        $update = Carbon::createFromFormat('Y-m-d H:i:s', '1900-01-01 00:00:00');
                    }

                    $current = Carbon::now();
                    $hoursdiff = $update->diffInHours($current);

                    if ($hoursdiff >= 3) {



                        $currentProfit = $investmentAmount * $profitRatePerHour * $hoursDifference;
                        $earnings = Earning::Where('deposit_id', $deposit->id)->first();
                        if ($earnings == null) {

                            Earning::create([
                                'user_id' => $Auth_id,
                                'deposit_id' => $deposit->id,
                                'money' => $deposit->money,
                                'profit' => $currentProfit,
                                'from' => $deposit->plan,
                            ]);
                        } else {
                            $earnings->update([
                                'profit' => $currentProfit,
                            ]);
                        }

                        $history = $users->history->Where('type', 'Profit')->Where('from', 'Plan' . $deposit->plan)->last();
                        if ($history) {
                            $last_date = $history->created_at;
                        } else {
                            $last_date = $deposit->start_plan;
                        }

                        $last = Carbon::parse($last_date);
                        $hoursDif = $last->diffInHours($currentDate);


                        History::create([
                            'user_id' => $Auth_id,
                            'type' => 'Profit',
                            'from' => 'Plan' . $deposit->plan,
                            'deposit' => $deposit->amount,
                            'amount' => $investmentAmount * $profitRatePerHour * $hoursDif,
                        ]);
                    }
                }

                if ($hoursDifference >= 72) {

                    $earnings = Earning::Where('deposit_id', $deposit->id)->first();

                    if ($earnings == null) {

                        Earning::create([
                            'user_id' => $Auth_id,
                            'deposit_id' => $deposit->id,
                            'money' => $deposit->money,
                            'profit' => $investmentAmount * $percent,
                            'from' => $deposit->plan,
                        ]);
                    } else {
                        $earnings->update([
                            'profit' => $investmentAmount * $percent,
                        ]);
                    }



                    $history = $users->history->Where('type', 'Profit')->Where('from', 'Plan' . $deposit->plan)->last();

                    if ($history) {

                        $last_date = $history->created_at;



                        $last = Carbon::parse($last_date);
                        $hoursDif = $last->diffInHours($deposit->end_plan);


                        $profit_amount = $investmentAmount * $profitRatePerHour * $hoursDif;


                        if ($profit_amount > 0) {
                            History::create([
                                'user_id' => $Auth_id,
                                'type' => 'Profit',
                                'from' => 'Plan' . $deposit->plan,
                                'deposit' => $deposit->amount,
                                'amount' => $profit_amount,
                            ]);
                        }
                    } else {


                        History::create([
                            'user_id' => $Auth_id,
                            'type' => 'Profit',
                            'from' => 'Plan' . $deposit->plan,
                            'deposit' => $deposit->amount,
                            'amount' => $investmentAmount * $percent,
                        ]);
                    }
                }
            }
        }


        $earnings = $users->earning;
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


        //total withdraw
        $withdraw_success = $withdraws->Where('status', 'approved');
        $total_withdraw_success = 0;
        if ($withdraw_success->isNotEmpty()) {
            foreach ($withdraw_success as $withdraw_succes) {
                $total_withdraw_success += $withdraw_succes->withdraw_request;
            }
        }


        //active deposit
        $deposit_actives = $users->deposit->Where('status', 'approved');
        $total_deposit_actives = 0;
        $total_deposit = 0;

        if ($deposit_actives->isNotEmpty()) {
            foreach ($deposit_actives as $deposits_active) {
                $end_plan = Carbon::parse($deposits_active->end_plan);
                $current_date = Carbon::now();

                if ($current_date->lt($end_plan)) {
                    $total_deposit_actives += $deposits_active->amount;
                }

                $total_deposit += $deposits_active->amount;
            }
        }


        //last deposit
        $last_deposit = $users->deposit->Where('status', 'approved')->last();
        $total_last_deposit = 0;
        if ($last_deposit) {
            $total_last_deposit = $last_deposit->amount;
        }

        $earnings_only = Earning::Where('user_id', $Auth_id)->Where('from', '!=', 'refferal')->get();
        $earn_only = 0;
        foreach ($earnings_only as $earning_only) {
            $earn_only += $earning_only->profit;
        }




        return view('Frontend.dashboard', compact('earn_only', 'account_balance', 'total_withdraw_success', 'total_deposit_actives', 'total_deposit', 'total_last_deposit'));
    }
}

<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Deposit;
use App\Models\Earning;
use App\Models\History;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DepositController extends Controller
{
    public function deposit(){

        $deposits = Deposit::Where('status', 'waiting')->WhereNull('on_delete')->orderBy('id', 'desc')->get();
        return view('Backend.deposit', compact('deposits'));
    }
    public function approved($id){
        $deposit = Deposit::Where('id', $id)->first();


        $start_plan =  Carbon::now();
        $end_plan = $start_plan->copy()->addHours(72);

        $deposit->update([
            'status' => 'approved',
            'start_plan' => $start_plan,
            'end_plan' => $end_plan,
        ]);

        $link_from = $deposit->user->link_from;

        if($link_from != null){
            $own_of_link = User::Where('fullname', $link_from)->first();
            if($own_of_link){
                $earn = Earning::Where('user_id', $own_of_link->id)->Where('from', 'refferal')->first();
                History::create([
                    'user_id' => $own_of_link->id,
                    'type' => 'refferal',
                    'from' => $deposit->user->fullname,
                    'deposit' => $deposit->amount,
                    'amount' => $deposit->amount * 0.2,
                ]);
                if($earn){
                    $old_profit_rel = $earn->profit;
                    $earn->update([
                        'profit' => $old_profit_rel + ($deposit->amount * 0.2),
                    ]);
                }
                else{
                    if($own_of_link->perfect_money != null){
                        $wallet = 'perfect_money';
                    }
                    elseif($own_of_link->payeer != null){
                        $wallet = 'payeer';
                    }
                    elseif($own_of_link->bitcoin != null){
                        $wallet = 'bitcoin';
                    }
                    elseif($own_of_link->litecoin != null){
                        $wallet = 'litecoin';
                    }
                    elseif($own_of_link->ethereum != null){
                        $wallet = 'ethereum';
                    }
                    elseif($own_of_link->bitcoin_cash != null){
                        $wallet = 'bitcoin_cash';
                    }
                    else{
                        $wallet = 'payeer';
                    }
                    Earning::create([
                        'user_id' => $own_of_link->id,
                        'money' => $wallet,
                        'profit' => ($deposit->amount * 0.2),
                        'from' => 'refferal'
                    ]);
                }
            }
        }



        return redirect()->back()->with('success', 'You has Approve Deposit Successfully');
    }
    public function delete_deposit($id){
        $deposit = Deposit::find($id);
        $deposit->update([
            'on_delete' => 1
        ]);
        return redirect()->back()->with('success', 'You Delete Deposit Successfully');
    }
}

<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Withdraw;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WithdrawController extends Controller
{
    public function withdraw_admin(){


        $withdraws = Withdraw::Where('status', 'waiting')->Wherenull('on_delete')->orderBy('id', 'desc')->get();


        return view('Backend.withdraw', compact('withdraws'));
    }

    public function approved_withdraw($id){
        $withdraw = Withdraw::find($id);
        $withdraw->update([
            'status' => 'approved'
        ]);
        return redirect()->back()->with('success', 'You Approved Withdraw Successfully');
    }

    public function delete_withdraw($id){
        $withdraw = Withdraw::find($id);
        $withdraw->update([
            'on_delete' => 1
        ]);
        return redirect()->back()->with('success', 'You Delete Withdraw Successfully');
    }
}

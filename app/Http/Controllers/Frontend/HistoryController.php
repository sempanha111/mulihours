<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\History;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HistoryController extends Controller
{
    public function earning_history(){

        $Auth_id = Auth::user()->id;
        $users = User::find($Auth_id);

        $history_earns = $users->history()->orderBy('id', 'desc')->get();
        return view('Frontend.earning', compact('history_earns'));
    }
}

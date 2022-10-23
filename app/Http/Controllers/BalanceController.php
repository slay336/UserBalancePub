<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BalanceController extends Controller
{
    public function show(Request $request) {
        $balance_data = $request->user()->balance()->get()->first();
        return response()->json([ "balance" => (float)$balance_data["user_balance"]]);
    }
}

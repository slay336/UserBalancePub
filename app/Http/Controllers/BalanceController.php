<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class BalanceController extends Controller
{
    public function show(User $user) {
        return response()->json($user->balance()->get());
    }
}

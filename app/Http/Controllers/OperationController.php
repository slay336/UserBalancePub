<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Operation;

class OperationController extends Controller
{
    public function show(User $user) {        
        $query = Operation::where("user_id", "=", $user->id)
                          ->orWhere("recipient_id", "=", $user->id)
                          ->latest();
        
        if(request()->last ?? false) {
            $query = $query->limit(request()->last);
        }        
        
        $operations = $query->get();
        return response()->json($operations);
    }
}

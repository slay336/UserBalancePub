<?php

namespace App\Http\Controllers;

use App\Models\Operation;
use Illuminate\Http\Request;

class OperationController extends Controller
{
    public function show(Request $request) {        
        $user = $request->user();
        $query = Operation::where("user_id", "=", $user->id)
                          ->orWhere("recipient_id", "=", $user->id)
                          ->latest();
        
        if(request()->last ?? false) {
            $query = $query->limit(request()->last);
        }        
        
        $operations = $query->get();
        $result = [];
        foreach($operations as $operation) {
            array_push($result, [
                "created_at" => $operation->created_at,
                "sender" => $operation->sender()->get("email")->first()["email"],
                "recipient" => $operation->recipient()->get("email")->first()["email"],
                "sum" => $operation->op_sum,
                "description" => $operation->description
            ]);
        }

        return response()->json($result);
    }
}

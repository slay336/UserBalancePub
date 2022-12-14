<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginUserRequest;


class LoginController extends Controller
{
    public function login(LoginUserRequest $request) {
        if(Auth::attempt($request->validated())) {
            $token = Auth::user()->createToken("api");
            return response()->json([
                "token" => $token->plainTextToken
            ]);
        }

        return response()->json([], Response::HTTP_UNAUTHORIZED);
    }

    public function check_logged_in(Request $request) {
        $is_logged_in = 0;
        $username = "";
        if($request->user()) {
            $is_logged_in = 1;
            $username = $request->user()->name;
        }
        return response()->json(["isLoggedIn" => $is_logged_in, "user" => $username]);
    }

    public function logout() {
        Auth::guard("web")->logout();
        return response()->json([]);
    }
}

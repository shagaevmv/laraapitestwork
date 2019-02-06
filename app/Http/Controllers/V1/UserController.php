<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function auth(Request $request)
    {
        $params = $request->only(['email', 'password']);
        $username = $params['email'];
        $password = $params['password'];

        if (Auth::attempt(['email' => $username, 'password' => $password])) {
            return Auth::user()->createToken('token-name', []);
        }

        return response()->json(['error' => 'Invalid username or Password']);
    }

    public function index(Request $request)
    {
        return $request->user();
    }
}

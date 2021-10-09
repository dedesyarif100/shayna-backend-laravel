<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\support\Facades\Auth;
use Illuminate\support\Facades\Hash;
use Carbon\Carbon;
use App\Models\User;

class AuthController extends Controller
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth.basic');
    // }

    public function register(Request $request)
    {
        // Validasi Registrasi
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users',
            'password' => 'required|string|min:6',
        ]);

        // Request value
        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user->save();
        return response()->json(['message' => 'User has been registered'], 200);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required|string',
        ]);

        $credentials = request(['email', 'password']);

        // dd($credentials);

        if (!Auth::attempt($credentials)) {
            return response()->json(['message' => 'Unauthorized'], 401);
        } else {
            $user = $request->user();
            $tokenResult = $user->createToken("Personal Access Token");
            $token = $tokenResult->token;
            $token->expires_at = Carbon::now()->addWeeks(1);
            $token->save();

            return response()->json(['data' => [
                'user' => Auth::user(),
                'access_token' => $tokenResult->accessToken,
                'token_type' => 'Bearer',
                'expires_at' => Carbon::parse($tokenResult->token->expires_at)->toDateTimeString()
            ]]);
        }
    }

    public function logout(Request $request)
    {
        // $request->user()->token()->revoke();
        // return response()->json([
        //     'message' => 'Successfully logged out'
        // ]);
        if (Auth::check()) {
            dd(Auth::check());
            // $user = $request->user();
            // $tokenResult = $user->createToken("Personal Access Token")->revoke();
            // Auth::user()->createToken("Personal Access Token")->revoke();
            return response()->json(['success' =>'Successfully logged out of application'],200);
        }else{
            dd(Auth::check());
            return response()->json(['error' =>'api.something_went_wrong'], 500);
        }
    }
}

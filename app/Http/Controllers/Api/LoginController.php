<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use App\Services\Response\ResponseService;
use Carbon\Carbon;

class LoginController extends Controller
{
    public function login(LoginRequest $request){
        
        $credentials = request([
            'email',
            'password',
        ]);
        if(!Auth::attempt($credentials)){
            return ResponseService::sendJsonResponse(false, 403, [
                'message'=> 'The provided credentials do not match our records.'
            ]);
        }
        $user = $request->user();
        $tokenResult = $user->createToken('Personal Access Token');
        return ResponseService::sendJsonResponse(true, 200, [], [
            'api_token'=>$tokenResult->accessToken,
            'user'=>$user,
            'token_type'=>'Bearer',
            'expires_at'=>Carbon::parse($tokenResult->token->expires_at)->toDateTimeString(),
        ]);
        
    }
}

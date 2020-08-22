<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Url;


class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    public function login(Request $request)
    {
        $creds = $request->only(['email', 'password']);
        $creds_json = json_encode($creds);

        $response = Http::withHeaders([ "Content-Type" =>  'application/json' ])
            ->withBody( $creds_json,  'application/json' )
            ->post(Url::LOGIN_URL);

        $response = json_decode($response, true);
        $token = $this->setToken($response);

        return $token['status'] ? redirect('/shipment')->with('status', $token['msg']) : redirect('/shipment')->withErrors($token['msg']);
    }


    public function setToken($response)
    {
        if ($token = $response['data'][0]['token']){
            session(['token' => $token]);

            return [ 'status' => true, 'msg' => "You are logged in!" ];
        } else {

            return [ 'status' => false, 'msg' => "Error token!" ];
        }
    }

    public function logout()
    {
        session()->flush();

        return redirect('/');
    }
}

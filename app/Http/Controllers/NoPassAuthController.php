<?php

namespace App\Http\Controllers;

use App\Affiliate;
use App\Coupon;
use App\Http\Requests\NoPassAuth;
use App\User;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NoPassAuthController extends Controller
{
    public function index()
    {
        session_start([
            'cookie_lifetime' => 8640000,
        ]);

        if (isset($_COOKIE['AUTH_ID']) && !empty($_COOKIE['AUTH_ID'])) return redirect()->route('kkic');

        return view('auth.nopass');
    }

    public function auth(NoPassAuth $request)
    {

        //'email' => 'sdffs@dfff.dd',
        //'thrivecart_affiliate_id' => '43534',

        $affiliate = (new Affiliate())->where([
            'email' => strtolower($request->get('email')),
            'thrivecart_affiliate_id' => $request->get('aff_id'),
        ])->first();

        if (!$affiliate)
            return view('auth.nopass')->with('auth', true);

        $affiliate->loginNoPass();

        return redirect()->route('kkic');
    }

    public function logout()
    {
        setcookie("AUTH_ID", "", time() - 3600, "/");

        $_SESSION = $_COOKIE = '';

        return redirect('/');
    }
}

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
        return view('auth.nopass');
    }

    public function auth(NoPassAuth $request)
    {

        //'email' => 'sdffs@dfff.dd',
        //'thrivecart_affiliate_id' => '43534',

        $affiliate = (new Affiliate())->where([
            'email' => $request->get('email'),
            'thrivecart_affiliate_id' => $request->get('aff_id'),
        ])->first();

        if (!$affiliate)
            return view('auth.nopass')->with('auth', true);

        $data = $affiliate->toArray();
        session_start([
            'cookie_lifetime' => 8640000,
        ]);

        $_SESSION['uid'] = $data['id'];
        $_SESSION['aff_id'] = $data['thrivecart_affiliate_id'];
        $_SESSION['email'] = $data['email'];
        $_SESSION['fname'] = $data['first_name'];
        $_SESSION['lname'] = $data['last_name'];

        return redirect()->route('kkic');
    }
}
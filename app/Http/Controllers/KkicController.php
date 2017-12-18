<?php

namespace App\Http\Controllers;

use App\Affiliate;
use App\Coupon;
use App\Friend;
use Illuminate\Http\Request;

use App\Http\Requests\AddInvite;
use Illuminate\Support\Facades\Auth;


class KkicController extends Controller
{
    private $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();

            return $next($request);
        });
    }

	public function create()
    {
        if (!$this->user->hasRole('affiliator'))
            return redirect()->to('/');

    	return view('kkic', [
    	    'affiliate' => new \App\Affiliate,
        ]);
    }

    public function store(AddInvite $request)
    {
        if (!$this->user->hasRole('affiliator'))
            return redirect()->to('/');

    	$affiliate_id = $request->get('affiliate_id');
		$affiliate = Affiliate::where('thrivecart_affiliate_id', $affiliate_id)->first();

    	if(!$affiliate) {
    	    $affiliate = new \App\Affiliate;
        }

        $affiliate->thrivecart_affiliate_id	 = $request->get('affiliate_id');
        $affiliate->email = $request->get('affiliate_email');
        $affiliate->first_name = $request->get('affiliate_fname');
        $affiliate->last_name = $request->get('affiliate_lname');
        $affiliate->save();

        $friend = new \App\Friend;
        $friend->email = $request->get('friend_email');
        $friend->first_name = $request->get('friend_fname');
        $friend->last_name = $request->get('friend_lname');
        $friend->affiliate_id = $affiliate->id;
        $friend->save();

        $coupon = Coupon::where('has_been_used','!','false')->first();

        $invite = new \App\Invite();
        $invite->affiliate_id = $affiliate->id;
        $invite->friend_id = $friend->id;
        $invite->coupon = $coupon->code;
        $invite->save();

        if($invite)
        {
            $coupon->has_been_used = true;
            $coupon->save();
        }

        return redirect()->route('kkic')->with('message', 'Invite Sent Successfully');

    }

    public function invites()
    {
    	return view('invites', [
    	    'invites' => Friend::with('affiliates')->get(),
        ]);
    }

    public function redeem()
    {
        if (!$this->user->hasRole('affiliator'))
            return redirect()->to('/');

    	return "in redeem";
    }
}

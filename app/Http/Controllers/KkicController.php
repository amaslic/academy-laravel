<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\AddInvite;


class KkicController extends Controller
{
	public function create()
    {
    	$affiliate = new \App\Affiliate;
    	return view('kkic',['affiliate'=>$affiliate]);
    }

    public function store(AddInvite $request)
    {
  
    	$affiliate_id = $request->get('affiliate_id');
    	
  		//check if affiliate exist, if not create new
		$affiliate = \App\Affiliate::where('thrivecart_affiliate_id', $affiliate_id)->first();

    	if(!$affiliate)
    	{
    		$affiliate_new = new \App\Affiliate;
    		$affiliate_new->thrivecart_affiliate_id	 = $request->get('affiliate_id');
    		$affiliate_new->email = $request->get('affiliate_email');
    		$affiliate_new->first_name = $request->get('affiliate_fname');
    		$affiliate_new->last_name = $request->get('affiliate_lname'); 
    		$affiliate_new->save();

    		$friend = new \App\Friend;
    		$friend->email = $request->get('friend_email');
    		$friend->first_name = $request->get('friend_fname');
    		$friend->last_name = $request->get('friend_lname'); 
    		$friend->affiliate_id = $affiliate_new->id;
    		$friend->save();

    		$coupon = \App\Coupon::where('has_been_used','!','false')->first();

    		$invite = new \App\Invite;
    		$invite->affiliate_id = $affiliate_new->id;
    		$invite->friend_id = $friend->id;
    		$invite->coupon = $coupon->code;
    		$invite->save();

    		if($invite)
    		{
    			$coupon->has_been_used = true;
    			$coupon->save();
    		}

    		  return redirect()
		        ->route('kkic')
		        ->with('message', 'Invite Sent Successfully');

    	}
    	else
    	{
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

    		$coupon = \App\Coupon::where('has_been_used','!','false')->first();

    		$invite = new \App\Invite;
    		$invite->affiliate_id = $affiliate->id;
    		$invite->friend_id = $friend->id;
    		$invite->coupon = $coupon->code;
    		$invite->save();

    		if($invite)
    		{
    			$coupon->has_been_used = true;
    			$coupon->save();
    		}

    		  return redirect()
		        ->route('kkic')
		        ->with('message', 'Invite Sent Successfully');

    	}

    }

    public function invites()
    {
    	$invites = \App\Friend::with('affiliates')->get();

    	return view('invites',['invites'=> $invites]);
    }

    public function redeem()
    {
    	return "in redeem";
    }
}

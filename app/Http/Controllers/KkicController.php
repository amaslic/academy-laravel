<?php

namespace App\Http\Controllers;

use App\Affiliate;
use App\Coupon;
use App\Friend;
use Illuminate\Http\Request;

use App\Http\Requests\AddInvite;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Mockery\Exception;

class KkicController extends Controller
{
    private $user;
    private $affiliate;
    private $friend;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();

            return $next($request);
        });
    }

	public function create()
    {
        session_start([
            'cookie_lifetime' => 8640000,
        ]);

        if (!$this->user && !isset($_COOKIE['AUTH_ID']) && empty($_COOKIE['AUTH_ID'])) die('Denied.');

        $data = [
            'uid' => $_SESSION['uid'] ?? false,
            'aff_id' => $_SESSION['aff_id'] ?? false,
            'email' => $_SESSION['email'] ?? false,
            'fname' => $_SESSION['fname'] ?? false,
            'lname' => $_SESSION['lname'] ?? false,
        ];


        $affiliate = Affiliate::find($_SESSION['uid']);
        if( ! is_null($affiliate)){
            $data['fname'] = $affiliate->first_name;
            $data['lname'] = $affiliate->last_name;
        }

    	return view('kkic', [
    	    'affiliate' => new \App\Affiliate,
            'data' => $data,
        ]);
    }

    public function store(AddInvite $request)
    {
        $this->validate($request, [
            'affiliate_id' => 'required',
            'affiliate_fname' => 'required|min:2|max:32|regex:/^[a-zA-Z][a-zA-Z0-9]+$/',
            'affiliate_lname' => 'required|min:2|max:32|regex:/^[a-zA-Z][a-zA-Z0-9]+$/',
            'affiliate_email' => 'required|email',
            'friend_fname' => 'required|min:2|max:32|regex:/^[a-zA-Z][a-zA-Z0-9]+$/',
            'friend_lname' => 'required|min:2|max:32|regex:/^[a-zA-Z][a-zA-Z0-9]+$/',
            'friend_email' => 'required|email',
        ], [], [
            'affiliate_fname' => 'Affiliate First Name',
            'affiliate_lname' => 'Affiliate Last Name',
            'affiliate_id' => 'Affiliate ID',
            'affiliate_email' => 'Affiliate Email',
            'friend_fname' => 'Friend Last Name',
            'friend_lname' => 'Friend Last Name',
            'friend_email' => 'Friend Email',
        ]);

    	$email = $request->get('affiliate_email');
		$affiliate = Affiliate::where('email', $email)->first();

    	if(!$affiliate) {
    	    $affiliate = new \App\Affiliate;
            $affiliate->invites_left = 3;
        }

        $affiliate->thrivecart_affiliate_id	 = $request->get('affiliate_id');
        $affiliate->email = $request->get('affiliate_email');
        $affiliate->first_name = $request->get('affiliate_fname');
        $affiliate->last_name = $request->get('affiliate_lname');
        $affiliate->save();

        $this->affiliate = [
            'id' => $affiliate->id,
            'email' => $request->get('affiliate_email'),
            'fname' => $request->get('affiliate_fname'),
            'lname' => $request->get('affiliate_lname'),
        ];

        if ($affiliate->invites_left <= 0)
            return redirect()->route('kkic')->with('error', 'You have reached invitation limit!');

        $affiliate->invites_left--;
        $affiliate->save();

        $friend = new \App\Friend;
        $friend->email = $request->get('friend_email');
        $friend->first_name = $request->get('friend_fname');
        $friend->last_name = $request->get('friend_lname');
        $friend->affiliate_id = $affiliate->id;
        $friend->save();

        $this->friend = [
            'id' => $friend->id,
            'email' => $request->get('friend_email'),
            'fname' => $request->get('friend_fname'),
            'lname' => $request->get('friend_lname'),
        ];

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

        Mail::send('emails.list', ['id' => $this->friend['id']], function($message)
        {
            $message->from($this->affiliate['email'], $this->affiliate['fname'].' '.$this->affiliate['lname']);
            $message->to($this->friend['email'], $this->friend['fname'].' '.$this->friend['lname']);
        });

        return redirect()->route('kkic')
            ->with('message', 'Invite Sent Successfully!')
            ->with('uid', $affiliate->id)
            ->with('coupon', $coupon->code)
            ->with('email', $affiliate->email)
            ->with('affid', $affiliate->thrivecart_affiliate_id)
            ->with('balance', $affiliate->invites_left);

    }

    public function invites()
    {
        $affiliate = null;
        $friends = new Collection();

        if (request()->has(['affiliateid'])) {
            $affiliate = Affiliate::where('thrivecart_affiliate_id', request('affiliateid'))->first();
        }

        if( ! is_null($affiliate)){
            $friends = $affiliate->friends()->get();
        }

        return view('invites', [
            'affiliate' => $affiliate,
            'friends' => $friends,
        ]);
    }

    public function invitation($id)
    {
        $whoami = (new Friend())->find($id);

        if(!$whoami) die('Denied.');
        $whoami = $whoami->toArray();
        $whoishe = (new Affiliate())->find($whoami['affiliate_id']);

        if(!$whoishe) die('Denied.');

        return view('emails.invite', [
            'affiliate' => $whoishe->toArray(),
            'friend' => $whoami,
        ]);
    }

    public function follow($id)
    {
        $whoami = (new Friend())->find($id);

        if(!$whoami) die('Denied.');
        $whoami = $whoami->toArray();
        $whoishe = (new Affiliate())->find($whoami['affiliate_id']);

        if(!$whoishe) die('Denied.');

        return view('emails.follow', [
            'affiliate' => $whoishe->toArray(),
            'friend' => $whoami,
        ]);
    }

    public function order($id)
    {
        $whoami = (new Friend())->find($id);

        if(!$whoami) die('Denied.');
        $whoami = $whoami->toArray();
        $whoishe = (new Affiliate())->find($whoami['affiliate_id']);

        if(!$whoishe) die('Denied.');

        return view('emails.order', [
            'affiliate' => $whoishe->toArray(),
            'friend' => $whoami,
        ]);
    }

    public function redeem()
    {
    	return "in redeem";
    }
}

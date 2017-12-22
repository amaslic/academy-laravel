<?php

namespace App\Http\Controllers;

use App\Affiliate;
use App\Helpers\StrHelper;
use App\Http\Requests\SubscribeRequest;
use App\User;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public $user;

    protected $strHelper;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct( StrHelper $strHelper)
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();

            return $next($request);
        });

        $this->strHelper = $strHelper;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if ($this->user->hasRole('admin')) return redirect()->route('dashboard');

        return view('home');
    }

    public function subscribe(SubscribeRequest $request){
        $email = $request->input('email');

        $isEmailExist = Affiliate::where('email', $email)
            ->exists();

        if($isEmailExist){
            return redirect()->action('NoPassAuthController@index', ['email'=>$email]);
        }else{
            do{
                $thrivecart_affiliate_id = $this->strHelper->generateRandomString();
            }while(Affiliate::where('thrivecart_affiliate_id', $thrivecart_affiliate_id)->exists());

            $affiliate = Affiliate::create([
                'first_name'=> '',
                'last_name'=> '',
                'email' => $email,
                'invites_left'=>3,
                'thrivecart_affiliate_id'=>$thrivecart_affiliate_id,
            ]);

            $affiliate->loginNoPass();

            return redirect()->route('kkic');
        }
    }
}
